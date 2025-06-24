<?php

use App\Http\Auth;
use App\Http\Home;
use Vendor\Route;

Route::get('/', [Home::class, 'index']);
Route::get('/masuk', [Auth::class, 'login']);

Route::dispatch();