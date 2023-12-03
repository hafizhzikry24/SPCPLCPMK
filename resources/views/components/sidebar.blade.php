 <!-- Sidebar -->
    <div class="flex w-1/6 bg-[#F6F1F1] border-r fixed border-black overflow-y-auto h-screen ">
        <ul class=" py-2 px-1 mx-1 overflow-y-auto ">
            <li class="my-8 ">
                <a href="{{ route('mahasiswa') }}" class="inline-flex flex items-center">
                    <x-assets.user-group class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">Mahasiswa</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('matakuliah') }}" class="inline-flex flex items-center">
                    <x-assets.book-open class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl flex">Mata Kuliah</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('cpl') }}" class="inline-flex flex items-center">
                    <x-assets.document-text class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">CPL</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('cpmk') }}" class="inline-flex flex items-center">
                    <x-assets.document class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">CPMK</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('dosen') }}" class="inline-flex flex items-center">
                    <x-assets.user class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">Data Dosen</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('nilai') }}" class="inline-flex flex items-center">
                    <x-assets.clipboard-check class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">Nilai Matakuliah</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('rekap') }}" class="inline-flex flex items-center">
                    <x-assets.document-duplicate class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">Rekap CPL</span>
                </a>
            </li>
            <li class="my-8 ">
                <a href="{{ route('rapor') }}" class="inline-flex flex items-center">
                    <x-assets.document-report class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">Rapor Jurusan</span>
                </a>
            </li>
            <li class="my-32 ">
                <a href="{{ route('bukupanduan') }}" class="inline-flex flex items-center">
                    <x-assets.briefcase class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">Buku Panduan</span>
                </a>
            </li>
        </ul>
    </div>

