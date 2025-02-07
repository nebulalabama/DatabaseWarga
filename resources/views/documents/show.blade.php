@extends('layouts.app')

@section('title', 'Detail Dokumen - Dbwarga')

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
    <div class="justify-end flex">
        <button type="button" onclick="javascript:history.back()" class="inline-flex text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </button>
    </div>
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="p-6 text-left">
            <h1 class="mb-6 text-2xl md:px-4 font-bold text-black dark:text-white">
                Detail Dokumen
            </h1>

            <table class="">
                <tr>
                    <th class="md:px-4 py-2 align-top">Nomor Induk Kependudukan</th>
                    <td class="md:px-4 py-2 align-top ps-8">{{ $document->resident_id }}</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">File KTP</th>
                    <td class="md:px-4 py-2 align-top ps-8">
                        @if($document->ktp)
                      <a href="{{ asset('storage/' . $document->ktp) }}" class="text-green-500 italic text-center hover:underline">
                        Tersedia
                          <span class="text-green-500 fill-current text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                          </span>
                      </a>
                    @else
                      <span class="text-red-500">Tidak Tersedia</span>
                    @endif</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">File KK</th>
                    <td class="md:px-4 py-2 align-top ps-8">@if($document->kk)
                        <a href="{{ asset('storage/' . $document->kk) }}" class="text-green-500 italic text-center hover:underline">
                          Tersedia
                            <span class="text-green-500 fill-current text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                            </span>
                        </a>
                      @else
                        <span class="text-red-500">Tidak Tersedia</span>
                      @endif</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">File Akta Lahir</th>
                    <td class="md:px-4 py-2 align-top ps-8">@if($document->akta_lahir)
                        <a href="{{ asset('storage/' . $document->akta_lahir) }}" class="text-green-500 italic text-center hover:underline">
                          Tersedia
                            <span class="text-green-500 fill-current text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                            </span>
                        </a>
                      @else
                        <span class="text-red-500">Tidak Tersedia</span>
                      @endif</td>
                </tr>
                <tr>
                    <th class="md:px-4 py-2 align-top">File Paspor</th>
                    <td class="md:px-4 py-2 align-top ps-8">@if($document->paspor)
                        <a href="{{ asset('storage/' . $document->paspor) }}" class="text-green-500 italic text-center hover:underline">
                          Tersedia
                            <span class="text-green-500 fill-current text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                            </span>
                        </a>
                      @else
                        <span class="text-red-500">Tidak Tersedia</span>
                      @endif</td>
                </tr>

            </table>

            <div class="mt-6 md:px-4 flex justify-between items-center">

                <div class="back">
                    <a href="{{ route('documents.index') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 mr-2 rounded inline-flex items-center">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="mr-2">
                            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM12 7c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1h-3V7c0-.55-.45-1-1-1s-1 .45-1 1V9h-3c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1h-3V7c0-.55-.45-1-1-1z"/>
                        </svg> --}}
                        Kembali
                    </a>
                </div>

                <div class="operation">
                    <a href="{{ route('documents.edit', $document->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 mr-2 rounded inline-flex items-center">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="mr-2">
                            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM12 7c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1h-3V7c0-.55-.45-1-1-1s-1 .45-1 1V9h-3c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1h-3V7c0-.55-.45-1-1-1z"/>
                        </svg> --}}
                        Edit
                    </a>

                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="inline-block">
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
