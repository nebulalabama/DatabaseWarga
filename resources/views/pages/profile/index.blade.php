@extends('layouts.app')

@section('title', 'Profil - Dbwarga')

@section('content')
<div class="w-full text-center ">

    <div class="mx-auto ">
        {{-- <img src="{{ URL::to('/assets/images/users/avatar.jpg') }}" alt="profile-image"
            class="p-1 border border-gray-200 rounded-full dark:border-gray-600"> --}}
        <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random" alt="profile-image"
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
                                        class="p-2 text-base font-bold text-center text-white bg-gray-700 border border-gray-300 rounded-md">
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
                                <h5
                                    class="p-2 text-base font-bold text-center bg-gray-700 border border-gray-300 rounded-md dark:text-white">
                                    Edit Profil</h5>

                            </div>
                            <div class="p-6">
                                <form class="space-y-4" method="post" action="{{ route('profile.update') }}">
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
                                    <div class="p-2 border border-gray-300 rounded-md">
                                         {{-- Full Name container --}}
                                        <label class="block mb-1" for="FullName">Nama Lengkap</label>
                                        <input type="text" value="{{ $user->name }}" id="name" name="name"
                                            class="w-full p-1 border border-gray-300 rounded-md form-input dark:bg-meta-4" >
                                    </div>

                                    <div class="p-2 border border-gray-300 rounded-md"> {{-- Email container --}}
                                        <label class="block mb-1" for="Email">Email</label>
                                        <input type="email" value="{{ $user->email }}" id="Email"
                                            class="w-full p-1 border border-gray-300 rounded-md form-input dark:bg-meta-4">
                                    </div>

                                    <div class="p-2 border border-gray-300 rounded-md"> {{-- Phone container --}}
                                        <label class="block mb-1" for="phone">No Telepon</label>
                                        <input type="text" value="{{ $user->phone }}" id="phone" name="phone"
                                            class="w-full p-1 border border-gray-300 rounded-md form-input dark:bg-meta-4">
                                    </div>

                                    <div class="p-2 border border-gray-300 rounded-md"> {{-- NIK/ID container --}}
                                        <label class="block mb-1" for="id">NIK</label>
                                        <input type="text" value="{{ $user->id }}" id="id" name="id"
                                            class="w-full p-1 border border-gray-300 rounded-md form-input dark:bg-meta-4">
                                    </div>

                                    <div class="p-2 border border-gray-300 rounded-md">
                                        {{-- Status container --}}
                                        <label class="block mb-1" for="Status">Status</label>
                                        <select id="Status" name="status"
                                            class="w-full p-1 border border-gray-300 rounded-md form-select dark:bg-meta-4">
                                            <option value="single" {{ $user->status == 'single' ? 'selected' : '' }}>Belum Menikah</option>
                                            <option value="married" {{ $user->status == 'married' ? 'selected' : '' }}>Sudah Menikah</option>
                                        </select>
                                    </div>


                                    <button class="px-6 py-2 text-white bg-blue-800 rounded-lg hover:bg-blue-700" type="submit">
                                        Save
                                    </button>
                                    <button type="button" onclick='window.location="{{ url("dashboard/change_password") }}"' class="px-6 py-2 mx-2 font-semibold rounded-lg bg-slate-300 text-danger hover:bg-secondary">
                                        Ubah Password
                                    </button>                                        
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
