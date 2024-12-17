<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sheets\Facades\Sheets;

Route::get('/', function () {
    $operatorsByCategory = Sheets::all()->groupBy('category');

    return view('index', ['operatorsByCategory' => $operatorsByCategory]);
});
