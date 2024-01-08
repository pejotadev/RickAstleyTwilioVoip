<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/make-call', 'App\Http\Controllers\Controller@makeCall');
