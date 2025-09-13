<div>
    <x-layouts.menu-admin>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Usuarios Online') }}</span>
            <div class="w-full flex mb-4 mt-2">
                <x-boton-primario wire:click="$set('open_crear', true)">
                    {{ __('Registrar Online') }}
                </x-boton-primario>
            </div>
            <div class="col-12" style="overflow-x: auto">
                <div class="w-full">
                    <x-input type="text" wire:model.live="search" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="{{ __('Buscar') }}" />
                </div>
                <div class="py-2 flex items-center">
                    <div class="flex items-center">
                        <span class="text-s" style="font-size: 0.9em">{{ __('Mostrar') }}</span>
                        <select wire:model.live="cant" style="font-size: 0.9em" class="ml-2 rounded-md border border-primary b-transparent bg-none pl-2 pr-2 py-2 focus:outline-none sm:text-sm text-center">
                            <option value="50">50</option>
                            <option value="80">80</option>
                            <option value="100">100</option>
                          </select>
                        <span class="ml-2 text-s" style="font-size: 0.9em">{{ __('Registros') }}</span>
                    </div>
                </div>
                <table class="w-full mt-4 table bg-white rounded-lg shadow mb-12" style="font-size: 0.8em">
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('id')">
                                {{ __('ID') }}
                                @if($sort == 'id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('name')">
                                {{ __('Nombre') }}
                                @if($sort == 'name')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('banquero_id')">
                                {{ __('Banquero') }}
                                @if($sort == 'banquero_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('caballos_minimo')">
                                {{ __('Caballos Mínimo') }}
                                @if($sort == 'caballos_minimo')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('monedero')">
                                {{ __('Monedero') }}
                                @if($sort == 'monedero')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('trato_id')">
                                {{ __('Trato') }}
                                @if($sort == 'trato_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('estatus_id')">
                                {{ __('Estatus') }}
                                @if($sort == 'estatus_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Acción') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($onlines as $datos)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->id }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5">
                                    <div>
                                        {{ $datos->name }}
                                    </div>
                                    <div>
                                        {{ $datos->username }}
                                    </div>
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->usuario_banquero->name }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->caballos_minimo }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ number_format($datos->monedero,2)." ".$datos->usuario_moneda->abreviacion }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos->usuario_trato->trato }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @if (($datos->estatus_id) == 1)
                                        <span class="py-1 px-2 rounded" style="background-color: #a3e4d7; color:#0e6251">
                                            {{ $datos->usuario_estatus->estatus }}
                                        </span> 
                                    @else
                                        <span class="py-1 px-2 rounded" style="background-color: #fadbd8; color: #78281f">
                                            {{ $datos->usuario_estatus->estatus }}
                                        </span>
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="edit({{ $datos }})" class="cursor-pointer mr-2" title="{{ __('Editar') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1.3em"></i></a>

                                    <a href="{{ route('topes-regalias-admin', $datos->id) }}" class="cursor-pointer mr-2" title="{{ __('Topes y Regalías') }}"><i class="icofont icofont-gears texto-azul" style="font-size: 1.3em"></i></a>

                                    <a wire:click="recarga({{ $datos }})" class="cursor-pointer mr-2" title="Recargar usuario"><i class="icofont icofont-dollar" style="font-size: 1.3em"></i></a>

                                    <a wire:click="clave({{ $datos }})" class="cursor-pointer mr-2" title="{{ __('Cambiar password') }}"><i class="icofont icofont-key texto-rojo" style="font-size: 1.3em"></i></a>

                                    <a wire:click="$dispatch('eliminar', {{ $datos->id }})" class="cursor-pointer" title="{{ __('Eliminar') }}"><i class="icofont icofont-bin texto-rojo" style="font-size: 1.3em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($onlines->hasPages())
                <div class="px-6 py-3">
                    {{ $onlines->links() }}
                </div>                    
            @endif
        </div>
        <x-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                {{ __('Online') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Usuario') }}" />
                    <x-input wire:model.defer="username_editar" type="text" class="w-full" disabled />
                    <x-input-error for="username_editar"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Nombre') }}" />
                        <x-input wire:model="name" type="text" class="w-full"/>
                        <x-input-error for="name"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Banquero') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="banquero_id" disabled>
                            @foreach ($lista_usu as $usu)
                                <option value="{{ $usu->id }}">{{ $usu->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="banquero_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Caballos Mínimo') }}" />
                        <x-input wire:model="caballos_minimo" type="text" class="w-full"/>
                        <x-input-error for="caballos_minimo"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Moneda') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="moneda_edit" disabled>
                            @foreach ($lista_monedas as $moneda)
                                <option value="{{ $moneda->id }}">{{ $moneda->moneda }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="moneda_edit" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Trato') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="trato_edit">
                            @foreach ($lista_tratos as $trato)
                                <option value="{{ $trato->id }}">{{ $trato->trato }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="trato_edit" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Estatus') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="estatus_id" >
                            @foreach ($lista_est as $estatus_user)
                                <option value="{{ $estatus_user->id }}">{{ $estatus_user->estatus }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="estatus_id" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="cerrar_ventana_update">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Actualizar') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
                {{ __('Online') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Usuario') }}" />
                    <x-input type="text" class="w-full" wire:model.defer="username"/>
                    <x-input-error for="username"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-2 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Nombre y Apellido') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="name_crear"/>
                        <x-input-error for="name_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Banquero') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="banquero_id_crear" >
                            <option value="">Select...</option>
                            @foreach ($lista_usu as $usu)
                                <option value="{{ $usu->id }}">{{ $usu->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="banquero_id_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Caballos Mínimo') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="caballos_minimo_crear"/>
                        <x-input-error for="caballos_minimo_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Moneda') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="moneda_id" >
                            <option value="">Select...</option>
                            @foreach ($lista_monedas as $moneda)
                                <option value="{{ $moneda->id }}">{{ $moneda->moneda }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="moneda_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Password') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="clave_crear"/>
                        <x-input-error for="clave_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Trato') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="trato_id" >
                            <option value="">Select...</option>
                            @foreach ($lista_tratos as $trato)
                                <option value="{{ $trato->id }}">{{ $trato->trato }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="trato_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Estatus') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="estatus_id_crear" >
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

                <x-boton-primario wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25 ml-2">
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
                        <x-input wire:model.defer="username_recarga" type="text" class="w-full" disabled />
                        <x-input-error for="username_recarga"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="Nombre y Apellido" />
                        <x-input wire:model="name_recarga" type="text" class="w-full" disabled/>
                        <x-input-error for="name_recarga"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="Monto de la Recarga" />
                        <x-input wire:model="monto_recarga" type="text" class="w-full"/>
                        <x-input-error for="monto_recarga"/>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_recarga', false)">
                    Cancelar
                </x-secondary-button>
                <x-boton-primario wire:click="update_recarga" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    Actualizar
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_clave">
            <x-slot name="title">
                {{ __('Supervisor') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Username') }}" />
                    <x-input wire:model.defer="username_clave" type="text" class="w-full" disabled />
                    <x-input-error for="username_clave"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Nombre y Apellido') }}" />
                    <x-input wire:model="name_clave" type="text" class="w-full" disabled />
                    <x-input-error for="name_clave"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Introduzca el Nuevo Password') }}" />
                    <x-input wire:model="nueva_clave" type="text" class="w-full"/>
                    <x-input-error for="nueva_clave"/>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_clave', false)">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update_clave" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
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
