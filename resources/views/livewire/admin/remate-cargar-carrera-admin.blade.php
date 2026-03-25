<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Cargar Caballos</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="cargar"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Agregar Caballo
                    </button>
                </span>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-gray-500">
                    {{ $remate->hipodromo . ' (' . $remate->fecha . ')' }}
                </span>
                <br />
                <span class="text-gray-500">
                    {{ 'Carrera : ' . $remate->carrera }}
                </span>
            </div>
            <div class="p-4 space-y-6">
                <div class="bg-white rounded shadow p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 my-4 p-2">
                        <div class="overflow-x-auto">
                            <p class="p-4 font-bold bg-[#0F3D2E] text-white">
                                {{ 'Carrera ' . $remate->carrera }}
                            </p>
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 text-left">#</th>
                                        <th class="p-3 text-left">Ejemplar</th>
                                        <th class="p-3 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantes_uno as $uno)
                                        <tr class="border-t">
                                            <td class="p-3">{{ $uno->numero_ejemplar }}</td>
                                            <td class="p-3">{{ $uno->ejemplar }}</td>
                                            <td class="p-3 flex gap-2">
                                                <a wire:click="$dispatch('deleteCaballo', {{ $uno->id }})"
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
                        <x-label value="Número" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model.def="numero_ejemplar">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_caballos as $numero)
                                <option value="{{ $numero->caballo }}">{{ $numero->caballo }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="numero_ejemplar" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Ejemplar" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="ejemplar" />
                        <x-input-error for="ejemplar" />
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-boton-secundario wire:click="$set('open_cargar', false)">
                        Cancelar
                    </x-boton-secundario>
                    <x-boton-primario wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                        Cargar
                    </x-boton-primario>
                </x-slot>
            </x-dialog-modal>
            @push('js')
                <script src="sweetalert2.all.min.js"></script>
                <script>
                    Livewire.on('deleteCaballo', cabId => {
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
                                        "{{ __('Ejemplar eliminado') }}",
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
