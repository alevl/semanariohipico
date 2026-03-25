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

        <div class="w-full mx-auto">
            @if (count($mispollas))
                @foreach ($mispollas as $datos_mipolla)
                    {{-- INFO POLLA --}}
                    <div class="bg-white shadow rounded p-4 mb-3 border border-gray-200">

                        @foreach ($informacion_polla as $datos_polla)
                            <div class="mb-1 text-sm font-semibold text-gray-700">
                                {{ $datos_polla->polla_hipodromo->hipodromo . ' - ' . $datos_polla->fecha }}
                            </div>
                        @endforeach

                        <div class="text-sm">
                            Polla ID:
                            <span class="font-bold text-[#0F3D2E]">
                                {{ $datos_mipolla->id }}
                            </span>
                        </div>
                    </div>

                    <form action="{{ route('grabar-polla.procesar') }}" method="post">
                        @csrf

                        <input type="hidden" name="id_polla" value="{{ $datos_mipolla->polla_id }}">
                        <input type="hidden" name="id_polla_usuario" value="{{ $datos_mipolla->id }}">

                        <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-4">

                            {{-- FUNCION PARA CARRERAS --}}
                            @php
                                $carreras = [
                                    [
                                        'label' => '1ra Carrera',
                                        'data' => $participantes_uno,
                                        'valor' => $datos_mipolla->carrera1,
                                        'name' => 'primera',
                                    ],
                                    [
                                        'label' => '2da Carrera',
                                        'data' => $participantes_dos,
                                        'valor' => $datos_mipolla->carrera2,
                                        'name' => 'segunda',
                                    ],
                                    [
                                        'label' => '3ra Carrera',
                                        'data' => $participantes_tres,
                                        'valor' => $datos_mipolla->carrera3,
                                        'name' => 'tercera',
                                    ],
                                    [
                                        'label' => '4ta Carrera',
                                        'data' => $participantes_cuatro,
                                        'valor' => $datos_mipolla->carrera4,
                                        'name' => 'cuarta',
                                    ],
                                    [
                                        'label' => '5ta Carrera',
                                        'data' => $participantes_cinco,
                                        'valor' => $datos_mipolla->carrera5,
                                        'name' => 'quinta',
                                    ],
                                    [
                                        'label' => '6ta Carrera',
                                        'data' => $participantes_seis,
                                        'valor' => $datos_mipolla->carrera6,
                                        'name' => 'sexta',
                                    ],
                                ];
                            @endphp

                            @foreach ($carreras as $carrera)
                                <div class="mb-4 border-b pb-2">

                                    <p class="font-bold text-[#0F3D2E] mb-2">
                                        {{ $carrera['label'] }}
                                    </p>

                                    <div class="flex flex-wrap gap-3">

                                        @foreach ($carrera['data'] as $item)
                                            <label class="flex items-center gap-1 text-gray-700 text-sm cursor-pointer">

                                                <input type="radio" name="{{ $carrera['name'] }}[]"
                                                    value="{{ $item->numero_ejemplar }}"
                                                    class="text-[#0F3D2E] focus:ring-[#0F3D2E]"
                                                    {{ $carrera['valor'] == $item->numero_ejemplar ? 'checked' : '' }}>

                                                <span
                                                    class="px-2 py-1 bg-gray-200 rounded hover:bg-[#F5B700] transition">
                                                    {{ $item->numero_ejemplar }}
                                                </span>

                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-4">
                                <button type="submit"
                                    class="w-full bg-[#0F3D2E] hover:bg-red-700 text-white font-bold py-3 rounded-lg shadow transition">
                                    Guardar Polla
                                </button>
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif

            <div class="mt-6">
                <a href="{{ route('dashboard') }}"
                    class="block text-center bg-gray-300 hover:bg-gray-400 text-black font-semibold py-2 rounded transition">
                    Regresar
                </a>
            </div>
        </div>
    </x-layouts.menu-usuario>

    @if (session('actualizada') == 'ok')
        <script>
            Swal.fire(
                '',
                'Polla actualizada',
                'success'
            )
        </script>
    @endif

</div>
