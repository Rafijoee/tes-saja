<nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      {{-- @php
            $jenis = app\Models\M_JenisEdukasi::first();
        @endphp --}}
        
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <img class="w-8 h-8 rounded-full" src="{{ url('logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="dashboard-modul-admin">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap underline underline-offset-8 text-black" href="{{route('pengguna.edukasi.index')}}">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="">Konsultasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Faiq Ammar</span>
          <a class="group" href="profil-admin">
            <img class="w-8 h-8 rounded-full" src="{{ url('admin.jpg') }}" alt="admin-pic">
            <hr class="opacity-0 group-hover:opacity-100 mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>