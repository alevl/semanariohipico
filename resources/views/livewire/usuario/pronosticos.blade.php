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
        {{-- CONTENIDO --}}
        <div class="p-4 overflow-y-auto">
            <div class="p-2">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-[#0F3D2E]">
                        Pronósticos del Día
                    </h2>

                    <p class="text-gray-500">
                        Los 3 favoritos por carrera según análisis
                    </p>
                </div>
                <div class="space-y-8">
                    @foreach ($hipodromos as $dato)
                        <div class="bg-white rounded-xl shadow">
                            <div class="bg-[#0F3D2E] text-white p-4 rounded-t-xl">
                                <h3 class="text-lg font-bold">
                                    {{ $dato->hipodromo }}
                                </h3>
                            </div>
                            <div class="p-4 overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="border-b">
                                            <th class="text-left py-3">Carrera</th>
                                            <th class="text-center">Primera Marca</th>
                                            <th class="text-center">Segunda Marca</th>
                                            <th class="text-center">Tercera Marca</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pronosticos as $data)
                                            @if ($dato->hipodromo_id == $data->hipodromo_id)
                                                <tr class="border-b hover:bg-gray-50">
                                                    <td class="py-3 font-semibold">{{ $data->carrera }}</td>
                                                    <td class="text-center">
                                                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded">
                                                            {{ $data->primera_marca }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="bg-gray-100 px-3 py-1 rounded">
                                                            {{ $data->segunda_marca }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="bg-gray-100 px-3 py-1 rounded">
                                                            {{ $data->segunda_marca }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-layouts.menu-usuario>
</div>
