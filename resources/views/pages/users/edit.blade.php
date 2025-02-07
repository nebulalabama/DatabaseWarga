@extends('layouts.app')

@section('title', 'Edit pengguna - Dbwarga')

@section('content')
<div class="max-w-md mx-auto">
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h1 class="text-2xl font-bold mb-6 text-center">Ubah Data Pengguna</h1>

        <form>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="name" name="name" type="text" placeholder="Nama">
                </div>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 16" fill="currentColor">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="email" name="email" type="text" placeholder="Email@email.com">
                </div>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                            <path d="M12 17a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2m6-9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="password" name="password" type="password" placeholder="Password">
                </div>
            </div>

            <form class="max-w-sm mx-auto">
            <div class="mb-6">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
                <select id="role" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Pilih Jabatan</option>
                    <option value="#">Test</option>
                    <option value="#">Test</option>
                    <option value="#">Test</option>
                    <option value="#">Test</option>
                  </select>
            </div>
            </form>

            <div class="mb-6">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor" >
                            <path d="m21 15.46l-5.27-.61l-2.52 2.52a15.045 15.045 0 0 1-6.59-6.59l2.53-2.53L8.54 3H3.03C2.45 13.18 10.82 21.55 21 20.97z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="phone" name="phone" type="text" placeholder="Nomor Telepon">
                </div>
            </div>

            <div class="flex justify-center py-3">
                <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded inline-flex items-center">
                    <span>Ubah</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
