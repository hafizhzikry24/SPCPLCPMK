<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->

        <x-sidebar/>
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto overflow-x-auto  ">

            <div class="flex justify-between h-16 border-b border-black mt-4">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Tabel Nilai Mata Kuliah Teknik Komputer </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> Universitas Diponegoro </a>
                <!-- Tombol Tambah -->
            </div>
            <main class="grid grid-row-5 w-full min-h-screen bg-[#F6F1F1] ">
                <div class="py-12">

                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class = "border-b border-black ">
                        <div class="p-4 sm:p-8 bg-[#9ADE7B] shadow sm:rounded-lg mb-4">
                            <div class="max-w-7x1">
                                <a class="text-2xl font-bold ml-2 mb-4 mt-4 "> Keterangan </a>
                                <table class="min-w-full ">
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
                                            <td class=" px-6 py-2 whitespace-no-wrap">Kode Mata Kuliah  </td>


                                        </tr>
                                        <tr>
                                            <td class=" px-6 py-2 whitespace-no-wrap">Nama Mata Kuliah</td>


                                        </tr>
                                        <tr>
                                            <td class=" px-6 py-2 whitespace-no-wrap">Semester</td>


                                        </tr>
                                        <tr>
                                            <td class=" px-6 py-2 whitespace-no-wrap">SKS</td>


                                        </tr>


                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>



                            </div>


                            </div>
                            <div class="flex flex-auto mb-4 ">
                                <!-- Tombol Tambah -->
                                <x-add-button type="submit" class="ml-6" id="button">
                                    <x-assets.import/>
                                    Import Nilai
                                </x-add-button>
                            </div>
                    </div>


                            <div class="flex flex-auto justify-between">
                                <!-- Dropdown Jumlah Data -->
                                <x-dropdown-data/>

                                <x-text-input class="block w-50 border border-gray-300 rounded-md px-4 py-2 ml-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari Mata Kuliah" />
                            </div>

                            <table class="min-w-full mt-4">
                                <thead class="border-b-2 border-black">
                                    <tr>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NIM</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NAMA</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Semester</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">STATUS</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NILAI TUGAS</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NILAI UTS</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NILAI UAS</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NILAI AKHIR</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NILAI AKHIR HURUF</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NILAI BOBOT</th>
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
                                        <td class="px-4 py-4 whitespace-no-wrap text-center">



                                        </td>
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
