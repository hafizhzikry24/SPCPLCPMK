<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4">
            <main class="flex w-full justify-center h-screen pl-5 pr-5 pb-5">
                <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">
                    <a class="text-3xl font-bold"> Tabel Data Dosen </a>
                    <!-- Tombol Tambah -->
                    <div class="p-5 flex justify-between items-center">
                        <x-add-button type="submit" class="ml-auto" id="button">
                            Tambah data
                        </x-add-button>
                    </div>
                    <!-- Tabel Data -->
                    <table class="min-w-full mt-4"> <!-- Ini daf kudu mbok garap Back End e sek nembe iso soal e styling e kudu ono Data Tables -->
                        <thead class="border-b-2 border-black">
                            <tr>
                                <th class="  px-6 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NIP</th>
                                <th class=" px-6 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Nama Dosen</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tampilkan data menggunakan loop -->
                            {{-- @foreach() --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                {{-- <td class="px-4 py-4 whitespace-no-wrap text-center">
                                    <!-- Tombol Edit -->
                                    <x-edit-button type="submit" id="button">
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
                                </td> --}}

                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </main>

    <div class="py-12  bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div class="w-full flex justify-start text-gray-600 mb-3">

                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel CPL </h1>
                <label for="cpl" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nama CPL</label>
                <input id="cpl" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="CPL-A" />
                <label for="deskripsi" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Deskripsi</label>
                <input id="deskripsi" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="Lorem Ipsum" />

                <div class="flex items-center justify-start w-full">
                    <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-300 bg-green-400 rounded text-white px-8 py-2 text-sm">Submit</button>
                    <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler()">Cancel</button>
                </div>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
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
