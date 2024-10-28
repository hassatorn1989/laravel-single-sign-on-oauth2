<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected $ssoBaseUrl = 'http://127.0.0.1:8000'; // URL ของ SSO Server

    public function signin()
    {
        return view('signin');
    }
    public function redirectToSSOServer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $response = Http::post('http://127.0.0.1:8000/api/login', [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);
        $response = Http::post('http://127.0.0.1:8000/api/login', [
            'email' => 'admin@gmail.com',
            'password' => '1234',
        ]);

        if ($response->successful()) {
            $token = $response->json()['token'];
            // เก็บ token ไว้ใน session หรือ cookie
            session(['api_token' => $token]);
            return redirect('/dashboard');
        }
        // return redirect()->route('signin');
    }


    public function logout()
    {
        Http::post('http://127.0.0.1:8000/api/logout', [
            'token' => session('api_token'),
        ]);
        session()->forget('api_token');
        echo 'Logout';
    }
}
