<?php

use Tests\TestCase;

pest()->extend(TestCase::class)
    ->beforeEach(fn () => $this->withoutVite())
    ->in('.');
