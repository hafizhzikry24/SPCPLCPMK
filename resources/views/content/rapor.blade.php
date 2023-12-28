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

            </main>

        </div>


    </div>




</x-app-layout>


<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->

        <x-sidebar/>
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4 ">

            <div class="flex justify-between h-16 border-b border-black">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Tabel Nilai Mata Kuliah Teknik Komputer </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> Universitas Diponegoro </a>
                <!-- Tombol Tambah -->
            </div>
            <main class=" grid grid-row-5 w-full min-h-screen bg-[#F6F1F1]">

                <div class="w-full overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 text-gray-900 flex items-center justify-between">
                        <div class="flex flex-auto">
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
                                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel Nilai Teknik Komputer </h1>
                                    <label for="kode" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Kode</label>
                                    <input id="kode" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="TK001" />
                                    <label for="mk" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">MataKuliah</label>
                                    <input id="mk" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="Sistem Digtial" />
                                    <label for="semester" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Semester</label>
                                    <input id="semester" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="8" />
                                    <label for="sks" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">SKS</label>
                                    <input id="sks" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="3" />
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
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Kode</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Mata kuliah</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Semester</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">SKS</th>
                                        <th class="px-6 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">Aksi</th>
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
                                            <!-- Tombol Edit -->


                                            <!-- Tombol Hapus -->


                                                    <a href="{{ route('excelsdl') }}" class=" items-center">
                                                        <x-select-button >
                                                            Select
                                                        </x-select-button>
                                                    </a>
                                                    <div class="mt-5">
                                                        <a href="{{ route('exceldkp') }}" class=" items-center">
                                                            <x-select-button >
                                                                Select
                                                            </x-select-button>
                                                        </a>
                                                    </div>


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



<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Sample</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="grid grid-cols-12">
        <!-- Sidebar -->

        <x-sidebar/>
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto overflow-x-auto  ">

            <div class="flex justify-between h-16 border-b border-black mt-4">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Tabel Nilai Mata Kuliah Teknik Komputer </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> UNDIP </a>
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
                                <x-add-button type="button" class="ml-6" id="button">
                                    <x-assets.import/>
                                    Import Nilai
                                </x-add-button>
                                {{-- <a href="{{route('importexcelsdl')}}" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Import Excel
                                </a>
                                    <!-- Modal toggle -->
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="ml-5 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Toggle modal
                                </button> --}}
                            </div>
                    </div>


                            <div class="flex flex-auto justify-between">
                                <!-- Dropdown Jumlah Data -->
                                <x-dropdown-data/>

                                <x-text-input class="block w-50 border border-gray-300 rounded-md px-4 py-2 ml-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari Mata Kuliah" />
                            </div>

                            <table class="min-w-full mt-4" id="excelsdl">
                                <thead class="border-b-2 border-black">
                                    <tr>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NIM</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">NAMA</th>
                                        <th class="px-2 py-3 bg-[#F6F1F1] text-center text-xs leading-4 font-medium text-black uppercase tracking-wider">CPL 3</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    <!-- Tampilkan data menggunakan loop -->
                                    @foreach($nilai as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->nim }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->nama }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->cpl3 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                        <div>
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
            </main>
        </div>
    </div>


    <div class="py-12  bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
    id="matakuliah-modal">
    <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
        <div
            class="relative mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
            <div class="w-full flex justify-start text-gray-600 mb-3">
            </div>
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel
                Matakuliah Teknik Komputer </h1>
            <form action="{{ route('importexcelsdl') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file" required="required">
                </div>
                <div class="flex items-center justify-start w-full">
                    <button type="submit"
                        class="focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-green-700
                        transition duration-150
                        ease-in-out
                        hover:bg-green-300
                        bg-green-400 rounded
                        text-white px-8 py-2
                        text-sm">
                        Save Changes</button>
            </form>
            <button type="button"
                class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                onclick="modalHandler(false)">Cancel</button>
        </div>
        <button
            class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
            onclick="modalHandler()" aria-label="close modal" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
    </div>

    <script type="text/javascript">
        let modal = document.getElementById("matakuliah-modal");

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

        function add() {
            modalHandler(true);
        }

        // Hide the modal when the page is first rendered
        modal.style.display = "none";

        // Tambahkan pemanggilan modalHandler(false) pada saat halaman ini dimuat
        document.addEventListener("DOMContentLoaded", function() {
            modalHandler(false);
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#excelsdl').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('excel') }}",
                columns: [{
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'cpl3',
                        name: 'cpl3'
                    },
                ],
                order: [
                    [0, 'desc']
                ]
            });
        });

</script>

</x-app-layout>


