<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Game;
use App\Comment;
use App\Classes\Utils;


class MainController extends Controller
{
    public function home(){
    	$temp = Game::rateDescending()->take(3)->with(['categories'])->get();
    	$slider = Utils::customize_game_result($temp);
    	$temp = Game::idDescending()->take(4)->with(['categories'])->get();
    	$new_games = Utils::customize_game_result($temp);
    	$temp = Comment::dateDescending()->take(4)->with(['user'])->get();
        $temp = Utils::rename_user_to_player($temp);
    	$comments = Utils::convert_dates($temp);
    	$json = file_get_contents('http://api.ie.ce-it.ir/F95/home.json');
    	$content = json_decode($json, true);
    	$tutorials = $content['response']['result']['homepage']['tutorials'];
    	$final = [];
    	$response = [];
    	$response['ok'] = true;
    	$response['result'] = [];
    	$response['result']['homepage'] = [];    	
    	$response['result']['homepage']['slider'] = $slider;
    	$response['result']['homepage']['new_games'] = $new_games;
    	$response['result']['homepage']['comments'] = $comments;
    	$response['result']['homepage']['tutorials'] = $tutorials;
    	$final['response'] = $response;
    	return $final;
    }

    public function game_header($name) {
        $temp = Game::rateDescending()->where('title', '=', $name)->with(['categories'])->get();
        $game = Utils::customize_game_result($temp)[0];
        $final = [];
        $response = [];
        $response['ok'] = true;
        $response['result'] = [];
        $response['result']['game'] = $game;       
        $final['response'] = $response;
        return $final;
    }

    public function game_leaderboard($name) {
        $temp = Game::where('title', '=', $name)->with(['records', 'records.user'])->get();
        $records = Utils::rename_user_to_player($temp[0]['records']);
        $final = [];
        $response = [];
        $response['ok'] = true;
        $response['result'] = [];
        $response['result']['leaderboard'] = $records;       
        $final['response'] = $response;
        return $final;
    }

    public function game_comments(Request $request, $name) {
        $offset = $request->input('offset');
        $offset = (is_null($offset) ? 0 : $offset);
        $temp = Game::where('title', '=', $name)->with(['comments' => function($query) use($offset)
        {
            $query->offset($offset)->take(3);

        }, 'comments.user', 'comments.game' => function($query)
        {
            $query->join('comments', 'games.id', '=', 'comments.game_id')
                ->select(array('games.*', DB::raw('COUNT(*) as number_of_comments')))
                ->groupBy('id');
        }])->get();
        $temp = Utils::rename_user_to_player($temp[0]['comments']);
        $comments = Utils::convert_dates($temp);
        $final = [];
        $response = [];
        $response['ok'] = true;
        $response['result'] = [];
        $response['result']['comments'] = $comments;       
        $final['response'] = $response;
        return $final;
    }

    public function game_related($name) {
        $temp = Game::where('title', '=', $name)->with(['categories', 'categories.games', 'categories.games.categories'])->get();
        $games = [];
        $names = [];
        array_push($names, $name); 
        foreach ($temp[0]['categories'] as $cats) {
            foreach ($cats['games'] as $game) {
                if(!in_array($game['title'], $names)) {
                    array_push($names, $game['title']);
                    $rate = Game::where('title', '=', $game['title'])
                            ->join('comments', 'games.id', '=', 'comments.game_id')
                            ->select(array(DB::raw('ROUND(AVG(rate), 1) as rate')))
                            ->groupBy('games.id')
                            ->get()[0]['rate'];
                    $game['rate'] = $rate;
                    array_push($games, $game);
                }
            }
        }
        $games = Utils::customize_game_result($games);
        $final = [];
        $response = [];
        $response['ok'] = true;
        $response['result'] = [];
        $response['result']['games'] = $games;       
        $final['response'] = $response;
        return $final;
    }
}
