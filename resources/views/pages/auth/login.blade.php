@extends('layouts.guest')

@section('content')
<div class="max-w-md p-8 mx-auto text-current bg-white rounded-md shadow dark:bg-boxdark dark:text-secondary">
    <h2 class="mb-6 text-2xl font-bold">Login</h2>
    <form method="POST" action="{{ route('login.auth') }}">
        @csrf
        <div class="mb-3">
            <label class="block font-semibold text-gray-700" for="email">Email</label>
            <input type="email" name="email" id="email"  class="dark:bg-slate-400 dark:text-white w-full text-primary rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0  @error('email') is-invalid @enderror" autofocus required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-text">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="block font-semibold text-gray-700" for="password">Password</label>
            <input type="password" name="password" id="password" class="dark:bg-slate-400 dark:text-white text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('password') is-invalid @enderror" required>

            @error('password')
            <div class="invalid-text">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-full p-2 text-white bg-blue-600 rounded" type="submit">Login</button>
    </form>
    <a href="{{ route('password.request') }}" class="inline-block mt-4 text-blue-600" >Lupa Password?</a>
</div>
@endsection
