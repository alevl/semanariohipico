<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Cargar Caballos</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="cargar"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Ejemplar
                    </button>
                </span>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-gray-500">
                    {{ $polla->hipodromo . ' (' . $polla->fecha . ')' }}
                </span>
            </div>
            <div class="p-4 space-y-6">
                <div class="bg-white rounded shadow p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 my-4 p-2">
                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                1ra Carrera de la Polla
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">Caballo #</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_uno as $uno)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $uno->numero_ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('eliminar', {{ $uno->id }})"
                                                    class="cursor-pointer bg-red-500 text-white px-3 py-1 rounded text-sm">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                2da Carrera de la Polla
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">Caballo #</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_dos as $dos)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $dos->numero_ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('eliminar', {{ $dos->id }})"
                                                    class="cursor-pointer bg-red-500 text-white px-3 py-1 rounded text-sm">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                3ra Carrera de la Polla
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">Caballo #</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_tres as $tres)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $tres->numero_ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('eliminar', {{ $tres->id }})"
                                                    class="cursor-pointer bg-red-500 text-white px-3 py-1 rounded text-sm">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                4ta Carrera de la Polla
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">Caballo #</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_cuatro as $cuatro)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $cuatro->numero_ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('eliminar', {{ $cuatro->id }})"
                                                    class="cursor-pointer bg-red-500 text-white px-3 py-1 rounded text-sm">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                5ta Carrera de la Polla
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">Caballo #</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_cinco as $cinco)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $cinco->numero_ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('eliminar', {{ $cinco->id }})"
                                                    class="cursor-pointer bg-red-500 text-white px-3 py-1 rounded text-sm">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                6ta Carrera de la Polla
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">Caballo #</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_seis as $seis)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $seis->numero_ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('eliminar', {{ $seis->id }})"
                                                    class="cursor-pointer bg-red-500 text-white px-3 py-1 rounded text-sm">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <x-dialog-modal wire:model="open_cargar">
                <x-slot name="title">
                    Cargar Ejemplar
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <x-label value="Carrera" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model.def="carrera">
                            <option value="">Seleccione...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <x-input-error for="carrera" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Número" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model.def="numero_ejemplar">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_numeros as $numero)
                                <option value="{{ $numero->caballo }}">{{ $numero->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="numero_ejemplar" />
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_cargar', false)">
                        Cancelar
                    </x-secondary-button>
                    <x-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                        Cargar
                    </x-danger-button>
                </x-slot>
            </x-dialog-modal>
            @push('js')
                <script>
                    Livewire.on('eliminar', cabId => {
                        Swal.fire({
                                title: '¿Está seguro de eliminar este ejemplar?',
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
                                    @this.call('delete', cabId)

                                    Swal.fire(
                                        '',
                                        "{{ __('Caballo eliminado') }}",
                                        'success'
                                    )
                                }
                            })
                    });
                </script>
            @endpush
    </x-layouts.menu-admin>
</div>
