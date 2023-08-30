<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| EuPago Routes
|--------------------------------------------------------------------------
*/


// MB
Route::prefix('mb')->name('mb.')->group(function () {
    Route::get('callback', 'MBController@callback')->name('callback');
});

// MB Way
Route::prefix('mbway')->name('mbway.')->group(function () {
    Route::get('callback', 'MBWayController@callback')->name('callback');
});

Route::get('/callback', function (Request $request) {
    // try {
    //     Log::info('teste log');
    //     // Log::info($request->valor);
    //     Log::info('My message', [$request]);
    // } catch (\Throwable $th) {
    //     dd($th->getMessage());
    // }

    return response()->json(['teste' => 2]);
});