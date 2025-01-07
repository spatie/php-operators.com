<?php

use App\Livewire\Operators;
use Illuminate\Support\Facades\Route;

Route::get('/', Operators::class);
Route::get('/operators/{operator}', Operators::class);
