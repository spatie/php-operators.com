<?php

namespace App\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\Sheets\Sheet;

class OperatorData extends Data
{
    public function __construct(
        public string $slug,
        public string $title,
        public string $teaser,
        public string $category,
        public string $contents,
        public string $code,
        public array $tags,
        public array $related,
    ) {
    }

    public static function fromSheet(Sheet $sheet, Collection $sheets): static
    {
        return new static(
            slug: $sheet->slug,
            title: $sheet->title,
            teaser: $sheet->teaser,
            category: $sheet->category,
            contents: $sheet->contents,
            code: $sheet->code,
            tags: $sheet->tags,
            related: collect($sheet->related)
                ->map(function (string $related) use ($sheets) {
                    $relatedOperator = $sheets->firstWhere('slug', $related);

                    // @todo Fix content exceptions
                    // ?? throw new Exception("Operator with slug `{$related}` does not exist.");

                    if (!$relatedOperator) {
                        return null;
                    }

                    return [
                        'title' => $relatedOperator->title,
                        'slug' => $relatedOperator->slug,
                    ];
                })
                ->filter()
                ->all(),
        );
    }
}
