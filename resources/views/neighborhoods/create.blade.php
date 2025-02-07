@extends('layouts.app')

@section('title', 'Tambah RT - Dbwarga')

@section('content')
<div class="max-w-md mx-auto">
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h1 class="mb-6 text-2xl font-bold text-center">Tambah RT</h1>

        <form action="{{ route('neighborhoods.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="no_rt" class="block mb-2 text-sm font-bold text-gray-700">Nomor RT</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 text-gray-700 bg-gray-200 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M11.993 2.853a.75.75 0 0 0-1.485-.212l-.337 2.36H6.686l.306-2.145a.75.75 0 1 0-1.484-.212L5.17 5H3.75a.75.75 0 0 0-.001 1.5h1.207l-.428 3H2.75a.75.75 0 1 0 0 1.5h1.565l-.306 2.144a.75.75 0 1 0 1.485.212L5.83 11h3.485l-.306 2.144a.75.75 0 1 0 1.485.212L10.831 11h1.419a.75.75 0 0 0 0-1.5h-1.206l.428-3l1.778.001a.75.75 0 0 0 0-1.5h-1.564zM9.957 6.501L9.529 9.5H6.044l.428-3z"/>
                        </svg>
                    </span>
                    <input class="w-full px-4 py-2 outline-none" id="no_rt" name="no_rt" type="text" placeholder="contoh: 001, 005,...">
                </div>
            </div>

            <div class="mb-6">
                <label for="head" class="block mb-2 text-sm font-bold text-gray-700">Nama Ketua RT</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 text-gray-700 bg-gray-200 ">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                    </span>
                    <input class="w-full px-4 py-2 outline-none" id="head" name="head" type="text" placeholder="Nama Ketua RT">
                </div>
            </div>

            <div class="flex justify-center gap-5 py-3">
                <div class="mb-4">
                    <a href="{{ route('neighborhoods.index') }}" class="inline-flex items-center px-4 py-2 font-bold text-white bg-red-500 border-b-4 border-red-700 rounded hover:bg-red-400 hover:border-red-500">
                        <span>Kembali</span>
                    </a>
                </div>
                <div class="mb-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 font-bold text-white bg-green-500 border-b-4 border-green-700 rounded hover:bg-green-400 hover:border-green-500">
                        <span>Tambah</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
