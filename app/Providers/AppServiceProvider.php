<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tempest\Highlight\Highlighter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(Highlighter::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
