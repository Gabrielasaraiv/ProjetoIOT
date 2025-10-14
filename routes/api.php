<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('registro/create', [RegistroController::class, "store"]);

Route::get('sensor/show/status', [SensorController::class, "show"]);

Route::put('sensor/update/status', [SensorController::class, "update"]);