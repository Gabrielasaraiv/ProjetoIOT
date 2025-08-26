<?php

use App\Livewire\Dashboard;
use App\Livewire\Sensor\SensorCreate;
use Illuminate\Support\Facades\Route;

Route::get('/sensor/create', SensorCreate::class);
