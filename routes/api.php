<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;

Route::get('/games', [GameController::class, 'index']);
