<div>
    <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <x-layouts.menu-admin>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Configuración Pronósticos') }}</span>
            <div class="w-full flex mb-4 mt-2">
                <x-boton-primario wire:click="$set('open_crear', true)">
                    {{ __('Registrar Pronóstico') }}
                </x-boton-primario>
            </div>
            <div class="col-12" style="overflow-x: auto">
                <div class="col-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 rounded">
                    <x-input type="text" placeholder="Fecha de las Carreras" wire:model.live="fecha_buscar" id="fecha_mostrar" data-provide="datepicker" data-date-autoclose="true" data-date-format="mm/dd/yyyy" data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>

                    <x-input type="text" wire:model.live="search" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="{{ __('Buscar') }}" />
                </div>
                <div class="mt-6">
                    @foreach($carreras_hipo as $datos_hipo)
                        <span class="text-2xl font-semi-bold leading-normal">{{ $datos_hipo->carrera_hipodromo->hipodromo }}</span>
                        <table class="w-full mt-4 table bg-white rounded-lg shadow mb-12" style="font-size: 0.8em">
                            <thead>
                                <tr>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('ID') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Fecha') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Hora Cierre') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Hípodromo') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Apuestas') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Carrera') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('1ro') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('2do') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('3ro') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('4to') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Exacta') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Gan.') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Gan. Place') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Gan. Show') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Place') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Place Show') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Show') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Exa') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Tri') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Div. Sup') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Estatus') }}
                                    </th>
                                    <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                        {{ __('Acción') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carreras as $dato)
                                    @if($datos_hipo->hipodromo_id == $dato->hipodromo_id)
                                        <tr class="text-gray-700">
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->id }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->fecha_carrera }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->hora_cierre }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->carrera_hipodromo->hipodromo }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->carrera_apuesta->apuesta }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->numero_carrera }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->caballo_ganador }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->caballo_segundo }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->caballo_tercero }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->caballo_cuarto }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->caballo_ganador." - ".$dato->caballo_segundo }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_ganador }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_ganador_place }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_ganador_show }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_segundo_place }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_segundo_show }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_tercero_show }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_exacta }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_trifecta }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                {{ $dato->dividendo_superfecta }}
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                @if($dato->estatus_id == 1)
                                                    <span class="etiqueta_verde">{{ $dato->carrera_estatus->estatus }}</span>
                                                @else
                                                    <span class="etiqueta_rojo">{{ $dato->carrera_estatus->estatus }}</span>
                                                @endif
                                            </td>
                                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                                <a wire:click="estatus({{ $dato->id }}, {{ $dato->estatus_id }} )" class="cursor-pointer mr-2" title="{{ __('Cambiar Estatus') }}"><i class="icofont icofont-refresh texto-verde" style="font-size: 1.3em"></i></a>

                                                @if($dato->estatus_id == 1)
                                                    <a wire:click="edit({{ $dato }})" class="cursor-pointer mr-2" title="{{ __('Editar') }}"><i class="icofont icofont-edit texto-azul" style="font-size: 1.3em"></i></a>
                                                @endif

                                                @if($dato->estatus_id == 2)
                                                    <a wire:click="premiacion({{ $dato }})" class="cursor-pointer mr-2" title="{{ __('Premiación') }}"><i class="icofont icofont-racing-flag-alt texto-azul" style="font-size: 1.3em"></i></a>
                                                @endif
                                                
                                                <a wire:click="retirar({{ $dato }})" class="cursor-pointer mr-2" title="{{ __('Retirar Caballo') }}"><i class="icofont icofont-not-allowed texto-rojo" style="font-size: 1.3em"></i></a>

                                                <a wire:click="$dispatch('eliminar', {{ $dato->id }})" class="cursor-pointer" title="{{ __('Eliminar') }}"><i class="icofont icofont-bin texto-rojo" style="font-size: 1.3em"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
        <x-dialog-modal wire:model="open_premiacion">
            <x-slot name="title">
                {{ __('Llegada') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Fecha') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="fecha" disabled />
                        <x-input-error for="fecha"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Carrera') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="carrera" disabled />
                        <x-input-error for="carrera"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Hípodromo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hipodromo_id" disabled >
                            @foreach ($lista_hipodromos as $hipo)
                                <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hipodromo_id" />
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Caballo Ganador') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="caballo_ganador" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_premiacion as $cab)
                                @if($cab->numero_ejemplar == $caballo_ganador)
                                    <option value="{{ $cab->numero_ejemplar }}" selected>{{ $cab->numero_ejemplar }}</option>
                                @else
                                    <option value="{{ $cab->numero_ejemplar }}">{{ $cab->numero_ejemplar }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error for="caballo_ganador" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Ganador') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_ganador"/>
                        <x-input-error for="dividendo_ganador"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Place') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_ganador_place"/>
                        <x-input-error for="dividendo_ganador_place"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Show') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_ganador_show"/>
                        <x-input-error for="dividendo_ganador_show"/>
                    </div>
                </div>
                <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Caballo Segundo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="caballo_segundo" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_premiacion as $cab)
                                @if($cab->numero_ejemplar == $caballo_segundo)
                                    <option value="{{ $cab->numero_ejemplar }}" selected>{{ $cab->numero_ejemplar }}</option>
                                @else
                                    <option value="{{ $cab->numero_ejemplar }}">{{ $cab->numero_ejemplar }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error for="caballo_segundo" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Place') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_segundo_place"/>
                        <x-input-error for="dividendo_segundo_place"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Show') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_segundo_show"/>
                        <x-input-error for="dividendo_segundo_show"/>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Caballo Tercero') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="caballo_tercero" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_premiacion as $cab)
                                @if($cab->numero_ejemplar == $caballo_tercero)
                                    <option value="{{ $cab->numero_ejemplar }}" selected>{{ $cab->numero_ejemplar }}</option>
                                @else
                                    <option value="{{ $cab->numero_ejemplar }}">{{ $cab->numero_ejemplar }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error for="caballo_tercero" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Show') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_tercero_show"/>
                        <x-input-error for="dividendo_tercero_show"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Caballo Cuarto') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="caballo_cuarto" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_premiacion as $cab)
                                @if($cab->numero_ejemplar == $caballo_tercero)
                                    <option value="{{ $cab->numero_ejemplar }}" selected>{{ $cab->numero_ejemplar }}</option>
                                @else
                                    <option value="{{ $cab->numero_ejemplar }}">{{ $cab->numero_ejemplar }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error for="caballo_cuarto" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Exacta') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_pago_exacta"/>
                        <x-input-error for="dividendo_pago_exacta"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Trifecta') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_pago_trifecta"/>
                        <x-input-error for="dividendo_pago_trifecta"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Dividendo Superfecta') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="dividendo_pago_superfecta"/>
                        <x-input-error for="dividendo_pago_superfecta"/>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_premiacion', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="grabar_premiacion" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Grabar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
                {{ __('Carrera') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Fecha Carrera') }}" />
                        <x-input type="text" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="Fecha Carrera" wire:model.live="fecha_carrera_crear" id="fecha_carrera_crear" data-provide="datepicker" data-date-autoclose="true" 
                        data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                        onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>
                        <x-input-error for="fecha_carrera_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Hora') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hora_cierre_crear" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_horas as $hora)
                                <option value="{{ $hora->hora }}">{{ $hora->hora }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hora_cierre_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Hípodromo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hipodromo_id_crear" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_hipodromos as $hipo)
                                <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hipodromo_id_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Carrera a Inscribir') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="numero_carrera_crear" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_caballos as $carr)
                                <option value="{{ $carr->caballo }}">{{ $carr->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="numero_carrera_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Cantidad de Ejemplares que corren') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="cantidad_crear" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_caballos as $carr)
                                <option value="{{ $carr->caballo }}">{{ $carr->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="cantidad_crear" />
                    </div>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Apuestas Permitidas') }}" />
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                        <div class="flex items-center mb-4">
                            <input wire:model="ganador_crear" disabled checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ganador</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="place_crear" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Place</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="show_crear" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="exacta_crear" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Exacta</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="trifecta_crear" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Trifecta</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="superfecta_crear" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Superfecta</label>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_crear', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-boton-primario wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25 ml-2">
                    {{ __('Registrar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_retirar">
            <x-slot name="title">
                {{ __('Retirar Ejemplar') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                    <div class="mb-2">
                        <x-label value="{{ __('Fecha') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="fecha_ret" disabled />
                        <x-input-error for="fecha_ret"/>
                    </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Carrera') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="carrera_ret" disabled />
                        <x-input-error for="carrera_ret"/>
                    </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Hípodromo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hipodromo_id_ret" disabled >
                            @foreach ($lista_hipodromos as $hipo)
                                <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hipodromo_id_ret" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Caballo a Retirar') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="caballo_retirar" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_premiacion as $cab)
                                <option value="{{ $cab->numero_ejemplar }}">{{ $cab->numero_ejemplar }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="caballo_retirar" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_retirar', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="grabar_retirar" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Grabar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                {{ __('Carrera') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Fecha Carrera') }}" />
                        <x-input type="text" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="Fecha Carrera" wire:model.live="fecha_carrera" id="fecha_carrera" data-provide="datepicker" data-date-autoclose="true" 
                        data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                        onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>
                        <x-input-error for="fecha_carrera"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Hora') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hora_cierre" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_horas as $hora)
                                <option value="{{ $hora->hora }}">{{ $hora->hora }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hora_cierre" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Hípodromo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hipodromo_id" >
                            <option value="">Seleccione...</option>
                            @foreach ($lista_hipodromos as $hipo)
                                <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hipodromo_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Carrera a Inscribir') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="numero_carrera" >
                            @foreach ($lista_caballos as $carr)
                                <option value="{{ $carr->caballo }}">{{ $carr->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="numero_carrera" />
                    </div>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Apuestas Permitidas') }}" />
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                        <div class="flex items-center mb-4">
                            <input disabled wire:model="ganador_edit" checked id="checked-checkbox" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ganador</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="place_edit" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Place</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="show_edit" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="exacta_edit" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Exacta</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="trifecta_edit" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Trifecta</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="superfecta_edit" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Superfecta</label>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_edit', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Actualizar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>

        @push('js')
            <script src="sweetalert2.all.min.js"></script>

            <script>
                Livewire.on('eliminar', carreraId => { 
                        Swal.fire({
                        title: "¿{{ __('Está seguro de eliminar esta carrera') }}?",
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
                            @this.call('delete', carreraId)

                            Swal.fire(
                                '',
                                "{{ __('Carrera eliminada') }}",
                                'success'
                            )
                        }
                    })
                });
            </script>
        @endpush
    </x-layouts.menu-admin>
    <script src="{{ asset('librerias/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        jQuery.datetimepicker.setLocale('es');

        jQuery('#fecha_carrera_crear').datetimepicker({
            i18n:{
                    de:{
                            months:[
                                'Enero','Febrero','Marzo','Abril',
                                'Mayo','Junio','Julio','Agosto',
                                'Septiembre','Octubre','Noviembre','Diciembre',
                            ],
                            dayOfWeek:[
                                "Lu", "Ma", "Mie", "Ju",
                                "Vi", "Sa", "Do.",
                            ]
                        }
                },
                timepicker:false,
                format:'d/m/Y'
        });
        jQuery('#fecha_carrera').datetimepicker({
            i18n:{
                    de:{
                            months:[
                                'Enero','Febrero','Marzo','Abril',
                                'Mayo','Junio','Julio','Agosto',
                                'Septiembre','Octubre','Noviembre','Diciembre',
                            ],
                            dayOfWeek:[
                                "Lu", "Ma", "Mie", "Ju",
                                "Vi", "Sa", "Do.",
                            ]
                        }
                },
                timepicker:false,
                format:'d/m/Y'
        });
        jQuery('#fecha_mostrar').datetimepicker({
            i18n:{
                    de:{
                            months:[
                                'Enero','Febrero','Marzo','Abril',
                                'Mayo','Junio','Julio','Agosto',
                                'Septiembre','Octubre','Noviembre','Diciembre',
                            ],
                            dayOfWeek:[
                                "Lu", "Ma", "Mie", "Ju",
                                "Vi", "Sa", "Do.",
                            ]
                        }
                },
                timepicker:false,
                format:'d/m/Y'
        });
    </script>
</div>
