<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->

        <x-sidebar/>
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4 ">

            <div class="flex justify-between h-16 border-b border-black ">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Tabel Dosen Teknik Komputer </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> Universitas Diponegoro </a>
                <!-- Tombol Tambah -->
            </div>
            <main class="grid grid-row-5 w-full min-h-screen bg-[#F6F1F1]">

                <div class="w-full overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 text-gray-900 flex items-center justify-between">
                        <div class="flex">
                            <!-- Dropdown Jumlah Data -->
                            <x-dropdown-data/>
                            <!-- Tombol Tambah -->
                            <x-add-button type="submit" class="ml-6" id="button">
                                Tambah data
                            </x-add-button>
                        </div>

                        <div class="flex items-center">

                            <!-- Input Search -->
                            <x-text-input class="block w-50 border border-gray-300 rounded-md px-4 py-2 ml-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari Mata Kuliah" />
                        </div>

                        <div class="py-12  bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
                            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                                <div class="relative mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                    <div class="w-full flex justify-start text-gray-600 mb-3">

                                    </div>
                                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel Dosen Teknik Komputer </h1>
                                    <label for="nip" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">NIP</label>
                                    <input id="nip" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="James" />
                                    <label for="dosen" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nama Dosen</label>
                                    <input id="dosen" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="21120120120034" />
                                    <label for="angkatan" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Angkatan</label>
                                    <input id="angkatan" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="2020" />
                                    <div class="flex items-center justify-start w-full">
                                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-300 bg-green-400 rounded text-white px-8 py-2 text-sm">Submit</button>
                                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler()">Cancel</button>
                                    </div>
                                    <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>

                            <!-- Tabel Data -->
                            <table class="min-w-full mt-4">
                                <thead class="border-b-2 border-black">
                                    <tr>
                                        <th class="px-8  py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NIP</th>
                                        <th class="px-8  py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Nama Dosen</th>
                                        <th class="px-2  py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tampilkan data menggunakan loop -->
                                    {{-- @foreach() --}}
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap"></td>
                                        <td class="px-6 py-4 whitespace-no-wrap"></td>
                                        {{-- @if ('is_admin' == '1') --}}
                                        <td class="px-2 py-4 whitespace-no-wrap text-center space-x-2">
                                            <!-- Tombol Edit -->
                                            <x-edit-button type="submit">
                                                Edit
                                            </x-edit-button>

                                            <!-- Tombol Hapus -->
                                            <form action="" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit">
                                                    Delete
                                                </x-danger-button>
                                            </form>
                                        </td>
                                        {{-- @endif --}}
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    <script>
        let modal = document.getElementById("modal");

        function modalHandler(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }

        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }

        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }

        // Hide the modal when the page is first rendered
        modal.style.display = "none";

        // Tambahkan pemanggilan modalHandler(false) pada saat halaman ini dimuat
        document.addEventListener("DOMContentLoaded", function() {
            modalHandler(false);
        });
    </script>


</x-app-layout>
