<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LibraryController::class)->group(function() {
    Route::get('/library', 'index');
});