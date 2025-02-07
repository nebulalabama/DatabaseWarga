@extends('layouts.app')

@section('Data penduduk', 'Edit')

@section('content')
    <div class="justify-end flex">
        <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </button>
    </div>
    <div
        class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <form action="{{ route('residents.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nik" class="block text-black dark:text-white">NIK</label>
                <input id="nik" type="text" name="nik" value="{{ $data->nik }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('nik') border-red-500 @enderror">
                @error('nik')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-black dark:text-white">Nama</label>
                <input id="name" type="text" name="name" value="{{ $data->name }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pob" class="block text-black dark:text-white">Tempat Lahir</label>
                <input id="pob" type="text" name="pob" value="{{ $data->pob }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('pob') border-red-500 @enderror">
                @error('pob')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-black dark:text-white">Tanggal Lahir</label>
                <input id="dob" type="date" name="dob" value="{{ old('dob', $data->dob) }}"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('dob') border-red-500 @enderror">
                @error('dob')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-black dark:text-white">Jenis Kelamin</label>
                <select id="gender" name="gender"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('gender') border-red-500 @enderror">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('gender', $data->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('gender', $data->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="religion" class="block text-black dark:text-white">Agama</label>
                <select id="religion" name="religion"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('religion') border-red-500 @enderror">
                    <option value="">Pilih Agama</option>
                    <option value="islam" {{ old('religion', $data->religion) == 'islam' ? 'selected' : '' }}>Islam
                    </option>
                    <option value="kristen" {{ old('religion', $data->religion) == 'kristen' ? 'selected' : '' }}>Kristen
                    </option>
                    <option value="katolik" {{ old('religion', $data->religion) == 'katolik' ? 'selected' : '' }}>Katolik
                    </option>
                    <option value="hindu" {{ old('religion', $data->religion) == 'hindu' ? 'selected' : '' }}>Hindu
                    </option>
                    <option value="buddha" {{ old('religion', $data->religion) == 'buddha' ? 'selected' : '' }}>Buddha
                    </option>
                    <option value="lainnya" {{ old('religion', $data->religion) == 'lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
                @error('religion')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_education" class="block text-black dark:text-white">Pendidikan Terakhir</label>
                <select id="last_education" name="last_education"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('last_education') border-red-500 @enderror">
                    <option value="">Pilih Pendidikan Terakhir</option>
                    <option value="SD" {{ old('last_education', $data->last_education) == 'SD' ? 'selected' : '' }}>SD
                    </option>
                    <option value="SMP" {{ old('last_education', $data->last_education) == 'SMP' ? 'selected' : '' }}>
                        SMP</option>
                    <option value="SMA" {{ old('last_education', $data->last_education) == 'SMA' ? 'selected' : '' }}>
                        SMA</option>
                    <option value="Sarjana"
                        {{ old('last_education', $data->last_education) == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                    <option value="Diploma"
                        {{ old('last_education', $data->last_education) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                    <option value="Doktor"
                        {{ old('last_education', $data->last_education) == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                </select>
                @error('last_education')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="citizenship" class="block text-black dark:text-white">Kewarganegaraan</label>
                <select id="citizenship" name="citizenship"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('citizenship') border-red-500 @enderror">
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" {{ old('citizenship', $data->citizenship) == 'WNI' ? 'selected' : '' }}>WNI
                    </option>
                    <option value="WNA" {{ old('citizenship', $data->citizenship) == 'WNA' ? 'selected' : '' }}>WNA
                    </option>
                </select>
                @error('citizenship')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="marital_status" class="block text-black dark:text-white">Status Pernikahan</label>
                <select id="marital_status" name="marital_status"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('marital_status') border-red-500 @enderror">
                    <option value="">Pilih Status Pernikahan</option>
                    <option value="true" {{ old('marital_status', $data->marital_status) == 'true' ? 'selected' : '' }}>
                        True</option>
                    <option value="false" {{ old('marital_status', $data->marital_status) == 'false' ? 'selected' : '' }}>
                        False</option>
                </select>
                @error('marital_status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sub_district_id" class="block text-black dark:text-white">Kelurahan</label>
                <select id="sub_district_id" name="sub_district_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('sub_district_id') border-red-500 @enderror">
                    <option value="">Pilih Kelurahan</option>
                    @foreach ($sub_districts as $sub_district)
                        <option value="{{ $sub_district->id }}"
                            {{ old('sub_district_id', $data->sub_district_id) == $sub_district->id ? 'selected' : '' }}>
                            {{ $sub_district->name }}
                        </option>
                    @endforeach
                </select>
                @error('sub_district_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="neighborhood_id" class="block text-black dark:text-white">RT</label>
                <select id="neighborhood_id" name="neighborhood_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('neighborhood_id') border-red-500 @enderror">
                    <option value="">Pilih RT</option>
                    @foreach ($neighborhoods as $neighborhood)
                        <option value="{{ $neighborhood->id }}"
                            {{ old('neighborhood_id', $data->neighborhood_id) == $neighborhood->id ? 'selected' : '' }}>
                            {{ $neighborhood->name }}
                        </option>
                    @endforeach
                </select>
                @error('neighborhood_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="community_unit_id" class="block text-black dark:text-white">RW</label>
                <select id="community_unit_id" name="community_unit_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md dark:bg-boxdark dark:border-strokedark @error('community_unit_id') border-red-500 @enderror">
                    <option value="">Pilih RW</option>
                    @foreach ($community_units as $community_unit)
                        <option value="{{ $community_unit->id }}"
                            {{ old('community_unit_id', $data->community_unit_id) == $community_unit->id ? 'selected' : '' }}>
                            {{ $community_unit->name }}
                        </option>
                    @endforeach
                </select>
                @error('community_unit_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4.5">
                <button type="submit"
                    class="flex justify-center rounded border border-stroke py-2 px-6 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white">
                    <span class="link">Update</span>
                </button>

                <a href="{{ route('residents.index') }}"
                    class="flex justify-center rounded bg-primary py-2 px-6 font-medium text-gray hover:bg-opacity-90">
                    <span class="link">Back</span>
                </a>
            </div>
        </form>
    </div>
@endsection
