@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>LOGIN</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Silakan login untuk melanjutkan</p>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
  @csrf
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Login</button>
</form>

        <p class="mt-3 text-center">
            Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection
