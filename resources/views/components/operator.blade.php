<a
    href="/operators/{{ $operator->slug }}"
    @click.prevent="selectOperator('{{ $operator->slug  }}')"
    {{ $attributes->twMerge('p-2 text-xs font-medium rounded-md leading-tight transition') }}
>
    {{ $operator->title }}
</a>
