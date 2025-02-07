@extends('layouts.app')

@section('title', 'Tambah Anggota Keluarga - Dbwarga')

@section('content')
<div class="max-w-md mx-auto">
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Anggota Keluarga</h1>

        <form>
            <div class="mb-4">
                <label for="no_kk" class="block text-gray-700 text-sm font-bold mb-2">Nomor Kartu Keluarga</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M11.993 2.853a.75.75 0 0 0-1.485-.212l-.337 2.36H6.686l.306-2.145a.75.75 0 1 0-1.484-.212L5.17 5H3.75a.75.75 0 0 0-.001 1.5h1.207l-.428 3H2.75a.75.75 0 1 0 0 1.5h1.565l-.306 2.144a.75.75 0 1 0 1.485.212L5.83 11h3.485l-.306 2.144a.75.75 0 1 0 1.485.212L10.831 11h1.419a.75.75 0 0 0 0-1.5h-1.206l.428-3l1.778.001a.75.75 0 0 0 0-1.5h-1.564zM9.957 6.501L9.529 9.5H6.044l.428-3z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="no_kk" name="no_kk" type="text" placeholder="Nomor Kartu Keluarga">
                </div>
            </div>

            <div class="mb-6">
                <label for="resident_id" class="block text-gray-700 text-sm font-bold mb-2">Nomor Induk Kependudukan </label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M11.993 2.853a.75.75 0 0 0-1.485-.212l-.337 2.36H6.686l.306-2.145a.75.75 0 1 0-1.484-.212L5.17 5H3.75a.75.75 0 0 0-.001 1.5h1.207l-.428 3H2.75a.75.75 0 1 0 0 1.5h1.565l-.306 2.144a.75.75 0 1 0 1.485.212L5.83 11h3.485l-.306 2.144a.75.75 0 1 0 1.485.212L10.831 11h1.419a.75.75 0 0 0 0-1.5h-1.206l.428-3l1.778.001a.75.75 0 0 0 0-1.5h-1.564zM9.957 6.501L9.529 9.5H6.044l.428-3z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="resident_id" name="resident_id" type="text" placeholder="Nomor Induk Kependudukan">
                </div>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status </label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M11.993 2.853a.75.75 0 0 0-1.485-.212l-.337 2.36H6.686l.306-2.145a.75.75 0 1 0-1.484-.212L5.17 5H3.75a.75.75 0 0 0-.001 1.5h1.207l-.428 3H2.75a.75.75 0 1 0 0 1.5h1.565l-.306 2.144a.75.75 0 1 0 1.485.212L5.83 11h3.485l-.306 2.144a.75.75 0 1 0 1.485.212L10.831 11h1.419a.75.75 0 0 0 0-1.5h-1.206l.428-3l1.778.001a.75.75 0 0 0 0-1.5h-1.564zM9.957 6.501L9.529 9.5H6.044l.428-3z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="status" name="status" type="text" placeholder="contoh: Ayah, Ibu, anak, dll">
                </div>
            </div>

            <div class="flex justify-center py-3">
                <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded inline-flex items-center">
                    <span>Tambah</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
