<div>
    <x-layouts.menu-admin>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Precios Jugadas') }}</span>
            <div class="col-12 mt-12" style="overflow-x: auto">
                <table class="w-full mt-4 table bg-white rounded-lg shadow mb-12" style="font-size: 0.8em">
                    <span class="text-2xl font-semi-bold leading-normal">{{ __('Bolivares') }}</span>
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Moneda') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Ganador') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Place') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Show') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Exacta') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Acción') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nacionales as $datos)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->precio_moneda->moneda }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->ganador }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->place }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->show }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->exacta }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="edit_nacionales({{ $datos }})" class="cursor-pointer" title="{{ __('Editar') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1.3em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-12" style="overflow-x: auto">
                <table class="w-full mt-4 table bg-white rounded-lg shadow mb-12" style="font-size: 0.8em">
                    <span class="text-2xl font-semi-bold leading-normal">{{ __('Dolares') }}</span>
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Moneda') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Ganador') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Place') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Show') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Exacta') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Acción') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($internacionales as $datos)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->precio_moneda->moneda }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->ganador }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->place }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->show }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->exacta }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="edit_internacionales({{ $datos }})" class="cursor-pointer" title="{{ __('Editar') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1.3em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-dialog-modal wire:model="open_edit_nacionales">
            <x-slot name="title">
                {{ __('Precios en Bolivares') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Ganadores') }}" />
                    <x-input wire:model="nac_ganador" type="text" class="w-full"/>
                    <x-input-error for="nac_ganador"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Place') }}" />
                    <x-input wire:model="nac_place" type="text" class="w-full"/>
                    <x-input-error for="nac_place"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Show') }}" />
                    <x-input wire:model="nac_show" type="text" class="w-full"/>
                    <x-input-error for="nac_show"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Exacta') }}" />
                    <x-input wire:model="nac_exacta" type="text" class="w-full"/>
                    <x-input-error for="nac_exacta"/>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_edit_nacionales', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update_nacionales" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Actualizar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_edit_internacionales">
            <x-slot name="title">
                {{ __('Precios en Dolares') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Ganadores') }}" />
                    <x-input wire:model="inter_ganador" type="text" class="w-full"/>
                    <x-input-error for="inter_ganador"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Place') }}" />
                    <x-input wire:model="inter_place" type="text" class="w-full"/>
                    <x-input-error for="inter_place"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Show') }}" />
                    <x-input wire:model="inter_show" type="text" class="w-full"/>
                    <x-input-error for="inter_show"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Exacta') }}" />
                    <x-input wire:model="inter_exacta" type="text" class="w-full"/>
                    <x-input-error for="inter_exacta"/>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_edit_internacionales', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update_internacionales" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Actualizar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
    </x-layouts.menu-admin>
</div>
