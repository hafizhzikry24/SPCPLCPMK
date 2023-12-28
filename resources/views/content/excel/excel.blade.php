

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

                    <div class="flex items-center justify-between my-8">
                        <a class="text-3xl font-bold mx-8"> Nilai Matakuliah </a>
                        <x-add-button type="submit" class=" mx-8" id="button">
                            Import CSV
                        </x-add-button>
                    </div>

                    <div class="p-4 sm:p-8 bg-[#C4EED0] shadow sm:rounded-lg mx-8 my-10">

                            <a class="text-2xl font-bold ml-2 "> Keterangan </a>
                            <table class="min-w-full mt-4 ">
                                {{-- <thead class="border-b-2 border-black">
                                    <tr>
                                        <th class="  px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Nama CPL</th>
                                        <th class=" px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Deskripsi</th>
                                        <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                        <th class="px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Capaian</th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                    <!-- Tampilkan data menggunakan loop -->
                                    {{-- @foreach() --}}
                                    <tr>
                                        <td class=" px-2 py-1 whitespace-no-wrap">Kode Mata Kuliah  </td>


                                    </tr>
                                    <tr>
                                        <td class=" px-2 py-1 whitespace-no-wrap">Nama Mata Kuliah</td>


                                    </tr>
                                    <tr>
                                        <td class=" px-2 py-1 whitespace-no-wrap">Semester</td>


                                    </tr>
                                    <tr>
                                        <td class=" px-2 py-1 whitespace-no-wrap">SKS</td>


                                    </tr>


                                    {{-- @endforeach --}}
                                </tbody>
                            </table>






                    </div>
                    <!-- Tabel Data -->
                    <div class="mx-8 my-12">
                    <table class="min-w-full my-12 "><!-- Ini daf kudu mbok garap Back End e sek nembe iso soal e styling e kudu ono Data Tables -->
                        <thead >
                            <tr class=" h-11">
                                <th class="bg-[#C2E7FF]" style=" border: none;">NIM</th>
                                        <th class="bg-[#C2E7FF]" style=" border: none;">NAMA</th>
                                        <th class="bg-[#C2E7FF]" style=" border: none;">Semester</th>
                                        <th class="bg-[#C2E7FF]" style=" border: none;">NAMA</th>
                                        <th class="bg-[#C2E7FF]" style=" border: none;">Semester</th>
                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tampilkan data menggunakan loop -->
                            {{-- @foreach() --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <td class="px-6 py-4 whitespace-no-wrap"></td>
                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-app-layout>

