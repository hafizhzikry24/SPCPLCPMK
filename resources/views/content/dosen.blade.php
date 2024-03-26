<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4">

            <body>
                <main class="flex w-full justify-center h-screen pl-5 pr-5 pb-5">
                    <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">
                        <a class="text-3xl font-bold"> TABEL DOSEN </a>
                        <div>
                            <!-- Tabel Data -->
                            <table class="table table-bordered" id="dosen">
                                <thead>
                                    <tr>
                                        <th class="bg-[#C2E7FF]" style=" border: none;">NIP Dosen</th>
                                        <th class="bg-[#C2E7FF]" style=" border: none;">Nama Dosen</th>
                                        @if(isset($isAdmin) && $isAdmin)
                                        <th class="bg-[#C2E7FF]" style="border: none;">Aksi</th>
                                        @endif  
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!DOCTYPE html>
                        <html>

                        <head>
                            <title>Data Dosen</title>
                            <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                th,
                                td {
                                    border-bottom: 2px solid #ddd;
                                    padding: 2px;
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
                                    /* margin-bottom: 10px; */
                                    /* Jarak antara kotak pencarian dan tabel */
                                }
                            </style>
                        </head>
                        <div class="overflow-y-auto py-12 bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
                            id="dosen-modal">
                            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                            <div
                                class="absolute mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                <div class="w-full flex justify-start text-gray-600 mb-3">
                                    </div>
                                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel
                                        Dosen Teknik Komputer </h1>
                                    <form action="javascript:void(0)" id="DosenForm" name="DosenForm"
                                        class="form-horizontal w-1/2 mx-auto" method="POST">
                                        <input type="hidden" name="id_dosen" id="id_dosen" />

                                        <label for="NIP"
                                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal">
                                            NIP<span class="text-red-500">*</span></label>
                                        <input name="NIP" id="NIP"
                                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                            placeholder="" />

                                        <label for="Nama_Dosen"
                                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal">
                                            Nama Dosen<span class="text-red-500">*</span></label>
                                        <input name="Nama_Dosen" id="Nama_Dosen"
                                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                            placeholder="" />

                                        <div class="flex items-center justify-start w-full">
                                            <button type="submit"
                                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-300 bg-green-400 rounded text-white px-8 py-2 text-sm">Submit</button>
                                            <button type="button"
                                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                                                onclick="modalHandler(false)">Cancel</button>
                                        </div>
                                    </form>

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
                        </div>
                    </div>
                </main>
        </div>
    </div>


    <script type="text/javascript">
        let isAdmin = {{ $user->isAdmin() ? 'true' : 'false' }};
        let modal = document.getElementById("dosen-modal");

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Check if the logged-in user is an admin

            $('#dosen').DataTable({
                language: {
                    search: '',
                    lengthMenu: '_MENU_',
                },
                processing: true,
                serverSide: true,
                ajax: "{{ url('dosen') }}",
                columns: [{
                        data: 'NIP',
                        name: 'NIP'
                    },
                    {
                        data: 'Nama_Dosen',
                        name: 'Nama_Dosen'
                    },
                    @if(isset($isAdmin) && $isAdmin)
                    { 
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                    @endif
                ],
                order: [
                    [0, 'desc']
                ],
                dom: '<"flex mb-3 mt-3 items-center"l<"flex-shrink-0 mr-3 ml-3 items-center"f>>rtip',
                initComplete: function() {
                    $('.dataTables_filter input[type="search"]').addClass('custom-search');

                    // Append "Tambah data" button only if the user is an admin
                    if (isAdmin) {
                        var addButton = $(
                            `<div class="flex justify-between items-center">
                        <x-add-button type="submit" class="ml-auto" id="button">
                            Tambah data
                        </x-add-button>
                    </div>`
                        ).addClass('ml-auto');
                        $('#dosen_wrapper').find('.flex.mb-3').append(addButton);
                    }
                }
            });
            $('.dataTables_length select').addClass('px-2 py-1 w-16 rounded');
        });


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
            $('#id_dosen').val("");
            $('#NIP').val("");
            $('#Nama_Dosen').val("");
            document.getElementById('dosen-modal').style.display = 'none';
            document.body.style.overflow = 'auto'; // Allow scrolling
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
            document.getElementById('dosen-modal').style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        // Hide the modal when the page is first rendered
        modal.style.display = "none";

        // Tambahkan pemanggilan modalHandler(false) pada saat halaman ini dimuat
        document.addEventListener("DOMContentLoaded", function() {
            modalHandler(false);
        });

        function add() {
            modalHandler(true);
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('dosen.edit') }}",
                data: {
                    id_dosen: id
                },
                dataType: 'json',
                success: function(res) {
                    // Show the modal using your custom modalHandler
                    console.log(res);
                    // Set the data in the form fields
                    modalHandler(true);
                    $('#id_dosen').val(res.id_dosen);
                    $('#NIP').val(res.NIP);
                    $('#Nama_Dosen').val(res.Nama_Dosen);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        function deleteFunc(id) {
            Swal.fire({
                title: 'Hapus Dosen?',
                text: 'Apakah Yakin Menghapus Dosen ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed deletion
                    $.ajax({
                        type: "POST",
                        url: "{{ route('dosen.delete') }}",
                        data: {
                            id_dosen: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            var oTable = $('#dosen').dataTable();
                            oTable.fnDraw(false);
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Dosen Berhasil dihapus',
                                icon: 'success',
                                showConfirmButton: false // Hide the confirm button
                            });
                        }
                    });
                }
            });
        }

        $('#DosenForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('dosen.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    modalHandler(false);
                    console.log(formData); // Add this line to log the form data
                    var oTable = $('#dosen').dataTable();
                    oTable.fnDraw(false);
                    console.log(data);
                    Swal.fire({
                                title: 'Berhasil',
                                text: 'Dosen Berhasil di Submit',
                                icon: 'success',
                                showConfirmButton: false // Hide the confirm button
                    });
                },
                error: function(data) {
                    console.log("Submit button clicked");
                    console.log(data);
                }
            });
        });
    </script>
</x-app-layout>