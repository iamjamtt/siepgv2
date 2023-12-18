<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login as AuthLogin;
use App\Livewire\Registro\Index as RegistroIndex;
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Configuracion\Rol\Index as RolIndex;
use App\Livewire\Configuracion\Permiso\Index as PermisoIndex;

// autenticacion
Route::get('/login', AuthLogin::class)
    ->middleware('guest')
    ->name('login');
// registro de inscripciones
Route::get('/registro', RegistroIndex::class)
    // ->middleware('guest')
    ->name('registro.index');

Route::redirect('/', '/home')
    ->middleware('auth');
Route::get('/home', HomeIndex::class)
    ->middleware('auth')
    ->name('home.index');
Route::prefix('configuracion')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', RolIndex::class)
            ->name('rol.index');
        Route::get('/permiso', PermisoIndex::class)
            ->name('permiso.index');
    });
