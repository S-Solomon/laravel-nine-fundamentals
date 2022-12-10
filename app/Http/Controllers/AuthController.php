<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }
    }
    
    public function login()
    {
        
    }
    
    public function logout()
    {
        
    }
}