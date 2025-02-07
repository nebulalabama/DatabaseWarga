@extends('layouts.app')

@section('title', 'Data RW - Dbwarga')

@section('content')
<div class="container px-4 mx-auto">
    <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="p-4 text-left">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-black dark:text-white">
                    Data RW
                </h1>

                <a href="{{ route('community_units.index') }}" class="inline-flex items-center px-4 py-2 font-bold text-white bg-red-500 border-b-4 border-red-700 rounded hover:bg-red-400 hover:border-red-500">
                    <span>Kembali</span>
                </a>
            </div>

            <table class="w-1/2">
                <tr>
                    <th class="px-4 py-2">RW</th>
                    <td class="px-4 py-2">{{ $data->name }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Nama Ketua RW</th>
                    <td class="px-4 py-2">{{ $data->head }}</td>
                </tr>
            </table>
        </div>

    </div>

</div>
@endsection
