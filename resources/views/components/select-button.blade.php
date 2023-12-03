<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#61677A] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#61677A]-600 active:bg-[#61677A]-700 focus:outline-none focus:ring-2 focus:ring-[#61677A]-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
