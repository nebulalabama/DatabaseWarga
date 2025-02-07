@extends('layouts.app')

@section('title', 'Ubah Kelurahan - Dbwarga')

@section('content')
    <div class="max-w-md mx-auto">
        <div
            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <h1 class="text-2xl font-bold mb-6 text-center">Ubah Kelurahan</h1>

            <form action="{{ route('sub_districts.update', $subDistrict->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="kelurahan" class="block text-gray-700 text-sm font-bold mb-2">Kelurahan</label>
                    <div class="flex items-center border rounded-md">
                        <span class="px-3 bg-gray-200 text-gray-700 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M11.993 2.853a.75.75 0 0 0-1.485-.212l-.337 2.36H6.686l.306-2.145a.75.75 0 1 0-1.484-.212L5.17 5H3.75a.75.75 0 0 0-.001 1.5h1.207l-.428 3H2.75a.75.75 0 1 0 0 1.5h1.565l-.306 2.144a.75.75 0 1 0 1.485.212L5.83 11h3.485l-.306 2.144a.75.75 0 1 0 1.485.212L10.831 11h1.419a.75.75 0 0 0 0-1.5h-1.206l.428-3l1.778.001a.75.75 0 0 0 0-1.5h-1.564zM9.957 6.501L9.529 9.5H6.044l.428-3z" />
                            </svg>
                        </span>
                        <input class="w-full py-2 px-4 outline-none @error('kelurahan')
                        @enderror"
                            value="{{ $subDistrict->name }}" id="kelurahan" name="kelurahan" type="text"
                            placeholder="Masukan Kelurahan">
                    </div>
                    @error('kelurahan')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="head" class="block text-gray-700 text-sm font-bold mb-2">Nama Lurah</label>
                    <div class="flex items-center border rounded-md">
                        <span class="px-3 bg-gray-200 text-gray-700 ">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input class="w-full py-2 px-4 outline-none @error('lurah')
                        @enderror"
                            value="{{ $subDistrict->head }}" id="lurah" name="lurah" type="text"
                            placeholder="Nama Lurah">
                    </div>
                    @error('lurah')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>



                <div class="flex justify-center py-3">
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded inline-flex items-center">
                        <span>kembali</span>
                    </button>
                    <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded inline-flex items-center">
                    <span>Ubah</span>
                </button>
                </div>
            </form>
        </div>
    </div>
@endsection
