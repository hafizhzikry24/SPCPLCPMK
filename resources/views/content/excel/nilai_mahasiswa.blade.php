<x-app-layout>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div class="flex">
                            <x-nilai-button type="button" class="mx-2" id="button">
                                Download Template
                            </x-nilai-button>
                            <x-add-button type="button" class="mx-8" id="button">
                                <x-assets.import />
                                Import CSV
                            </x-add-button>
                        </div>
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
                                                <td class="px-2 py-1 whitespace-no-wrap">Tahun Akademik</td>
                                                <td class="px-2 py-1 whitespace-no-wrap">
                                                    {{ $matakuliah_info->tahun_akademik }}
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
                            <div class="p-6 m-5 bg-white rounded shadow" id="chartContainer">
                                <h2 class="text-2xl font-bold mb-2" id="chartTitle">Distribusi Nilai CPL Mahasiswa
                                    dalam Persen
                                </h2>
                                <p class="text-base mb-2" id="chartDescription">Berdasarkan CPL Mata Kuliah</p>
                                <!-- Select Dropdowns -->
                                <div class="mt-4 flex justify-between">
                                    <form id="cpmkForm" method="POST"
                                        action="{{ route('pieChartCpmk', [
                                            'tahun_akademik_matkul' => $matakuliah_info->tahun_akademik,
                                            'semester_matkul' => $matakuliah_info->semester,
                                            'matkul_id' => $matakuliah_info->kode_MK,
                                            'selectedCpmk' => $selectedCpmk,
                                        ]) }}">
                                        @csrf
                                        <select name="selectedCpmk" id="selectedCpmk" onchange="changeCpmk()"
                                            style="min-width: 100px;" class="px-2 py-1 w-16 rounded">
                                            @for ($i = 1; $i <= $cpmkCount; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($selectedCpmk == $i) selected @endif>CPMK
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </form>
                                    <form id="cplForm" method="POST"
                                        action="{{ route('pieChartCpl', [
                                            'tahun_akademik_matkul' => $matakuliah_info->tahun_akademik,
                                            'semester_matkul' => $matakuliah_info->semester,
                                            'matkul_id' => $matakuliah_info->kode_MK,
                                            'selectedCpl' => $selectedCpl,
                                        ]) }}">
                                        @csrf
                                        <select name="selectedCpl" id="selectedCpl" onchange="changeCpl()"
                                            style="min-width: 100px;" class="px-2 py-1 w-16 rounded">
                                            @foreach ($cplData as $cpl)
                                                <option value="{{ $cpl }}"
                                                    @if ($selectedCpl == $cpl) selected @endif>CPL
                                                    {{ $cpl }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                    <select name="chartType" id="chartType" onchange="showChart(this.value)"
                                        style="min-width: 130px;" class="px-2 py-1 w-16 rounded">
                                        <option value="pieChartCPMK">CPMK</option>
                                        <option value="pieChartCPL">Grafik CPL</option>
                                        <option value="barChartCPL">Rekap CPL</option>
                                    </select>
                                </div>

                                <!-- Chart Containers -->
                                <div id="pieChartContent">
                                    <div id="pieChartContainer">
                                        {!! $pieChartCPMK->container() !!}
                                        <script src="{{ $pieChartCPMK->cdn() }}"></script>
                                        {{ $pieChartCPMK->script() }}
                                    </div>
                                </div>

                                <div id="pieChartCPLContainer">
                                    <div id="pieChartCPLContainer">
                                        {!! $pieChartCPL->container() !!}
                                        <script src="{{ $pieChartCPL->cdn() }}"></script>
                                        {{ $pieChartCPL->script() }}
                                    </div>
                                </div>

                                <div id="barChartCPLContainer">
                                    <div id="pieChartCPLContainer">
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
                                        document.getElementById('cpmkForm').style.display = 'block';
                                        document.getElementById('cplForm').style.display = 'none';
                                        document.getElementById('chartTitle').innerText = 'Distribusi Nilai CPMK Mahasiswa';
                                        document.getElementById('chartDescription').innerText = 'Berdasarkan CPMK yang dipilih';
                                    } else if (chartType === 'pieChartCPL') {
                                        document.getElementById('pieChartCPLContainer').style.display = 'block';
                                        document.getElementById('cpmkForm').style.display = 'none';
                                        document.getElementById('cplForm').style.display = 'block';
                                        document.getElementById('chartTitle').innerText = 'Distribusi Nilai CPL Mahasiswa';
                                        document.getElementById('chartDescription').innerText = 'Berdasarkan CPL yang dipilih';
                                    } else if (chartType === 'barChartCPL') {
                                        document.getElementById('barChartCPLContainer').style.display = 'block';
                                        document.getElementById('cpmkForm').style.display = 'none';
                                        document.getElementById('cplForm').style.display = 'none';
                                        document.getElementById('chartTitle').innerText = 'Distribusi Nilai CPL Mahasiswa dalam Persen';
                                        document.getElementById('chartDescription').innerText = 'Berdasarkan CPL Mata Kuliah';
                                    }

                                    // Update the chartType dropdown to reflect the change
                                    document.getElementById('chartType').value = chartType;

                                    // Save the selected chart type in localStorage
                                    localStorage.setItem('selectedChartType', chartType);
                                }

                                // Retrieve the last selected chart type from localStorage
                                var lastSelectedChartType = localStorage.getItem('selectedChartType');

                                // If no last selected chart type is found, set it to 'pieChartCPMK'
                                if (!lastSelectedChartType) {
                                    lastSelectedChartType = 'pieChartCPMK';
                                    localStorage.setItem('selectedChartType', lastSelectedChartType);
                                }
                                // Set the last selected chart type as the default value
                                showChart(lastSelectedChartType);
                            </script>
                        </body>
                    </div>
                    <div>
                        <body class="h-screen bg-gray-100">
                            <div class="p-6 m-5 bg-white rounded shadow">
                                <h2 class="text-2xl font-bold mb-2" id="chartTitle">Evaluasi Pemenuhan Capaian Pembelajaran Mata Kuliah
                                </h2>
                                <div>
                                    <!-- Tabel Data -->
                                    <table class="table table-bordered" id="evaluasi">
                                        <thead>
                                            <tr>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">CPMK</th>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">Rerata</th>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">%>Ambang</th>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">Memenuhi</th>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">Analisis Pelaksanaan Pembelajaran</th>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">Rencana Perbaikan Semester Depan</th>
                                                <th class="bg-[#C2E7FF]" style=" border: none;">Aksi</th> 
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </body>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <div class="overflow-auto py-12 bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
        id="modal-excel">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="absolute mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div class="w-full flex justify-start text-gray-600 mb-3">
                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Import Excel </h1>

                <form
                    action="{{ route('mata_kuliah.inputexcel', [
                        'tahun_akademik_matkul' => $tahun_akademik_matkul,
                        'semester_matkul' => $semester_matkul,
                        'matkul_id' => $matkul_id,
                    ]) }}"
                    method="post" enctype="multipart/form-data">
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
                    onclick="closeModal('modal-excel', false)">Cancel</button>
            </div>
            <button
                class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                onclick="closeModal('modal-excel')" aria-label="close modal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    </div>

    <div id="modal-evaluasi" class="overflow-y-auto py-12 bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0 hidden">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="absolute mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel Evaluasi</h1>
                <form action="javascript:void(0)" id="EvaluasiForm" name="EvaluasiForm" class="form-horizontal" method="POST">
                    <!-- Form inputs -->
                    <div>
                        <label for="id_eval_matkul" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Kode Mata Kuliah<span class="text-red-500">*</span></label>
                        <input name="id_eval_matkul" id="id_eval_matkul" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="PTSKXXXX" />
                    </div>
                    <!-- Include other form inputs as needed -->
    
                    <!-- Buttons -->
                    <div class="flex items-center justify-start w-full">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-300 bg-green-400 rounded text-white px-8 py-2 text-sm">Submit</button>
                        <button type="button" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="closeModal('modal-evaluasi')">Cancel</button>
                    </div>
                </form>
    
                <!-- Close button -->
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="closeModal('modal-evaluasi')" aria-label="close modal" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    

    <script type="text/javascript">
    // Define modals and their IDs
    let modalIds = ["modal-excel", "modal-target", "modal-evaluasi"];
    let modals = {};

    // Initialize modals
    modalIds.forEach(modalId => {
        modals[modalId] = document.getElementById(modalId);
    });
    // Function to open modal
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            fadeIn(modal);
            document.body.style.overflow = 'hidden'; // Disable scrolling
        }
    }

    // Function to close modal
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            fadeOut(modal);
            document.body.style.overflow = 'auto'; // Enable scrolling
        }
    }

    // Function to fade out modal
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

    // Function to fade in modal
    function fadeIn(el) {
        el.style.opacity = 0;
        el.style.display = "block";
        (function fade() {
            let val = parseFloat(el.style.opacity);
            if (!((val += 0.1) > 1)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }

    // Function eval_add() to open modal-evaluasi
    function eval_add() {
        closeModal('modal-excel'); // Close excel modal if open
        openModal('modal-evaluasi');
    }

    // Function add() to open modal-excel
    function add() {
        closeModal('modal-evaluasi'); // Close evaluasi modal if open
        openModal('modal-excel');
    }

    // Close modals when the document is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        closeModal('modal-excel');
        closeModal('modal-evaluasi');
    });



            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                console.log("Constructed URL:",
                    "{{ route('mata_kuliah.datatables', ['tahun_akademik_matkul' => $matakuliah_info->tahun_akademik, 'semester_matkul' => $matakuliah_info->semester, 'matkul_id' => $matakuliah_info->kode_MK]) }}"
                );
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
                        "url": "{{ route('mata_kuliah.datatables', ['tahun_akademik_matkul' => $matakuliah_info->tahun_akademik, 'semester_matkul' => $matakuliah_info->semester, 'matkul_id' => $matakuliah_info->kode_MK]) }}",
                        "type": "GET",
                        "dataSrc": function(json) {
                            cplColumns = json.cplColumns;
                            // Return the actual data
                            return json.data;
                        }
                    },
                    createdRow: function(row, data, dataIndex) {
                        // Get the value of the 'outcome' column
                        var outcome = data.outcome;

                        // Check the outcome value and apply the corresponding row color
                        if (outcome === 'TIDAK LULUS') {
                            $(row).css('background-color', 'red');
                        } else if (outcome === 'REMIDI CPMK') {
                            $(row).css('background-color', 'orange');
                        }
                        // Add more conditions as needed for other outcomes and colors
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
                    dom: '<"flex mb-3 mt-3"l<"flex-shrink-0 mr-3 ml-3"f><"flex-shrink-0 ml-auto"B>>rtip',
                    buttons: [{
                        extend: 'excel',
                        text: 'Download Nilai',
                        className: 'excel-download-button',
                    }],
                    initComplete: function() {
                        // Adjust the search box
                        $('.dataTables_filter input[type="search"]').addClass('custom-search');
                    },
                });
                $('.dataTables_length select').addClass('px-2 py-1 w-16 rounded');
            });

            function changeCpmk() {
                var selectedCpmk = document.getElementById("selectedCpmk").value;
                console.log("Selected Cpmk:", selectedCpmk);
                var csrfToken = document.getElementsByName("_token")[0].value;

                // Change the form action dynamically
                document.getElementById("cpmkForm").action =
                    "{{ route('pieChartCpmk', ['tahun_akademik_matkul' => $matakuliah_info->tahun_akademik, 'semester_matkul' => $matakuliah_info->semester, 'matkul_id' => $matakuliah_info->kode_MK]) }}/" +
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
                    "{{ route('pieChartCpl', ['tahun_akademik_matkul' => $matakuliah_info->tahun_akademik, 'semester_matkul' => $matakuliah_info->semester, 'matkul_id' => $matakuliah_info->kode_MK]) }}/" +
                    selectedCpl + "?_token=" + csrfToken;

                // Submit the form
                document.getElementById("cplForm").submit();
                showChart('pieChartCPL');
            }

            $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log("Constructed URL:",
                     "{{ route('evaluasi.datatables', ['tahun_akademik_matkul' => $matakuliah_info->tahun_akademik, 'semester_matkul' => $matakuliah_info->semester, 'matkul_id' => $matakuliah_info->kode_MK]) }}"
                );
            $('#evaluasi').DataTable({
                language: {
                    search: '', // Mengosongkan teks pada kotak pencarian
                    lengthMenu: '_MENU_', // Mengganti teks "Show Entries" dengan '_MENU_'
                },
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "{{ route('evaluasi.datatables', ['tahun_akademik_matkul' => $matakuliah_info->tahun_akademik, 'semester_matkul' => $matakuliah_info->semester, 'matkul_id' => $matakuliah_info->kode_MK]) }}",
                    "type": "GET",
                    },
                columns: [{
                        data: 'cpmk',
                        name: 'cpmk'
                    },
                    {
                        data: 'rerata',
                        name: 'rerata'
                    },
                    {
                        data: 'ambang',
                        name: 'ambang'
                    },
                    { 
                        data: 'memenuhi',
                        name: 'memenuhi',
                    },
                    { 
                        data: 'analisis_pelaksanaan',
                        name: 'analisis_pelaksanaan',
                    },
                    { 
                        data: 'analisis_pelaksanaan',
                        name: 'analisis_pelaksanaan',
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [0, 'desc']
                ],
                // Customizing the DataTables elements position
                dom: '<"flex mb-3 mt-3 items-center"l<"flex-shrink-0 mr-3 ml-3 items-center"f>>rtip',
                initComplete: function() {
                    var addButton = $(
                            `<div class="flex justify-between items-center">
                        <x-nilai-button type="submit" class="ml-auto" id="button">
                            Atur Target
                        </x-nilai-button>
                    </div>`
                        ).addClass('ml-auto');
                        $('#evaluasi_wrapper').find('.flex.mb-3').append(addButton);

                        var eval_addbutton = $(
                            `<div class="flex justify-between items-center">
                        <x-evaluasi_add-button onclick="eval_add()" type="submit" class="ml-auto" id="button">
                           Tambah Evaluasi
                        </x-evaluasi_add-button>
                    </div>`
                        ).addClass('ml-auto');
                        $('#evaluasi_wrapper').find('.flex.mb-3').append(eval_addbutton);
                    // Menyesuaikan kotak pencarian
                    $('.dataTables_filter input[type="search"]').addClass('custom-search');
                },
                lengthMenu: [10, 20, 30],
                pageLength: 10
            });
            $('.dataTables_length select').addClass('px-2 py-1 w-16 rounded');
        });

     </script>
</x-app-layout>
