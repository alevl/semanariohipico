<div>
    <x-layouts.menu-user>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-2">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Transmisiones de Carreras') }}</span>

            <div class="col-12 mt-4" style="overflow-x: auto">
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-2 my-2 rounded">

                    <div x-data="{ open: false }" class="relative w-full">
                        <!-- Botón -->
                        <button @click="open = !open"
                                class="w-full flex justify-between items-center border border-gray-300 bg-indigo-600 text-white rounded-md px-4 py-2 text-sm font-medium shadow-sm hover:bg-indigo-700 focus:outline-none">
                            Seleccionar Cantidad de Pantallas
                        </button>

                        <!-- Aquí aparece el select -->
                        <div x-show="open" 
                            x-transition
                            class="mt-2 w-full">
                            <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm"
                                    wire:model.live="cantidad">
                                <option value="0">Cantidad de Pantallas</option>
                                <option value="1">1 Pantalla</option>
                                <option value="2">2 Pantallas</option>
                                <option value="3">3 Pantallas</option>
                                <option value="4">4 Pantallas</option>
                                <option value="5">5 Pantallas</option>
                                <option value="6">6 Pantallas</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12" style="overflow-x: auto">
                @if($cantidad == 1)
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-2 my-2 rounded h-screen">
                        <div class="flex flex-col">
                            <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                        rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                    wire:model.live="pantalla1"
                                    wire:change="seleccionar_canal($event.target.value, 1)">
                                <option value="0">Seleccione el canal de la transmisión</option>
                                @foreach($transmisiones as $data)
                                    <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                @endforeach
                            </select>
                            <iframe class="w-full flex-1" src="{{ $video1 }}"></iframe>
                        </div>
                    </div>
                @else
                    @if($cantidad == 2)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 my-2 rounded h-screen">
                            <div class="flex flex-col">
                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                        wire:model.live="pantalla1"
                                        wire:change="seleccionar_canal($event.target.value, 2)">
                                    <option value="0">Seleccione el canal de la transmisión</option>
                                    @foreach($transmisiones as $data)
                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                    @endforeach
                                </select>
                                <iframe class="w-full flex-1" src="{{ $video2 }}"></iframe>
                            </div>
                            <div class="flex flex-col">
                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                        wire:model.live="pantalla1"
                                        wire:change="seleccionar_canal($event.target.value, 3)">
                                    <option value="0">Seleccione el canal de la transmisión</option>
                                    @foreach($transmisiones as $data)
                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                    @endforeach
                                </select>
                                <iframe class="w-full flex-1" src="{{ $video3 }}"></iframe>
                            </div>
                        </div>
                    @else
                        @if($cantidad == 3)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 my-2 rounded h-screen">
                                <div class="flex flex-col">
                                    <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                            wire:model.live="pantalla1"
                                            wire:change="seleccionar_canal($event.target.value, 4)">
                                        <option value="0">Seleccione el canal de la transmisión</option>
                                        @foreach($transmisiones as $data)
                                            <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                        @endforeach
                                    </select>
                                    <iframe class="w-full flex-1" src="{{ $video4 }}"></iframe>
                                </div>

                                <div class="flex flex-col">
                                    <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                            wire:model.live="pantalla2"
                                            wire:change="seleccionar_canal($event.target.value, 5)">
                                        <option value="0">Seleccione el canal de la transmisión</option>
                                        @foreach($transmisiones as $data)
                                            <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                        @endforeach
                                    </select>
                                    <iframe class="w-full flex-1" src="{{ $video5 }}"></iframe>
                                </div>

                                <div class="flex flex-col">
                                    <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                            wire:model.live="pantalla3"
                                            wire:change="seleccionar_canal($event.target.value, 6)">
                                        <option value="0">Seleccione el canal de la transmisión</option>
                                        @foreach($transmisiones as $data)
                                            <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                        @endforeach
                                    </select>
                                    <iframe class="w-full flex-1" src="{{ $video6 }}"></iframe>
                                </div>
                            </div>
                        @else
                            @if($cantidad == 4)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 my-2 rounded h-screen">
                                    <div class="flex flex-col">
                                        <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                    rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                wire:model.live="pantalla1"
                                                wire:change="seleccionar_canal($event.target.value, 7)">
                                            <option value="0">Seleccione el canal de la transmisión</option>
                                            @foreach($transmisiones as $data)
                                                <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                            @endforeach
                                        </select>
                                        <iframe class="w-full flex-1" src="{{ $video7 }}"></iframe>
                                    </div>

                                    <div class="flex flex-col">
                                        <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                    rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                wire:model.live="pantalla2"
                                                wire:change="seleccionar_canal($event.target.value, 8)">
                                            <option value="0">Seleccione el canal de la transmisión</option>
                                            @foreach($transmisiones as $data)
                                                <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                            @endforeach
                                        </select>
                                        <iframe class="w-full flex-1" src="{{ $video8 }}"></iframe>
                                    </div>

                                    <div class="flex flex-col">
                                        <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                    rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                wire:model.live="pantalla3"
                                                wire:change="seleccionar_canal($event.target.value, 9)">
                                            <option value="0">Seleccione el canal de la transmisión</option>
                                            @foreach($transmisiones as $data)
                                                <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                            @endforeach
                                        </select>
                                        <iframe class="w-full flex-1" src="{{ $video9 }}"></iframe>
                                    </div>
                                    <div class="flex flex-col">
                                        <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                    rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                wire:model.live="pantalla3"
                                                wire:change="seleccionar_canal($event.target.value, 10)">
                                            <option value="0">Seleccione el canal de la transmisión</option>
                                            @foreach($transmisiones as $data)
                                                <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                            @endforeach
                                        </select>
                                        <iframe class="w-full flex-1" src="{{ $video10 }}"></iframe>
                                    </div>
                                </div>
                            @else
                                @if($cantidad == 5)
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 my-2 rounded h-screen">
                                        <div class="flex flex-col">
                                            <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                        rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                    wire:model.live="pantalla1"
                                                    wire:change="seleccionar_canal($event.target.value, 11)">
                                                <option value="0">Seleccione el canal de la transmisión</option>
                                                @foreach($transmisiones as $data)
                                                    <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                @endforeach
                                            </select>
                                            <iframe class="w-full flex-1" src="{{ $video11 }}"></iframe>
                                        </div>

                                        <div class="flex flex-col">
                                            <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                        rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                    wire:model.live="pantalla2"
                                                    wire:change="seleccionar_canal($event.target.value, 12)">
                                                <option value="0">Seleccione el canal de la transmisión</option>
                                                @foreach($transmisiones as $data)
                                                    <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                @endforeach
                                            </select>
                                            <iframe class="w-full flex-1" src="{{ $video12 }}"></iframe>
                                        </div>

                                        <div class="flex flex-col">
                                            <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                        rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                    wire:model.live="pantalla3"
                                                    wire:change="seleccionar_canal($event.target.value, 13)">
                                                <option value="0">Seleccione el canal de la transmisión</option>
                                                @foreach($transmisiones as $data)
                                                    <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                @endforeach
                                            </select>
                                            <iframe class="w-full flex-1" src="{{ $video13 }}"></iframe>
                                        </div>
                                        <div class="flex flex-col">
                                            <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                        rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                    wire:model.live="pantalla3"
                                                    wire:change="seleccionar_canal($event.target.value, 14)">
                                                <option value="0">Seleccione el canal de la transmisión</option>
                                                @foreach($transmisiones as $data)
                                                    <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                @endforeach
                                            </select>
                                            <iframe class="w-full flex-1" src="{{ $video14 }}"></iframe>
                                        </div>
                                        <div class="flex flex-col">
                                            <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                        rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                    wire:model.live="pantalla3"
                                                    wire:change="seleccionar_canal($event.target.value, 15)">
                                                <option value="0">Seleccione el canal de la transmisión</option>
                                                @foreach($transmisiones as $data)
                                                    <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                @endforeach
                                            </select>
                                            <iframe class="w-full flex-1" src="{{ $video15 }}"></iframe>
                                        </div>
                                    </div>
                                @else
                                    @if($cantidad == 6)
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 my-2 rounded h-screen">
                                            <div class="flex flex-col">
                                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                        wire:model.live="pantalla1"
                                                        wire:change="seleccionar_canal($event.target.value, 16)">
                                                    <option value="0">Seleccione el canal de la transmisión</option>
                                                    @foreach($transmisiones as $data)
                                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                    @endforeach
                                                </select>
                                                <iframe class="w-full flex-1" src="{{ $video16 }}"></iframe>
                                            </div>

                                            <div class="flex flex-col">
                                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                        wire:model.live="pantalla2"
                                                        wire:change="seleccionar_canal($event.target.value, 17)">
                                                    <option value="0">Seleccione el canal de la transmisión</option>
                                                    @foreach($transmisiones as $data)
                                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                    @endforeach
                                                </select>
                                                <iframe class="w-full flex-1" src="{{ $video17 }}"></iframe>
                                            </div>

                                            <div class="flex flex-col">
                                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                        wire:model.live="pantalla3"
                                                        wire:change="seleccionar_canal($event.target.value, 18)">
                                                    <option value="0">Seleccione el canal de la transmisión</option>
                                                    @foreach($transmisiones as $data)
                                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                    @endforeach
                                                </select>
                                                <iframe class="w-full flex-1" src="{{ $video18 }}"></iframe>
                                            </div>
                                            <div class="flex flex-col">
                                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                        wire:model.live="pantalla3"
                                                        wire:change="seleccionar_canal($event.target.value, 19)">
                                                    <option value="0">Seleccione el canal de la transmisión</option>
                                                    @foreach($transmisiones as $data)
                                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                    @endforeach
                                                </select>
                                                <iframe class="w-full flex-1" src="{{ $video19 }}"></iframe>
                                            </div>
                                            <div class="flex flex-col">
                                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                        wire:model.live="pantalla3"
                                                        wire:change="seleccionar_canal($event.target.value, 20)">
                                                    <option value="0">Seleccione el canal de la transmisión</option>
                                                    @foreach($transmisiones as $data)
                                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                    @endforeach
                                                </select>
                                                <iframe class="w-full flex-1" src="{{ $video20 }}"></iframe>
                                            </div>
                                            <div class="flex flex-col">
                                                <select class="mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 
                                                            rounded-md border border-primary px-2 py-2.5 focus:outline-none sm:text-sm"
                                                        wire:model.live="pantalla3"
                                                        wire:change="seleccionar_canal($event.target.value, 21)">
                                                    <option value="0">Seleccione el canal de la transmisión</option>
                                                    @foreach($transmisiones as $data)
                                                        <option value="{{ $data->ruta }}">{{ $data->canal }}</option>
                                                    @endforeach
                                                </select>
                                                <iframe class="w-full flex-1" src="{{ $video21 }}"></iframe>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </x-layouts.menu-user>
</div>
