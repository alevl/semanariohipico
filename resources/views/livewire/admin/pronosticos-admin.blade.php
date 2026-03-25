<div>
    <x-layouts.menu-admin>
        <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Pronósticos</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="$set('open_crear', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Pronóstico
                    </button>
                </span>
            </div>
            @foreach ($carreras as $datos_hipo)
                <div class="mb-10">
                    <h2 class="text-xl font-bold text-[#0F3D2E] mb-3">
                        {{ $datos_hipo->hipodromo . ' - ' . $datos_hipo->fecha_carrera }}
                    </h2>

                    <div class="overflow-x-auto bg-white rounded-xl shadow">

                        <table class="w-full text-sm">

                            <thead class="bg-[#0F3D2E] text-white">
                                <tr class="text-center">
                                    <th>Carrera</th>
                                    <th>1°</th>
                                    <th>2°</th>
                                    <th>3°</th>
                                    <th>4°</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pronosticos as $dato)
                                    @if ($datos_hipo->hipodromo_id == $dato->hipodromo_id)
                                        <tr class="border-t text-center hover:bg-gray-50 transition ">
                                            <td class="p-3 text-center">#{{ $dato->carrera }}</td>
                                            <td class="p-3 text-center">{{ $dato->primera_marca ?? '-' }}</td>
                                            <td class="p-3 text-center">{{ $dato->segunda_marca ?? '-' }}</td>
                                            <td class="p-3 text-center">{{ $dato->tercera_marca ?? '-' }}</td>
                                            <td class="p-3 text-center">{{ $dato->cuarta_marca ?? '-' }}</td>

                                            <td class="space-x-2">
                                                <button wire:click="$dispatch('eliminar', {{ $dato->id }})"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                                    Eiminar
                                                </button>
                                                <a wire:click="edit({{ $dato->id }})"
                                                    class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs">
                                                    Editar
                                                </a>
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
        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-[#0F3D2E]">Pronóstico</h2>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Fecha Carrera') }}" />
                    <x-input type="text"
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="fecha" id="fecha" data-provide="datepicker" data-date-autoclose="true"
                        data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                        onchange="this.dispatchEvent(new InputEvent('input'))" style="font-size: 0.9em" />
                    <x-input-error for="fecha" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 text-sm mb-1">Hipodromo</label>
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="hipodromo">
                        <option value="">Seleccione...</option>
                        @foreach ($lista_hipodromos as $hipo)
                            <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="hipodromo" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 text-sm mb-1">Carrera</label>
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="carrera">
                        <option value="">Seleccione...</option>
                        @foreach ($lista_numeros as $num)
                            <option value="{{ $num->id }}">{{ $num->caballo }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="carrera" />
                </div>
                <div class="mb-4">
                    <x-label value="1ro" />
                    <x-input wire:model="marca1" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="marca1" />
                </div>
                <div class="mb-4">
                    <x-label value="2do" />
                    <x-input wire:model="marca2" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="marca2" />
                </div>
                <div class="mb-4">
                    <x-label value="3ro" />
                    <x-input wire:model="marca3" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="marca3" />
                </div>
                <div class="mb-4">
                    <div class="mb-4">
                        <x-label value="3ro" />
                        <x-input wire:model="marca4" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                        <x-input-error for="marca4" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end gap-3 pt-4">
                    <button wire:click="$set('open_crear', false)"
                        class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg">
                        Cancelar
                    </button>
                    <button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                        class="bg-[#F5B700] hover:bg-[#FFD54F] text-[#0F172A] font-bold px-6 py-2 rounded-lg shadow">
                        Grabar
                    </button>
                </div>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_edit">
            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-[#0F3D2E]">Pronóstico</h2>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Fecha Carrera') }}" />
                    <x-input type="text"
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="fecha_editar" id="fecha" data-provide="datepicker"
                        data-date-autoclose="true" data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                        onchange="this.dispatchEvent(new InputEvent('input'))" style="font-size: 0.9em" disabled />
                    <x-input-error for="fecha_editar" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 text-sm mb-1">Hipodromo</label>
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="hipodromo_editar">
                        <option value="">Seleccione...</option>
                        @foreach ($lista_hipodromos as $hipo)
                            <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="hipodromo_editar" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 text-sm mb-1">Carrera</label>
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="carrera_editar">
                        <option value="">Seleccione...</option>
                        @foreach ($lista_numeros as $num)
                            <option value="{{ $num->id }}">{{ $num->caballo }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="carrera_editar" />
                </div>
                <div class="mb-4">
                    <x-label value="1ro" />
                    <x-input wire:model="primera_marca" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="primera_marca" />
                </div>
                <div class="mb-4">
                    <x-label value="2do" />
                    <x-input wire:model="segunda_marca" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="segunda_marca" />
                </div>
                <div class="mb-4">
                    <x-label value="3ro" />
                    <x-input wire:model="tercera_marca" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="tercera_marca" />
                </div>
                <div class="mb-4">
                    <div class="mb-4">
                        <x-label value="3ro" />
                        <x-input wire:model="cuarta_marca" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                        <x-input-error for="cuarta_marca" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end gap-3 pt-4">
                    <button wire:click="$set('open_edit', false)"
                        class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg">
                        Cancelar
                    </button>
                    <button wire:click="update" wire:loading.attr="disabled" wire:target="update"
                        class="bg-[#F5B700] hover:bg-[#FFD54F] text-[#0F172A] font-bold px-6 py-2 rounded-lg shadow">
                        Grabar
                    </button>
                </div>
            </x-slot>
        </x-dialog-modal>
        @push('js')
            <script src="{{ asset('librerias/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

            <script>
                jQuery.datetimepicker.setLocale('es');

                ['#fecha'].forEach(id => {
                    jQuery(id).datetimepicker({
                        timepicker: false,
                        format: 'd/m/Y'
                    });
                });
            </script>
            <script>
                Livewire.on('eliminar', pronosticoId => {
                    Swal.fire({
                            title: "¿{{ __('Está seguro de eliminar este pronóstico') }}?",
                            text: "¡{{ __('Esta operación no podrá ser reversada') }}!",
                            icon: 'warning',
                            cancelButtonText: "{{ __('Cancelar') }}",
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "¡{{ __('Si, estoy seguro') }}!"
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                @this.call('delete', pronosticoId)

                                Swal.fire(
                                    '',
                                    "{{ __('Pronóstico eliminado') }}",
                                    'success'
                                )
                            }
                        })
                });
            </script>
        @endpush
    </x-layouts.menu-admin>
</div>
