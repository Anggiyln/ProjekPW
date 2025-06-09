<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;//import Rule nya jangan lupa ya

class UserController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([  // persyaratan
            'name' => ['required', 'max:100'], 
            'email' => ['required', 'email', Rule::unique('users', 'email')],//untuk email di table users
            'password' => ['required', 'min:8', 'max:20']
        ]);

        // $table['password'] = bcrypt($table['password']); //  //hars code, encripted
        $user = User::create($data);//buat isi variabel $table
        auth()->login($user);
        return redirect('/register');
    }

    public function login (Request $request) {
        $table = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);

        if (auth()->attempt(['email' => $data['loginEmail'], 'password' => $data['loginPassword']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    // public functio logout() {
    //     auth()
    // }
}



