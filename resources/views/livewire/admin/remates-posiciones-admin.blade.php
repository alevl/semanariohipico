<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
            <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Tabla</h1>
                <span class="px-4 py-2 text-sm">
                </span>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-gray-500">
                    {{ $polla->hipodromo . ' (' . $polla->fecha . ')' }}
                </span>
            </div>
            <div class="bg-white rounded shadow p-6 flex flex-col md:flex-row md:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-bold text-[#0F3D2E]">
                        {{ $informacion_polla->hipodromo }}
                    </h2>
                    <p class="text-gray-500">
                        {{ $informacion_polla->fecha }}
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-gray-500">
                        Premio acumulado
                    </p>
                    <div class="text-3xl font-bold text-[#D4A017]">
                        {{ "$" . number_format($informacion_polla->monto_pagar, 0) }}
                    </div>
                </div>
            </div>
            <div wire:poll.1000ms class="bg-white shadow rounded p-6 text-center">
                <h2 class="text-lg font-bold mb-2 text-[#0F3D2E]">
                    ⏳ Cierre del remate
                </h2>
                @if ($remainingTime > 0)
                    @php
                        $days = floor($remainingTime / 86400);
                        $hours = floor(($remainingTime % 86400) / 3600);
                        $minutes = floor(($remainingTime % 3600) / 60);
                        $seconds = $remainingTime % 60;
                    @endphp

                    <div class="text-2xl font-bold text-green-600">

                        @if ($days > 0)
                            {{ $days }}d {{ $hours }}h {{ $minutes }}m {{ $seconds }}s
                        @elseif($hours > 0)
                            {{ $hours }}h {{ $minutes }}m {{ $seconds }}s
                        @else
                            {{ $minutes }}m {{ $seconds }}s
                        @endif
                    </div>
                @else
                    <div class="text-xl font-bold text-red-600">
                        ⛔ Remate cerrado
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">ID</p>
                    <p class="font-bold text-[#0F3D2E]">{{ $remate->id }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Fecha</p>
                    <p class="font-bold text-[#0F3D2E]">{{ $remate->fecha }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Hipódromo</p>
                    <p class="font-bold text-[#0F3D2E]">{{ $remate->remate_hipodromo->hipodromo }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Carrera</p>
                    <p class="font-bold text-[#0F3D2E]">{{ $remate->carrera }}</p>
                </div>
            </div>
            <div wire:poll.3000ms class="bg-white rounded shadow overflow-x-auto">

                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-center">#</th>
                            <th class="p-3 text-center">Ejemplar</th>
                            <th class="p-3 text-center">Precio</th>
                            <th class="p-3 text-center">Propietario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $acumulado = 0; @endphp
                        @foreach ($tabla_remate as $tabla)
                            @php

                                if ($tabla->monto >= $parametros->caso1_i && $tabla->monto <= $parametros->caso1_f) {
                                    $precio_nuevo = $tabla->monto + $parametros->caso1_m;
                                } elseif (
                                    $tabla->monto >= $parametros->caso2_i &&
                                    $tabla->monto <= $parametros->caso2_f
                                ) {
                                    $precio_nuevo = $tabla->monto + $parametros->caso2_m;
                                } elseif (
                                    $tabla->monto >= $parametros->caso3_i &&
                                    $tabla->monto <= $parametros->caso3_f
                                ) {
                                    $precio_nuevo = $tabla->monto + $parametros->caso3_m;
                                } else {
                                    $precio_nuevo = $tabla->monto + $parametros->caso4_m;
                                }
                            @endphp
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-3 text-center font-bold">
                                    {{ $tabla->numero_ejemplar }}
                                </td>
                                <td class="p-3 text-center">
                                    {{ $tabla->ejemplar }}
                                </td>
                                <td class="p-3 text-center text-[#D4A017] font-bold">
                                    ${{ number_format($tabla->monto, 2) }}
                                </td>
                                <td class="p-3 text-center">
                                    @if ($tabla->usuario_id == 1)
                                        <span class="text-gray-500">La Casa</span>
                                    @else
                                        {{ $tabla->tabla_usuario->name }}
                                    @endif
                                </td>
                            </tr>
                            @php $acumulado += $tabla->monto; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Acumulado</p>
                    <p class="font-bold text-[#0F3D2E]">
                        ${{ number_format($acumulado, 2) }}
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Comisión</p>
                    <p class="font-bold text-[#0F3D2E]">
                        {{ $remate->comision }}%
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Incentivo</p>
                    <p class="font-bold text-[#0F3D2E]">
                        ${{ number_format($remate->incentivo, 2) }}
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow text-center">
                    <p class="text-gray-500">Total a cobrar</p>
                    <p class="font-bold text-green-600">
                        ${{ number_format($acumulado - ($acumulado * $remate->comision) / 100 + $remate->incentivo, 2) }}
                    </p>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('remates-admin') }}"
                    class="bg-[#0F3D2E] text-white px-6 py-2 rounded hover:bg-green-900">
                    ← Volver
                </a>
            </div>
        </div>
    </x-layouts.menu-admin>
</div>
