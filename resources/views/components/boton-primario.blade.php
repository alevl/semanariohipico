<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center uppercase justify-center px-4 py-2 border border border-primary rounded font-semibold text-xs tracking-widest hover:text-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 bg-[#0F3D2E] text-white']) }}>
    {{ $slot }}
</button>
