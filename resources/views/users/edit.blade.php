@extends('layouts.app')

@section('title', 'Ubah Data - Dbwarga')

@section('content')

<!-- ===== Main Content Start ===== -->
<main>
    <div class="flex items-center justify-center max-w-screen md:p-4 2xl:p-4">

      <!-- ====== Forms Section Start -->
      <div
        class="rounded-sm border w-full md:w-2/3 border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
      >
        
          <div
            class="w-full p-4 border-stroke dark:border-strokedark xl:w-full xl:border-l-2"
          >
            <div class="w-full sm:p-6 xl:p-17.5">
              {{-- <span class="mb-1.5 block font-medium">Start for free</span> --}}
              <h2
                class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2"
              >
                Ubah Data Pengguna
              </h2>

              <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label
                      class="mb-2.5 block font-medium text-black dark:text-white"
                      >Nama</label
                    >
                    <div class="relative">
                      <input
                        value="{{ $user->name }}"
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Masukkan Nama"
                        class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                      />
  
                      
                    </div>
                  </div>

                  <div class="mb-4">
                    <label
                      class="mb-2.5 block font-medium text-black dark:text-white"
                      >Email</label
                    >
                    <div class="relative">
                      <input
                      value="{{ $user->email }}"
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Masukkan Email"
                        class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                      />
  
                      
                    </div>
                  </div>


                  <div class="mb-4">
                    <label
                      class="mb-2.5 block font-medium text-black dark:text-white"
                      >Role</label
                    >
                    <div class="relative">
                      <select name="role" id="role" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option disabled>-- PILIH ROLE --</option>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
  
                      
                    </div>
                  </div>

                  <div class="mb-4">
                    <label
                      class="mb-2.5 block font-medium text-black dark:text-white"
                      >Telepon</label
                    >
                    <div class="relative">
                      <input
                      value="{{ $user->phone }}"

                        id="phone"
                        name="phone"
                        type="number"
                        placeholder="Masukkan Telepon"
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                      />
  
                      
                    </div>
                  </div>

                  <div class="mb-7">
                    <label
                      class="mb-2.5 block font-medium text-black dark:text-white"
                      >Status</label
                    >
                    <div class="relative">
                      <select name="status" id="status" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option selected disabled>-- PILIH STATUS --</option>
                        <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
  
                      
                    </div>
                  </div>

                  

                <div class="w-full mb-4">
                  <input
                    type="submit"
                    value="Ubah Data"
                    class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"
                  />
                </div>
                <a href="/users" class="inline-block w-full"><div class="w-full text-center cursor-pointer rounded-lg border border-stroke text-slate-700 bg-slate-200 dark:bg-slate-600 dark:border-meta-4 dark:text-white p-4 font-medium transition hover:bg-slate-400">Batal
                </div></a>

                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- ====== Forms Section End -->
    </div>
  </main>
  <!-- ===== Main Content End ===== -->
@endsection
