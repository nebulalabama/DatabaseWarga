@extends('layouts.app')

@section('title', 'Tambah Dokumen - Dbwarga')

@section('content')
    <main>
        <div class="justify-end flex">
            <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                <span class="mr-2">Kembali</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                </svg>
            </button>
        </div>
        <div class="flex items-center justify-center max-w-screen p-4 md:p-4 2xl:p-4">
            <div
                class="rounded-sm border p-4 w-full md:w-2/3 border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="w-full border-stroke dark:border-strokedark">
                    <div class="w-full sm:p-6 xl:p-17.5">
                        <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                            Tambah Dokumen
                        </h2>

                        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Nomor Induk
                                    Kependudukan</label>
                                <div class="relative">
                                    <input id="resident_id" name="resident_id" type="number" required
                                        placeholder="Contoh: 3524070603030003"
                                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                </div>
                            </div>

                            {{-- <label class="mb-2.5 block font-medium text-black dark:text-white">Unggah Dokumen</label> --}}

                            <div class="mb-6">
                                <label class="block font-medium text-black dark:text-white">Unggah KTP</label>
                                <input type="file" name="ktp" id="ktp"
                                    class="block w-full mt-2 text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100" />
                            </div>

                            <div class="mb-6">
                                <label class="block font-medium text-black dark:text-white">Unggah KK</label>
                                <input type="file" name="kk" id="kk"
                                    class="block w-full mt-2 text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100" />
                            </div>

                            <div class="mb-6">
                                <label class="block font-medium text-black dark:text-white">Unggah Akta Lahir</label>
                                <input type="file" name="akta_lahir" id="akta_lahir"
                                    class="block w-full mt-2 text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100" />
                            </div>

                            <div class="mb-6">
                                <label class="block font-medium text-black dark:text-white">Unggah Paspor</label>
                                <input type="file" name="paspor" id="paspor"
                                    class="block w-full mt-2 text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100" />
                            </div>


                            <div class="mb-6">
                                <input type="submit" value="Tambah"
                                    class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" />
                            </div>

                            <a href="/documents" class="inline-block w-full mt-2">
                                <div
                                    class="w-full text-center cursor-pointer rounded-lg border border-stroke text-slate-700 bg-slate-200 dark:bg-slate-600 dark:border-meta-4 dark:text-white p-4 font-medium transition hover:bg-slate-400">
                                    Batal
                                </div>
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
