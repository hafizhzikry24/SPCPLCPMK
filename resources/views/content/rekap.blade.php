<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4 ">

            <body>
                <main class="flex w-full justify-center h-screen pl-5 pr-5 pb-5">
                    <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5  overflow-y-auto">
                        <a class="text-3xl font-bold"> Grafik Rekap CPL </a>
                        <div class="mt-2 flex">
                            <form id="semesterForm" method="POST"
                                action="{{ route('semesterChart', ['selectedSemester' => $selectedSemester]) }}">
                                @csrf
                                <select name="selectedSemester" id="selectedSemester" onchange="changeSemester()"
                                    style="min-width: 130px;" class="px-2 py-1 w-16 rounded mr-3">
                                    <option value="999">Semua</option>
                                    @foreach ($uniqueSemesters as $data)
                                        <option value="{{ $data }}"
                                            @if ($selectedSemester == $data) selected @endif>{{ $data }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                            <form id="tahunAkademikForm" method="POST"
                                action="{{ route('semesterChart', ['selectedTahunAkademik' => $selectedTahunAkademik, 'selectedSemester' => $selectedSemester]) }}">
                                @csrf
                                <select name="selectedTahunAkademik" id="selectedTahunAkademik"
                                    onchange="changeTahunAkademik()" style="min-width: 130px;"
                                    class="px-2 py-1 w-16 rounded">
                                    <option value="999">Semua</option>
                                    @foreach ($uniqueTahunAkademik as $data)
                                        <option value="{{ $data }}"
                                            @if ($selectedTahunAkademik == $data) selected @endif>{{ $data }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div id="barChartCPLAllContainer">
                            <div id="barChartCplAll">
                                {!! $barChartCplAll->container() !!}
                                <script src="{{ $barChartCplAll->cdn() }}"></script>
                                {{ $barChartCplAll->script() }}
                            </div>
                        </div>
                    </div>
                </main>
            </body>
        </div>
    </div>

    <script>
        function changeSemester() {
            event.preventDefault();
            var selectedTahunAkademik = document.getElementById("selectedTahunAkademik").value;
            var selectedSemester = document.getElementById("selectedSemester").value;
            console.log("Selected Tahun Akademik:", selectedTahunAkademik);
            console.log("Selected Semester:", selectedSemester);
            var csrfToken = document.getElementsByName("_token")[0].value;

            var url = "{{ route('semesterChart') }}/?selectedTahunAkademik=" +
                selectedTahunAkademik + "&selectedSemester=" + selectedSemester + "&_token=" + csrfToken;

            // Set the form action directly
            document.getElementById("semesterForm").action = url;
            // Submit the form
            document.getElementById("semesterForm").submit();
        }

        function changeTahunAkademik() {
            event.preventDefault();
            var selectedTahunAkademik = document.getElementById("selectedTahunAkademik").value;
            var selectedSemester = document.getElementById("selectedSemester").value;
            console.log("Selected Tahun Akademik:", selectedTahunAkademik);
            console.log("Selected Semester:", selectedSemester);
            var csrfToken = document.getElementsByName("_token")[0].value;

            var url = "{{ route('semesterChart') }}/?selectedTahunAkademik=" +
                selectedTahunAkademik + "&selectedSemester=" + selectedSemester + "&_token=" + csrfToken;

            // Set the form action directly
            document.getElementById("tahunAkademikForm").action = url;
            // Submit the form
            document.getElementById("tahunAkademikForm").submit();
        }
    </script>
</x-app-layout>
