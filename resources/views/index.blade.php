<x-layout>
    <x-quote>My baby doesn't call me so put me through, operator…</x-quote>
    <div class="max-w-screen-lg mx-auto p-12">
        <dl>
            @foreach($operators as $operator)
                {{--  Available attributes: category, index, slug, title, teaser, tags, related, contents --}}
                <dt>{{ $operator->title }}</dt>
                <dd>{{ $operator->contents }}</dd>
            @endforeach
        </dl>
    </div>
</x-layout>
