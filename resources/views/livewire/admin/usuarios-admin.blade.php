<div>
    <x-layouts.menu-admin>
        <div class="min-h-screen bg-[#f5f5f5] p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
                <h1 class="text-2xl font-bold text-gray-800">Usuarios</h1>
                <span class="px-4 py-2 text-sm">
                    <button wire:click="$set('open_crear', true)"
                        class="bg-[#0F3D2E] text-white px-4 py-2 rounded hover:bg-yellow-500 font-semibold">
                        Registrar Usuario
                    </button>
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-[#0F3D2E] text-white">
                        <tr>
                            <th class="p-2 cursor-pointer text-center">ID</th>
                            <th class="p-2 cursor-pointer text-center">Nombre</th>
                            <th class="p-2 cursor-pointer text-center">Nivel</th>
                            <th class="p-2 cursor-pointer text-center">Trato</th>
                            <th class="p-2 cursor-pointer text-center">Monedero</th>
                            <th class="p-2 cursor-pointer text-center">Teléfono</th>
                            <th class="p-2 cursor-pointer text-center">Estatus</th>
                            <th class="p-2 text-center">Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarios as $datos)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-2 text-center text-gray-700">{{ $datos->id_usuario }}</td>
                                <td class="p-2">
                                    <div class="font-semibold text-gray-800">{{ $datos->name }}</div>
                                    <div class="text-gray-500 text-xs">{{ $datos->username }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="font-semibold text-gray-800">{{ $datos->nivel }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="font-semibold text-gray-800">{{ $datos->trato }}</div>
                                </td>
                                <td class="p-2 text-center text-[#0F3D2E] font-bold">
                                    {{ number_format($datos->monedero, 2) }}
                                </td>
                                <td class="p-2 text-center text-gray-700">
                                    {{ $datos->telefono }}
                                </td>
                                <td class="p-2 text-center">
                                    @if ($datos->estatus_id == 1)
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                            {{ $datos->estatus }}
                                        </span>
                                    @else
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">
                                            {{ $datos->estatus }}
                                        </span>
                                    @endif
                                </td>
                                <td class="p-2 text-center space-x-2">
                                    <a wire:click="edit({{ $datos->id_usuario }})"
                                        class="text-[#003e6f] hover:text-blue-700 cursor-pointer">
                                        <i class="icofont icofont-edit-alt"></i>
                                    </a>
                                    <a wire:click="recarga({{ $datos->id_usuario }})"
                                        class="text-green-600 hover:text-green-800 cursor-pointer">
                                        <i class="icofont icofont-dollar"></i>
                                    </a>
                                    <a wire:click="clave({{ $datos->id_usuario }})"
                                        class="text-yellow-600 hover:text-yellow-800 cursor-pointer">
                                        <i class="icofont icofont-key"></i>
                                    </a>
                                    <a wire:click="$dispatch('eliminar', {{ $datos->id_usuario }})"
                                        class="text-red-600 hover:text-red-800 cursor-pointer">
                                        <i class="icofont icofont-bin"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                {{ __('Usuario') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Usuario') }}" />
                    <x-input wire:model.defer="username_editar" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        disabled />
                    <x-input-error for="username_editar" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Nombre') }}" />
                        <x-input wire:model="name" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                        <x-input-error for="name" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Teléfono') }}" />
                        <x-input wire:model="telefono" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                        <x-input-error for="telefono" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Trato') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="trato_editar">
                            @foreach ($lista_tratos as $tra)
                                <option value="{{ $tra->id }}">{{ $tra->trato }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="trato_editar" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Estatus') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="estatus_id">
                            @foreach ($lista_est as $estatus_user)
                                <option value="{{ $estatus_user->id }}">{{ $estatus_user->estatus }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="estatus_id" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_edit', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Actualizar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
                {{ __('Banquero') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Usuario') }}" />
                    <x-input type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        wire:model.defer="username" />
                    <x-input-error for="username" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Nombre y Apellido') }}" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="name_crear" />
                        <x-input-error for="name_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Teléfono') }}" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="telefono_crear" />
                        <x-input-error for="telefono_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Password') }}" />
                        <x-input type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            wire:model.defer="clave_crear" />
                        <x-input-error for="clave_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Trato') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="trato">
                            <option value="">Select...</option>
                            @foreach ($lista_tratos as $tra)
                                <option value="{{ $tra->id }}">{{ $tra->trato }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="trato" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Estatus') }}" />
                        <select
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                            wire:model="estatus_id_crear">
                            <option value="">Select...</option>
                            @foreach ($lista_est as $estatus)
                                <option value="{{ $estatus->id }}">{{ $estatus->estatus }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="estatus_id_crear" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_crear', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-boton-primario wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25 ml-2">
                    {{ __('Registrar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_recarga">
            <x-slot name="title">
                Usuario
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="Usuario" />
                        <x-input wire:model.defer="username_recarga" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            disabled />
                        <x-input-error for="username_recarga" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Nombre y Apellido" />
                        <x-input wire:model="name_recarga" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                            disabled />
                        <x-input-error for="name_recarga" />
                    </div>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Operación') }}" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                        wire:model="operacion_recarga">
                        @foreach ($lista_operaciones as $ope)
                            <option value="{{ $ope->id }}">{{ $ope->operacion }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="operacion_recarga" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="Monto" />
                        <x-input wire:model="monto_recarga" type="text"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                        <x-input-error for="monto_recarga" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_recarga', false)">
                    Cancelar
                </x-secondary-button>
                <x-boton-primario wire:click="update_recarga" wire:loading.attr="disabled"
                    class="disabled:opacity-25 ml-2">
                    Actualizar
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_clave">
            <x-slot name="title">
                {{ __('Usuario') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Username') }}" />
                    <x-input wire:model.defer="username_clave" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        disabled />
                    <x-input-error for="username_clave" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Nombre y Apellido') }}" />
                    <x-input wire:model="name_clave" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                        disabled />
                    <x-input-error for="name_clave" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Introduzca el Nuevo Password') }}" />
                    <x-input wire:model="nueva_clave" type="text"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4A017]" />
                    <x-input-error for="nueva_clave" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_clave', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update_clave" wire:loading.attr="disabled"
                    class="disabled:opacity-25 ml-2">
                    {{ __('Actualizar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        @push('js')
            <script src="sweetalert2.all.min.js"></script>
            <script>
                Livewire.on('clave', usuarioId => {
                    Swal.fire({
                            title: "¿{{ __('Está seguro de reseterar este password') }}?",
                            text: "{{ __('La clave por defecto será') }} 123456789",
                            icon: 'warning',
                            cancelButtonText: "{{ __('Cancelar') }}",
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "¡{{ __('Si, estoy seguro!') }}"
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                @this.call('resetear_clave', usuarioId)

                                Swal.fire(
                                    '',
                                    "{{ __('Password reseteado') }}",
                                    'success'
                                )
                            }
                        })
                });
            </script>

            <script>
                Livewire.on('eliminar', usuarioId => {
                    Swal.fire({
                            title: "¿{{ __('Está seguro de eliminar este cliente') }}?",
                            text: "¡{{ __('Esta operación no podrá ser reversada') }}!",
                            icon: 'warning',
                            cancelButtonText: "{{ __('Cancelar') }}",
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "¡{{ __('Si, estoy seguro') }}!"
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                @this.call('delete', usuarioId)

                                Swal.fire(
                                    '',
                                    "{{ __('Cliente eliminado') }}",
                                    'success'
                                )
                            }
                        })
                });
            </script>
        @endpush
    </x-layouts.menu-admin>
</div>
