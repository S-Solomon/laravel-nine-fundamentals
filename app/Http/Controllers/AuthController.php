<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', // email must be in email format and must be unique in the users table
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Your account has been created! You can now login.');
    }
    
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // The attempt method will check if the provided email and password match in the users table
        // The Auth facade will instruct the authentication system to create a new user session and establish a connection with the server
        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('home')
                ->with('success', 'You are logged in!');
        }

        return redirect()
            ->route('login')
            ->withErrors('Provided login information is not valid.');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'You are logged out.');
    }
}