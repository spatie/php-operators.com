<?php

namespace App\Http\Controllers;

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
            'operators' => $operators->map(fn (Sheet $sheet) => [
                ...$sheet->toArray(),
                'contents' => $sheet->contents->toHtml(),
                'related' => collect($sheet->related)
                    ->map(function (string $related) use ($operators) {
                        $relatedOperator = $operators->firstWhere('slug', $related);

                        // @todo Fix content exceptions
                        // ?? throw new Exception("Operator with slug `{$related}` does not exist.");

                        if (! $relatedOperator) {
                            return null;
                        }

                        return [
                            'title' => $relatedOperator->title,
                            'slug' => $relatedOperator->slug,
                        ];
                    })
                    ->filter(),
            ]),
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
