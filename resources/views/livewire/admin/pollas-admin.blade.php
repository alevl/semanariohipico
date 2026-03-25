<div>
    <x-layouts.menu-admin>
        <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Pollas</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="$set('open_crear', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Polla
                    </button>
                </span>
            </div>
            <div class="p-4 space-y-6">
                <div class="bg-white rounded shadow overflow-x-auto">
                    <table class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]">
                        <thead class="bg-gray-100">
                            <tr class="text-left">
                                <th class="p-3 text-center">Hipódromo</th>
                                <th class="p-3 text-center">Fecha</th>
                                <th class="p-3 text-center">Cierre</th>
                                <th class="p-3 text-center">Precio</th>
                                <th class="p-3 text-center">Inscritos</th>
                                <th class="p-3 text-center">Comisión</th>
                                <th class="p-3 text-center">Estatus</th>
                                <th class="p-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pollas as $data)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="p-3 font-semibold">
                                        {{ $data->hipodromo }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $data->fecha }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $data->hora_cierre }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ "$" . number_format($data->inscripcion, 0) }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ number_format($data->inscritos, 0) }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ number_format($data->comision, 0) . ' %' }}
                                    </td>
                                    <td class="p-3 text-center">
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                            {{ $data->estatus }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-center">
                                        @if ($data->estatus_id == 1)
                                            <a wire:click="edit({{ $data->id }})"
                                                class="bg-blue-500 text-white px-3 py-1 rounded text-sm mr-2 cursor-pointer">
                                                Editar
                                            </a>
                                            <a href="{{ route('polla-cargar-carreras-admin', $data->id) }}"
                                                class="bg-[#D4A017] text-white px-3 py-1 rounded text-sm mr-2 cursor-pointer">
                                                Carreras
                                            </a>
                                            <a wire:click="$dispatch('eliminar', {{ $data->id }})"
                                                class="bg-red-700 text-white px-3 py-1 rounded text-sm cursor-pointer">
                                                Eliminar
                                            </a>
                                        @else
                                            @if ($data->estatus_id == 2)
                                                <a wire:click="edit({{ $data->id }})"
                                                    class="bg-blue-500 text-white px-3 py-1 rounded text-sm mr-2 cursor-pointer">
                                                    Editar
                                                </a>
                                                <a href="{{ route('pollas-posiciones-admin', $data->id) }}"
                                                    class="bg-[#D4A017] text-white px-3 py-1 rounded text-sm cursor-pointer">
                                                    Posiciones
                                                </a>
                                            @else
                                                @if ($data->estatus_id == 3)
                                                    <a wire:click="edit({{ $data->id }})"
                                                        class="bg-blue-500 text-white px-3 py-1 rounded text-sm mr-2 cursor-pointer">
                                                        Editar
                                                    </a>
                                                    <a href="{{ route('pollas-posiciones-admin', $data->id) }}"
                                                        class="bg-[#D4A017] text-white px-3 py-1 rounded text-sm mr-2 cursor-pointer">
                                                        Posiciones
                                                    </a>
                                                    <a class="bg-red-500 text-white px-3 py-1 rounded text-sm cursor-pointer mr-2"
                                                        wire:click="retirar({{ $data->id }})"
                                                        title="Retirar ejemplar">
                                                        Retirar
                                                    </a>
                                                @else
                                                    @if ($data->estatus_id == 4)
                                                        <a href="{{ route('pollas-posiciones-admin', $data->id) }}"
                                                            class="bg-[#D4A017] text-white px-3 py-1 rounded text-sm cursor-pointer">
                                                            Posiciones
                                                        </a>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <x-dialog-modal wire:model="open_crear">
                <x-slot name="title">
                    {{ __('Polla') }}
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <x-label value="{{ __('Hipódromo') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="hipodromo_id">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_hipodromos as $hipodromo)
                                <option value="{{ $hipodromo->id }}">{{ $hipodromo->hipodromo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hipodromo_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Fecha de Inicio') }}" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model="fecha" id="fecha" data-provide="datepicker" data-date-autoclose="true"
                            data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                            onchange="this.dispatchEvent(new InputEvent('input'))" style="font-size: 0.9em" />
                        <x-input-error for="fecha" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Hora de Cierre') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="hora_cierre">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_horas as $hora)
                                <option value="{{ $hora->hora }}">{{ $hora->hora }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hora_cierre" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Costo de Inscripción') }}" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="inscripcion" />
                        <x-input-error for="inscripcion" />
                    </div>
                    <div class="mb-4">
                        <x-label
                            value="Comision {{ str_replace('-', ' ', config('app.name', 'Laravel')) }} (Porcentaje)" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="comision" />
                        <x-input-error for="comision" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Carreras Programadas') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="carreras_programadas">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_numeros as $numeros)
                                <option value="{{ $numeros->caballo }}">{{ $numeros->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="carreras_programadas" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Observación" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="observacion" />
                        <x-input-error for="observacion" />
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_crear', false)">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-boton-primario wire:click="save" wire:loading.attr="disabled" wire:target="save"
                        class="disabled:opacity-25 ml-2">
                        {{ __('Registrar') }}
                    </x-boton-primario>
                </x-slot>
            </x-dialog-modal>
            <x-dialog-modal wire:model="open_edit">
                <x-slot name="title">
                </x-slot>
                <x-slot name="content">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-[#0F3D2E]">Cambiar Estatus de la Polla</h2>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-1">Estatus</label>
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="estatus_id">
                            @if ($estatus_polla == 1)
                                @foreach ($lista_estatus as $estatus)
                                    @if ($estatus->id == $estatus_polla)
                                        <option value="{{ $estatus->id }}" selected>{{ $estatus->estatus }}</option>
                                    @else
                                        @if ($estatus->id == 2)
                                            <option value="{{ $estatus->id }}">Abrir polla para el sellado</option>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                @if ($estatus_polla == 2)
                                    @foreach ($lista_estatus as $estatus)
                                        @if ($estatus->id == $estatus_polla)
                                            <option value="{{ $estatus->id }}" selected>{{ $estatus->estatus }}
                                            </option>
                                        @else
                                            @if ($estatus->id == 3)
                                                <option value="{{ $estatus->id }}">Cerrar polla</option>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    @if ($estatus_polla == 3)
                                        @foreach ($lista_estatus as $estatus)
                                            @if ($estatus->id == $estatus_polla)
                                                <option value="{{ $estatus->id }}" selected>{{ $estatus->estatus }}
                                                </option>
                                            @else
                                                @if ($estatus->id == 4)
                                                    <option value="{{ $estatus->id }}">Finalizar competencia</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            @endif
                        </select>
                        <x-input-error for="estatus_id" />

                        @if ($estatus_polla == 3)
                            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 my-4">
                                <div class="mb-4">
                                    <x-label value="Primera Carrera" style="font-weight: bold" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="1ro" />
                                    <x-input wire:model="primera_uno" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="primera_uno" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="2do" />
                                    <x-input wire:model="primera_dos" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="primera_dos" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="3ro" />
                                    <x-input wire:model="primera_tres" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="primera_tres" />
                                </div>

                                <div class="mb-4">
                                    <x-label value="Segunda Carrera" style="font-weight: bold" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="1ro" />
                                    <x-input wire:model="segunda_uno" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="segunda_uno" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="2do" />
                                    <x-input wire:model="segunda_dos" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="segunda_dos" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="3ro" />
                                    <x-input wire:model="segunda_tres" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="segunda_tres" />
                                </div>

                                <div class="mb-4">
                                    <x-label value="Tercera Carrera" style="font-weight: bold" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="1ro" />
                                    <x-input wire:model="tercera_uno" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="tercera_uno" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="2do" />
                                    <x-input wire:model="tercera_dos" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="tercera_dos" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="3ro" />
                                    <x-input wire:model="tercera_tres" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="tercera_tres" />
                                </div>

                                <div class="mb-4">
                                    <x-label value="Cuarta Carrera" style="font-weight: bold" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="1ro" />
                                    <x-input wire:model="cuarta_uno" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="cuarta_uno" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="2do" />
                                    <x-input wire:model="cuarta_dos" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="cuarta_dos" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="3ro" />
                                    <x-input wire:model="cuarta_tres" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="cuarta_tres" />
                                </div>

                                <div class="mb-4">
                                    <x-label value="Quinta Carrera" style="font-weight: bold" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="1ro" />
                                    <x-input wire:model="quinta_uno" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="quinta_uno" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="2do" />
                                    <x-input wire:model="quinta_dos" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="quinta_dos" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="3ro" />
                                    <x-input wire:model="quinta_tres" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="quinta_tres" />
                                </div>

                                <div class="mb-4">
                                    <x-label value="Sexta Carrera" style="font-weight: bold" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="1ro" />
                                    <x-input wire:model="sexta_uno" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="sexta_uno" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="2do" />
                                    <x-input wire:model="sexta_dos" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="sexta_dos" />
                                </div>
                                <div class="mb-4">
                                    <x-label value="3ro" />
                                    <x-input wire:model="sexta_tres" type="text"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />

                                    <x-input-error for="sexta_tres" />
                                </div>
                            </div>
                        @else
                            <x-input wire:model.def="primera_uno" type="hidden" />
                            <x-input wire:model.def="primera_dos" type="hidden" />
                            <x-input wire:model.def="primera_tres" type="hidden" />

                            <x-input wire:model.def="segunda_uno" type="hidden" />
                            <x-input wire:model.def="segunda_dos" type="hidden" />
                            <x-input wire:model.def="segunda_tres" type="hidden" />

                            <x-input wire:model.def="tercera_uno" type="hidden" />
                            <x-input wire:model.def="tercera_dos" type="hidden" />
                            <x-input wire:model.def="tercera_tres" type="hidden" />

                            <x-input wire:model.def="cuarta_uno" type="hidden" />
                            <x-input wire:model.def="cuarta_dos" type="hidden" />
                            <x-input wire:model.def="cuarta_tres" type="hidden" />

                            <x-input wire:model.def="quinta_uno" type="hidden" />
                            <x-input wire:model.def="quinta_dos" type="hidden" />
                            <x-input wire:model.def="quinta_tres" type="hidden" />

                            <x-input wire:model.def="sexta_uno" type="hidden" />
                            <x-input wire:model.def="sexta_dos" type="hidden" />
                            <x-input wire:model.def="sexta_tres" type="hidden" />
                        @endif
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
                            Actualizar Polla
                        </button>
                    </div>
                </x-slot>
            </x-dialog-modal>
            <x-dialog-modal wire:model="open_retiro">
                <x-slot name="title">
                    Retirar Ejemplar
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm mb-1">Carrera</label>
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="carrera_retiro">
                            <option value="">Seleccione...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <x-input-error for="carrera_retiro" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm mb-1">Número</label>
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="caballo_retiro">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_numeros as $numero)
                                <option value="{{ $numero->id }}">{{ $numero->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="caballo_retiro" />
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex justify-end gap-3 pt-4">
                        <button wire:click="$set('open_retiro', false)"
                            class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg">
                            Cancelar
                        </button>
                        <button wire:click="retiro" wire:loading.attr="disabled" wire:target="retiro"
                            class="bg-[#F5B700] hover:bg-[#FFD54F] text-[#0F172A] font-bold px-6 py-2 rounded-lg shadow">
                            Retirar
                        </button>
                    </div>
                </x-slot>
            </x-dialog-modal>
            @push('js')
                <script src="sweetalert2.all.min.js"></script>
                <script src="{{ asset('librerias/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
                <script>
                    jQuery.datetimepicker.setLocale('es');

                    jQuery('#fecha').datetimepicker({
                        i18n: {
                            de: {
                                months: [
                                    'Enero', 'Febrero', 'Marzo', 'Abril',
                                    'Mayo', 'Junio', 'Julio', 'Agosto',
                                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre',
                                ],
                                dayOfWeek: [
                                    "Lu", "Ma", "Mie", "Ju",
                                    "Vi", "Sa", "Do.",
                                ]
                            }
                        },
                        timepicker: false,
                        format: 'd/m/Y'
                    });
                </script>
                <script>
                    Livewire.on('eliminar', pollaId => {
                        Swal.fire({
                                title: "¿{{ __('Está seguro de eliminar esta polla') }}?",
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
                                    @this.call('delete', pollaId)

                                    Swal.fire(
                                        '',
                                        "{{ __('Polla eliminada') }}",
                                        'success'
                                    )
                                }
                            })
                    });
                </script>
            @endpush
        </div>
    </x-layouts.menu-admin>
</div>
