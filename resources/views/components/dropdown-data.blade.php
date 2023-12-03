<x-dropdown>
    <x-slot name="trigger">
        <button class="flex items-center justify-between bg-white px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <span class="text-gray-900">10</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M7.293 7.707a1 1 0 0 1 1.414 0L10 9.586l1.293-1.293a1 1 0 1 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </x-slot>
    <x-slot name="content">
        <button class="w-full text-right px-4 py-2 text-gray-700 hover:bg-gray-100">10</button>
        <button class="w-full text-right px-4 py-2 text-gray-700 hover:bg-gray-100">25</button>
        <button class="w-full text-right px-4 py-2 text-gray-700 hover:bg-gray-100">50</button>
    </x-slot>
</x-dropdown>
