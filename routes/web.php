<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExemploController;

Route::get('/main', [ExemploController::class, 'index'])->name('main');

Route::get('/login', [ExemploController::class, 'login'])->name('login');
