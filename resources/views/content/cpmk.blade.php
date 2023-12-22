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
                    <a class="text-3xl font-bold"> CPMK </a>
                    <div class="flex items-center justify-between">
                        <!-- Button -->
                        <div>
                            <x-add-button type="submit" class="" id="button">
                                Tambah data
                            </x-add-button>
                        </div>

                        <!-- Search bar -->
                        <div class="ml-4">
                            <x-text-input class="block border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari Mata Kuliah" />
                        </div>
                    </div>
                    <!-- Tabel Data -->
                    <table class="min-w-full mt-4"><!-- Ini daf kudu mbok garap Back End e sek nembe iso soal e styling e kudu ono Data Tables -->
                        <thead class="border-b-2 border-black">
                            <tr>
                                <th class="  ml-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Mata Kuliah</th>
                                <th class=" px-6 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">CPL</th>
                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tampilkan data menggunakan loop -->
                            {{-- @foreach() --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</x-app-layout>