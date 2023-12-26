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
                    <a class="text-3xl font-bold"> Rekap CPL </a>
                    <div class="py-12">

                        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">

                            {{-- <div class="max-w-7x1">
                                    <a class="text-2xl font-bold ml-2 mb-4 mt-4"> S1 Teknik Komputer </a>
                                    <table class="min-w-full mt-4 ">
                                        <thead >
                                            <tr>
                                                <th class="  px-6 py-3 bg-[#5AB3F0] text-center text-xs leading-4 font-medium text-dark uppercase tracking-wider">Nama CPL</th>
                                                <th class=" px-6 py-3 bg-[#5AB3F0] text-center text-xs leading-4 font-medium text-dark uppercase tracking-wider">Deskripsi</th>
                                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                                <th class="px-6 py-3 bg-[#5AB3F0] text-center text-xs leading-4 font-medium text-dark uppercase tracking-wider">Capaian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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

                                        </tbody>
                                    </table>

                                </div>


                                </div> --}}





                            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-16">

                                <div class="max-w-7x1 ">

                                    <body class="h-screen bg-gray-100">

                                        <div class="container px-4 mx-auto">

                                            <div class="p-6 m-20 bg-white rounded shadow">
                                                {!! $chart->container() !!}
                                            </div>

                                        </div>

                                        <script src="{{ $chart->cdn() }}"></script>

                                        {{ $chart->script() }}
                                    </body>
                                </div>



                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>

</x-app-layout>
