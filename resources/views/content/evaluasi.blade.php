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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="grid grid-cols-12">

        <x-sidebar />
        <div class="col-span-2">
        </div>

        <div class="col-span-10 overflow-y-auto mt-4">
            <main class="flex w-full justify-center pl-5 pr-5 pb-5">
                <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">
                    <div class="p-4 sm:p-8 bg-[#C4EED0] shadow sm:rounded-lg mb-4">
                        <div class="max-w-7x1">
                            <a class="text-2xl font-bold ml-2 mb-4 mt-4 "> Keterangan </a>
                            <table class="min-w-full mt-4">
                                <tbody>
                                    <tr>
                                        <td class="px-2 py-1 whitespace-no-wrap">Kode Mata Kuliah</td>
                                        <td class="px-2 py-1 whitespace-no-wrap" id="kode_MK">{{ $matakuliah_info->kode_MK }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-1 whitespace-no-wrap">Nama Mata Kuliah</td>
                                        <td class="px-2 py-1 whitespace-no-wrap">
                                            {{ $matakuliah_info->Mata_Kuliah }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-1 whitespace-no-wrap">Semester</td>
                                        <td class="px-2 py-1 whitespace-no-wrap"id="semester">
                                            {{ $matakuliah_info->semester }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-1 whitespace-no-wrap">Tahun Akademik</td>
                                        <td class="px-2 py-1 whitespace-no-wrap" id="tahun_akademik">
                                            {{ $matakuliah_info->tahun_akademik }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <body class="h-screen bg-gray-100 ">
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
            </main>
        </div>
    </div>
    <div class="overflow-y-auto py-12 bg-gray-100 bg-opacity-60 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
        id="modal-evaluasi">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="absolute mt-24 py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400  h-full ">
                <div class=" flex justify-start text-gray-600 mb-3"></div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tabel Evaluasi </h1>
                <form action="javascript:void(0)" id="EvaluasiForm" name="EvaluasiForm" class="form-horizontal" method="POST">
                    <input type="hidden"  name="id_evaluasi" id="id_evaluasi" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="XXXX" />

                    {{-- <label for="id_eval_matkul" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Kode Mata Kuliah<span class="text-red-500">*</span></label> --}}
                    <input type="hidden" name="id_eval_matkul" id="id_eval_matkul" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="PTSKXXXX" />

                    {{-- <label for="tahun_akademik_eval" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Tahun Akademik<span class="text-red-500">*</span></label> --}}
                    <input type="hidden" name="tahun_akademik_eval" id="tahun_akademik_eval" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="2023-2024" />

                    {{-- <label for="semester_eval" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Semester<span class="text-red-500">*</span></label> --}}
                    <input type="hidden" name="semester_eval" id="semester_eval" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="Ganjil" />
                    <label for="cpmk" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">
                        CPMK<span class="text-red-500">*</span>
                      </label>
                      <select name="cpmk" id="cpmk" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                          <?php 
                            // Assuming $matakuliah_info is already defined
                            $cpmkData = $matakuliah_info->cpmk;

                            // Convert sentences to an array
                            $cpmkList = explode('. ', $cpmkData);

                            // Remove empty elements from the array
                            $cpmkList = array_filter($cpmkList);
                            foreach ($cpmkList as $cpmk): ?>
                              <option value="<?php echo htmlspecialchars($cpmk); ?>"><?php echo htmlspecialchars($cpmk); ?></option>
                          <?php endforeach; ?>
                      </select>
          

                    <label for="rerata" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Rerata<span class="text-red-500">*</span></label>
                    <input name="rerata" id="rerata" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="2.5" />

                    <label for="batas_rerata" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Batas Rerata<span class="text-red-500">*</span></label>
                    <input name="batas_rerata" id="batas_rerata" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="2.5" />

                    <label for="ambang" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Ambang<span class="text-red-500">*</span></label>
                    <input name="ambang" id="ambang" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="80" />

                    <label for="batas_ambang" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Batas Ambang<span class="text-red-500">*</span></label>
                    <input name="batas_ambang" id="batas_ambang" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="80" />

                    <label for="analisis_pelaksanaan" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Analisis Pelaksanaan<span class="text-red-500">*</span></label>
                    <textarea name="analisis_pelaksanaan" id="analisis_pelaksanaan" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="80" ></textarea>
                      
                    <label for="rencana_perbaikan" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Rencana Perbaikan<span class="text-red-500">*</span></label>
                    <textarea name="rencana_perbaikan" id="rencana_perbaikan" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-green-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="80" ></textarea>

                    <div class="flex items-center justify-start w-full">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-300 bg-green-400 rounded text-white px-8 py-2 text-sm">Submit</button>
                        <button type="button" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" 
                        onclick="modalHandler(false)">Cancel</button>
                    </div>
                </form>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" 
                onclick="modalHandler()" aria-label="close modal" role="button">
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
    let modal = document.getElementById("modal-evaluasi");

    function modalHandler(val) {
            if (val) {
                // Get the data from the table cells
                var kodeMK = document.getElementById('kode_MK').textContent;
                var semester = document.getElementById('semester').textContent;
                var tahunAkademik = document.getElementById('tahun_akademik').textContent;

                // Set the values of the input fields
                document.getElementById('id_eval_matkul').value = kodeMK.trim();
                document.getElementById('semester_eval').value = semester.trim();
                document.getElementById('tahun_akademik_eval').value = tahunAkademik.trim();
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
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

    function fadeOut(el) {
        console.log("eval fade out masuk");
        el.style.opacity = 1;
        (function fade() {
            if ((el.style.opacity -= 0.1) < 0) {
                el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
            $('#id_evaluasi').val("");
            $('#id_eval_matkul').val("");
            $('#tahun_akademik_eval').val("");
            $('#semester_eval').val("");
            $('#cpmk').val("");
            $('#rerata').val("");
            $('#batas_rerata').val("");
            $('#ambang').val("");
            $('#batas_ambang').val("");
            $('#analisis_pelaksanaan').val("");
            $('#rencana_perbaikan').val("");
        document.getElementById('modal-evaluasi').style.display = 'none';
        document.body.style.overflow = 'auto'; // Allow scrolling
    }

    function fadeIn(el, display) {
        console.log("eval fade in masuk");
        el.style.opacity = 0;
        el.style.display = display || "flex";
        (function fade() {
            let val = parseFloat(el.style.opacity);
            if (!((val += 0.2) > 1)) {
                 el.style.opacity = val;
                requestAnimationFrame(fade);
                }
            })();
        document.getElementById('modal-evaluasi').style.display = 'block';
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }


    // Function to handle edit button click
    function editFunc(id) {
        $.ajax({
            type: "POST",
            url: "{{ route('evaluasi.edit') }}",
            data: {
                id_evaluasi: id
            },
            dataType: 'json',
            success: function(res) {
                // Show the corresponding modal
                modalHandler(true);
                // Set the data in the form fields
                $('#id_evaluasi').val(res.id_evaluasi);
                $('#id_eval_matkul').val(res.id_eval_matkul);
                $('#tahun_akademik_eval').val(res.tahun_akademik_eval);
                $('#semester_eval').val(res.semester_eval);
                $('#cpmk').val(res.cpmk);
                $('#rerata').val(res.rerata);
                $('#batas_rerata').val(res.batas_rerata);
                $('#ambang').val(res.ambang);
                $('#batas_ambang').val(res.batas_ambang);
                $('#analisis_pelaksanaan').val(res.analisis_pelaksanaan);
                $('#rencana_perbaikan').val(res.rencana_perbaikan);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

    // Function to handle delete button click
    function deleteFunc(id) {
        Swal.fire({
            title: 'Hapus Evaluasi?',
            text: 'Apakah Yakin Menghapus Evaluasi ini?',
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
                    url: "{{ route('evaluasi.delete') }}",
                    data: {
                        id_evaluasi: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#evaluasi').dataTable();
                        oTable.fnDraw(false);
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Evaluasi Berhasil dihapus',
                            icon: 'success',
                            showConfirmButton: false // Hide the confirm button
                        });
                    }
                });
            }
        });
    }

    // Function to handle form submission
    $('#EvaluasiForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log('ID Evaluasi:', formData.get('id_evaluasi'));
        $.ajax({
            type: 'POST',
            url: "{{ route('evaluasi.store') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {    
                // Hide the modal after successful submission
                modalHandler(false);
                console.log(formData); 
                var oTable = $('#evaluasi').dataTable();
                oTable.fnDraw(false);
                console.log(data);
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Evaluasi Berhasil di Tambahkan',
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
                        data: 'rencana_perbaikan',
                        name: 'rencana_perbaikan',
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
                        var addbutton = $(
                            `<div class="flex justify-between items-center">
                        <x-add-button type="submit" class="ml-auto" id="button">
                           Tambah Evaluasi
                        </x-add-button>
                    </div>`
                        ).addClass('ml-auto');
                        $('#evaluasi_wrapper').find('.flex.mb-3').append(addbutton);
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