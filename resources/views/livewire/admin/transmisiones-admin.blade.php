<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Transmisiones</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="$set('open_crear', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Link
                    </button>
                </span>
            </div>
            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="w-full text-sm">
                    <thead class="bg-[#0F3D2E] text-white">
                        <tr class="text-center">
                            <th class="p-3">Fecha</th>
                            <th>Canal</th>
                            <th>Link</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transmisiones as $datos)
                            <tr class="border-t text-center hover:bg-gray-50 transition">
                                <td class="p-3 font-semibold text-[#0F3D2E]">
                                    {{ $datos->fecha }}
                                </td>
                                <td>
                                    {{ $datos->canal }}
                                </td>
                                <td>
                                    <a href="{{ $datos->ruta }}" target="_blank" class="text-blue-600 hover:underline">
                                        Ver transmisión
                                    </a>
                                </td>
                                <td>
                                    <button wire:click="$dispatch('eliminar', {{ $datos->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                        🗑 Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
                Registrar Transmisión
            </x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="Canal" />
                    <x-input type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model.defer="canal" />
                    <x-input-error for="canal" />
                </div>

                <div class="mb-4">
                    <x-label value="Link de transmisión" />
                    <x-input type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model.defer="ruta" />
                    <x-input-error for="ruta" />
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_crear', false)">
                    Cancelar
                </x-secondary-button>

                <button wire:click="save" class="bg-[#D4A017] hover:bg-yellow-600 text-white px-4 py-2 rounded ml-2">
                    Registrar
                </button>
            </x-slot>
        </x-dialog-modal>

        @push('js')
            <script src="sweetalert2.all.min.js"></script>

            <script>
                Livewire.on('eliminar', transmisionId => {
                    Swal.fire({
                            title: "¿Eliminar transmisión?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#D4A017',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "Sí, eliminar",
                            cancelButtonText: "Cancelar"
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                @this.call('delete', transmisionId)

                                Swal.fire(
                                    '',
                                    "Transmisión eliminada",
                                    'success'
                                )
                            }
                        })
                });
            </script>
        @endpush
    </x-layouts.menu-admin>
</div>
