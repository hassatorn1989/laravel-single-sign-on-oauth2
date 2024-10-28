<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class SsoAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = session('api_token');
        if ($token) {
            $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user');

            if ($response->successful()) {
                return $next($request);
            }
        }

        return redirect()->route('signin');
    }
}
