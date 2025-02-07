@extends('layouts.app')

@section('title', 'Data Pengguna - Dbwarga')

@section('content')
<div class="container mx-auto px-4">
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="p-4 text-left">
            <h1 class="mb-6 text-2xl font-bold text-black dark:text-white">
                Data Pengguna
            </h1>

            <table class="w-full">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <td class="px-4 py-2">John Doe</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Email</th>
                    <td class="px-4 py-2">john.doe@example.com</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Nomor Telepon</th>
                    <td class="px-4 py-2">1234567890</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Role</th>
                    <td class="px-4 py-2">Admin</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Status</th>
                    <td class="px-4 py-2">
                        {{-- kalo offline --}}
                        <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                            <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                            Offline
                        </span>

                        {{--kalo online

                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                            Online
                        </span> --}}
                    </td>
                </tr>
                <tr>
                    <th></th>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
