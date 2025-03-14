<?php

use App\Http\Controllers\OperatorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', OperatorsController::class);
Route::get('/operators/{currentOperatorSlug}', OperatorsController::class);
