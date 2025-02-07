@extends('layouts.app')

@section('title', 'Detail Mutasi - Dbwarga')

@section('content')
<div class="justify-end flex">
    <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
        <span class="mr-2">Kembali</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
        </svg>
    </button>
</div>
<div class="mx-auto w-full md:w-2/3">
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="p-6 text-left">
            <h1 class="mb-6 text-2xl md:px-4 font-bold text-black dark:text-white">
                Detail Mutasi/Migrasi
            </h1>

            <table class="">
                <tr>
                    <th class="md:px-4 py-2 align-top">Nama</th>
                    <td class="md:px-4 py-2 align-top ps-8">{{ $user->name }}</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">NIK</th>
                    <td class="md:px-4 py-2 align-top ps-8">187442383930</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Email</th>
                    <td class="md:px-4 py-2 align-top ps-8">{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Telepon</th>
                    <td class="md:px-4 py-2 align-top ps-8">{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Tanggal Mutasi</th>
                    <td class="md:px-4 py-2 align-top ps-8">27 Januari 2024</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Asal Daerah</th>
                    <td class="md:px-4 py-2 align-top ps-8">Jambi</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Tujuan</th>
                    <td class="md:px-4 py-2 align-top ps-8">Padang</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Alasan/Tujuan Migrasi</th>
                    <td class="md:px-4 py-2 align-top ps-8">lorem ipsum sidolor apmet</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">Tipe Migrasi</th>
                    <td class="md:px-4 py-2 align-top ps-8">Nasional/Sementara</td>
                </tr>


            </table>

            <div class="mt-6 md:px-4 flex justify-between items-center">



                <div class="operation">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 mr-2 rounded inline-flex items-center">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="mr-2">
                            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM12 7c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1h-3V7c0-.55-.45-1-1-1s-1 .45-1 1V9h-3c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1h-3V7c0-.55-.45-1-1-1z"/>
                        </svg> --}}
                        Edit
                    </a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="mr-2">
                                <path fill="currentColor" d="M17 5v1H7V5h10zm2 2H5v11a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7zm-8 3v7h2v-7h-2zm4 0v7h2v-7h-2z"/>
                            </svg> --}}
                            Hapus
                        </button>
                    </form>
                </div>





            </div>
        </div>
    </div>
</div>
@endsection
