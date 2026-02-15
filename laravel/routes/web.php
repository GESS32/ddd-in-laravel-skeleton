<?php

use Illuminate\Support\Facades\Route;
use Presentation\Illuminate\Http\Controllers\WelcomeController;

Route::get('/', WelcomeController::class);
