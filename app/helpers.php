<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('routeIsHome')){
    function routeIsMarket(){
        if (Route::is('market*')){
            return true;
        } return false;
    }
}


















