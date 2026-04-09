<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <span class="bg-white px-4 py-2 rounded shadow text-sm"></span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
                <div class="bg-white p-4 rounded shadow border-t-4 border-[#ac1014]">
                    <p class="text-sm text-gray-500">Ventas Totales</p>
                    <h2 class="text-xl font-bold">{{ "$" . number_format($pollas_venta + $remates_venta, 0) }}</h2>
                </div>
                <div class="bg-white p-4 rounded shadow border-t-4 border-[#F5B700]">
                    <p class="text-sm text-gray-500">Pollas</p>
                    <h2 class="text-xl font-bold">{{ "$" . number_format($pollas_venta, 0) }}</h2>
                </div>
                <div class="bg-white p-4 rounded shadow border-t-4 border-[#F5B700]">
                    <p class="text-sm text-gray-500">Remates</p>
                    <h2 class="text-xl font-bold">{{ "$" . number_format($remates_venta, 0) }}</h2>
                </div>
                <div class="bg-white p-4 rounded shadow border-t-4 border-red-500">
                    <p class="text-sm text-gray-500">Premios</p>
                    <h2 class="text-xl font-bold">{{ "$" . number_format($pollas_pagar + $remates_pagar, 0) }}</h2>
                </div>
                <div class="bg-white p-4 rounded shadow border-t-4 border-green-600">
                    <p class="text-sm text-gray-500">Ganancia</p>
                    <h2 class="text-xl font-bold text-green-600">
                        {{ "$" . number_format($pollas_venta + $remates_venta - ($pollas_pagar + $remates_pagar), 0) }}
                    </h2>
                </div>
            </div>
            <div class="bg-white rounded shadow mb-6">
                <div class="p-4 border-b font-bold text-gray-700">
                    Actividad Reciente
                </div>
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">Usuario</th>
                            <th class="p-2">Fecha</th>
                            <th class="p-2">Descripción</th>
                            <th class="p-2">Operación</th>
                            <th class="p-2">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $mov)
                            <tr class="border-b text-center p-4">
                                <td class="py-2">{{ $mov->name }}</td>
                                <td>{{ $mov->fecha }}</td>
                                <td>{{ $mov->descripcion }}</td>
                                @if ($mov->operacion_id == 1)
                                    <td>
                                        <span class="px-2 py-1 rounded text-xs bg-red-600">
                                            Debito
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <span class="px-2 py-1 rounded text-xs bg-green-600">
                                            Crédito
                                        </span>
                                    </td>
                                @endif
                                <td>{{ "$" . number_format($mov->monto, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-layouts.menu-admin>
</div>
