<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4">
            <main class="flex w-full justify-center h-screen pl-5 pr-5 pb-5">

                <body>
                    <main class="flex w-full justify-center h-screen pl-5 pr-5 pb-5">
                        <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">
                            <a class="text-3xl font-bold"> TABEL CPL </a>
                            <div>
                                <!-- Tabel Data -->
                                <table class="table table-bordered" id="cpl">
                                    <thead>
                                        <tr>
                                            <th class="bg-[#C2E7FF]" style=" border: none;">ID CPL</th>
                                            <th class="bg-[#C2E7FF]" style=" border: none;">Nama CPL</th>
                                            <th class="bg-[#C2E7FF]" style=" border: none;">Pernyataan CPL</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!DOCTYPE html>
                            <html>

                            <head>
                                <title>Data CPL</title>
                                <style>
                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                    }

                                    th,
                                    td {
                                        border-bottom: 2px solid #ddd;
                                        padding: 8px;
                                        text-align: left;
                                    }

                                    th {
                                        background-color: #f2f2f2;
                                    }

                                    .custom-search {
                                        padding: 8px 30px 8px 40px;
                                        /* Sesuaikan padding agar tulisan tidak terlalu dekat dengan tepi kotak */
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="%23757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="11" cy="11" r="8" /><path d="M21 21l-6-6" /></svg>');
                                        background-repeat: no-repeat;
                                        background-position: calc(100% - 20px) center;
                                        /* Mulai dari tepi kanan */
                                        background-size: 20px;
                                        /* Ukuran ikon */
                                        padding-right: 40px;
                                        /* Menggeser teks untuk memberi ruang bagi ikon */
                                        width: 200px;
                                        /* Sesuaikan lebar sesuai kebutuhan */
                                        color: #757575;
                                        /* Warna teks abu-abu */
                                        transition: background-position 0.3s ease-in-out;
                                        /* Efek transisi saat fokus */
                                    }

                                    .dataTables_filter {
                                        text-align: right;
                                        /* Posisi kotak pencarian di sisi kanan */
                                        margin-bottom: 10px;
                                        /* Jarak antara kotak pencarian dan tabel */
                                    }
                                </style>
                            </head>
                    </main>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#cpl').DataTable({
                language: {
                    search: '', // Mengosongkan teks pada kotak pencarian
                    lengthMenu: '_MENU_', // Mengganti teks "Show Entries" dengan '_MENU_'
                },
                processing: true,
                serverSide: true,
                ajax: "{{ url('cpl') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                ],
                order: [
                    [0, 'desc']
                ],
                // Customizing the DataTables elements position
                dom: '<"flex mb-3 mt-3"l<"flex-shrink-0 mr-3 ml-3"f>>rtip',
                initComplete: function() {
                    // Menyesuaikan kotak pencarian
                    $('.dataTables_filter input[type="search"]').addClass('custom-search');
                },
                lengthMenu: [5, 10],
                pageLength: 5
            });
            $('.dataTables_length select').addClass('px-2 py-1 w-16 rounded');
        });
    </script>
</x-app-layout>
