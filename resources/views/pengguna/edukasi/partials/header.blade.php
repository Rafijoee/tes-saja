<div class="flex flex-row w-[1231px] h-12 m-4 rounded bg-[#7FC7D9] items-center p-2">
    <div class="flex flex-row w-full items-center">

        <ul class="relative max-w-6xl flex flex-row overflow-x-auto text-sm font-medium text-center"
            id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes=""
            data-tabs-inactive-classes="" role="tablist">
            {{-- <li class="me-2" role="presentation">
            <button class="bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
          </li> --}}
            @foreach ($jenis as $item)
                <li class="me-2" role="presentation">
                    <a href="/pengguna/edukasi/{{ $item->id }}" rel="noopener noreferrer"><button
                            class="bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="profile-styled-tab"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">
                            {{ $item->judul_modul }} </button></a>
                </li>
            @endforeach
            {{-- <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li> --}}
        </ul>
    </div>   

    <div id="tambahJenisModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Jenis Edukasi
                    </h3>
                    <button data-modal-toggle="tambahJenisModal" type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="{{ route('admin.edukasi.jenis.store') }}">
                        @csrf
                        @method('post')
                        <div>
                            <label for="judulEdu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                Edukasi</label>
                            <input type="text" name="judul_modul" id="judul_modul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept?</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
