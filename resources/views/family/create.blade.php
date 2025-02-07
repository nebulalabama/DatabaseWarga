@extends('layouts.app')

@section('title', 'Tambah Data - Dbwarga')

@section('content')
<main>
    <div class="flex justify-end">
        <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </button>
    </div>
    <div class="flex items-center justify-center p-4 max-w-screen md:p-4 2xl:p-4">
        <div class="w-full bg-white border rounded-sm md:w-2/3 border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="w-full sm:p-6 xl:p-17.5">
                <h2 class="text-2xl font-bold text-black mb-9 dark:text-white sm:text-title-xl2">
                    Tambah Data Keluarga
                </h2>
                <form action="{{ route('family.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Nomor Kartu Keluarga</label>
                        <div class="relative">
                            <input id="no_kk" name="no_kk" type="number" placeholder="Contoh: 3524070603036969" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Kepala Keluarga</label>
                        <div class="relative">
                            <select name="resident_id" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option selected disabled>-- PILIH KEPALA KELUARGA --</option>
                                @foreach ($residents as $item)
                                <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <!-- Daftar Anggota Keluarga -->
                    <div id="family-members" class="mb-4">
                        <div class="flex items-center justify-between py-3 mt-4">
                            <label class="mb-2.5 block font-medium text-black dark:text-white">Anggota Keluarga</label>
                            <button type="button" id="add-member" class="inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-blue-500 border-b-4 border-blue-700 rounded hover:bg-blue-400 hover:border-blue-500">Tambah Anggota Keluarga</button>
                        </div>
                        <div class="flex items-stretch gap-2 mb-2">
                            <select name="members[]" class="w-full py-4 pl-6 pr-10 bg-transparent border rounded-lg outline-none border-stroke focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option selected disabled>-- PILIH ANGGOTA KELUARGA --</option>
                                @foreach ($residents as $item)
                                <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <select name="statuses[]" class="w-1/3 py-4 pl-6 pr-10 bg-transparent border rounded-lg outline-none border-stroke focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option selected disabled>-- PILIH STATUS --</option>
                                <option value="Bapak">Bapak</option>
                                <option value="Ibu">Ibu</option>
                                <option value="Anak">Anak</option>
                            </select>
                            <button type="button" class="px-3 text-red-100 bg-red-500 rounded-md remove-member">&times;</button>
                        </div>
                    </div>
                    
                    <div class="mt-6 mb-2">
                        <input type="submit" value="Tambah" class="w-full p-4 font-medium text-white transition border rounded-lg cursor-pointer border-primary bg-primary hover:bg-opacity-90" />
                    </div>
                    <a href="{{ route('family.index') }}" class="inline-block w-full">
                        <div class="w-full p-4 font-medium text-center transition border rounded-lg cursor-pointer border-stroke text-slate-700 bg-slate-200 dark:bg-slate-600 dark:border-meta-4 dark:text-white hover:bg-slate-400">Batal
                        </div>
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('add-member').addEventListener('click', function() {
        var familyMembers = document.getElementById('family-members');
        var newMember = document.createElement('div');
        newMember.classList.add('flex', 'items-stretch', 'mb-2', 'gap-2');
        newMember.innerHTML = `
            <select name="members[]" class="w-full py-4 pl-6 pr-10 bg-transparent border rounded-lg outline-none border-stroke focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                <option selected disabled>-- PILIH ANGGOTA KELUARGA --</option>
                @foreach ($residents as $item)
                <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
                @endforeach
            </select>
            <select name="statuses[]" class="w-1/3 py-4 pl-6 pr-10 bg-transparent border rounded-lg outline-none border-stroke focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                <option selected disabled>-- PILIH STATUS --</option>
                <option value="Bapak">Bapak</option>
                <option value="Ibu">Ibu</option>
                <option value="Anak">Anak</option>
            </select>
            <button type="button" class="px-3 text-red-100 bg-red-500 rounded-md remove-member">&times;</button>
        `;
        familyMembers.appendChild(newMember);
    });

    document.getElementById('family-members').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-member')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection
