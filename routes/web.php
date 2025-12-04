<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Auth\Loggout;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\Registro\RegistroList;
use App\Livewire\Sensor\ListStatus;
use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorList;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\UserCreate;
use App\Livewire\User\UserEdit;
use App\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('registros', RegistroList::class)->middleware('auth')->name('registro.index');

Route::get('/ambiente/create', AmbienteCreate::class)->middleware('auth')->name('ambiente.create');
Route::get('/ambiente/{id}/edit', AmbienteEdit::class)->middleware('auth')->name('ambiente.edit');
Route::get('/ambiente/index', AmbienteList::class)->middleware('auth')->name('ambiente.index');

Route::get('/sensor/create', SensorCreate::class)->middleware('auth')->name('sensor.create');
Route::get('/sensor/{id}/edit', SensorEdit::class)->middleware('auth')->name('sensor.edit');
Route::get('/sensor/index', SensorList::class)->middleware('auth')->name('sensor.index');

Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');
Route::get('/perfil', UserDashboard::class)->middleware('auth')->name('perfil');

Route::get('/status/list', ListStatus::class)->middleware('auth')->name('status.list');

Route::get('/user/create', UserCreate::class)->name('user.create');
Route::get('/user/{id}/edit', UserEdit::class)->middleware('auth')->name('user.edit');

Route::get('/login', Login::class)->name('login');
Route::get('/logout', Loggout::class)->middleware('auth')->name('logout');



