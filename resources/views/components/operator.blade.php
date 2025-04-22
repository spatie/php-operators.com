<a
    x-text="operator.title"
    x-bind:href="'/operators/' + operator.slug"
    {{ $attributes->twMerge('flex items-center px-2 h-8 text-xs font-medium rounded-md leading-tight transition') }}
></a>
