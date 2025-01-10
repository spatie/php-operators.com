<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;

class Operators extends Component
{
    public ?string $currentOperatorSlug;

    public string $search = '';

    public function setSearch(string $search): void
    {
        $this->search = $search;
    }

    public function random(): void
    {
        $randomOperator = Sheets::all()->random();

        $this->redirect('/operators/' . $randomOperator->slug, navigate: true);
    }

    public function mount($operator = null): void
    {
        $this->currentOperatorSlug = $operator;
    }

    public function render()
    {
        $allOperators = Sheets::all();

        $visibleOperators = $this->search
            ? $allOperators->filter(function (Sheet $operator) {
                return collect([$operator->slug, ...$operator->tags])
                    ->first(fn (string $term) => strpos($term, $this->search) !== false);
            })
            : $allOperators;

        $currentOperator = $this->currentOperatorSlug
            ? $allOperators->first(fn (Sheet $sheet) => $sheet->slug === $this->currentOperatorSlug)
            : null;

        return view('livewire.operators', [
            'currentOperator' => $currentOperator,
            'relatedOperators' => $currentOperator
                ? collect($currentOperator->related)->map(function (string $related) use ($allOperators) {
                    return $allOperators->firstWhere('slug', $related) ?? throw new Exception("Operator with slug `{$related}` does not exist.");
                })
                : null,
            'operatorsByCategory' => $visibleOperators->groupBy('category'),
        ]);
    }
}
