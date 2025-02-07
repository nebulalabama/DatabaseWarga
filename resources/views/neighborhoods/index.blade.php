@extends('layouts.app')

@section('title', 'Data RT - Dbwarga')

@section('content')
<div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-black dark:text-white">
            Data RT
        </h1>

        <a href="{{ route('neighborhoods.create') }}" class="inline-flex items-center px-4 py-2 font-bold text-white bg-green-500 border-b-4 border-green-700 rounded hover:bg-green-400 hover:border-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48"
                class="mr-2">
                <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                    <rect width="36" height="36" x="6" y="6" rx="3" />
                    <path stroke-linecap="round" d="M24 16v16m-8-8h16" />
                </g>
            </svg>
            <span>Tambah</span>
        </a>
    </div>

        <div class="flex flex-col">
            <table class="min-w-full bg-white dark:bg-meta-4">
                <thead>
                    <tr class="w-full bg-gray dark:bg-meta-4">
                        <th class="p-2.5 xl:p-5 text-left">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">RT</h5>
                        </th>
                        <th class="p-2.5 xl:p-5 text-center">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Nama Ketua RT</h5>
                        </th>
                        <th class="p-2.5 xl:p-5 text-center">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Action</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($neighborhoods as $item)
                    <tr class="border-b border-stroke dark:border-strokedark dark:bg-boxdark">
                        <td class="p-2.5 xl:p-5">
                            <p class="text-sm xsm:text-base">{{ $item->name }}</p>
                        </td>
                        <td class="p-2.5 xl:p-5 text-center">
                            <p class="text-sm xsm:text-base">{{ $item->head }}</p>
                        </td>
                        <td class="p-2.5 xl:p-5 text-center">
                            <div class="flex items-center justify-center">
                                <a href="{{ route('neighborhoods.show', $item->id) }}" class="mr-2 text-grey hover:text-green-600 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                                        class="w-6 h-6 sm:w-8 sm:h-8">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path
                                                d="M12 5c-5.444 0-8.469 4.234-9.544 6.116c-.221.386-.331.58-.32.868c.013.288.143.476.402.852C3.818 14.694 7.294 19 12 19c4.706 0 8.182-4.306 9.462-6.164c.26-.376.39-.564.401-.852c.012-.288-.098-.482-.319-.868C20.47 9.234 17.444 5 12 5Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="{{ route('neighborhoods.edit', $item->id) }}" class="mr-2 text-grey hover:text-blue-600 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                                        class="w-6 h-6 sm:w-8 sm:h-8">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                        </g>
                                    </svg>
                                </a>
                                <form action="{{ route('neighborhoods.destroy', $item->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                                            class="w-6 h-6 sm:w-8 sm:h-8">
                                            <g fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z"
                                                    clip-rule="evenodd" />
                                                <path d="M9 9h2v8H9zm4 0h2v8h-2z" />
                                            </g>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  </div>
@endsection
