<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar/>
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-8 overflow-x-auto">
            <h2 class="text-2xl font-bold ml-8 mb-2 mt-2"> CPMK </h2>
                <!-- Tombol Tambah -->
                <x-text-input class="block mt-1 w-50 ml-6 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari Mata Kuliah" />
            <main class="w-full h-screen bg-[#F6F1F1]">

                    <div class="w-full overflow-hidden shadow-sm sm:rounded-lg mt-8">
                            <!-- Tabel Data -->
                            <table class="min-w-full mt-4">
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
                    </div>
                </div>
            </main>
        </div>

    </div>
</x-app-layout>

