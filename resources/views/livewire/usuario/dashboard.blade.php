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
                            <div class="text-3xl font-bold">{{ count($remates_abiertos) }}</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-gray-500">Pollas disponibles</div>
                            <div class="text-3xl font-bold">{{ count($pollas_abiertas) }}</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-gray-500">Gacetas disponibles</div>
                            <div class="text-3xl font-bold">{{ $gacetas_disponibles }}</div>
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
                            Remates disponibles
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($remates_disponibles as $remate)
                                <div class="border rounded p-4 hover:shadow-lg transition">
                                    <h3 class="font-bold">
                                        {{ $remate->hipodromo }} ({{ $remate->fecha }})
                                    </h3>
                                    <p class="mt-2 ">
                                        Carrera:
                                        <b>{{ $remate->carrera }}</b>
                                    </p>
                                    <p class="mt-4 ">
                                        <a href="{{ route('remates-posiciones', $remate->id) }}"
                                            class="cursor-pointer mt-3 bg-[#D4A017] text-white px-4 py-2 rounded w-full">
                                            Ver Remate
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white rounded shadow p-6">
                        <h2 class="text-xl font-bold mb-6">
                            Pollas Hípicas
                        </h2>
                        <div class="flex border-b mb-6">
                            <button id="btn-disponibles" onclick="mostrarTab('disponibles')"
                                class="tab-btn tab-activo px-4 py-2 font-semibold border-b-2">
                                Pollas Disponibles
                            </button>
                        </div>
                        <div id="tab-disponibles">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($pollas_abiertas as $datos)
                                    <div class="border rounded-lg p-5 hover:shadow-lg transition">
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 class="font-bold text-lg">
                                                {{ $datos->hipodromo . ' (' . $datos->fecha . ')' }}
                                            </h3>
                                        </div>
                                        @php $sw=0 @endphp
                                        @foreach ($pollas_inscritas as $inscri)
                                            @if ($datos->id == $inscri->polla_id)
                                                @php $sw=1 @endphp
                                            @endif
                                        @endforeach
                                        @if ($sw == 0)
                                            <div class="text-gray-500 text-sm">
                                                Inscripción
                                            </div>
                                            <div class="text-2xl font-bold text-[#0F3D2E] mb-3">
                                                ${{ $datos->inscripcion }}
                                            </div>

                                            <button wire:click="$dispatch('inscribirPolla', {{ $datos->id }})"
                                                wire:loading.attr="disabled"
                                                class="w-full bg-[#0F3D2E] text-white py-2 rounded hover:bg-green-900">
                                                Inscribirse
                                            </button>
                                        @else
                                            @if ($datos->estatus_id == 2)
                                                <div class="mt-4">
                                                    <a href="{{ route('sellar-polla', $datos->id) }}"
                                                        class="mt-4 cursor-pointer w-full bg-[#0F3D2E] text-white py-2 rounded hover:bg-green-900 pr-2 pl-2">
                                                        Sellar o Modificar Marcas
                                                    </a>
                                                </div>
                                            @else
                                                @if ($datos->estatus_id == 3 or $datos->estatus_id == 4 or $datos->estatus_id == 5)
                                                    <div class="mt-4">
                                                        <a href="{{ route('posiciones-polla', $datos->id) }}"
                                                            class="mt-4 cursor-pointer w-full bg-[#0F3D2E] text-white py-2 rounded hover:bg-green-900 pr-2 pl-2">
                                                            Tabla de Posiciones
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="space-y-6 lg:sticky lg:top-6">
                        <div class="bg-black rounded shadow h-40 flex items-center justify-center border">
                            <a href="https://quinielaselbrujo.com" target="new"><img
                                    src="{{ asset('storage/publicidad/brujo.png') }}" alt="El Brujo"
                                    class="w-full h-40 rounded"></a>
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
@push('js')
    <script src="sweetalert2.all.min.js"></script>
    <script>
        Livewire.on('inscribirPolla', pollaId => {
            Swal.fire({
                    title: "¿Está seguro de participar en la polla hípica?",
                    text: "",
                    icon: 'warning',
                    cancelButtonText: "{{ __('Cancelar') }}",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "¡{{ __('Si, estoy seguro') }}!"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        @this.call('inscripcion_polla', pollaId)

                        Swal.fire(
                            '',
                            "{{ __('Polla inscrita') }}",
                            'success'
                        )
                    }
                })
        });

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
@endpush
@if (session('actualizada') == 'ok')
    <script>
        Swal.fire(
            '',
            'Polla actualizada',
            'success'
        )
    </script>
@endif
@if (session('inscripcion') == 'ok')
    <script>
        Swal.fire(
            '',
            'Apuesta inscrita',
            'success'
        )
    </script>
@endif
@if (session('monedero') == 'no')
    <script>
        Swal.fire(
            '',
            'No tiene el saldo suficiente para sella la apuesta',
            'error'
        )
    </script>
@endif
@if (session('quiniela') == 'no')
    <script>
        Swal.fire(
            '',
            'La inscripción de la apuesta está cerrada. Disculpe las molestias ocasionadas',
            'error'
        )
    </script>
@endif
@if (session('procede') == 'no')
    <script>
        Swal.fire(
            '',
            'Ya está inscrito. Haga sus pronósticos',
            'info'
        )
    </script>
@endif
