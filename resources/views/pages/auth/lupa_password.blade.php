@extends('layouts.guest')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl mb-6">Reset Password</h2>
    <form method="POST" action="">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700" for="email">Email</label>
            <input class="w-full border p-2" type="email" name="email" id="email" required>
        </div>
        <button class="w-full bg-blue-600 text-white p-2 rounded" type="submit">Kirim Link Reset Password</button>
    </form>
</div>
@endsection
