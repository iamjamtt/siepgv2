<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Auth\Login as AuthLogin;

Route::redirect('/', '/home');
Route::get('/login', AuthLogin::class)->name('login');
Route::get('/home', HomeIndex::class)->name('home.index');
