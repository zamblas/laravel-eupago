<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use CodeTech\EuPago\Http\Controllers\MBController;
use CodeTech\EuPago\Http\Controllers\MBWayController;

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

Route::get('/callback', function () {
    $r = (object) Request::all();

    if($r->mp){
        $class = match ($r->mp) {
            'PC:PT' => MBController::class,
            'MW:PT' => MBWayController::class,
        };

        return redirect()->action([$class, 'callback'], (array) $r);
    }else{
        \Log::info('mp column not found: ' . var_export($r, true));
    }
});