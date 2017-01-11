<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	$temp = Comment::dateDescending()->take(4)->with(['users'])->get();
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
}
