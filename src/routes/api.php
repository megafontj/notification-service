<?php

use App\Http\Controllers\ApiV1\TweetController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tweets', TweetController::class);
Route::post('tweets:search', [TweetController::class, 'index']);
