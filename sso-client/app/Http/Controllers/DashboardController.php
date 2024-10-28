<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    function index()
    {
        $token = session('api_token');
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user');
        if ($response->successful()) {
            return response()->json($response->json());
        }
    }
}
