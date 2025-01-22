<a
    wire:navigate.hover
    href="{{ url($operator->slug) }}"
    {{ $attributes->twMerge('flex items-center px-2 h-8 text-xs font-medium rounded-md leading-tight transition') }}
>
    {{ $operator->title }}
</a>
