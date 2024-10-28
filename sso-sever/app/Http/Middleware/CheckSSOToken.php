<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;

class CheckSSOToken extends CheckClientCredentials
{
    public function handle($request, Closure $next, ...$scopes)
    {
        return parent::handle($request, $next, ...$scopes);
    }
}
