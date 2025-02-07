@extends('layouts.app')

@section('title', 'Tambah Migrasi - Dbwarga')

@section('content')

    <main class="w-full">
        <div class="flex justify-end">
            <a type="button" onclick="javascript:history.back()"
                class="inline-flex text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                <span class="mr-2">Kembali</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                </svg>
            </a>
        </div>


        {{-- Container --}}
        <div class="max-w-2xl mx-auto bg-white rounded-md dark:bg-boxdark border-secondary">
            {{-- Judul --}}
            <div class="text-3xl font-semibold text-center py-7">
                <h2>Tambah Data Migrasi</h2>
            </div>

            <div class="m-6 mx-20 pb-19">
                <form action="{{ route('migrations.store') }}" method="post">
                    @csrf
                    @if (session()->has('success'))
                        <div class="flex items-center w-full h-12 gap-2 rounded-md bg-success ">
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

                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700" for="resident_id">Penduduk</label>
                        <select name="resident_id" id="resident_id"
                            class="w-full p-2 border rounded-md dark:bg-slate-400 dark:text-white text-primary focus:border-sky-600 focus:outline-none focus:ring-0">
                            <option selected>Pilih Penduduk</option>
                            @foreach ($residents as $item)
                            <option value="{{ $item->id }}" @selected(old('resident_id') == $item->id)>{{ $item->nik }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('resident_id')
                            <div class="invalid-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700" for="date">Tanggal</label>
                        <input type="date" name="date" id="date"
                            class="dark:bg-slate-400 dark:text-white text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('date') is-invalid @enderror"
                            required>

                        @error('date')
                            <div class="invalid-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700" for="from">Asal</label>
                        <input type="text" name="from" id="from"
                            class="dark:bg-slate-400 dark:text-white text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('from') is-invalid @enderror"
                            required placeholder="contoh: Bandung" value="{{ old('from') }}">

                        @error('from')
                            <div class="invalid-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700" for="from">Tujuan</label>
                        <input type="text" name="to" id="to"
                            class="dark:bg-slate-400 dark:text-white text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('to') is-invalid @enderror"
                            required placeholder="contoh: Singapura" value="{{ old('to') }}">

                        @error('to')
                            <div class="invalid-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700" for="from">Alasan</label>
                        <input type="text" name="cause" id="cause"
                            class="dark:bg-slate-400 dark:text-white text-primary w-full rounded-md border p-2 focus:border-sky-600 focus:outline-none focus:ring-0 @error('cause') is-invalid @enderror"
                            required placeholder="contoh: melanjutkan pendidikan" value="{{ old('cause') }}">

                        @error('cause')
                            <div class="invalid-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Jenis Mutasi --}}
                    <div class="mb-3">
                        <label for="migration_type"
                            class="block font-semibold text-gray-700">Jenis Mutasi</label>
                        <select name="migration_type" id="migration_type"
                            class="w-full p-2 border rounded-md dark:bg-slate-400 dark:text-white text-primary focus:border-sky-600 focus:outline-none focus:ring-0">
                            <option selected>Pilih Jenis Mutasi</option>
                            <option {{ old('migration_type') ? 'selected' : '' }} value="internal">Internal</option>
                            <option {{ old('migration_type') ? 'selected' : '' }} value="international">Internasional</option>
                            <option {{ old('migration_type') ? 'selected' : '' }} value="temporary">Sementara</option>
                            <option {{ old('migration_type') ? 'selected' : '' }} value="permanent">Permanen</option>
                        </select>
                        @error('migration_type')
                            <div class="invalid-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-2 ">
                        <button type="submit"
                            class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <span class="mr-3 text-lg">
                                Tambah
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-building-fill-add" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                <path
                                    d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-3.59 1.787A.5.5 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.5 4.5 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                            </svg>
                        </button>

                    </div>

                </form>
            </div>

        </div>


    </main>

@endsection
