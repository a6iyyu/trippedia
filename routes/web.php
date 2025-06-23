<?php

use App\Auth;
use App\Home;
use Vendor\Route;

Route::get('/', [Home::class, 'index']);
Route::get('/masuk', [Auth::class, 'login']);

Route::dispatch();