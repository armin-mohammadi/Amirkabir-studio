<?php

namespace App\Classes;

use App\Classes\IntlDateTime;

class Utils
{
    public static function customize_game_result($input){
        $output = [];
        foreach ($input as $game) {
            $cats = [];
            foreach ($game['categories'] as $cat) {
                array_push($cats, $cat['name']);
            }
            unset($game['categories']);
            $game['categories'] = $cats;
            array_push($output, $game);
        }
        return $output;
    }

    public static function convert_dates($input){
        $output = [];
        foreach ($input as $comment) {
            $date = new IntlDateTime(\DateTime::createFromFormat('Y-m-d H:i:s', $comment['date']), 'Asia/Tehran', 'persian', 'fa');
            $date_str = $date->format('d LLL yyyy');
            unset($comment['date']);
            $comment['date'] = $date_str;
            array_push($output, $comment);
        }
        return $output;
    }

}