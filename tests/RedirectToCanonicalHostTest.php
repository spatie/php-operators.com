<?php

beforeEach(function () {
    config()->set('app.url', 'https://php-operators.com');
    app()->detectEnvironment(fn () => 'production');
});

it('redirects other hosts to the same path on the canonical host', function (string $url, string $expectedUrl) {
    $this->get($url)->assertStatus(301)->assertRedirect($expectedUrl);
})->with([
    ['https://phpoperators.com/', 'https://php-operators.com/'],
    ['https://www.phpoperators.com/operators/null-coalescing', 'https://php-operators.com/operators/null-coalescing'],
    ['http://phpoperators.com/operators/addition?ref=x', 'https://php-operators.com/operators/addition?ref=x'],
]);

it('does not redirect the canonical host', function () {
    $this->get('https://php-operators.com/operators/null-coalescing')->assertOk();
});

it('does not redirect the Laravel Cloud vanity domain', function () {
    $this->get('https://php-operatorscom-production-je2gji.laravel.cloud/')->assertOk();
});

it('does not redirect outside production', function () {
    app()->detectEnvironment(fn () => 'local');

    $this->get('https://phpoperators.com/')->assertOk();
});
