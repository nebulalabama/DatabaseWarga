@extends('layouts.app')

@section('title', 'Detail Kelurahan - Dbwarga')

@section('content')
    <div class="container mx-auto px-4">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="p-4 text-left">
                <h1 class="mb-6 text-2xl font-bold text-black dark:text-white">
                    Detail Kelurahan
                </h1>

                <table class="w-1/2">
                    <tr>
                        <th class="px-4 py-2">Kelurahan</th>
                        <td class="px-4 py-2">:</td>
                        <td class="px-4 py-2">{{ $subDistrict->name }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Nama Lurah</th>
                        <td class="px-4 py-2">:</td>
                        <td class="px-4 py-2">{{ $subDistrict->name }}</td>
                    </tr>
                </table>

                <div class="flex justify-center py-3">
                    <button type="submit"
                        class=" bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded inline-flex items-center">
                        <span class="link" onclick="location.href='{{ route('sub_districts.index') }}'">Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    @endsection
