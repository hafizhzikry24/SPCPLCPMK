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
                                @for ($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}">Semester
                                        {{ $i }}
                                    </option>
                                @endfor
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </form>
                    </div>
                    <div>
                        {!! $barChartCplAll->container() !!}
                        <script src="{{ $barChartCplAll->cdn() }}"></script>
                        {{ $barChartCplAll->script() }}
                    </div>
                </div>
        </div>
    </div>
    </main>
    </div>
    </div>

    <script>
        function changeSemester() {
            var selectedSemester = document.getElementById("selectedSemester").value;
            console.log("Selected Semester:", selectedSemester);
            var csrfToken = document.getElementsByName("_token")[0].value;

            // Change the form action dynamically using the route helper
            document.getElementById("semesterForm").action =
                "{{ route('semesterChart', ['selectedSemester' => $selectedSemester]) }}/" +
                "?_token=" +
                csrfToken;

            // Submit the form
            document.getElementById("semesterForm").submit();
        }
    </script>
</x-app-layout>
