<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\User;
use App\Models\User;
use App\Models\Mobil;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_post(Request $request){
        Session::flash('nomor_telepon', $request->nomor_telepon);
        $request->validate([
            'nomor_telepon'=>'required',
            'nomor_sim'=>'required',
        ]);

        $user = User::where('nomor_telepon', $request->nomor_telepon)
            ->where('nomor_sim', $request->nomor_sim)
            ->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('dashboard');
        } else {
            return redirect('login')->with('error', 'Phone number or driver license is wrong!');
        }
    }

    

    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        // Buat user baru dengan password yang sudah di-hash
        $user = new User;
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->nomor_telepon = $request->nomor_telepon; 
        $user->nomor_sim = $request->nomor_sim; 
        $user->save();

        return redirect('login')->with('success', 'Account created successfully');
    }

 
    public function rent($id)
    {
        $mobil = Mobil::find($id);
        return view('rent', [
            'mobil' => $mobil
        ]);
    }

}
