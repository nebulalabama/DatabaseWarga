<!-- resources/views/family/show.blade.php -->

@extends('layouts.app')

@section('title', 'Detail Keluarga - Dbwarga')

@section('content')
    <div class="flex justify-end">
        <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </button>
    </div>
    <div class="w-full mx-auto md:w-2/3">
        <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="p-6 text-left">
                <div class="flex justify-between my-4">
                    <h1 class="mb-6 text-2xl font-bold text-black md:px-4 dark:text-white">
                        Detail Keluarga
                    </h1>
                </div>

                <table class="">
                    <tr>
                        <th class="py-2 align-top md:px-4">Nomor Kartu Keluarga</th>
                        <td class="py-2 align-top md:px-4 ps-8">{{ $familyCard->no_kk }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 align-top md:px-4">Nomor Penduduk Kepala Keluarga</th>
                        <td class="py-2 align-top md:px-4 ps-8">{{ $familyCard->resident->nik }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 align-top md:px-4">Nama Kepala Keluarga</th>
                        <td class="py-2 align-top md:px-4 ps-8">{{ $familyCard->resident->name }}</td>
                    </tr>
                </table>

                <div class="flex items-center justify-between mt-6 md:px-4">
                    <div class="back">
                        <a href="{{ route('family.index') }}"
                            class="inline-flex items-center px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-400">
                            Kembali
                        </a>
                    </div>

                    <div class="operation">
                        <a href="{{ route('family.edit', $familyCard->id) }}"
                            class="inline-flex items-center px-4 py-2 mr-2 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-400">
                            Edit
                        </a>

                        <form action="{{ route('family.destroy', $familyCard->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-400">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-sm border mt-5 border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-slate-700 dark:bg-boxdark sm:px-7.5 xl:pb-5">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-black dark:text-white">
                    Anggota Keluarga
                </h1>
                <a href="{{ route('family.edit', $familyCard->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-blue-500 border-b-4 border-blue-700 rounded hover:bg-blue-400 hover:border-blue-500">Tambah Anggota Keluarga</a>
            </div>

            <div class="flex flex-col">
                <table class="min-w-full bg-white dark:bg-meta-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-center">NIK</th>
                            <th class="px-4 py-2 text-center">Nama</th>
                            <th class="px-4 py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($familyCard->details as $detail)
                            <tr class="border-b border-stroke dark:border-strokedark dark:bg-boxdark">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>   
                                <td class="px-4 py-2 text-center">{{ $detail->resident->nik }}</td>
                                <td class="px-4 py-2 text-center">{{ $detail->resident->name }}</td>
                                <td class="px-4 py-2 text-center">{{ $detail->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
