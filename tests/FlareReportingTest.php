<?php

use Spatie\FlareClient\Flare;
use Spatie\FlareClient\FlareConfig;

it('reports exceptions to Flare', function () {
    app(FlareConfig::class)->apiToken = 'fake-flare-key';

    $flare = Mockery::spy(Flare::class);
    app()->instance(Flare::class, $flare);

    report(new RuntimeException('Something went wrong'));

    $flare->shouldHaveReceived('report')
        ->withArgs(fn (Throwable $exception) => $exception->getMessage() === 'Something went wrong')
        ->once();
});
