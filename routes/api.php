<?php

use App\Http\Controllers\LibraryController;

Route::controller(LibraryController::class)->group(function() {
    Route::get('/csrf', 'token');
    Route::get('/library', 'index');
    Route::get('/library/{id}', 'book');
    Route::post('/library', 'new');
    Route::post('/library/{id}', 'update');
    Route::delete('/library/{id}', 'remove');
});

?>