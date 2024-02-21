<x-app-layout>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/1.11.6/css/dataTables.bootstrap4.min.css" />

    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/1.11.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/1.11.6/js/dataTables.bootstrap4.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="grid grid-cols-12">

        <x-sidebar />
        <div class="col-span-2">
        </div>

        <div class="col-span-10 overflow-y-auto mt-4">
            <main class="flex w-full justify-center pl-5 pr-5 pb-5">
                <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">

                    <div class="flex items-center justify-between my-8">
                        <a class="text-3xl font-bold mx-8"> Nilai Matakuliah {{ $matakuliah_info->Mata_Kuliah }}</a>
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
                                            <tr>
                                                <td class="px-2 py-1 whitespace-no-wrap">Kode Mata Kuliah</td>
                                                <td class="px-2 py-1 whitespace-no-wrap">{{ $matakuliah_info->kode_MK }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-1 whitespace-no-wrap">Nama Mata Kuliah</td>
                                                <td class="px-2 py-1 whitespace-no-wrap">
                                                    {{ $matakuliah_info->Mata_Kuliah }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-1 whitespace-no-wrap">Semester</td>
                                                <td class="px-2 py-1 whitespace-no-wrap">
                                                    {{ $matakuliah_info->semester }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-1 whitespace-no-wrap">SKS</td>
                                                <td class="px-2 py-1 whitespace-no-wrap">{{ $matakuliah_info->SKS }}
                                                </td>
                                            </tr>
                                            <td class="px-2 py-1 whitespace-no-wrap">CPL</td>
                                            <td class="px-2 py-1 whitespace-no-wrap">
                                                @php
                                                    $cplData = json_decode($matakuliah_info->cpl, true);
                                                @endphp

                                                @if ($cplData && is_array($cplData))
                                                    @foreach ($cplData as $cpl)
                                                        <p>CPL {{ $cpl }}</p>
                                                    @endforeach
                                                @else
                                                    <p>No CPL data available.</p>
                                                @endif
                                            </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-1 whitespace-no-wrap">CPMK</td>
                                                <td class="px-2 py-1 whitespace-no-wrap">
                                                    @php
                                                        // Your data
                                                        $cpmkData = $matakuliah_info->cpmk;

                                                        // Convert sentences to an array
                                                        $cpmkList = explode('. ', $cpmkData);

                                                        // Remove empty elements from the array
                                                        $cpmkList = array_filter($cpmkList);

                                                        // Output as a numbered list
                                                        if (!empty($cpmkList)) {
                                                            echo '<ol>';
                                                            foreach ($cpmkList as $index => $item) {
                                                                // Add 1 to $index since numbering starts from 1
                                                                $number = $index + 1;
                                                                echo '<li>' . $number . '. ' . $item . '</li>';
                                                            }
                                                            echo '</ol>';
                                                        }
                                                    @endphp
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <table class="mx-8 my-12" id="tabelnilaimahasiswa">
                            <thead class="min-w-full my-12 ">
                                <tr>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">NIM</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">NAMA</th>
                                    <th class="bg-[#C2E7FF]" style=" border: none;">Outcome</th>
                                    @php
                                        $cplData = json_decode($matakuliah_info->cpl, true);
                                    @endphp

                                    @if ($cplData && is_array($cplData))
                                        @foreach ($cplData as $cpl)
                                            <th class="bg-[#C2E7FF]" style="border: none;">CPL {{ $cpl }}</th>
                                        @endforeach
                                    @else
                                        <th class="bg-[#C2E7FF]" style="border: none;">No CPL data available.</th>
                                    @endif

                                    @php
                                        $cpmkData = $matakuliah_info->cpmk;
                                        $cpmkList = explode('. ', $cpmkData);
                                        $cpmkCount = count($cpmkList);
                                    @endphp

                                    @for ($i = 1; $i <= $cpmkCount; $i++)
                                        <th class="bg-[#C2E7FF]" style="border: none;">CPMK {{ $i }}</th>
                                    @endfor
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div>

                        <body class="h-screen bg-gray-100">
                            <div class="container px-4 ml-auto">
                                <div class="p-6 m-5 bg-white rounded shadow" id="chartContainer">
                                    <!-- Buttons to switch between charts -->
                                    <div class="mt-2 flex justify-end">
                                        <select name="chartType" id="chartType" onchange="showChart(this.value)" style="min-width: 130px;" class="px-2 py-1 w-16 rounded">
                                            <option value="pieChartCPMK">CPMK</option>
                                            <option value="pieChartCPL">Grafik CPL</option>
                                            <option value="barChartCPL">Rekap CPL</option>
                                        </select>
                                    </div>                                    
                        
                                    <!-- Pie Chart CPMK Container -->
                                    <div class="p-6 m-5 bg-white rounded shadow" id="pieChartContent">
                                        <!-- Pie Chart CPMK -->
                                        <div id="pieChartContainer">
                                                                                    <!-- Select CPMK Dropdown -->
                                        <div class="mt-4">
                                            <form id="cpmkForm" method="POST"
                                                action="{{ route('pieChartCpmk', ['matkul_id' => $matakuliah_info->kode_MK, 'selectedCpmk' => $selectedCpmk]) }}">
                                                @csrf
                                                <select name="selectedCpmk" id="selectedCpmk" onchange="changeCpmk()"
                                                    style="min-width: 100px;"
                                                    class="px-2 py-1 w-16 rounded">
                                                    @for ($i = 1; $i <= $cpmkCount; $i++)
                                                        <option value="{{ $i }}" @if ($selectedCpmk == $i) selected @endif>CPMK
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </form>
                                        </div>
                                            {!! $pieChartCPMK->container() !!}
                                            <script src="{{ $pieChartCPMK->cdn() }}"></script>
                                            {{ $pieChartCPMK->script() }}
                                        </div>
                                    </div>
                        
                                    <!-- Pie Chart CPL Container -->
                                    <div class="p-6 m-5 bg-white rounded shadow hidden" id="pieChartCPLContainer">
                                        <!-- Pie Chart CPL -->
                                        <div id="pieChartCPLContainer">
                                                                                    <!-- Select CPL Dropdown -->
                                        <div class="mt-4">
                                            <form id="cplForm" method="POST"
                                                action="{{ route('pieChartCpl', ['matkul_id' => $matakuliah_info->kode_MK, 'selectedCpl' => $selectedCpl]) }}">
                                                @csrf
                                                <select name="selectedCpl" id="selectedCpl" onchange="changeCpl()"
                                                    style="min-width: 100px;"
                                                    class="px-2 py-1 w-16 rounded">
                                                    @foreach ($cplData as $cpl)
                                                        <option value="{{ $cpl }}" @if ($selectedCpl == $cpl) selected @endif>CPL
                                                            {{ $cpl }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </div>
                                        {!! $pieChartCPL->container() !!}
                                        <script src="{{ $pieChartCPL->cdn() }}"></script>
                                        {{ $pieChartCPL->script() }}
                                        </div>
                                    </div>
                        
                                    <!-- Bar Chart CPL Container -->
                                    <div class="p-6 m-5 bg-white rounded shadow hidden" id="barChartCPLContainer">
                                        {!! $barChartCPL->container() !!}
                                        <script src="{{ $barChartCPL->cdn() }}"></script>
                                        {{ $barChartCPL->script() }}
                                    </div>
                                </div>
                            </div>
                        
                            <script>
                                function showChart(chartType) {
                                    // Hide all chart containers
                                    document.getElementById('pieChartContent').style.display = 'none';
                                    document.getElementById('pieChartCPLContainer').style.display = 'none';
                                    document.getElementById('barChartCPLContainer').style.display = 'none';

                                    // Show the selected chart container
                                    if (chartType === 'pieChartCPMK') {
                                        document.getElementById('pieChartContent').style.display = 'block';
                                    } else if (chartType === 'pieChartCPL') {
                                        document.getElementById('pieChartCPLContainer').style.display = 'block';
                                        // Update the chartType dropdown to reflect the change
                                        document.getElementById('chartType').value = 'pieChartCPL';
                                    } else if (chartType === 'barChartCPL') {
                                        document.getElementById('barChartCPLContainer').style.display = 'block';
                                        // Update the chartType dropdown to reflect the change
                                        document.getElementById('chartType').value = 'barChartCPL';
                                    }

                                    // Save the selected chart type in localStorage
                                    localStorage.setItem('selectedChartType', chartType);
                                }
                                // Retrieve the last selected chart type from localStorage
                                var lastSelectedChartType = localStorage.getItem('selectedChartType');

                                // Set the last selected chart type as the default value
                                if (lastSelectedChartType) {
                                    showChart(lastSelectedChartType);
                                }
                            </script>
                        </body>
                        
                </div>
        </div>
        </main>
    </div>
    </div>


    <div class="py-12  bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
        id="modal-excel">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div class="w-full flex justify-start text-gray-600 mb-3">
                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel
                    Matakuliah Teknik Komputer </h1>

                <form action="{{ route('mata_kuliah.inputexcel', ['matkul_id' => $matkul_id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Other form fields -->
                    <div class="form-group">
                        <input type="file" name="file" accept=".xlsx, .xls">
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <button type="submit"
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-300 bg-green-400 rounded text-white px-8 py-2 text-sm mt-4">
                            Save Changes</button>
                </form>
                <button type="button"
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm mt-4"
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
            let modal = document.getElementById("modal-excel");

            function changeCpmk() {
                var selectedCpmk = document.getElementById("selectedCpmk").value;
                console.log("Selected Cpmk:", selectedCpmk);
                var csrfToken = document.getElementsByName("_token")[0].value;

                // Change the form action dynamically
                document.getElementById("cpmkForm").action =
                    "{{ route('pieChartCpmk', ['matkul_id' => $matakuliah_info->kode_MK]) }}/" +
                    selectedCpmk + "?_token=" + csrfToken;

                // Submit the form
                document.getElementById("cpmkForm").submit();
                showChart('pieChartCPMK');
            }

            function changeCpl() {
                var selectedCpl = document.getElementById("selectedCpl").value;
                // console.log("Selected CPL:", selectedCpl);
                var csrfToken = document.getElementsByName("_token")[0].value;

                // Change the form action dynamically
                document.getElementById("cplForm").action =
                    "{{ route('pieChartCpl', ['matkul_id' => $matakuliah_info->kode_MK]) }}/" +
                    selectedCpl + "?_token=" + csrfToken;

                // Submit the form
                document.getElementById("cplForm").submit();
                showChart('pieChartCPL');
            }

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

                var table = $('#tabelnilaimahasiswa').DataTable({
                    "error": function(xhr, error, thrown) {
                        console.error("DataTables error:", error, thrown);
                    },
                    language: {
                        search: '',
                        lengthMenu: '_MENU_',
                    },
                    processing: true,
                    serverSide: true,
                    "ajax": {
                        "url": "{{ route('mata_kuliah.datatables', ['matkul_id' => $matakuliah_info->kode_MK]) }}",
                        "type": "GET",
                        "dataSrc": function(json) {
                            cplColumns = json.cplColumns;
                            // Return the actual data
                            return json.data;
                        }
                    },
                    columns: [{
                            data: 'nim',
                            name: 'nim'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'outcome',
                            name: 'outcome'
                        },
                        // Dynamic CPL columns
                        @if (isset($cplColumns))
                            @foreach ($cplColumns as $cplColumn)
                                {
                                    data: 'cpl{{ $cplColumn }}',
                                    name: 'cpl{{ $cplColumn }}'
                                },
                            @endforeach
                        @endif
                        // Dynamic CPMK columns
                        @for ($i = 1; $i <= $cpmkCount; $i++)
                            {
                                data: 'cpmk{{ $i }}',
                                name: 'cpmk{{ $i }}'
                            },
                        @endfor
                    ],
                    order: [
                        [0, 'desc']
                    ],
                    dom: '<"flex mb-3 mt-3"l<"flex-shrink-0 mr-3 ml-3"f>>rtip',
                    initComplete: function() {
                        // Adjust the search box
                        $('.dataTables_filter input[type="search"]').addClass('custom-search');
                    },
                });
                $('.dataTables_length select').addClass('px-2 py-1 w-16 rounded');
            });
        </script>

</x-app-layout>
