<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#5AB3F0] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#5AB3F0]-600 active:bg-[#5AB3F0]-700 focus:outline-none focus:ring-2 focus:ring-[#5AB3F0]-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
