<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>
        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4 ">
            <div class="flex justify-between h-16 border-b border-black">
                <a class="text-2xl font-bold ml-8 mb-2 mt-1"> Tabel Mahasiswa Teknik Komputer </a>
                <a class="text-2xl font-bold ml-8 mb-2 mt-1 text-right mr-8"> Universitas Diponegoro </a>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
                <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
                <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            </div>
            <main class="w-full h-screen bg-[#F6F1F1]">
                <div class="w-full overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-6 text-gray-900 justify-between">
                        <x-add-button type="submit" class="ml-6" id="button">
                            Tambah data
                        </x-add-button>
                        <div class="py-12  bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
                            id="mahasiswa-modal">
                            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                                <div
                                    class="relative mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                    <div class="w-full flex justify-start text-gray-600 mb-3">
                                    </div>
                                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel
                                        Mahasiswa Teknik Komputer </h1>
                                    <form action="javascript:void(0)" id="MahasiswaForm" name="MahasiswaForm"
                                        class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" />
                                        <label for="nim"
                                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nim</label>
                                        <input name="nim" id="nim"
                                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                            placeholder="21120120120034" />
                                        <label for="nama"
                                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nama</label>
                                        <input name="nama" id="nama"
                                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                            placeholder="Daffa" />
                                        <label for="semester"
                                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Semester</label>
                                        <input name="semester" id="semester"
                                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                            placeholder="7" />
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
                        </div>
                    </div>`
                </div>

                <!-- Tabel Data -->
                <table class="table table-bordered" id="mahasiswa">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Semester</th>
                            <th>Action</th>
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



    <script type="text/javascript">
        let modal = document.getElementById("mahasiswa-modal");

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
            $('#id').val("");
            $('#nim').val("");
            $('#nama').val("");
            $('#semester').val("");
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

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#mahasiswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('mahasiswa') }}",
                columns: [{
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'semester',
                        name: 'semester'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'desc']
                ]
            });
        });

        function add() {
            modalHandler(true);
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/mahasiswa/edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    // Show the modal using your custom modalHandler
                    console.log(res);
                    // Set the data in the form fields
                    modalHandler(true);
                    $('#id').val(res.id);
                    $('#nim').val(res.nim);
                    $('#nama').val(res.nama);
                    $('#semester').val(res.semester);
                }
            });
        }

        function deleteFunc(id) {
            if (confirm("Delete Record?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('/mahasiswa/delete') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#mahasiswa').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        }

        $('#MahasiswaForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/mahasiswa/store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    modalHandler(false);
                    var oTable = $('#mahasiswa').dataTable();
                    oTable.fnDraw(false);
                    console.log(data);
                },
                error: function(data) {
                    console.log("Submit button clicked");
                    console.log(data);
                }
            });
        });
    </script>
</x-app-layout>
