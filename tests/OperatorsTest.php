<?php

it('renders the index', function () {
    $this->get('/')
        ->assertStatus(200);
});

$slugs = array_filter(array_map(function (string $filename) {
    if (in_array($filename, ['.', '..'])) {
        return null;
    }

    $parts = explode('-', str_replace('.md', '', $filename), 3);

    return $parts[2] ?? null;
}, scandir(__DIR__.'/../resources/content')));

it('renders all operators', function (string $slug) {
    $this->get('/operators/'.$slug)
        ->assertStatus(200);
})->with($slugs);
