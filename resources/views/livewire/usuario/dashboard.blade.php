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

        <div class="p-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="lg:col-span-3 space-y-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-gray-500">Remates activos</div>
                            <div class="text-3xl font-bold">12</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-gray-500">Pollas disponibles</div>
                            <div class="text-3xl font-bold">{{ count($pollas_abiertas) }}</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-gray-500">Gacetas disponibles</div>
                            <div class="text-3xl font-bold">3</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-gray-500">Saldo monedero</div>
                            <div class="text-3xl font-bold text-[#D4A017]">
                                ${{ number_format($usuario->monedero, 0) }}
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded shadow p-6">
                        <h2 class="text-xl font-bold mb-4">
                            🐎 Remates disponibles
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($remates_disponibles as $remate)
                                <div class="border rounded p-4 hover:shadow-lg transition">
                                    <h3 class="font-bold">
                                        {{ $remate->hipodromo }} ({{ $remate->fecha }})
                                    </h3>
                                    <p class="mt-2">
                                        Carrera:
                                        <b>{{ $remate->carrera }}</b>
                                    </p>
                                    <button class="mt-3 bg-[#D4A017] text-white px-4 py-2 rounded w-full">
                                        Ver remate
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white rounded shadow p-6">
                        <h2 class="text-xl font-bold mb-6">
                            🎯 Pollas Hípicas
                        </h2>
                        <div class="flex border-b mb-6">
                            <button id="btn-disponibles" onclick="mostrarTab('disponibles')"
                                class="tab-btn tab-activo px-4 py-2 font-semibold border-b-2">
                                Pollas Disponibles
                            </button>
                            <button id="btn-inscritas" onclick="mostrarTab('inscritas')"
                                class="tab-btn tab-inactivo px-4 py-2 font-semibold border-b-2">
                                Mis Pollas Inscritas
                            </button>
                        </div>

                        <div id="tab-disponibles">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($pollas_abiertas as $datos)
                                    <div class="border rounded-lg p-5 hover:shadow-lg transition">
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 class="font-bold text-lg">
                                                {{ $datos->hipodromo }}
                                            </h3>
                                            <span class="text-sm text-gray-500">
                                                {{ $datos->fecha }}
                                            </span>
                                        </div>
                                        <div class="text-gray-500 text-sm">
                                            Inscripción
                                        </div>
                                        <div class="text-2xl font-bold text-[#D4A017] mb-3">
                                            ${{ $datos->inscripcion }}
                                        </div>
                                        <button class="w-full bg-[#0F3D2E] text-white py-2 rounded hover:bg-green-900">
                                            Inscribirse
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="tab-inscritas" class="hidden">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($pollas_inscritas as $datos)
                                    @if ($datos->estatus_polla == 2)
                                        <div class="border rounded-lg p-5 bg-green-50 hover:shadow-lg transition">
                                            <div class="flex justify-between items-center mb-2">
                                                <h3 class="font-bold text-lg">
                                                    {{ $datos->hipodromo }}
                                                </h3>
                                                <span class="text-sm text-gray-500">
                                                    {{ $datos->fecha }}
                                                </span>
                                            </div>
                                            <div class="text-gray-500 text-sm">
                                                Inscripción
                                            </div>
                                            <div class="text-2xl font-bold text-[#D4A017] mb-3">
                                                ${{ $datos->inscripcion }}
                                            </div>
                                            <div class="flex gap-2">
                                                <button
                                                    class="flex-1 bg-[#0F3D2E] text-white py-2 rounded hover:bg-green-900">
                                                    Modificar Marcas
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        @if ($datos->estatus_polla == 3 or $datos->estatus_polla == 4)
                                            <div class="border rounded-lg p-5 bg-green-50 hover:shadow-lg transition">
                                                <div class="flex justify-between items-center mb-2">
                                                    <h3 class="font-bold text-lg">
                                                        {{ $datos->hipodromo }}
                                                    </h3>
                                                    <span class="text-sm text-gray-500">
                                                        {{ $datos->fecha }}
                                                    </span>
                                                </div>
                                                <div class="text-gray-500 text-sm">
                                                    Inscripción
                                                </div>
                                                <div class="text-2xl font-bold text-[#D4A017] mb-3">
                                                    ${{ $datos->inscripcion }}
                                                </div>
                                                <div class="flex gap-2">
                                                    <button
                                                        class="flex-1 bg-[#0F3D2E] text-white py-2 rounded hover:bg-green-900">
                                                        Ver Tabla
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PUBLICIDAD --}}
                <div class="lg:col-span-1">
                    <div class="space-y-6 lg:sticky lg:top-6">
                        <div class="bg-white rounded shadow h-40 flex items-center justify-center border">
                            <span class="text-gray-500 font-semibold">
                                Publicidad
                            </span>
                        </div>
                        <div class="bg-white rounded shadow h-40 flex items-center justify-center border">
                            <span class="text-gray-500 font-semibold">
                                Publicidad
                            </span>
                        </div>
                        <div class="bg-white rounded shadow h-40 flex items-center justify-center border">
                            <span class="text-gray-500 font-semibold">
                                Publicidad
                            </span>
                        </div>
                        <div class="bg-white rounded shadow h-40 flex items-center justify-center border">
                            <span class="text-gray-500 font-semibold">
                                Publicidad
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.menu-usuario>
</div>
<script>
    function mostrarTab(tab) {
        // ocultar contenido
        document.getElementById('tab-disponibles').classList.add('hidden')
        document.getElementById('tab-inscritas').classList.add('hidden')

        // mostrar seleccionado
        document.getElementById('tab-' + tab).classList.remove('hidden')

        // reset botones
        document.getElementById('btn-disponibles').classList.remove('tab-activo')
        document.getElementById('btn-inscritas').classList.remove('tab-activo')

        document.getElementById('btn-disponibles').classList.add('tab-inactivo')
        document.getElementById('btn-inscritas').classList.add('tab-inactivo')

        // activar seleccionado
        document.getElementById('btn-' + tab).classList.remove('tab-inactivo')
        document.getElementById('btn-' + tab).classList.add('tab-activo')
    }
</script>
