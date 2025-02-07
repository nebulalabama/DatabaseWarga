@extends('layouts.app')

@section('title', 'Tambah Data - Dbwarga')

@section('content')
{{-- <div class="max-w-md mx-auto">
    <div class="rounded-sm border border-stroke bg-white px-5 pb-6 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Pengguna</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @CSRF

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="name" name="name" type="text" placeholder="Nama" value="{{ old('name') }}">
                </div>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 16" fill="currentColor">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2m6-9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="password" name="password" type="password" placeholder="Password">
                </div>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
                <select id="role" name="role" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected disabled>Pilih Jabatan</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon</label>
                <div class="flex items-center border rounded-md">
                    <span class="px-3 bg-gray-200 text-gray-700">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="m21 15.46l-5.27-.61l-2.52 2.52a15.045 15.045 0 0 1-6.59-6.59l2.53-2.53L8.54 3H3.03C2.45 13.18 10.82 21.55 21 20.97z"/>
                        </svg>
                    </span>
                    <input class="w-full py-2 px-4 outline-none" id="phone" name="phone" type="text" placeholder="Nomor Telepon" value="{{ old('phone') }}">
                </div>
                @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded inline-flex items-center">
                    <span>Tambah</span>
                </button>
            </div>
        </form>
    </div>
</div> --}}
<!-- ===== Main Content Start ===== -->
<main>
    <div class="flex items-center justify-center max-w-screen p-4 md:p-4 2xl:p-4">
      {{-- <!-- Breadcrumb Start -->
      <div
        class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
      >
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          Sign In
        </h2>

        <nav>
          <ol class="flex items-center gap-2">
            <li>
              <a class="font-medium" href="index.html">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">Sign In</li>
          </ol>
        </nav>
      </div>
      <!-- Breadcrumb End --> --}}

      <!-- ====== Forms Section Start -->
      <div
        class="rounded-sm border w-full md:w-2/3 border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
      >
        {{-- <div class=""> --}}
          {{-- <div class="hidden w-full xl:block xl:w-1/2">
            <div class="px-26 py-17.5 text-center">
              <a class="mb-5.5 inline-block" href="index.html">
                <img
                  class="hidden dark:block"
                  src="./images/logo/logo.svg"
                  alt="Logo"
                />
                <img
                  class="dark:hidden"
                  src="./images/logo/logo-dark.svg"
                  alt="Logo"
                />
              </a>

              <p class="font-medium 2xl:px-20">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                suspendisse.
              </p>

              <span class="mt-15 inline-block">
                <img
                  src="./images/illustration/illustration-03.svg"
                  alt="illustration"
                />
              </span>
            </div>
          </div> --}}
          <div
            class="w-full border-stroke dark:border-strokedark xl:w-full xl:border-l-2"
          >
            <div class="w-full sm:p-6 xl:p-17.5">
              {{-- <span class="mb-1.5 block font-medium">Start for free</span> --}}
              <h2
                class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2"
              >
                Tambah Data Pengguna
              </h2>

              <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label
                      class="mb-2.5 block font-medium text-black dark:text-white"
                      >Nama</label
                    >
                    <div class="relative">
                      <input
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
                      >Password</label
                    >
                    <div class="relative">
                      <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Masukkan Password"
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
                      <select name="role" id="role" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option selected disabled>-- PILIH ROLE --</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
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
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
  
                      
                    </div>
                  </div>

                  

                <div class="mb-4">
                  <input
                    type="submit"
                    value="Tambah"
                    class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"
                  />
                </div>
                <a href="/users" class="inline-block w-full"><div class="w-full text-center cursor-pointer rounded-lg border border-stroke text-slate-700 bg-slate-200 dark:bg-slate-600 dark:border-meta-4 dark:text-white p-4 font-medium transition hover:bg-slate-400">Batal
                </div></a>



                

                {{-- <button
                  class="flex w-full items-center justify-center gap-3.5 rounded-lg border border-stroke bg-gray p-4 font-medium hover:bg-opacity-70 dark:border-strokedark dark:bg-meta-4 dark:hover:bg-opacity-70"
                >
                  <span>
                    <svg
                      width="20"
                      height="20"
                      viewBox="0 0 20 20"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_191_13499)">
                        <path
                          d="M19.999 10.2217C20.0111 9.53428 19.9387 8.84788 19.7834 8.17737H10.2031V11.8884H15.8266C15.7201 12.5391 15.4804 13.162 15.1219 13.7195C14.7634 14.2771 14.2935 14.7578 13.7405 15.1328L13.7209 15.2571L16.7502 17.5568L16.96 17.5774C18.8873 15.8329 19.9986 13.2661 19.9986 10.2217"
                          fill="#4285F4"
                        />
                        <path
                          d="M10.2055 19.9999C12.9605 19.9999 15.2734 19.111 16.9629 17.5777L13.7429 15.1331C12.8813 15.7221 11.7248 16.1333 10.2055 16.1333C8.91513 16.1259 7.65991 15.7205 6.61791 14.9745C5.57592 14.2286 4.80007 13.1801 4.40044 11.9777L4.28085 11.9877L1.13101 14.3765L1.08984 14.4887C1.93817 16.1456 3.24007 17.5386 4.84997 18.5118C6.45987 19.4851 8.31429 20.0004 10.2059 19.9999"
                          fill="#34A853"
                        />
                        <path
                          d="M4.39899 11.9777C4.1758 11.3411 4.06063 10.673 4.05807 9.99996C4.06218 9.32799 4.1731 8.66075 4.38684 8.02225L4.38115 7.88968L1.19269 5.4624L1.0884 5.51101C0.372763 6.90343 0 8.4408 0 9.99987C0 11.5589 0.372763 13.0963 1.0884 14.4887L4.39899 11.9777Z"
                          fill="#FBBC05"
                        />
                        <path
                          d="M10.2059 3.86663C11.668 3.84438 13.0822 4.37803 14.1515 5.35558L17.0313 2.59996C15.1843 0.901848 12.7383 -0.0298855 10.2059 -3.6784e-05C8.31431 -0.000477834 6.4599 0.514732 4.85001 1.48798C3.24011 2.46124 1.9382 3.85416 1.08984 5.51101L4.38946 8.02225C4.79303 6.82005 5.57145 5.77231 6.61498 5.02675C7.65851 4.28118 8.9145 3.87541 10.2059 3.86663Z"
                          fill="#EB4335"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_191_13499">
                          <rect width="20" height="20" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  Sign in with Google
                </button> --}}

                {{-- <div class="mt-6 text-center">
                  <p class="font-medium">
                    Don’t have any account?
                    <a href="signup.html" class="text-primary">Sign Up</a>
                  </p>
                </div> --}}
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
