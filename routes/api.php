<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZipCodeController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    dd('estou na api');
});

Route::controller(ZipCodeController::class)->group(function () {
    Route::get('/zip-code/all', 'index');
    Route::put('/zip-code/{address}/update', 'update');
    Route::get('/zip-code/{address}/show', 'show');
    Route::delete('zip-code/{address}/delete', 'destroy');
    Route::get('/zip-code', 'getZipCode');
    Route::post('/zip-code', 'searchPublicPlace');


});


Route::controller(StudentController::class)->group(function () {
    Route::get('/student', 'index');
    Route::get('/student/{student}/show', 'show');
    Route::post('/student', 'store');
    Route::put('/student/{student}/update', 'update');
    Route::delete('/student/{student}/delete', 'destroy');
});
