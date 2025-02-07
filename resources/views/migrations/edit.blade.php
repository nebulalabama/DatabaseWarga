@extends('layouts.app')

@section('title', 'Edit Migrasi - Dbwarga')

@section('content')

<main class="w-full">
    <div class="justify-end flex">
        <a type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </a>
    </div>


    {{-- Container --}}
    <div class="bg-white max-w-2xl border-secondary rounded-md mx-auto">
            {{-- Judul --}}
        <div class="text-center text-3xl py-7 font-semibold">
            <h2>Edit Data Migrasi</h2>
        </div>

        <div class="mx-20 m-6 pb-19">
            <form action="{{ route('migrations.update' )}}" method="post">
                @csrf
                @if(session()->has('success'))
                    <div class="w-full  flex items-center gap-2 h-12 bg-success rounded-md  ">
                        <svg class="ml-3 h-4 w-4 text-teal-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="mx-2 text-white text-xl">
                            {{ session('success') }}
                        </span>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="block text-gray-700 font-semibold" for="resident_id">NIK</label>
                    <input type="number" min="0" name="resident_id" id="resident_id" class="dark:bg-slate-400 text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('resident_id') is-invalid @enderror" placeholder="contoh: 167601440391000" required value="{{ old('resident_id') }}">

                    @error('resident_id')
                    <div class="invalid-text">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-semibold" for="date">Tanggal</label>
                    <input type="date" name="date" id="date" class="dark:bg-slate-400 text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('date') is-invalid @enderror" required >

                    @error('date')
                    <div class="invalid-text">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-semibold" for="from">Asal</label>
                    <input type="text" name="from" id="from" class="dark:bg-slate-400 text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('from') is-invalid @enderror" required placeholder="contoh: Bandung" value="{{ old('from') }}">

                    @error('from')
                    <div class="invalid-text">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-semibold" for="from">Tujuan</label>
                    <input type="text" name="to" id="to" class="dark:bg-slate-400 text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('to') is-invalid @enderror" required placeholder="contoh: Singapura" value="{{ old('to') }}">

                    @error('to')
                    <div class="invalid-text">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-semibold" for="from">Alasan</label>
                    <input type="text" name="cause" id="cause" class="dark:bg-slate-400 text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('cause') is-invalid @enderror" required placeholder="contoh: melanjutkan pendidikan" value="{{ old('cause') }}">

                    @error('cause')
                    <div class="invalid-text">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Jenis Mutasi --}}
                <div class="mb-3">
                    <label for="migration_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select name="migration_type" id="migration_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Jenis Mutasi</option>
                    <option {{ old('migration_type')  ? 'selected' : '' }} value="internal">Internal</option>
                    <option {{ old('migration_type')  ? 'selected' : '' }} value="Internasional">Internasional</option>
                    <option  {{ old('migration_type')  ? 'selected' : '' }} value="Sementara">Sementara</option>
                    <option {{  old('migration_type')  ? 'selected' : '' }} value="Permanen">Permanen</option>
                    </select>
                    @error('migration_type')
                    <div class="invalid-text">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex justify-end mt-2 ">
                    <button type="submit" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <span class="mr-3 text-lg">
                        Update
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-3.59 1.787A.5.5 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.5 4.5 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                      </svg>
                    </button>

                </div>

            </form>
        </div>

    </div>


</main>

@endsection
