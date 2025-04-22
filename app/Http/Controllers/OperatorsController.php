<?php

namespace App\Http\Controllers;

use App\Data\OperatorData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;

class OperatorsController
{
    public function __invoke(?string $currentOperatorSlug = null)
    {
        $operators = $this->getSheets();

        $currentOperator = $currentOperatorSlug
            ? $operators->first(fn (Sheet $sheet) => $sheet->slug === $currentOperatorSlug)
            : null;

        return view('operators', [
            'operators' => $operators->map(fn (Sheet $sheet) => OperatorData::fromSheet($sheet, $operators)->toArray()),
            'currentOperatorSlug' => $currentOperatorSlug,
            'title' => str($currentOperator?->teaser ?? '')->stripTags(),
            'description' => str($currentOperator?->contents ?? '')->stripTags()->trim(),
            'image' => $currentOperator ? url("/og/{$currentOperator->slug}.png") : null,
        ]);
    }

    /** @return \Illuminate\Support\Collection<Sheet> */
    private function getSheets(): Collection
    {
        return Cache::flexible(
            key: 'operators',
            ttl: [now()->addHour(), now()->addDay()],
            callback: fn () => Sheets::all(),
        );
    }
}
