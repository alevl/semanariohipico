<div>
    <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <x-layouts.menu-admin>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Reportes') }}</span>
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
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                #
                            </th>
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
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.moneda_id')">
                                Moneda
                                @if($sort == 'carreras_jugadas.moneda_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('banquero')">
                                Banquero
                                @if($sort == 'banquero')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('carreras_jugadas.taquilla_id')">
                                Taquilla
                                @if($sort == 'carreras_jugadas.taquilla_id')
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
                                Ventas
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
                                Pagos
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
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Monto Anulados
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Anulados
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Monto Devolución
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Devolución
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Balance
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Venta Real
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Por Pagar
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Saldo Entregar
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Saldo Taquilla
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">Tickets</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n=1; $total_ventas=0; $total_pagos=0; $total_monto_anulados=0; $total_anulados=0; $total_balance=0; $total_monto_devolucion=0; $total_devolucion=0; $total_venta_real=0; $total_por_pagar=0; $total_entregar=0; $total_taquilla=0; ?>
                        @foreach($jugadas as $ticket)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $n }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->fecha_jugada }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $ticket->moneda }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5">
                                    {{ $ticket->banquero }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5">
                                    {{ $ticket->taquilla}}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    <?php $total_ventas = $total_ventas + $ticket->total_apostado?>
                                    {{ number_format($ticket->total_apostado,2) }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    <?php $total_pagos = $total_pagos + $ticket->total_ganado?>
                                    {{ number_format($ticket->total_ganado,2) }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    @foreach($tnulos as $tnulo)
                                        @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                            <?php $total_monto_anulados = $total_monto_anulados + $tnulo->total_nulos?>
                                            {{ number_format($tnulo->total_nulos,2) }}
                                        @endif
                                    @endforeach   
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @foreach($nnulos as $nnulo)
                                        @if(($nnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $nnulo->moneda_id) and ($ticket->fecha_jugada == $nnulo->fecha_jugada))
                                            <?php $total_anulados = $total_anulados + $nnulo->cantidad_nulos?>
                                            {{ number_format($nnulo->cantidad_nulos) }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    @foreach($tdevolucion as $tdev)
                                        @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                            <?php $total_monto_devolucion = $total_monto_devolucion + $tdev->total_devolucion?>
                                            {{ number_format($tdev->total_devolucion,2) }}
                                        @endif
                                    @endforeach   
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @foreach($ndevolucion as $ndev)
                                        @if(($ndev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $ndev->moneda_id) and ($ticket->fecha_jugada == $ndev->fecha_jugada))
                                            <?php $total_devolucion = $total_devolucion + $ndev->cantidad_devolucion?>
                                            {{ number_format($ndev->cantidad_devolucion) }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    <?php $sw=0; $sw1=0; $sw2=0?>
                                    @if(count($tnulos))
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $sw1=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if(count($tdevolucion))
                                        @foreach($tdevolucion as $tdev)
                                            @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                <?php $sw2=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif

                                    @if($sw1==1 and $sw2==0)
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $total_balance = $total_balance + ($ticket->total_apostado - $tnulo->total_nulos - $ticket->total_ganado)?>
                                                {{ number_format($ticket->total_apostado - $tnulo->total_nulos - $ticket->total_ganado,2) }}
                                            @endif
                                        @endforeach
                                    @else
                                        @if($sw1==0 and $sw2==1)
                                            @foreach($tdevolucion as $tdev)
                                                @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                    <?php $total_balance = $total_balance + ($ticket->total_apostado - $tdev->total_devolucion - $ticket->total_ganado)?>
                                                    {{ number_format($ticket->total_apostado - $tdev->total_devolucion - $ticket->total_ganado,2) }}
                                                @endif
                                            @endforeach
                                        @else
                                            @if($sw1==1 and $sw2 == 1)
                                                <?php $total_nulo=0; $total_dev=0 ?>
                                                @foreach($tnulos as $tnulo)
                                                    @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                        <?php $total_nulo = $tnulo->total_nulos?>
                                                    @endif
                                                @endforeach
                                                @foreach($tdevolucion as $tdev)
                                                    @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                        <?php $total_dev = $tdev->total_devolucion?>
                                                    @endif
                                                @endforeach
                                                <?php $total_balance = $total_balance + ($ticket->total_apostado - $total_nulo - $total_dev - $ticket->total_ganado)?>
                                                {{ number_format($ticket->total_apostado - $total_nulo - $total_dev - $ticket->total_ganado,2) }}
                                            @endif
                                        @endif                                        
                                    @endif                                        

                                    @if($sw==0)
                                        <?php $sw=0?>
                                        <?php $total_balance = $total_balance + ($ticket->total_apostado - $ticket->total_ganado)?>
                                        {{ number_format($ticket->total_apostado - $ticket->total_ganado,2) }}
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    <?php $sw=0; $sw1=0; $sw2=0?>
                                    @if(count($tnulos))
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $sw1=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if(count($tdevolucion))
                                        @foreach($tdevolucion as $tdev)
                                            @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                <?php $sw2=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif

                                    @if($sw1==1 and $sw2==0)
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $total_venta_real = $total_venta_real + ($ticket->total_apostado - $tnulo->total_nulos)?>
                                                {{ number_format($ticket->total_apostado - $tnulo->total_nulos,2) }}
                                            @endif
                                        @endforeach
                                    @else
                                        @if($sw1==0 and $sw2==1)
                                            @foreach($tdevolucion as $tdev)
                                                @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                    <?php $total_venta_real = $total_venta_real + ($ticket->total_apostado - $tdev->total_devolucion)?>
                                                    {{ number_format($ticket->total_apostado - $tdev->total_devolucion,2) }}
                                                @endif
                                            @endforeach
                                        @else
                                            @if($sw1==1 and $sw2 == 1)
                                                <?php $total_nulo=0; $total_dev=0 ?>
                                                @foreach($tnulos as $tnulo)
                                                    @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                        <?php $total_nulo = $tnulo->total_nulos?>
                                                    @endif
                                                @endforeach
                                                @foreach($tdevolucion as $tdev)
                                                    @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                        <?php $total_dev = $tdev->total_devolucion?>
                                                    @endif
                                                @endforeach
                                                <?php $total_venta_real = $total_venta_real + ($ticket->total_apostado - $total_nulo - $total_dev)?>
                                                {{ number_format($ticket->total_apostado - $total_nulo - $total_dev,2) }}
                                            @endif
                                        @endif                                        
                                    @endif                                        

                                    @if($sw==0)
                                        <?php $sw=0?>
                                        <?php $total_venta_real = $total_venta_real + ($ticket->total_apostado)?>
                                        {{ number_format($ticket->total_apostado,2) }}
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    @if($pagados)
                                        @foreach($pagados as $pagado)
                                            @if(($pagado->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $pagado->moneda_id) and ($ticket->fecha_jugada == $pagado->fecha_jugada))
                                                <?php $total_por_pagar = $total_por_pagar + ($ticket->total_ganado - $pagado->tpagado)?>
                                                {{ number_format(($ticket->total_ganado - $pagado->tpagado),2) }}
                                            @endif
                                        @endforeach
                                    @else
                                        <?php $total_por_pagar = $total_por_pagar + ($ticket->total_ganado)?>
                                        {{ number_format($ticket->total_ganado,2) }}
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    <?php $monto_pagado = 0?>
                                    @if($pagados)                                    
                                        @foreach($pagados as $pagado)
                                            @if(($pagado->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $pagado->moneda_id) and ($ticket->fecha_jugada == $pagado->fecha_jugada))
                                            <?php $monto_pagado = $ticket->total_ganado - $pagado->tpagado?>
                                            @endif
                                        @endforeach
                                    @else
                                    <?php $monto_pagado = $ticket->total_ganado?>
                                    @endif

                                    <?php $sw=0; $sw1=0; $sw2=0?>
                                    @if(count($tnulos))
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $sw1=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if(count($tdevolucion))
                                        @foreach($tdevolucion as $tdev)
                                            @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                <?php $sw2=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif

                                    @if($sw1==1 and $sw2==0)
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $total_entregar = $total_entregar + ($ticket->total_apostado - $tnulo->total_nulos - $ticket->total_ganado + $monto_pagado)?>
                                                {{ number_format($ticket->total_apostado - $tnulo->total_nulos - $ticket->total_ganado + $monto_pagado,2) }}
                                            @endif
                                        @endforeach
                                    @else
                                        @if($sw1==0 and $sw2==1)
                                            @foreach($tdevolucion as $tdev)
                                                @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                    <?php $total_entregar = $total_entregar + ($ticket->total_apostado - $tdev->total_devolucion - $ticket->total_ganado + $monto_pagado)?>
                                                    {{ number_format($ticket->total_apostado - $tdev->total_devolucion - $ticket->total_ganado + $monto_pagado,2) }}
                                                @endif
                                            @endforeach
                                        @else
                                            @if($sw1==1 and $sw2 == 1)
                                                <?php $total_nulo=0; $total_dev=0 ?>
                                                @foreach($tnulos as $tnulo)
                                                    @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                        <?php $total_nulo = $tnulo->total_nulos?>
                                                    @endif
                                                @endforeach
                                                @foreach($tdevolucion as $tdev)
                                                    @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                        <?php $total_dev = $tdev->total_devolucion?>
                                                    @endif
                                                @endforeach
                                                <?php $total_entregar = $total_entregar + ($ticket->total_apostado - $total_nulo - $total_dev - $ticket->total_ganado + $monto_pagado)?>
                                                {{ number_format($ticket->total_apostado - $total_nulo - $total_dev - $ticket->total_ganado + $monto_pagado,2) }}
                                            @endif
                                        @endif                                        
                                    @endif                                        

                                    @if($sw==0)
                                        <?php $sw=0?>
                                        <?php $total_entregar = $total_entregar + ($ticket->total_apostado - $ticket->total_ganado + $monto_pagado)?>
                                        {{ number_format($ticket->total_apostado - $ticket->total_ganado + $monto_pagado,2) }}
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                    <?php $sw=0; $sw1=0; $sw2=0?>
                                    @if(count($tnulos))
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $sw1=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if(count($tdevolucion))
                                        @foreach($tdevolucion as $tdev)
                                            @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                <?php $sw2=1?>
                                                <?php $sw=1?>
                                                @endif
                                        @endforeach
                                    @endif

                                    @if($sw1==1 and $sw2==0)
                                        @foreach($tnulos as $tnulo)
                                            @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                <?php $total_taquilla = $total_taquilla + ($ticket->total_apostado - $tnulo->total_nulos - $ticket->total_ganado)?>
                                                {{ number_format($ticket->total_apostado - $tnulo->total_nulos - $ticket->total_ganado,2) }}
                                            @endif
                                        @endforeach
                                    @else
                                        @if($sw1==0 and $sw2==1)
                                            @foreach($tdevolucion as $tdev)
                                                @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                    <?php $total_taquilla = $total_taquilla + ($ticket->total_apostado - $tdev->total_devolucion - $ticket->total_ganado)?>
                                                    {{ number_format($ticket->total_apostado - $tdev->total_devolucion - $ticket->total_ganado,2) }}
                                                @endif
                                            @endforeach
                                        @else
                                            @if($sw1==1 and $sw2 == 1)
                                                <?php $total_nulo=0; $total_dev=0 ?>
                                                @foreach($tnulos as $tnulo)
                                                    @if(($tnulo->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tnulo->moneda_id) and ($ticket->fecha_jugada == $tnulo->fecha_jugada))
                                                        <?php $total_nulo = $tnulo->total_nulos?>
                                                    @endif
                                                @endforeach
                                                @foreach($tdevolucion as $tdev)
                                                    @if(($tdev->taquilla_id == $ticket->taquilla_id) and ($ticket->moneda_id == $tdev->moneda_id) and ($ticket->fecha_jugada == $tdev->fecha_jugada))
                                                        <?php $total_dev = $tdev->total_devolucion?>
                                                    @endif
                                                @endforeach
                                                <?php $total_taquilla = $total_taquilla + ($ticket->total_apostado - $total_nulo - $total_dev - $ticket->total_ganado)?>
                                                {{ number_format($ticket->total_apostado - $total_nulo - $total_dev - $ticket->total_ganado,2) }}
                                            @endif
                                        @endif                                        
                                    @endif                                        

                                    @if($sw==0)
                                        <?php $sw=0?>
                                        <?php $total_taquilla = $total_taquilla + ($ticket->total_apostado - $ticket->total_ganado)?>
                                        {{ number_format($ticket->total_apostado - $ticket->total_ganado,2) }}
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a href="{{ route('tickets-taquilla-admin', [$ticket->taquilla_id, $fecha_inicio, $fecha_fin]) }}" class="cursor-pointer" title="Ver tickets"><i class="icofont icofont-ticket" style="font-size: 1em"></i></a>
                                </td>
                            </tr>
                            <?php $n=$n+1?>
                        @endforeach
                        <tr class="text-gray-700">
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5">
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_ventas,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_pagos,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_monto_anulados,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                {{ number_format($total_anulados,0) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_monto_devolucion,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                {{ number_format($total_devolucion,0) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_balance,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_venta_real,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_por_pagar,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_entregar,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                {{ number_format($total_taquilla,2) }}
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </x-layouts.menu-super-admin>
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
</div>
