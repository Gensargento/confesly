<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{

    public function showRegister() {
        return Inertia::render('Register');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();
        return to_route('welcome');
    }
    public function showWelcome() {
        $user = Auth::user();
        return Inertia::render('Welcome')->with('user', $user);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user()->name;
            //return Inertia::render('Welcome')->with('name',$user);
            return to_route('dashboard');
            //return redirect('welcome')->with('username', 'Genesis');
            //return redirect()intended('welcome',])->with('name', 'Genesis');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }
}
