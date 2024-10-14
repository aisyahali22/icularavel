<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', function(){
    return view('home');
});

route::get('/auth/signIn', function(){
    return view('auth.signin');
});