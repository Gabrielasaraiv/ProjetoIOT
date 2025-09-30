<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Dashboard;

use App\Livewire\Registro\RegistroList;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);
Route::get('registro/list', RegistroList::class)->name('registro.list');

use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorList;
use Illuminate\Support\Facades\Route;


Route::get('/ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('/ambiente/{id}/edit', AmbienteEdit::class)->name('ambiente.edit');
Route::get('/ambiente/index', AmbienteList::class)->name('ambiente.index');

Route::get('/sensor/create', SensorCreate::class)->name('sensor.create');
Route::get('/sensor/{id}/edit', SensorEdit::class)->name('sensor.edit');
Route::get('/sensor/index', SensorList::class)->name('sensor.index');

Route::get('/dashboard', Dashboard::class)->name('dashboard');


