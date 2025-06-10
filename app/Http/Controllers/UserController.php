<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Fungsi Register User Baru
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:20']
        ]);

        // Enkripsi password sebelum disimpan
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        Auth::login($user); // langsung login setelah register

        return redirect('/')->with('success', 'Registrasi berhasil dan langsung login.');
    }

    // Fungsi Login
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
}

    // Fungsi Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }

    public function pasien()
{
    return $this->hasOne(Pasien::class);
}


}
