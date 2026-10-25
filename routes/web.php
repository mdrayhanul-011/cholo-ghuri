<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Cholo-Ghuri Bilingual routing foundation.
|
*/

// Root redirect to default locale (/bn)
Route::get('/', function () {
    return redirect('/bn');
});

// Bilingual Public Route Group
Route::prefix('{locale}')
    ->where(['locale' => 'bn|en'])
    ->middleware('setLocale')
    ->group(function () {
        Route::get('/', function () {
            return view('layouts.app');
        })->name('home');
    });
