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
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|unique:users',
        'phone_number'  => 'required|digits_between:9,15|regex:/^[0-9]+$/',
        'password'      => 'required|string|min:6|confirmed',
    ], [
        'phone_number.required' => 'Nomor HP wajib diisi.',
        'phone_number.digits_between' => 'Nomor HP harus terdiri dari 9 hingga 15 digit.',
        'phone_number.regex' => 'Nomor HP hanya boleh berisi angka.',
    ]);

    try {
        // Format nomor HP: pastikan awalan 62 (tanpa 0 di depan)
        $phone = '62' . ltrim($request->phone_number, '0');

        // Buat user baru
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $phone,
            'password'     => Hash::make($request->password),
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
