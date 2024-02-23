<x-app-layout>
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>


        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto mt-4">
            <main class="flex w-full h-full justify-center pl-5 pr-5 pb-5">
                <div class="w-full bg-white shadow-md rounded-md overflow-hidden border pl-5 pr-5 pt-5">
                    <a class="text-3xl font-bold"> Grafik Rekap CPL </a>
                    <div class="mt-2 flex justify-between">
                        <form id="semesterForm" method="POST"
                            action="{{ route('semesterChart', ['selectedSemester' => $selectedSemester]) }}">
                            @csrf
                            <select name="selectedSemester" id="selectedSemester" onchange="changeSemester()"
                                style="min-width: 130px;" class="px-2 py-1 w-16 rounded">
                                <option value="999">Semua</option>
                                @php
                                $semesterData = explode(',', $nilai_mahasiswa->semester);
                            @endphp
                            
                            @foreach ($semesterData as $semester)
                                <option value="{{ $semester }}" @if ($selectedSemester == $semester) selected @endif>
                                    Semester {{ $semester }}
                                </option>
                            @endforeach
                            
                                {{-- <option value="999">Semua</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option> --}}
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
        </div>
    </div>
    </main>
</div>

    <script>
        function changeSemester() {
            var selectedSemester = document.getElementById("selectedSemester").value;
            console.log("Selected Semester:", selectedSemester);
            var csrfToken = document.getElementsByName("_token")[0].value;

            var url = "{{ route('semesterChart') }}/" + selectedSemester + "?_token=" + csrfToken;
        // Set the form action directly
        document.getElementById("semesterForm").action = url;
        // Submit the form
        document.getElementById("semesterForm").submit();
        }
        </script>
</x-app-layout>
