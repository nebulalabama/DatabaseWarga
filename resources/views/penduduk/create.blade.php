@extends('layouts.app')

@section('Data penduduk', 'Create')

@section('content')
    <div class="flex justify-end">
        <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </button>
    </div>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h1 class="mb-3 text-2xl font-bold text-black dark:text-white">
            Tambah Data Penduduk
        </h1>
        <form action="{{ route('residents.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label class="block text-black dark:text-white">NIK</label>
                <input type="text" name="nik"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('nik')
                    @enderror"
                    value="{{ old('nik') }}">
                @error('nik')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Nama</label>
                <input type="text" name="name"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark
                    @error('name')
                        @enderror"
                    value="{{ old('name') }}">

                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Tempat Lahir</label>
                <input type="text" name="pob"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark
                    @error('pob')
                        @enderror"
                    value="{{ old('pob') }}">
                @error('pob')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Tanggal Lahir</label>
                <input type="date" name="dob"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark
                    @error('dob')
                        @enderror"
                    value="{{ old('dob') }}">
                @error('dob')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Jenis Kelamin</label>
                <select name="gender" value="{{ old('gender') }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark">
                    <option value="L" @if (old('gender') == 'L') selected @endif>L</option>
                    <option value="P" @if (old('gender') == 'P') selected @endif>P</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Agama</label>
                <select name="religion" value="{{ old('religion') }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark">
                    <option value="">Pilih Agama</option>
                    <option value="islam" @if (old('religion') == 'islam') selected @endif>Islam</option>
                    <option value="kristen" @if (old('religion') == 'kristen') selected @endif>Kristen</option>
                    <option value="katolik" @if (old('religion') == 'katolik') selected @endif>Katholik</option>
                    <option value="hindu" @if (old('religion') == 'hindu') selected @endif>Hindu</option>
                    <option value="buddha" @if (old('religion') == 'buddha') selected @endif>Budha</option>
                    <option value="lainnya" @if (old('religion') == 'lainnya') selected @endif>lainnya</option>
                </select>
                @error('religion')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Pendidikan Terakhir</label>
                <select name="last_education" value="{{ old('last_education') }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark">
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD" @if (old('last_education') == 'SD') selected @endif>SD</option>
                    <option value="SMP" @if (old('last_education') == 'SMP') selected @endif>SMP</option>
                    <option value="SMA" @if (old('last_education') == 'SMA') selected @endif>SMA</option>
                    <option value="Sarjana" @if (old('last_education') == 'Sarjana') selected @endif>Sarjana</option>
                    <option value="Diploma" @if (old('last_education') == 'Diploma') selected @endif>Diploma</option>
                    <option value="Doktor" @if (old('last_education') == 'Doktor') selected @endif>Doktor</option>
                </select>
                @error('last_education')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Kewarganegaraan</label>
                <select name="citizenship" value="{{ old('citizenship') }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark">
                    <option value="WNI" @if (old('citizenship') == 'WNI') selected @endif>WNI</option>
                    <option value="WNA" @if (old('citizenship') == 'WNA') selected @endif>WNA</option>
                </select>
                @error('citizenship')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Status Pernikahan</label>
                <select name="marital_status" value="{{ old('marital_status') }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark">
                    <option value="nikah" @if (old('marital_status') == 'nikah') selected @endif>Kawin</option>
                    <option value="belum nikah" @if (old('marital_status') == 'belum nikah') selected @endif>Un Kawin</option>
                </select>
                @error('marital_status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-black dark:text-white">Kelurahan</label>
                <select type="text" name="sub_district_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('sub_district_id')
                    @enderror">
                    <option value="">Pilih Kelurahan</option>
                    @foreach ($subDistricts as $subDistrict)
                        <option value="{{ $subDistrict->id }}" @if (old('sub_district_id') == $subDistrict->id) selected @endif>
                            {{ $subDistrict->name }}</option>
                    @endforeach
                </select>
                @error('sub_district_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">RT</label>
                <select name="neighborhood_id" id="neighborhood_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('neighborhood_id')
                @enderror">
                    <option value="">Pilih RT</option>
                    @foreach ($neighborhoods as $neighborhood)
                        <option value="{{ $neighborhood->id }}" @if (old('neighborhood_id') == $neighborhood->id) selected @endif>
                            {{ $neighborhood->name }}</option>
                    @endforeach
                </select>

                @error('neighborhood_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black dark:text-white">Rw</label>
                <select name="community_unit_id" id="community_unit_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('community_unit_id')
                @enderror">
                    <option value="">Pilih Rw</option>
                    @foreach ($community_units as $community_unit)
                        <option value="{{ $community_unit->id }}" @if (old('community_unit_id') == $community_unit->id) selected @endif>
                            {{ $community_unit->name }}</option>
                    @endforeach
                </select>
                @error('community_unit_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end gap-4.5 mb-5">
                <button
                    class="flex justify-center px-6 py-2 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                    type="submit">
                    <span class="link">Save</span>
                </button>
                <a href="{{ route('residents.create') }}" class="flex justify-center px-6 py-2 font-medium text-black border rounded border-stroke hover:shadow-1 dark:border-strokedark dark:text-white"
                    type="button">
                    <span class="link">Back</span>
                </a>
            </div>
        </form>
    </div>
@endsection
