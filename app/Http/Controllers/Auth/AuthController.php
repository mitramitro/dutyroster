<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function authenticate(Request $request)
    {

        // User::findOrFail(1)->update([
        //     'password' => Hash::make('rsd')
        // ]);
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // if (Auth::user()->role == 'admin') {
            //     return redirect()->intended('dashboard-admin');
            // } else if (Auth::user()->role == 'rsd') {
            //     return redirect()->intended('serah_terima_rs');
            // } else if (Auth::user()->role == 'supervisor') {
            //     return redirect()->intended('dashboard-supervisor');
            // }
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('onduty');
            } else if (Auth::user()->role == 'user') {
                return redirect()->intended('onduty');
            } else if (Auth::user()->role == 'supervisor') {
                return redirect()->intended('serah_terima_rs');
            }
        }
        return back()->withErrors([
            'username' => 'Username dan Password tidak cocok!'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
