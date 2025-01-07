<a
    wire:navigate.hover
    href="/operators/{{ $operator->slug }}"
    {{ $attributes->twMerge('p-2 text-xs font-medium rounded-md leading-tight transition') }}
>
    {{ $operator->title }}
</a>
