<div>
    <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <x-layouts.menu-admin>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Tickets') }}</span>
            <div class="col-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 rounded">
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model.live="banquero" >
                    <option value="0">Todos los banqueros</option>
                    @foreach ($lista_banqueros as $banquero)
                        <option value="{{ $banquero->banquero_id }}">{{ $banquero->jugada_banquero->username }}</option>
                    @endforeach
                </select>

                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model.live="taquilla" >
                    <option value="0">Todas las taquillas</option>
                    @foreach ($lista_taquillas as $usu)
                        <option value="{{ $usu->taquilla_id }}">{{ $usu->jugada_usuario->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 rounded">
                    <x-input type="text" class="form-control mt-2" placeholder="Fecha Inicial" wire:model.live="fecha_i" id="fecha_inicio" data-provide="datepicker" data-date-autoclose="true" 
                data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>

                <x-input type="text" class="form-control mt-2" placeholder="Fecha Final" wire:model.live="fecha_f" id="fecha_fin" data-provide="datepicker" data-date-autoclose="true" 
                data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>
            </div>
            <div class="col-12" style="overflow-x: auto">
                <table class="mb-6 w-full mt-4 table bg-white rounded-lg shadow" style="font-size: 0.7em">
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.fecha_jugada')">
                                Fecha
                                @if($sort == 'carreras_jugadas.fecha_jugada')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.hora_apuesta')">
                                Hora
                                @if($sort == 'carreras_jugadas.hora_apuesta')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('origen')">
                                Modalidad
                                @if($sort == 'origen')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.ticket')">
                                Ticket
                                @if($sort == 'carreras_jugadas.ticket')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.cod_seguridad')">
                                Serial
                                @if($sort == 'carreras_jugadas.cod_seguridad')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.banquero_id')">
                                Banquero
                                @if($sort == 'carreras_jugadas.banquero_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.hipodromo')">
                                Hipodromo
                                @if($sort == 'carreras_jugadas.hipodromo')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.carrera')">
                                Carrera
                                @if($sort == 'carreras_jugadas.carrera')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.numero_ejemplar')">
                                C. Ganador
                                @if($sort == 'carreras_jugadas.numero_ejemplar')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.numero_ejemplar_place')">
                                C. Place
                                @if($sort == 'carreras_jugadas.numero_ejemplar_place')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.numero_ejemplar_show')">
                                C. Show
                                @if($sort == 'carreras_jugadas.numero_ejemplar_show')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.numero_ejemplar_exacta1')">
                                C. Exacta
                                @if($sort == 'carreras_jugadas.numero_ejemplar_exacta1')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.numero_ejemplar_trifecta1')">
                                C. Trifecta
                                @if($sort == 'carreras_jugadas.numero_ejemplar_trifecta1')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.numero_ejemplar_superfecta1')">
                                C. Superfecta
                                @if($sort == 'carreras_jugadas.numero_ejemplar_superfecta1')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('moneda')">
                                Moneda
                                @if($sort == 'moneda')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('total_apostado')">
                                Apostado
                                @if($sort == 'total_apostado')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('total_ganado')">
                                Ganado
                                @if($sort == 'total_ganado')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('total_perdido')">
                                Perdido
                                @if($sort == 'total_perdido')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Balance
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('estatus')">
                                Estatus
                                @if($sort == 'estatus')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jugadas as $ticket)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->fecha_jugada }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->hora_apuesta }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->origen }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->ticket }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->cod_seguridad }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5">
                                    {{ $ticket->username}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5">
                                    {{ $ticket->hipodromo}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->carrera}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->numero_ejemplar}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->numero_ejemplar_place}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->numero_ejemplar_show}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->numero_ejemplar_exacta1." - ".$ticket->numero_ejemplar_exacta2}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->numero_ejemplar_trifecta1." - ".$ticket->numero_ejemplar_trifecta2." - ".$ticket->numero_ejemplar_trifecta3 }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->numero_ejemplar_superfecta1." - ".$ticket->numero_ejemplar_superfecta2." - ".$ticket->numero_ejemplar_superfecta3." - ".$ticket->numero_ejemplar_superfecta4 }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->moneda}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    {{ number_format($ticket->total_apostado,2) }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    {{ number_format($ticket->total_ganado,2) }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    {{ number_format($ticket->total_perdido,2) }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    {{ number_format($ticket->total_apostado - $ticket->total_ganado,2) }}
                                </td>
                                <td class="border-b-2 p-2 text-center">
                                    @if ($ticket->estatus_id == 1)
                                        <span class="etiqueta_azul">{{ $ticket->estatus }}</span>
                                    @else
                                        @if ($ticket->estatus_id == 2)
                                                <span class="etiqueta_azul">{{ $ticket->estatus }}</span>
                                        @else
                                            @if ($ticket->estatus_id == 3)
                                                <span class="etiqueta_verde">{{ $ticket->estatus }}</span>
                                            @else
                                                @if ($ticket->estatus_id == 4)
                                                    <span class="etiqueta_rojo">{{ $ticket->estatus }}</span>
                                                @else
                                                    @if ($ticket->estatus_id == 5)
                                                        <span class="etiqueta_naranja">{{ $ticket->estatus }}</span>
                                                    @else
                                                        @if ($ticket->estatus_id == 6)
                                                            <span class="etiqueta_amarillo">{{ $ticket->estatus }}</span>
                                                        @else
                                                            @if ($ticket->estatus_id == 7)
                                                                <span class="etiqueta_amarillo">{{ $ticket->estatus }}</span>
                                                            @endif
                                                        @endif                                                            
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="ticket({{ $ticket->jugada_id }})" class="cursor-pointer mr-2" title="Ver ticket"><i class="icofont icofont-eye" style="font-size: 1em"></i></a>
                                    
                                    <a wire:click="$dispatch('anular', {{ $ticket->ticket }})" class="cursor-pointer" title="{{ __('Anular Ticket') }}"><i class="icofont icofont-bin texto-rojo" style="font-size: 1em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-dialog-modal wire:model="open_ticket">
            <x-slot name="title">
                {{ __('Monto de la Apuesta') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-2 p-2 rounded">
                    @foreach($mostrar_encabezado as $enca)
                        <div class="mb-4">
                            <h2 class="text-base/7 font-semibold text-gray-900">Fecha</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">{{ $enca->fecha_jugada }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-base/7 font-semibold text-gray-900">Hora</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">{{ $enca->hora_apuesta }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-base/7 font-semibold text-gray-900">Ticket</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">{{ $enca->ticket }}</p>
                        </div>
                    @endforeach
                </div>
                <ul class="w-full mt-6 mb-6 text-sm text-gray-600">
                    @foreach($mostrar_jugada as $dato)
                        @if($dato->apuesta == "Exacta")
                            <li class="mb-3 flex items-center ">
                                {{ $dato->jugada_hipodromo->hipodromo.", Carrera: ".$dato->carrera.", Caballo 1: ".$dato->numero_ejemplar_exacta1.", Caballo 2: ".$dato->numero_ejemplar_exacta2.", Monto: ".$dato->monto_apuesta.", Apuesta: ".$dato->apuesta.", Estatus: ".$dato->jugada_estatus->estatus }}
                            </li>
                        @else
                            @if($dato->apuesta == "Trifecta")
                                <li class="mb-3 flex items-center ">
                                    {{ $dato->jugada_hipodromo->hipodromo.", Carrera: ".$dato->carrera.", Caballo 1: ".$dato->numero_ejemplar_trifecta1.", Caballo 2: ".$dato->numero_ejemplar_trifecta2.", Caballo 3: ".$dato->numero_ejemplar_trifecta3.", Monto: ".$dato->monto_apuesta.", Apuesta: ".$dato->apuesta.", Estatus: ".$dato->jugada_estatus->estatus }}
                                </li>
                            @else
                                @if($dato->apuesta == "Superfecta")
                                    <li class="mb-3 flex items-center ">
                                        {{ $dato->jugada_hipodromo->hipodromo.", Carrera: ".$dato->carrera.", Caballo 1: ".$dato->numero_ejemplar_superfecta1.", Caballo 2: ".$dato->numero_ejemplar_superfecta2.", Caballo 3: ".$dato->numero_ejemplar_superfecta3.", Caballo 4: ".$dato->numero_ejemplar_superfecta4.", Monto: ".$dato->monto_apuesta.", Apuesta: ".$dato->apuesta.", Estatus: ".$dato->jugada_estatus->estatus }}
                                    </li>
                                @else
                                    <li class="mb-3 flex items-center ">
                                        {{ $dato->jugada_hipodromo->hipodromo.", Carrera: ".$dato->carrera.", Caballo: ".$dato->numero_ejemplar.", Monto: ".$dato->monto_apuesta.", Apuesta: ".$dato->apuesta.", Estatus: ".$dato->jugada_estatus->estatus }}
                                    </li>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </ul>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_ticket', false)">
                    {{ __('Cerrar') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    </x-layouts.menu-admin>
    <script src="{{ asset('librerias/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

    <script>
        jQuery.datetimepicker.setLocale('es');

        jQuery('#fecha_inicio').datetimepicker({
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
        jQuery('#fecha_fin').datetimepicker({
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

    @push('js')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('anular', ticketId => { 
                    Swal.fire({
                    title: "¿{{ __('Está seguro de anular este ticket') }}?",
                    text: "¡{{ __('Se forzará su anulación y esta operación no podrá ser reversada') }}!",
                    icon: 'warning',
                    cancelButtonText: "{{ __('Cancelar') }}",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "¡{{ __('Si, estoy seguro') }}!"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        @this.call('anular', ticketId)
                    }
                })
            });
        </script>
    @endpush
</div>
