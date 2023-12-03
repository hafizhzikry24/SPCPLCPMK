<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->

        <x-sidebar/>
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto overflow-x-auto  ">

            <div class="flex justify-between h-16 border-b border-black mt-4">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Rapor Jurusan Teknik Komputer </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> Universitas Diponegoro </a>
                <!-- Tombol Tambah -->
            </div>
            <main class="grid grid-row-5 w-full min-h-screen bg-[#F6F1F1] ">
                <div class="py-12">

                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-7x1">
                                <a class="text-2xl font-bold ml-2 mb-4 mt-4"> S1 Teknik Komputer </a>
                                <table class="min-w-full mt-4 ">
                                    <thead class="border-b-2 border-black">
                                        <tr>
                                            <th class="  px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Nama CPL</th>
                                            <th class=" px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Deskripsi</th>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <th class="px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Capaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Tampilkan data menggunakan loop -->
                                        {{-- @foreach() --}}
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-A</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-B</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-C</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-D</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-E</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-F</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-G</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-H</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-no-wrap">CPL-I</td>
                                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                            <td class="px-4 py-4 whitespace-no-wrap text-center">

                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>

                            </div>


                            </div>
                        </div>




                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-16">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <div class="max-w-7x1 ">

                                <table class="min-w-full mt-4 ">
                                    <thead class="border-b-2 border-black">
                                        <tr>
                                             <th class="px-6 py-3 bg-[#146C94] text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">Grafik Nilai</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>


                            </div>
                        </div>
                    </div>



                    </div>

            </main>
        </div>

    </div>
</x-app-layout>
