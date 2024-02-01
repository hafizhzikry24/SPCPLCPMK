<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Sample</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="grid grid-cols-12">
        <!-- Sidebar -->

        <x-sidebar />
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4">
            <main class="flex w-full justify-center pl-5 pr-5 pb-5">
                <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">

                    <div class="flex items-center justify-between my-8">
                        <a class="text-3xl font-bold mx-8"> Nilai Matakuliah </a>
                        <x-add-button type="button" class="mx-8" id="button">
                            <x-assets.import />
                            Import CSV
                        </x-add-button>
                    </div>

                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div>
                            <div class="p-4 sm:p-8 bg-[#C4EED0] shadow sm:rounded-lg mb-4">
                                <div class="max-w-7x1">
                                    <a class="text-2xl font-bold ml-2 mb-4 mt-4 "> Keterangan </a>
                                    <table class="min-w-full mt-4">
                                        <tbody>
                                            @foreach ($mataKuliahInfo as $info)
                                                <tr>
                                                    <td class="px-2 py-1 whitespace-no-wrap">Kode Mata Kuliah</td>
                                                    <td class="px-2 py-1 whitespace-no-wrap">{{ $info->kode_MK }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-1 whitespace-no-wrap">Nama Mata Kuliah</td>
                                                    <td class="px-2 py-1 whitespace-no-wrap">{{ $info->Mata_Kuliah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-1 whitespace-no-wrap">Semester</td>
                                                    <td class="px-2 py-1 whitespace-no-wrap">{{ $info->semester }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-1 whitespace-no-wrap">SKS</td>
                                                    <td class="px-2 py-1 whitespace-no-wrap">{{ $info->SKS }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-1 whitespace-no-wrap">CPMK</td>
                                                    <td class="px-2 py-1 whitespace-no-wrap">{{ $info->cpmk }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <table class="mx-8 my-12" id="PTSK6660">
                            <thead class="min-w-full my-12 ">
                                <tr>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">NIM</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">NAMA</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPL 2</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPL 3</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPL 4</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPL 6</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">Outcome</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 1</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 2</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 3</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 4</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 5</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 6</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">CPMK 7</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                    <!-- Tampilkan data menggunakan loop -->
                                    @foreach ($nilai as $item)
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

                                <div class="p-6 m-20 bg-white rounded shadow" id="pieChartContainer">

                                    <form method="POST"
                                        action="{{ route('cpmkPTSK6660', ['selectedCpmk' => $selectedCpmk]) }}">
                                        @csrf
                                        <label for="selectedCpmk">Select CPMK:</label>
                                        <select name="selectedCpmk" id="selectedCpmk">

                                            <option value="1">CPMK 1</option>
                                            <option value="2">CPMK 2</option>
                                            <option value="3">CPMK 3</option>
                                            <option value="4">CPMK 4</option>
                                            <option value="5">CPMK 5</option>
                                            <option value="6">CPMK 6</option>
                                            <option value="7">CPMK 7</option>
                                        </select>
                                        <button type="submit">Submit</button>
                                    </form>

                                    {!! $PieChart->container() !!}
                                </div>

                                <div class="p-6 m-20 bg-white rounded shadow" id="barChartContainer">
                                    {!! $BarChart->container() !!}
                                </div>

                            </div>
                            <script src="{{ $PieChart->cdn() }}"></script>
                            <script src="{{ $BarChart->cdn() }}"></script>
                            {{ $PieChart->script() }}
                            {{ $BarChart->script() }}
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
            <div class="relative mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div class="w-full flex justify-start text-gray-600 mb-3">
                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel
                    Matakuliah Teknik Komputer </h1>
                <form action="{{ route('ExcelPTSK6660') }}" method="post" enctype="multipart/form-data">
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
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>

        <script type="text/javascript">
            // document.getElementById('cpmkForm').addEventListener('submit', function(event) {
            //     event.preventDefault();

            //     var selectedCpmk = document.getElementById('selectedCpmk').value;

            //     // You may need to adjust this line based on how you handle the CSRF token
            //     var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            //     // Ensure selectedCpmk is not empty before redirecting
            //     if (selectedCpmk) {
            //         window.location.href = "{{ url('matakuliah/PTSK6660') }}/" + selectedCpmk + "?_token=" + csrfToken;
            //     } else {
            //         alert('Please select a CPMK before submitting.');
            //     }
            // });

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

                $('#PTSK6660').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('PTSK6660') }}",
                    columns: [{
                            data: 'nim',
                            name: 'nim'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'cpl2',
                            name: 'cpl2'
                        },
                        {
                            data: 'cpl3',
                            name: 'cpl3'
                        },
                        {
                            data: 'cpl4',
                            name: 'cpl4'
                        },
                        {
                            data: 'cpl6',
                            name: 'cpl6'
                        },
                        {
                            data: 'outcome',
                            name: 'outcome'
                        },
                        {
                            data: 'cpmk1',
                            name: 'cpmk1'
                        },
                        {
                            data: 'cpmk2',
                            name: 'cpmk2'
                        },
                        {
                            data: 'cpmk3',
                            name: 'cpmk3'
                        },
                        {
                            data: 'cpmk4',
                            name: 'cpmk4'
                        },
                        {
                            data: 'cpmk5',
                            name: 'cpmk5'
                        },
                        {
                            data: 'cpmk6',
                            name: 'cpmk6'
                        },
                        {
                            data: 'cpmk7',
                            name: 'cpmk7'
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });
            });
        </script>

</x-app-layout>
