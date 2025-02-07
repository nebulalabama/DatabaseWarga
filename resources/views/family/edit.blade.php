@extends('layouts.app')

@section('title', 'Edit Data - Dbwarga')

@section('content')
<main>
    <div class="justify-end flex">
        <a href="{{ route('family.index') }}" class="inline-flex text-white bg-primary hover:bg-secondary/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
            <span class="mr-2">Kembali</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </a>
    </div>
    <div class="flex items-center justify-center p-4 max-w-screen md:p-4 2xl:p-4">
        <div class="w-full bg-white border rounded-sm md:w-2/3 border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="w-full sm:p-6 xl:p-17.5">
                <h2 class="text-2xl font-bold text-black mb-9 dark:text-white sm:text-title-xl2">
                    Edit Data Keluarga
                </h2>
                <form action="{{ route('family.update', $familyCard->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Nomor Kartu Keluarga</label>
                        <div class="relative">
                            <input id="no_kk" name="no_kk" type="number" value="{{ $familyCard->no_kk }}" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Kepala Keluarga</label>
                        <div class="relative">
                            <select name="resident_id" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option selected disabled>-- PILIH KEPALA KELUARGA --</option>
                                @foreach ($residents as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $familyCard->resident_id ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Daftar Anggota Keluarga -->
<div id="family-members" class="mb-4">
  <label class="mb-2.5 block font-medium text-black dark:text-white">Anggota Keluarga</label>
  @foreach ($familyCard->details as $detail)
      <div class="flex items-center mb-2">
          <select name="members[]" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
              <option selected disabled>-- PILIH ANGGOTA KELUARGA --</option>
              @foreach ($residents as $item)
                  <option value="{{ $item->id }}" {{ $item->id == $detail->resident_id ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->name }}</option>
              @endforeach
          </select>
          <select name="statuses[]" class="ml-2 w-1/3 rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
              <option selected disabled>-- PILIH STATUS --</option>
              <option value="Bapak" {{ $detail->status == 'Bapak' ? 'selected' : '' }}>Bapak</option>
              <option value="Ibu" {{ $detail->status == 'Ibu' ? 'selected' : '' }}>Ibu</option>
              <option value="Anak" {{ $detail->status == 'Anak' ? 'selected' : '' }}>Anak</option>
          </select>
          <button type="button" class="ml-2 text-red-500 remove-member">Hapus</button>
      </div>
  @endforeach
</div>
<button type="button" id="add-member" class="inline-flex items-center px-4 py-2 font-bold text-white bg-blue-500 border-b-4 border-blue-700 rounded hover:bg-blue-400 hover:border-blue-500">Tambah Anggota Keluarga</button>

                    <div class="mt-4">
                        <input type="submit" value="Simpan" class="w-full p-4 font-medium text-white transition border rounded-lg cursor-pointer border-primary bg-primary hover:bg-opacity-90" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

{{-- <script>
    document.getElementById('add-member').addEventListener('click', function() {
        var familyMembers = document.getElementById('family-members');
        var newMember = document.createElement('div');
        newMember.classList.add('flex', 'items-center', 'mb-2');
        newMember.innerHTML = `
            <select name="members[]" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                <option selected disabled>-- PILIH ANGGOTA KELUARGA --</option>
                @foreach ($residents as $item)
                    <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
                @endforeach
            </select>
            <select name="statuses[]" class="ml-2 w-1/3 rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                <option selected disabled>-- PILIH STATUS --</option>
                <option value="Bapak">Bapak</option>
                <option value="Ibu">Ibu</option>
                <option value="Anak">Anak</option>
            </select>
            <button type="button" class="ml-2 text-red-500 remove-member">Hapus</button>
        `;
        familyMembers.appendChild(newMember);
    });

    document.getElementById('family-members').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-member')) {
            e.target.parentElement.remove();
        }
    });
</script> --}}
{{-- <script>
  document.getElementById('add-member').addEventListener('click', function() {
      var familyMembers = document.getElementById('family-members');
      var newMember = document.createElement('div');
      newMember.classList.add('flex', 'items-center', 'mb-2');
      newMember.innerHTML = `
          <select name="members[]" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
              <option selected disabled>-- PILIH ANGGOTA KELUARGA --</option>
              @foreach ($residents as $item)
                  <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
              @endforeach
          </select>
          <select name="statuses[]" class="ml-2 w-1/3 rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
              <option selected disabled>-- PILIH STATUS --</option>
              <option value="Bapak">Bapak</option>
              <option value="Ibu">Ibu</option>
              <option value="Anak">Anak</option>
          </select>
          <button type="button" class="ml-2 text-red-500 remove-member">Hapus</button>
      `;
      familyMembers.appendChild(newMember);
  });

  document.getElementById('family-members').addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('remove-member')) {
          e.target.parentElement.remove();
      }
  });
</script> --}}

<script>
  document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('add-member').addEventListener('click', function() {
          var familyMembers = document.getElementById('family-members');
          var newMember = document.createElement('div');
          newMember.classList.add('flex', 'items-center', 'mb-2');
          newMember.innerHTML = `
              <select name="members[]" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                  <option selected disabled>-- PILIH ANGGOTA KELUARGA --</option>
                  @foreach ($residents as $item)
                      <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
                  @endforeach
              </select>
              <select name="statuses[]" class="ml-2 w-1/3 rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                  <option selected disabled>-- PILIH STATUS --</option>
                  <option value="Bapak">Bapak</option>
                  <option value="Ibu">Ibu</option>
                  <option value="Anak">Anak</option>
              </select>
              <button type="button" class="ml-2 text-red-500 remove-member">Hapus</button>
          `;
          familyMembers.appendChild(newMember);

          // Re-attach event listener for new "Hapus" buttons
          newMember.querySelector('.remove-member').addEventListener('click', function() {
              newMember.remove(); // Remove the entire div when "Hapus" is clicked
          });
      });

      // Event delegation for existing "Hapus" buttons
      document.getElementById('family-members').addEventListener('click', function(e) {
          if (e.target && e.target.classList.contains('remove-member')) {
              e.target.parentElement.remove(); // Remove the parent div of the clicked "Hapus" button
          }
      });
  });
</script>


@endsection
