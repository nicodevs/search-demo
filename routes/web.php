<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'mode' => 'multiple'
    ]);
});

Route::get('/b', function () {
    return view('welcome', [
        'mode' => 'single'
    ]);
});
