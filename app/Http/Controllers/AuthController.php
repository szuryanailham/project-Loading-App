<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Halaman Register
    public function showRegister()
    {
        return view('auth.register.index');
    }

    // Proses Register
public function register(Request $request)
{
    $request->validate([
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|string|min:6|confirmed',
    ]);

    try {
        // Buat user baru
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);
        return redirect()->route('admin.dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name);
    } catch (\Exception $e) {
        return back()
            ->withInput()
            ->with('failed', 'Registrasi gagal! Silakan coba lagi atau hubungi admin.');
    }
}


    // Halaman Login
    public function showLogin()
    {
        return view('auth.login.index');
    }

    // Proses Login
public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $userName = Auth::user()->name;

        return redirect()->route('admin.dashboard')
            ->with('success', "Login berhasil! Selamat datang, {$userName} 👋");
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
