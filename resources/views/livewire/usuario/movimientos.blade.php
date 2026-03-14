<div>
    <x-layouts.menu-usuario>
        <link rel="stylesheet" href="{{ asset('librerias/datetimepicker/jquery.datetimepicker.css') }}">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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

        <div class="p-4 overflow-y-auto">
            <div class="p-2 mb-4">
                <div>
                    <h2 class="text-2xl font-bold text-[#0F3D2E]">
                        Monedero
                    </h2>
                    <p class="text-gray-500">
                        Gestiona tu saldo y movimientos
                    </p>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-6 mb-4">
                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500">
                        Saldo Disponible
                    </p>
                    <h3 class="text-3xl font-bold text-[#D4A017]">
                        {{ "💰 $" . number_format($usuario->monedero, 0) }}
                    </h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 mb-3">
                        Recargar saldo
                    </p>
                    <button wire:click="$set('open_recarga', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded w-full hover:bg-green-900">
                        Reportar Recarga
                    </button>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 mb-3">
                        Retirar dinero
                    </p>
                    <button wire:click="$set('open_retiro', true)"
                        class="bg-[#D4A017] text-white px-4 py-2 rounded w-full hover:bg-yellow-500">
                        Solicitar Retiro
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 mb-4">
                <h3 class="text-lg font-bold mb-4">
                    Datos para Recargar
                </h3>
                <div class="grid md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <p><b>Banco:</b> Banco de Venezuela (0102)</p>
                        <p><b>Teléfono:</b> 042499999999</p>
                        <p><b>Cédula:</b> 9999999</p>
                    </div>
                    <div>
                        <p><b>Banco:</b> Banco de Venezuela0412-0000000</p>
                        <p><b>Cuenta:</b> 01020000000000</p>
                        <p><b>Tipo:</b> Corriente</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow p-4 mb-4">
                <div class="flex flex-wrap gap-4">
                    <select class="border rounded px-3 py-2" wire:model.live="tipo_movimiento">
                        <option value="0">Todos los movimientos</option>
                        <option value="1">Debitos</option>
                        <option value="2">Creditos</option>
                    </select>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-x-auto">
                <table class="w-full text-sm p-6">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-3 text-left">Fecha</th>
                            <th class="p-3 text-left">Tipo</th>
                            <th class="p-3 text-left">Descripción</th>
                            <th class="p-3 text-right">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $data)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-3">
                                    {{ $data->fecha }}
                                </td>
                                <td class="p-3">
                                    {{ $data->operacion }}
                                </td>
                                <td class="p-3">
                                    {{ $data->descripcion }}
                                </td>
                                @if ($data->operacion_id == 1)
                                    <td class="p-3 text-right text-red-600 font-semibold">
                                        {{ '-' . number_format($data->monto, 0) }}
                                    </td>
                                @else
                                    <td class="p-3 text-right text-green-600 font-semibold">
                                        {{ '+' . number_format($data->monto, 0) }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-dialog-modal wire:model="open_recarga">
            <x-slot name="title">
                {{ __('Recargar Saldo') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="Fecha del Pago (dd/mm/aaaa)" />
                    <x-input type="text" placeholder="dd/mm/aaaa"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model="fecha_recarga" id="fecha_recarga" data-provide="datepicker"
                        data-date-autoclose="true" data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                        onchange="this.dispatchEvent(new InputEvent('input'))" wire:model.defer="fecha_recarga" />
                    <x-input-error for="fecha_recarga" />
                </div>
                <div class="mb-4">
                    <x-label value="Referencia" />
                    <x-input type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model.defer="referencia" />
                    <x-input-error for="referencia" />
                </div>
                <div class="mb-4">
                    <x-label value="Monto de la Recarga" />
                    <x-input type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model.defer="monto_recarga" />
                    <x-input-error for="monto_recarga" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_recarga', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-boton-primario wire:click="recarga" wire:loading.attr="disabled" wire:target="recarga"
                    class="disabled:opacity-25 ml-2">
                    {{ __('Notificar Recarga') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model="open_retiro">
            <x-slot name="title">
                {{ __('Retirar Saldo') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="Monto del Retiro" />
                    <x-input type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model.defer="monto_retiro" />
                    <x-input-error for="monto_retiro" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_retiro', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-boton-primario wire:click="retiro" wire:loading.attr="disabled" wire:target="retiro"
                    class="disabled:opacity-25 ml-2">
                    {{ __('Notificar Retiro') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>

        @push('js')
            <script src="sweetalert2.all.min.js"></script>
            <script src="{{ asset('librerias/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
            <script>
                jQuery.datetimepicker.setLocale('es');

                jQuery('#fecha_recarga').datetimepicker({
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
        @endpush
    </x-layouts.menu-usuario>
</div>
