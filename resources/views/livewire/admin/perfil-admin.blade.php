<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Mi Perfil</h1>
                <span class="px-4 py-2 text-sm">
                </span>
            </div>

            <div class="min-h-screen bg-gray-100 px-6 py-6">
                <div class="bg-white rounded-lg shadow p-6 mb-6">

                    <h4 class="text-lg font-semibold mb-4 text-[#14532d]">
                        {{ __('Información Personal') }}
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <x-label value="{{ __('Usuario') }}" />
                            <x-input wire:model.defer="username" type="text"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                                disabled />
                            <x-input-error for="username" />
                        </div>

                        <div>
                            <x-label value="{{ __('Nombre y Apellido') }}" />
                            <x-input wire:model.defer="name" type="text"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                            <x-input-error for="name" />
                        </div>

                        <div>
                            <x-label value="{{ __('Teléfono') }}" />
                            <x-input wire:model.defer="telefono" type="text"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                            <x-input-error for="telefono" />
                        </div>

                    </div>

                    <div class="mt-5">
                        <x-boton-primario wire:click="actualizar" wire:loading.attr="disabled"
                            class="bg-[#14532d] hover:bg-green-800 text-white px-4 py-2 rounded">
                            {{ __('Actualizar Información') }}
                        </x-boton-primario>
                    </div>

                </div>

                {{-- Cambiar Password --}}
                <div class="bg-white rounded-lg shadow p-6">

                    <h4 class="text-lg font-semibold mb-4 text-[#14532d]">
                        {{ __('Cambiar Password') }}
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <x-label value="{{ __('Password') }}" />
                            <x-input wire:model.defer="password1" type="password"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                            <x-input-error for="password1" />
                        </div>

                        <div>
                            <x-label value="{{ __('Confirmar Password') }}" />
                            <x-input wire:model.defer="password2" type="password"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                            <x-input-error for="password2" />
                        </div>

                    </div>

                    <div class="mt-5">
                        <x-boton-primario wire:click="actualizar_clave" wire:loading.attr="disabled"
                            class="bg-[#D4A017] hover:bg-yellow-500 text-black px-4 py-2 rounded font-semibold">
                            {{ __('Actualizar Password') }}
                        </x-boton-primario>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.menu-admin>
</div>
