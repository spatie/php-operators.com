<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RedirectToCanonicalHost
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->shouldRedirect($request)) {
            return $next($request);
        }

        return redirect()->to(rtrim(config('app.url'), '/').$request->getRequestUri(), 301);
    }

    protected function shouldRedirect(Request $request): bool
    {
        if (! app()->isProduction()) {
            return false;
        }

        $canonicalHost = parse_url(config('app.url'), PHP_URL_HOST);

        if (! $canonicalHost) {
            return false;
        }

        $host = $request->getHost();

        if ($host === $canonicalHost) {
            return false;
        }

        return ! Str::endsWith($host, '.laravel.cloud');
    }
}
