<?php

namespace App\Http\Controllers;

use Spatie\Sheets\Facades\Sheets;

class OperatorsController
{
    public function __invoke(?string $operator = null)
    {
        $operatorsByCategory = Sheets::all()->groupBy('category');

        return view('index', [
            'currentOperatorSlug' => $operator,
            'operatorsByCategory' => $operatorsByCategory,
        ]);
    }
}
