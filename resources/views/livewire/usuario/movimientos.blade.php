<div>
    <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <x-layouts.menu-user>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Movimientos de la Cuenta') }}</span>
            <div class="mt-6 col-12 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 rounded">
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model.live="operaciones" >
                    <option value="0">Todas las operaciones</option>
                    <option value="1">Debito</option>
                    <option value="2">Credito</option>
                </select>

                <x-input type="text" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="Fecha Inicial" wire:model.live="fecha_i" id="fecha_inicio" data-provide="datepicker" data-date-autoclose="true" 
                data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>

                <x-input type="text" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="Fecha Final" wire:model.live="fecha_f" id="fecha_fin" data-provide="datepicker" data-date-autoclose="true" 
                data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                onchange="this.dispatchEvent(new InputEvent('input'))"  style="font-size: 0.9em"/>
            </div>
            <div class="col-12" style="overflow-x: auto">
                <table class="mb-6 w-full mt-4 table bg-white rounded-lg shadow" style="font-size: 0.7em">
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Fecha
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Referencia
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Descripción
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Debito
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Crédito
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                Operación
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_credito=0; $total_debito=0; $balance=0?>
                        @foreach($movimientos as $movi)
                            <tr>
                                <td class="border-b-2 p-2 dark:border-dark-5">{{ $movi->fecha }}</td>
                                <td class="border-b-2 p-2 dark:border-dark-5">{{ $movi->referencia }}</td>
                                <td class="border-b-2 p-2 dark:border-dark-5">{{ $movi->descripcion }}</td>
                                @if($movi->operacion_id == 1)
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-right">{{ number_format($movi->monto,2) }}</td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-right"></td>
                                    <?php $total_debito = $total_debito + $movi->monto?>
                                @else
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-right"></td>
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-right">{{ number_format($movi->monto,2) }}</td>
                                    <?php $total_credito = $total_credito + $movi->monto?>
                                @endif
                                @if ($movi->operacion_id == 1)
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        <span class="py-1 px-2 rounded" style="background-color: #fadbd8; color: #78281f">
                                            {{ $movi->operacion }}
                                        </span>
                                    </td>
                                @else
                                    <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                        <span class="py-1 px-2 rounded" style="background-color: #a3e4d7; color:#0e6251">
                                            {{ $movi->operacion }}
                                        </span>
                                    </td> 
                                @endif
                            </tr>
                        @endforeach
                        <tr>
                            <?php $balance = $total_credito - $total_debito?>
                            <td class="border-b-2 p-2 dark:border-dark-5"></td>
                            <td class="border-b-2 p-2 dark:border-dark-5"></td>
                            <td class="border-b-2 p-2 dark:border-dark-5"></td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                <span class="py-1 px-2 rounded" style="background-color: #fadbd8; color: #78281f">
                                    {{ number_format($total_debito, 2) }}
                                </span>
                            </td>
                            <td class="border-b-2 p-2 dark:border-dark-5 text-right">
                                <span class="py-1 px-2 rounded" style="background-color: #a3e4d7; color:#0e6251">
                                    {{ number_format($total_credito, 2) }}
                                </span>
                            </td>
                            @if ($balance < 0)
                                <td class="text-center">
                                    <span class="py-1 px-2 rounded" style="background-color: #fadbd8; color: #78281f">
                                        {{ number_format($balance, 2) }}
                                    </span>
                                </td>                                                
                            @else
                                <td class="text-center"><span class="badge badge-md">
                                    <span class="py-1 px-2 rounded" style="background-color: #a3e4d7; color:#0e6251">
                                        {{ number_format($balance, 2) }}
                                    </span>
                                </td> 
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </x-layouts.menu-user>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
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
    @endpush
</div>
