@extends('layouts.app')

@section('title', 'Profil - Dbwarga')

@section('content')
    <div class="w-full text-center ">
        <div class="flex justify-end">
            <a type="button" href="{{ route('profile') }}" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                <span class="mr-2">Kembali ke Profil</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                </svg>
            </a>
        </div>
        <div class="mx-auto ">
            {{-- <img src="{{ URL::to('/assets/images/users/avatar.jpg') }}" alt="profile-image"
                class="p-1 border border-gray-200 rounded-full dark:border-gray-600"> --}}
            <img src="https://ui-avatars.com/api/?name=John+Doe" alt="profile-image"
                class="p-1 mx-auto border border-gray-200 rounded-full dark:border-gray-600">
        </div>
        <div>
            <h4 class="my-2 text-lg font-semibold">{{ $user->name }}</h4>
        </div>
    </div>

    <div class="mt-10">
        <div class="mt-5 overflow-hidden">
            <div id="tabs-with-underline-1" role="tabpanel" aria-labelledby="tabs-with-underline-item-1">
                <div class="grid gap-6 md:grid-cols-3">
                    <div>
                        <div class="space-y-6">
                            <div class="p-2 border rounded-md card">
                                <div class="card-header bg-light dark:bg-slate-600">
                                    <h5
                                        class="p-2 text-base font-bold text-center text-white bg-gray-700 border border-gray-300 rounded-md dark:border-gray-600">
                                        Informasi</h5>

                                </div>

                                {{-- Personal Information --}}
                                <div class="p-6">
                                    <div class="mb-4">
                                        <strong>Nama Lengkap</strong>
                                        <p>{{ $user->name }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Email</strong>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>No. telp</strong>
                                        <p>{{ $user->phone }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>NIK</strong>
                                        <p>{{ $user->id }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Status</strong>
                                        <p class="capitalize">{{ $user->status }}</p>
                                    </div>
                                    <div>
                                        <strong>Role</strong>
                                        <p>Admin</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">

                                <div class="p-6">
                                    <div class="flex flex-wrap items-center gap-2 pt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <div class="p-2 border rounded-md card">
                            <div class="card-header bg-light dark:bg-slate-600">
                                <h5 class="p-2 text-base font-bold text-center bg-gray-700 border border-gray-300 rounded-md dark:border-gray-600 dark:text-white">
                                    Ubah Password
                                </h5>

                            </div>
                            <div class="p-6">
                                <form class="space-y-4" method="post" action="{{ route('profile.update_password') }}">
                                    @csrf
                                    @if(session()->has('success'))
                                        <div class="flex items-center w-full h-12 gap-2 border rounded-md bg-success border-success mx">
                                            <svg class="ml-3 h-4 w-4 text-teal-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            <span class="mx-2 text-xl text-white">
                                                {{ session('success') }}
                                            </span>
                                        </div>
                                    @endif


                                    <div class="p-2 rounded-md"> {{-- Password container --}}
                                        <label class="block mb-1" for="Password">Password Lama</label>
                                        <input type="password"  placeholder="Masukkan password lama anda" name="current_password"
                                            class="form-input dark:bg-meta-4 border border-gray-300 dark:border-gray-600 rounded-md p-1 w-full @error('email') is-invalid @enderror">
                                        @error('current_password')
                                            <div class="invalid-text">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="p-2 rounded-md"> {{-- Password container --}}
                                        <label class="block mb-1" for="Password">Password Baru</label>
                                        <input type="password" placeholder="Masukkan password baru anda" name="new_password"
                                            class="form-input dark:bg-meta-4 border border-gray-300 dark:border-gray-600 rounded-md p-1 w-full @error('email') is-invalid @enderror">
                                        @error('new_password')
                                            <div class="invalid-text">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="p-2 rounded-md"> {{-- Re-Password container --}}
                                        <label class="block mb-1" for="new_password_confirmation">Konfirmasi Password Baru</label>
                                        <input type="password" placeholder="Masukkan konfirmasi password baru" name="new_password_confirmation"
                                            class="form-input dark:bg-meta-4 border border-gray-300 dark:border-gray-600 rounded-md p-1 w-full @error('email') is-invalid @enderror">
                                        @error('new_password')
                                            <div class="invalid-text">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button class="px-6 py-2 text-white bg-blue-800 rounded-lg hover:bg-blue-700"
                                        type="submit">Save</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div id="tabs-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-underline-item-2">

            </div>

        </div>
    </div>
@endsection
