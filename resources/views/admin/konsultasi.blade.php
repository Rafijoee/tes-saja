@extends('admin.layouts.master')
@section('content')

  {{-- @include('admin.edukasi.partials.header')/ --}}
    {{-- <div class="grid grid-flow-col">
      <a href="#">
        <ul class="relative w-11/12 list-none px-2 flex font-semibold gap-x-4 overflow-x-auto">
          <li class="bg-[#D6E8EE] rounded-xl text-center">Modul #1</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #2</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #3</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #4</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #5</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #6</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #7</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #8</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #9</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #10</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #11</li>
        </ul>
      </a>
      <button class="ml-4 flex w-7 p-2 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
          <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
        </svg>
      </button>
    </div>  --}}
  </div>
{{-- @dd($jenis) --}}
  <div class="mx-4 mt-4 mb-4 grid grid-cols-[17%_auto] gap-x-4">    
    {{-- @include('admin.edukasi.partials.aside') --}}

    
  @endsection