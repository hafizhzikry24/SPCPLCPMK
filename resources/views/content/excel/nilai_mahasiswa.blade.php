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
                </div>
        </div>
        </main>
    </div>

    <script type="text/javascript">
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
