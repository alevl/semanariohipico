<div>
  <x-layouts.menu-user>
    <main class="max-w-7xl mx-auto p-6 space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-5 flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">Saldo</h3>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ "$".number_format($usuario->monedero,2) }}</p>
          </div>
          <h3><i class="icofont icofont-wallet w-10 h-10 text-green-700" style="font-size: 3em"></i></h3>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-5 flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">Recarga saldo</h3>
            <p class="text-gray-500 mt-1">y sigue disfrutando </p>
          </div>
          <a wire:click="recarga()" class="cursor-pointer px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-600 text-sm">
            Recargar
          </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-5 flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">Transmisiones en vivo</h3>
            <p class="text-gray-500 mt-1">Carreras disponibles ahora</p>
          </div>
          <a href="{{ route('transmisiones') }}" class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-600 text-sm">
            Ver ahora
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-5 flex flex-col">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
              <i class="icofont icofont-chart-histogram-alt w-5 h-5 text-green-500"></i> Pronósticos {{ $fecha_actual }} 
            </h3>
          </div>
          <div class="flex-1 overflow-y-auto">
            <ul class="space-y-3">
              <?php $aux=0?>
              <?php $sw=0?>
              @foreach($hipodromos as $dato)
                <?php $sw=$sw+1?>
                <div class="border-b border-slate-200">
                  <button onclick="toggleAccordion({{ $sw }})" class="w-full flex justify-between items-center py-5 text-slate-800">
                    <span>{{ $dato->hipodromo }}</span>
                    <?php $aux = $dato->hipodromo_id?>

                    <span id="{{ "icon-".$sw }}" class="text-slate-800 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>

                  <div id="{{ "content-".$sw }}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">                    
                    <div class="pb-5 text-sm text-slate-500">
                      @foreach($pronosticos as $data)
                        @if($dato->hipodromo_id == $data->hipodromo_id)
                          <div class="mb-2">
                              <h5 class="font-semibold mb-3">{{ 'Carrera : '.$data->carrera }}</h5>
                              <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                  <div class="p-2 rounded">
                                      <p class="font-semibold">{{ "# ".$data->primera_marca }}</p>
                                      <p class="font-semibold">{{ "# ".$data->segunda_marca }}</p>
                                      <p class="font-semibold">{{ "# ".$data->tercera_marca }}</p>
                                      <p class="font-semibold">{{ "# ".$data->cuarta_marca }}</p>
                                  </div>
                              </div>
                            </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-5 flex flex-col h-[400px]">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
              <i class="icofont icofont-file-text w-5 h-5 text-purple-500"></i> Gacetas {{ $fecha_actual }}
            </h3>
          </div>
          <div class="flex-1 overflow-y-auto">
            <ul class="space-y-3">
              @foreach($gacetas as $dato)
                <li class="border-b pb-2 flex justify-between items-center">
                  <span>{{ $dato->hipodromo }}</span>
                  <a href="{{ asset('storage/'.$dato->ruta) }}" download class="text-blue-600 hover:underline text-sm">Descargar</a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-5 flex flex-col h-[400px]">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
              <i class="icofont icofont-listing-number w-5 h-5 text-blue-500"></i> Movimientos
            </h3>
            <a href="{{ route('movimientos') }}" class="text-sm text-green-700 hover:underline">Ver todas</a>
          </div>
          <div class="flex-1 overflow-y-auto">
            <ul class="space-y-3">
              @foreach($movimientos as $data)
                <li class="border-b pb-2 flex justify-between items-center">
                  <span class="text-sm">{{ $data->fecha }}</span>
                  @if (($data->operacion_id) == 2)
                      <span class="py-1 px-1 rounded" style="background-color: #a3e4d7; color:#0e6251">
                        <span class="text-sm">{{ $data->operacion }}</span>
                      </span> 
                  @else
                      <span class="py-1 px-1 rounded" style="background-color: #fadbd8; color: #78281f">
                        <span class="text-sm">{{ $data->operacion }}</span>
                      </span>
                  @endif
                  <span class="text-sm">{{ "$".number_format($data->monto,2) }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </main>
  </x-layouts.menu-user>
  <x-dialog-modal wire:model="open_crear">
      <x-slot name="title">
          {{ __('Recargar Saldo') }}
      </x-slot>
      <x-slot name="content">
        <div class="mb-4">
            <x-label value="{{ __('Banco') }}" />
            <x-input type="text" class="w-full" wire:model.defer="banco" disabled/>
            <x-input-error for="Banco"/>
        </div>
        <div class="mb-4">
            <x-label value="{{ __('Código del Banco') }}" />
            <x-input type="text" class="w-full" wire:model.defer="codigo" disabled/>
            <x-input-error for="codigo"/>
        </div>
        <div class="mb-4">
            <x-label value="{{ __('Teléfono') }}" />
            <x-input type="text" class="w-full" wire:model.defer="telefono" disabled/>
            <x-input-error for="telefono"/>
        </div>
        <div class="mb-4">
            <x-label value="{{ __('Cedula') }}" />
            <x-input type="text" class="w-full" wire:model.defer="cedula" disabled/>
            <x-input-error for="cedula"/>
        </div>
        <div class="mb-4">
            <x-label value="{{ __('Referencia') }}" />
            <x-input type="text" class="w-full" wire:model.defer="referencia"/>
            <x-input-error for="referencia"/>
        </div>
        <div class="mb-4">
            <x-label value="{{ __('Monto') }}" />
            <x-input type="text" class="w-full" wire:model.defer="monto"/>
            <x-input-error for="monto"/>
        </div>
      </x-slot>
      <x-slot name="footer">
          <x-secondary-button wire:click="$set('open_crear', false)">
              {{ __('Cancelar') }}
          </x-secondary-button>

          <x-boton-primario wire:click="recarga_update" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25 ml-2">
              {{ __('Notificar Recarga') }}
          </x-boton-primario>
      </x-slot>
  </x-dialog-modal>

</div>
