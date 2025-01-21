<?php

pest()->extend(Tests\TestCase::class)
    ->beforeEach(fn () => $this->withoutVite())
    ->in('.');
