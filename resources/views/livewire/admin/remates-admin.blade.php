<div>
    <x-layouts.menu-admin>
        <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Remates</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="$set('open_crear', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Remate
                    </button>
                </span>
            </div>
            <div class="p-4 space-y-6">
                <div class="bg-white rounded shadow overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    ID
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Hipodromno
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Fecha
                                </th>
                                <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center"
                                    style="font-size: 0.8em">
                                    Cierre
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Carrera
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Comisión
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Premio
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Estatus
                                </th>
                                <th
                                    class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($remates as $datos_remate)
                                <tr class="text-gray-700">
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->id }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->hipodromo }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->fecha }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->hora_cierre }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->carrera }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->comision . ' %' }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        {{ $datos_remate->monto_pagar }}
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        @if ($datos_remate->estatus_id == 1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ml-2"
                                                style="background-color:  #7b7d7d; color: #fdfefe">
                                                {{ $datos_remate->remate_estatus->estatus }}
                                            </span>
                                        @else
                                            @if ($datos_remate->estatus_id == 2)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ml-2"
                                                    style="background-color: #0e6251; color:#e8f8f5">
                                                    {{ $datos_remate->remate_estatus->estatus }}
                                                </span>
                                            @else
                                                @if ($datos_remate->estatus_id == 3)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ml-2"
                                                        style="background-color: #f1c40f; color: #fef9e7 
                                                        ">
                                                        {{ $datos_remate->remate_estatus->estatus }}
                                                    </span>
                                                @else
                                                    @if ($datos_remate->estatus_id == 4)
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ml-2"
                                                            style="background-color: #154360; color:#eaf2f8
                                                            ">
                                                            {{ $datos_remate->remate_estatus->estatus }}
                                                        </span>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        @if ($datos_remate->estatus_id == 1)
                                            <a class="btn btn-green mr-2 cursor-pointer"
                                                wire:click="edit({{ $datos_remate }})" title="Editar Remate">
                                                <i class="icofont icofont-edit-alt" style="font-size: 1.1em"></i>
                                            </a>

                                            <a href="{{ route('remate-cargar-carrera-admin', [$datos_remate->id]) }}"
                                                class="btn btn-blue mr-2" title="Cargar Carrera">
                                                <i class="icofont icofont-ui-calendar" style="font-size: 1.1em"></i>
                                            </a>

                                            <a class="btn btn-red mr-2 cursor-pointer" title="Eliminar Remate"
                                                wire:click="$dispatch('deleteRemate', {{ $datos_remate->id }})">
                                                <i class="icofont icofont-bin" style="font-size: 1.1em"></i>
                                            </a>
                                        @else
                                            @if ($datos_remate->estatus_id == 2)
                                                <a class="btn btn-green mr-2 cursor-pointer"
                                                    wire:click="edit({{ $datos_remate }})" title="Editar Remate">
                                                    <i class="icofont icofont-edit-alt" style="font-size: 1.1em"></i>
                                                </a>
                                                <a class="btn btn-blue mr-2 cursor-pointer"
                                                    href="{{ route('remates-posiciones-admin', $datos_remate) }}"
                                                    title="Tabla de posiciones">
                                                    <i class="icofont icofont-result-sport" style="font-size: 1em"></i>
                                                </a>
                                            @else
                                                @if ($datos_remate->estatus_id == 3)
                                                    <a class="btn btn-green mr-2 cursor-pointer"
                                                        wire:click="edit({{ $datos_remate }})" title="Editar Remate">
                                                        <i class="icofont icofont-edit-alt" style="font-size: 1em"></i>
                                                    </a>
                                                    <a class="btn btn-blue mr-2 cursor-pointer"
                                                        href="{{ route('remates-posiciones-admin', $datos_remate) }}"
                                                        title="Tabla de posiciones">
                                                        <i class="icofont icofont-result-sport"
                                                            style="font-size: 1em"></i>
                                                    </a>
                                                @else
                                                    @if ($datos_remate->estatus_id == 4)
                                                        <a class="btn btn-blue mr-2 cursor-pointer"
                                                            href="{{ route('remates-posiciones-admin', $datos_remate) }}"
                                                            title="Tabla de posiciones">
                                                            <i class="icofont icofont-result-sport"
                                                                style="font-size: 1em"></i>
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
                    Remate
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <x-label value="Fecha" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="fecha" id="fecha" data-provide="datepicker" data-date-autoclose="true"
                            data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                            onchange="this.dispatchEvent(new InputEvent('input'))" />
                        <x-input-error for="fecha" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Hora cierre" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model.def="hora_cierre">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_horas as $hora)
                                <option value="{{ $hora->hora }}">{{ $hora->hora }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hora_cierre" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Hipódromo" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model.def="hipodromo_id">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_hipodromos as $hipodromo)
                                <option value="{{ $hipodromo->id }}">{{ $hipodromo->hipodromo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hipodromo_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Carrera" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="carrera" />
                        <x-input-error for="carrera" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Comision (Porcentaje)" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="comision" />
                        <x-input-error for="comision" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Incentivo" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="incentivo" />
                        <x-input-error for="incentivo" />
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
                    <x-secondary-button wire:click="$set('open_crear',false)">
                        Cancelar
                    </x-secondary-button>

                    <x-boton-primario wire:click="save" wire:loading.attr="disabled" wire:target="save"
                        class="disabled:opacity-25 ml-2">
                        {{ __('Crear') }}
                    </x-boton-primario>
                </x-slot>
            </x-dialog-modal>

            <x-dialog-modal wire:model="open_edit">
                <x-slot name="title">
                    Remate
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <x-label value="Estatus del remate" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model.def="estatus_remate_id">
                            @if ($e_estatus == 1)
                                @foreach ($lista_est as $estatus)
                                    @if ($estatus->id == $e_estatus)
                                        <option value="{{ $estatus->id }}" selected>{{ $estatus->estatus }}</option>
                                    @else
                                        @if ($estatus->id == 2)
                                            <option value="{{ $estatus->id }}">{{ $estatus->estatus }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                @if ($e_estatus == 2)
                                    @foreach ($lista_est as $estatus)
                                        @if ($estatus->id == $e_estatus)
                                            <option value="{{ $estatus->id }}" selected>{{ $estatus->estatus }}
                                            </option>
                                        @else
                                            @if ($estatus->id == 3)
                                                <option value="{{ $estatus->id }}">{{ $estatus->estatus }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    @if ($e_estatus == 3)
                                        @foreach ($lista_est as $estatus)
                                            @if ($estatus->id == $e_estatus)
                                                <option value="{{ $estatus->id }}" selected>{{ $estatus->estatus }}
                                                </option>
                                            @else
                                                @if ($estatus->id == 4)
                                                    <option value="{{ $estatus->id }}">{{ $estatus->estatus }}
                                                    </option>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            @endif
                        </select>
                        <x-input-error for="estatus_remate_id" />
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_edit', false)">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-boton-primario wire:click="update" wire:loading.attr="disabled" wire:target="update"
                        class="disabled:opacity-25 ml-2">
                        {{ __('Registrar') }}
                    </x-boton-primario>
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
                    Livewire.on('deleteRemate', remaId => {
                        Swal.fire({
                                title: '¿Está seguro de eliminar este remate?',
                                text: "¡No podrás revertir esta operación!",
                                icon: 'warning',
                                cancelButtonText: "{{ __('Cancelar') }}",
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: "¡{{ __('Si, estoy seguro') }}!"
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    @this.call('delete', remaId)

                                    Swal.fire(
                                        '',
                                        "{{ __('Remate eliminado') }}",
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
