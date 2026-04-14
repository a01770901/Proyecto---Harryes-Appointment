<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppointmentController;

Route::get('/', function () {
    return response()->json(['message' => 'API funcionando']);
});

Route::get('/test', function () {
    return response()->json(['message' => 'test']);
});

Route::apiResource('appointments', AppointmentController::class);