@extends('layouts.app')

@section('title', 'Tersedia Dokumen - Dbwarga')

@section('content')
    <div
        class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-6">
        <h1 class="mb-6 text-2xl font-bold text-black dark:text-white">
            Data Dokumen
        </h1>

  <div class="flex flex-col overflow-x-auto md:items-end">
      <table class="min-w-full border-collapse">
          <thead class="bg-gray dark:bg-meta-4">
              <tr>
                  <th class="p-2.5 xl:p-5 text-sm font-medium uppercase xsm:text-base">#</th>
                  <th class="p-2.5 xl:p-5 text-sm font-medium uppercase xsm:text-base">NIK</th>
                  <th class="p-2.5 text-center xl:p-5 text-sm font-medium uppercase xsm:text-base">KTP</th>
                  <th class="p-2.5 text-center xl:p-5 text-sm font-medium uppercase xsm:text-base">KK</th>
                  <th class="p-2.5 text-center xl:p-5 text-sm font-medium uppercase xsm:text-base">Akta Lahir</th>
                  <th class="p-2.5 text-center xl:p-5 text-sm font-medium uppercase xsm:text-base">Paspor</th>
                  <th class="p-2.5 text-center xl:p-5 text-sm font-medium uppercase xsm:text-base">Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($documents as $document)
              <tr class="border-b border-stroke dark:border-strokedark">
                  <td class="p-2.5 text-center xl:p-5 text-sm xsm:text-base">{{ $loop->iteration }}</td>
                  <td class="p-2.5 text-center xl:p-5 text-sm xsm:text-base">{{ $document->resident_id }}</td>

                  <!-- KTP Column -->
                  <td class="p-2.5 text-center xl:p-5 text-sm xsm:text-base">
                    @if($document->ktp)

                      <a href="{{ asset('storage/' . $document->ktp) }}" target="_blank" class="italic text-center text-green-500 hover:underline">
                        Tersedia
                          <span class="text-center text-green-500 fill-current">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                          </span>
                      </a>
                    @else
                      <span class="text-red-500">Tidak Tersedia</span>
                    @endif
                  </td>

                  <!-- KK Column -->
                  <td class="p-2.5 text-center xl:p-5 text-sm xsm:text-base">
                    @if($document->kk)
                      <a href="{{ asset('storage/' . $document->kk) }}" target="_blank" class="italic text-center text-green-500 hover:underline">
                        Tersedia 
                          <span class="text-center text-green-500 fill-current">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                          </span>
                      </a>
                    @else
                      <span class="text-red-500">Tidak Tersedia</span>
                    @endif
                  </td>

                  <!-- Akta Lahir Column -->
                  <td class="p-2.5 text-center xl:p-5 text-sm xsm:text-base">
                    @if($document->akta_lahir)
                      <a href="{{ asset('storage/' . $document->akta_lahir) }}" target="_blank" class="italic text-center text-green-500 hover:underline">
                        Tersedia 
                          <span class="text-center text-green-500 fill-current">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                          </span>
                      </a>
                    @else
                      <span class="text-red-500">Tidak Tersedia</span>
                    @endif
                  </td>

                  <!-- Paspor Column -->
                  <td class="p-2.5 text-center xl:p-5 text-sm xsm:text-base">
                    @if($document->paspor)
                      <a href="{{ asset('storage/' . $document->paspor) }}" target="_blank" class="italic text-center text-green-500 hover:underline">
                        Tersedia 
                          <span class="text-center text-green-500 fill-current">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[15px] text-center inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                          </span>
                      </a>
                    @else
                      <span class="text-red-500">Tidak Tersedia</span>
                    @endif
                  </td>

                  <td class="flex justify-center items-center p-2.5 xl:p-5">
                      <a href="{{ route('documents.show', $document->id) }}" class="mr-2 text-grey hover:text-green-600 hover:underline">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="w-6 h-6 sm:w-8 sm:h-8">
                              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                  <path d="M12 5c-5.444 0-8.469 4.234-9.544 6.116c-.221.386-.331.58-.32.868c.013.288.143.476.402.852C3.818 14.694 7.294 19 12 19c4.706 0 8.182-4.306 9.462-6.164c.26-.376.39-.564.401-.852c.012-.288-.098-.482-.319-.868C20.47 9.234 17.444 5 12 5Z"/>
                                  <circle cx="12" cy="12" r="3"/>
                              </g>
                          </svg>
                      </a>
                      <a href="{{ route('documents.edit', $document->id) }}" class="mr-2 text-grey hover:text-blue-600 hover:underline">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="w-6 h-6 sm:w-8 sm:h-8">
                              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                  <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/>
                                  <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3"/>
                              </g>
                          </svg>
                      </a>
                      <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-gray-500 hover:text-red-600 hover:underline"> 
                              <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="w-6 h-6 sm:w-8 sm:h-8">
                                  <g fill="currentColor">
                                      <path fill-rule="evenodd" d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" clip-rule="evenodd"/>
                                      <path d="M9 9h2v8H9zm4 0h2v8h-2z"/>
                                  </g>
                              </svg>
                          </button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>

      <div class="flex justify-end my-4">
          <a href="{{ route('documents.create') }}" class="inline-flex items-center px-4 py-2 font-bold text-white bg-green-500 border-b-4 border-green-700 rounded hover:bg-green-400 hover:border-green-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48" class="mr-2">
                  <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                      <rect width="36" height="36" x="6" y="6" rx="3"/>
                      <path stroke-linecap="round" d="M24 14v20m10-10H14"/>
                  </g>
              </svg>
              Tambah Dokumen
          </a>
      </div>
  </div>
</div>
@endsection
