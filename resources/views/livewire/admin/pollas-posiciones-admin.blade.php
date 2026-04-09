<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Tabla de Posiciones</h1>
                <span class="px-4 py-2 text-sm">
                </span>
            </div>
            <div class="bg-white rounded shadow p-6 flex flex-col md:flex-row md:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-bold text-[#0F3D2E]">
                        {{ $polla->hipodromo }}
                    </h2>
                    <p class="text-gray-500">
                        {{ $polla->fecha }}
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-gray-500">
                        Premio acumulado
                    </p>
                    <div class="text-3xl font-bold text-[#D4A017]">
                        {{ "$" . number_format($polla->monto_pagar, 0) }}
                    </div>
                </div>
            </div>
            <div class="p-4 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php $n = 1; ?>
                    @foreach ($podio as $dato)
                        @if ($n == 1)
                            <div class="bg-yellow-100 p-4 rounded shadow text-center">
                                <div class="text-xl font-bold">🥇 1er Lugar</div>
                                <div class="mt-2 font-semibold">{{ $dato->username }}</div>
                                <div class="text-[#0F3D2E] font-bold">{{ $dato->puntos_total }}</div>
                            </div>
                        @endif
                        @if ($n == 2)
                            <div class="bg-gray-100 p-4 rounded shadow text-center">
                                <div class="text-xl font-bold">🥈 2do Lugar</div>
                                <div class="mt-2 font-semibold">{{ $dato->username }}</div>
                                <div class="text-[#0F3D2E] font-bold">{{ $dato->puntos_total }}</div>
                            </div>
                        @endif
                        @if ($n == 3)
                            <div class="bg-orange-100 p-4 rounded shadow text-center">
                                <div class="text-xl font-bold">🥉 3er Lugar</div>
                                <div class="mt-2 font-semibold">{{ $dato->username }}</div>
                                <div class="text-[#0F3D2E] font-bold">{{ $dato->puntos_total }}</div>
                            </div>
                        @endif
                        <?php $n = $n + 1; ?>
                    @endforeach
                </div>

                <div class="bg-white rounded shadow overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em">
                                    Pos.
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em">
                                    Nombre
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em">
                                    Puntos
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em">
                                    Dif.
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color:#fadbd8">
                                    1ra
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color:#fadbd8">
                                    Pts
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color: #d6eaf8">
                                    2da
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color: #d6eaf8">
                                    Pts
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color:#fadbd8">
                                    3ra
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color:#fadbd8">
                                    Pts
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color: #d6eaf8">
                                    4ta
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color: #d6eaf8">
                                    Pts
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color:#fadbd8">
                                    5ta
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color:#fadbd8">
                                    Pts
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color: #d6eaf8">
                                    6ta
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em; background-color: #d6eaf8">
                                    Pts
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sw27 = 0; ?>
                            @foreach ($posiciones as $posicion)
                                @if ($sw27 == 0)
                                    <?php $lider = $posicion->puntos_total;
                                    $sw27 = 1;
                                    ?>
                                @endif
                                <?php $diferencia = $lider - $posicion->puntos_total; ?>
                                @if ($diferencia == 0)
                                    <?php $diferencia = '-'; ?>
                                @endif
                                <tr>
                                    <td class="px-2 py-4 text-center">
                                        <div class="text-sm font-medium text-gray-900" style="font-size: 0.8em">
                                            {{ $loop->iteration }}</div>
                                    </td>
                                    <td class="px-2 py-4">
                                        <div class="text-sm font-medium text-gray-900" style="font-size: 0.8em">
                                            {{ $posicion->posicion_usuario->name }}
                                        </div>
                                    </td>
                                    <td class="px-2 py-4">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->puntos_total }}</div>
                                    </td>
                                    <td class="px-2 py-4">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $diferencia }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color:#fadbd8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->carrera1 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color:#fadbd8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->puntos_carrera1 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color: #d6eaf8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->carrera2 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color: #d6eaf8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->puntos_carrera2 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color:#fadbd8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->carrera3 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color:#fadbd8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->puntos_carrera3 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color: #d6eaf8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">
                                            {{ $posicion->carrera4 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color: #d6eaf8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">{{ $posicion->puntos_carrera4 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color:#fadbd8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">{{ $posicion->carrera5 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color:#fadbd8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">{{ $posicion->puntos_carrera5 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color: #d6eaf8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">{{ $posicion->carrera6 }}</div>
                                    </td>
                                    <td class="px-2 py-4" style="font-size: 0.8em; background-color: #d6eaf8">
                                        <div class="text-center text-sm font-medium text-gray-900"
                                            style="font-size: 0.8em">{{ $posicion->puntos_carrera6 }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layouts.menu-admin>
</div>
