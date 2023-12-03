<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar/>
        <div class="col-span-2">
        </div>

        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto overflow-x-auto  ">

            <div class="flex justify-between h-16 border-b border-black mt-4 ">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Rekap CPL </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> Universitas Diponegoro </a>
                <!-- Tombol Tambah -->
            </div>
            <main class="w-full min-h-screen bg-[#F6F1F1] ">
                <div class="py-12">

                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <div >
                                <a class="text-2xl font-bold ml-2 mb-4 mt-4"> S1 Teknik Komputer </a>
                                <table class="min-w-full mt-4 ">
                                    <thead class="border-b-2 border-black">
                                        <tr>
                                             <th class="px-6 py-3 bg-[#146C94] text-center text-xl leading-4 font-medium text-white uppercase tracking-wider">Pilih Angkatan</th>
                                        </tr>
                                    </thead>

                                </table>

                                <table class="min-w-full ">
                                    <thead >
                                        <tr>
                                             <th class="px-6 py-16 bg-gray-100 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                                        <div class="max-w-4xl">
                                                            <a class="text-xs text-black font-bold ml-2 mb-4 mt-4"> angkatan </a>
                                                            <x-dropdown-table/>
                                                        </div>
                                                    </div>
                                             </th>
                                        </tr>
                                    </thead>

                                </table>
                                <table class="min-w-full ">
                                    <thead >
                                        <tr>
                                             <th class="px-6 py-6 bg-gray-200 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">

                                             </th>
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

