<div>
    <x-layouts.menu-admin>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Configuración Gacetas') }}</span>
            <div class="w-full flex mb-4 mt-2">
                <x-boton-primario wire:click="$set('open_crear', true)">
                    {{ __('Registrar Gaceta') }}
                </x-boton-primario>
            </div>
            <div class="col-12 mt-4" style="overflow-x: auto">
                <div class="w-full">
                    <x-input type="text" wire:model.live="search" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="{{ __('Buscar') }}" />
                </div>
                <table class="w-full mt-4 table bg-white rounded-lg shadow mb-12" style="font-size: 0.8em">
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Fecha') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Hipódromo') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Link') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Eliminar') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gacetas as $datos)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->fecha }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->gaceta_hipodromo->hipodromo }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->ruta }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="$dispatch('eliminar', {{ $datos->id }})" class="cursor-pointer" title="{{ __('Eliminar') }}"><i class="icofont icofont-bin texto-rojo" style="font-size: 1.3em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @push('js')
            <script src="sweetalert2.all.min.js"></script>

            <script>
                Livewire.on('eliminar', gacetaId => { 
                        Swal.fire({
                        title: "¿{{ __('Está seguro de eliminar esta gaceta') }}?",
                        text: "",
                        icon: 'warning',
                        cancelButtonText: "{{ __('Cancelar') }}",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "¡{{ __('Si, estoy seguro') }}!"
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            @this.call('delete', gacetaId)

                            Swal.fire(
                                '',
                                "{{ __('Gaceta eliminada') }}",
                                'success'
                            )
                        }
                    })
                });
            </script>
        @endpush
        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
                {{ __('Hipódromo') }}
            </x-slot>
            <x-slot name="content">
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
                    <x-label value="{{ __('Archivo') }}" />
                    <input type="file" wire:model='logo_crear' id={{ $identificador }}>
                    <x-input-error for="logo_crear"/>
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
    </x-layouts.menu-admin>
</div>
