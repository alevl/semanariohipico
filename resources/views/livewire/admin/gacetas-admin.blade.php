<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Gacetas</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="$set('open_crear', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Gaceta
                    </button>
                </span>
            </div>
            <div class="p-4 space-y-6">
                <div class="bg-white rounded shadow overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3 text-center">Fecha</th>
                                <th class="p-3 text-center">Hipódromo</th>
                                <th class="p-3 text-center">Archivo</th>
                                <th class="p-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gacetas as $datos)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="p-3 text-center font-semibold">
                                        {{ $datos->fecha }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $datos->gaceta_hipodromo->hipodromo }}
                                    </td>
                                    <td class="p-3 text-center">
                                        <a href="{{ asset('storage/' . $datos->ruta) }}" target="_blank"
                                            class="text-[#0F3D2E] font-semibold hover:underline">
                                            Descargar
                                        </a>
                                    </td>
                                    <td class="p-3 text-center flex justify-center gap-2">
                                        <button wire:click="$dispatch('eliminar', {{ $datos->id }})"
                                            class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center p-6 text-gray-500">
                                        No hay gacetas registradas
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <x-dialog-modal wire:model="open_crear">
                <x-slot name="title">
                    Registrar Gaceta
                </x-slot>
                <x-slot name="content">
                    <div class="space-y-4">
                        <div>
                            <x-label value="Hipódromo" />
                            <select wire:model="hipodromo_id"
                                class="w-full border rounded px-3 py-2 focus:ring-[#D4A017] focus:outline-none">

                                <option value="">Seleccione...</option>

                                @foreach ($lista_hipodromos as $hipo)
                                    <option value="{{ $hipo->id }}">{{ $hipo->hipodromo }}</option>
                                @endforeach

                            </select>
                            <x-input-error for="hipodromo_id" />
                        </div>
                        <div>
                            <x-label value="Archivo (PDF)" />
                            <input type="file" wire:model="logo_crear"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]">
                            <x-input-error for="logo_crear" />
                        </div>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <button wire:click="$set('open_crear', false)" class="bg-gray-200 px-4 py-2 rounded">
                        Cancelar
                    </button>
                    <button wire:click="save" wire:loading.attr="disabled"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded ml-2 hover:bg-green-900">
                        Guardar
                    </button>
                </x-slot>
            </x-dialog-modal>
        </div>
        @push('js')
            <script src="sweetalert2.all.min.js"></script>

            <script>
                Livewire.on('eliminar', id => {

                    Swal.fire({
                            title: '¿Eliminar gaceta?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#0F3D2E',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sí, eliminar'
                        })
                        .then((result) => {

                            if (result.isConfirmed) {

                                @this.call('delete', id)

                                Swal.fire('Eliminado', 'Gaceta eliminada correctamente', 'success')

                            }

                        })

                })
            </script>
        @endpush
    </x-layouts.menu-admin>
</div>
