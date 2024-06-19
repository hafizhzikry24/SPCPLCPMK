<!-- Sidebar -->
<div class="flex w-1/6 bg-[#FFFFFF] border-r fixed overflow-y-auto h-screen ">
    <ul class=" py-2 px-1 mx-1 overflow-y-auto w-full ">
        {{-- <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'mahasiswa') bg-[#DFF3FF] @endif">
            <a href="{{ route('mahasiswa') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
        <x-assets.user-group class="w-4 h-4 mr-1" />
        <span class="ml-2 text-1xl">Mahasiswa</span>
        </a>
        </li> --}}
        {{-- yang diubah --}}
        {{-- sampe sini --}}
        <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'matakuliah') bg-[#DFF3FF] @endif">
            <a href="{{ route('matakuliah') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
                <x-assets.book-open class="w-4 h-4 mr-1" />
                <span class="ml-2 text-1xl flex">Mata Kuliah</span>
            </a>
        </li>
        <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'cpl') bg-[#DFF3FF] @endif ">
            <a href="{{ route('cpl') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
                <x-assets.document-text class="w-4 h-4 mr-1" />
                <span class="ml-2 text-1xl ">CPL</span>
            </a>
        </li>
        <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'cpmk') bg-[#DFF3FF] @endif ">
            <a href="{{ route('cpmk') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
                <x-assets.document class="w-4 h-4 mr-1" />
                <span class="ml-2 text-1xl">CPMK</span>
            </a>
        </li>
        <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'dosen') bg-[#DFF3FF] @endif ">
            <a href="{{ route('dosen') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
                <x-assets.user class="w-4 h-4 mr-1" />
                <span class="ml-2 text-1xl">Data Dosen</span>
            </a>
        </li>
        <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'rekap') bg-[#DFF3FF] @endif ">
            <a href="{{ route('rekap') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
                <x-assets.document-duplicate class="w-4 h-4 mr-1" />
                <span class="ml-2 text-1xl">Rekap CPL</span>
            </a>
        </li>
        <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF]  @if (Request::route()->getName() === 'bukupanduan') bg-[#DFF3FF] @endif ">
            <a href="https://drive.google.com/drive/u/0/folders/1vKBEsr2AyStjquE9XB0Sv300uhE6z18i" target="_blank"
                class="my-3 mx-3 inline-flex items-center text-gray-400">
                <x-assets.briefcase class="w-4 h-4 mr-1" />
                <span class="ml-2 text-1xl">Buku Panduan</span>
            </a>
        </li>
        @auth
        @if (auth()->user()->isAdmin())
            <li class="my-8 mx-3 sm:rounded-xl hover:bg-[#DFF3FF] @if (Request::route()->getName() === 'admin') bg-[#DFF3FF] @endif">
                <a href="{{ route('admin') }}" class="my-3 mx-3 inline-flex items-center text-gray-500 w-full">
                    <x-assets.history class="w-4 h-4 mr-1" />
                    <span class="ml-2 text-1xl">History</span>
                </a>
            </li>
        @endif
    @endauth
    </ul>
</div>
