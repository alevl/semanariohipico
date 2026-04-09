<div>
    <x-layouts.menu-usuario>
        <div class="bg-white shadow p-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <button id="menuBtn" class="lg:hidden text-2xl">
                    ☰
                </button>
                <h1 class="font-bold text-[#0F3D2E]">
                    Semanario Hípico
                </h1>
            </div>
            <div class="flex items-center gap-6">
                <div class="bg-[#D4A017] text-white px-3 py-1 rounded font-semibold">
                    {{ "💰 $" . number_format($usuario->monedero, 0) }}
                </div>
                <div>
                    {{ $usuario->name }}
                </div>
            </div>
        </div>
        <div class="p-6 space-y-6">
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-[#0F3D2E]">
                        Carreras en Vivo
                    </h2>
                    <p class="text-gray-500">
                        Sigue todas las carreras en tiempo real
                    </p>
                </div>
                <div class="grid gap-6 lg:grid-cols-2 xl:grid-cols-3">
                    @foreach ($transmisiones as $dato)
                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <div class="relative">
                                <div class="bg-black h-56 flex items-center justify-center text-white">
                                    <iframe class="w-full flex-1" src="{{ $dato->ruta }}"></iframe>
                                </div>
                                <div class="absolute top-3 left-3 bg-red-600 text-white text-xs px-2 py-1 rounded">
                                    🔴 EN VIVO
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg">
                                    {{ $dato->canal }}
                                </h3>
                                <p class="text-sm mt-1">
                                    Fecha: <b>{{ $dato->fecha }}</b>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-layouts.menu-usuario>
</div>
