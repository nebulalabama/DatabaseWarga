@extends('layouts.app')

@section('title', 'Setting - Dbwarga')

@section('content')
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 md:w-2/3 2xl:p-10">
        <div class="mx-auto max-w-270">
            <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="py-4 border-b border-stroke px-7 dark:border-strokedark">
                    <h2 class="font-bold text-black text-title-md2 dark:text-white">
                        Halaman Pengaturan
                    </h2>
                </div>
                <div class="p-7">
                    <form action="{{ route('general.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-5.5">
                            <div class="w-full">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white" for="name">
                                    Nama Desa
                                </label>
                                <input class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" type="text" name="name" id="name" value="{{ $generals->name ?? '-' }}" placeholder="nama desa" />
                            </div>
                        </div>
                        <div class="mb-5.5">
                            <div class="w-full">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white" for="head">
                                    Kepala Desa
                                </label>
                                <input class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" type="text" name="head" id="head" value="{{ $generals->head ?? '-' }}" placeholder="nama kepala desa" />
                            </div>
                        </div>
                        <div class="mb-5.5">
                            <div class="w-full">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white" for="deputy_head">
                                    Wakil Kepala Desa
                                </label>
                                <input class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" type="text" name="deputy_head" id="deputy_head" value="{{ $generals->deputy_head ?? '-' }}" placeholder="nama wakil kepala desa" />
                            </div>
                        </div>
                        <div class="mb-5.5">
                            <div class="w-full">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white" for="treasurer">
                                    Bendahara
                                </label>
                                <input class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" type="text" name="treasurer" id="treasurer" value="{{ $generals->treasurer ?? '-' }}" placeholder="nama bendahara desa" />
                            </div>
                        </div>
                        <div class="mb-5.5">
                            <div class="w-full">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white" for="secretary">
                                    Sekretaris
                                </label>
                                <input class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" type="text" name="secretary" id="secretary" value="{{ $generals->secretary ?? '-' }}" placeholder="nama skretaris desa" />
                            </div>
                        </div>
                        <div class="mb-5.5">
                            <div class="w-full">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white" for="address">
                                    Alamat Desa
                                </label>
                                <textarea class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" name="address" id="address" rows="5">{{ $generals->address ?? '-' }}</textarea>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-4.5">
                            <button
                                class="flex justify-center px-6 py-2 font-medium text-black border rounded border-stroke hover:shadow-1 dark:border-strokedark dark:text-white"
                                type="submit">
                                Cancel
                            </button>
                            <button
                                class="flex justify-center px-6 py-2 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                                type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <!-- ====== Settings Section End -->
@endsection
