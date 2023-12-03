<x-app-layout>

    {{-- <div class="grid grid-cols-12">
        <div class="col-span-9 overflow-y-auto bg-white">
            <main class="w-full bg-white">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg mt-24">
                        <h1 class="p-6 text-3xl text-black font-bold">Welcome to Dashboard</h1>
                        <div class="p-6 text-black">
                            <p class="text-lg">{{ __("Selamat datang di sistem penilaian CPL & CPMK Teknik Komputer") }}</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div> --}}
    <div class="grid grid-cols-12">
        <!-- Sidebar -->
        <x-sidebar />
        <div class="col-span-2">
        </div>

        <!-- Main Content -->
        <div class="col-span-10 overflow-y-auto bg-white">
            <main class="w-full ">
                <div class="max-w-7xl mx-auto sm:px-4 lg:px-4 bg-gray-100 sm:rounded-lg">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg mt-8">
                        <h1 class="p-6 text-3xl text-black font-bold">Welcome to Dashboard</h1>
                        <div class="p-6 text-black">
                            <p class="text-lg">{{ __("Selamat datang di sistem penilaian CPL & CPMK Teknik Komputer") }}</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-app-layout>
