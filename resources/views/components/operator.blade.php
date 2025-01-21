<a
    wire:navigate.hover
    href="{{ action(\App\Livewire\Operators::class, $operator->slug) }}"
    {{ $attributes->twMerge('flex items-center px-2 h-8 text-xs font-medium rounded-md leading-tight transition') }}
>
    {{ $operator->title }}
</a>
