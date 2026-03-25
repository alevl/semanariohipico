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
        <div class="p-4 overflow-y-auto">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-[#0F3D2E]">
                    Descargar Gacetas
                </h2>
                <p class="text-gray-500">
                    Consulta y descarga los programas oficiales de carreras
                </p>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($gacetas as $dato)
                    <div class="bg-white rounded-xl shadow p-5">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-lg">
                                {{ $dato->hipodromo }}
                            </h3>
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                                Disponible
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm">
                            Fecha
                        </p>
                        <p class="font-semibold mb-4">
                            {{ $dato->fecha }}
                        </p>
                        <div class="flex gap-2">
                            <a href="{{ asset('storage/' . $dato->ruta) }}" target="new"
                                class="flex-1 bg-[#D4A017] text-white py-2 rounded hover:bg-yellow-500 text-center">Descargar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-layouts.menu-usuario>
</div>
