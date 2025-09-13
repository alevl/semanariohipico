<header class="bg-gray-200 text-green-700 p-2 shadow-md">
    <nav class="bg-gray-200 font-sans">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <img src="{{ asset('storage/sistema/logo.png') }}" class="h-14" alt="Semanario Hípico">

            <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">                
                <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-language" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-language">
                <ul class="bg-gray-200 flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('tablero') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Dashboard') }}</a>
                    </li>
                    <li>
                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown0" class="flex items-center justify-between w-full py-2 px-3 font-medium border-b border-gray-100 md:w-auto texto-primero hover:underline md:border-0  md:p-0">
                            Hípica
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div id="mega-menu-dropdown0" class="absolute z-10 grid hidden w-auto grid-cols-1 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-1 dark:bg-gray-700">
                            <div class="p-4">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="{{ route('carreras-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Carreras') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tickets-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Tickets') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reportes-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Reportes') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pronosticos-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Pronósticos') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pantallas-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Transmisiones') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('gacetas-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Gacetas') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="flex items-center justify-between w-full py-2 px-3 font-medium border-b border-gray-100 md:w-auto texto-primero hover:underline md:border-0 md:p-0">
                            Usuarios 
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div id="mega-menu-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-1 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-1 dark:bg-gray-700">
                            <div class="p-4">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="{{ route('administradores') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Administradores') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('banqueros-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Banqueros') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('usuarios-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Onlines') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('taquillas-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Taquillas') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('movimientos-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Movimientos') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown2" class="flex items-center justify-between w-full py-2 px-3 font-medium border-b border-gray-100 md:w-auto texto-primero hover:underline md:border-0 md:p-0">
                            Configuración
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div id="mega-menu-dropdown2" class="absolute z-10 grid hidden w-auto grid-cols-1 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-1 dark:bg-gray-700">
                            <div class="p-4">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="{{ route('hipodromos-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Hipódromos') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('monedas-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Monedas') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('precios-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Precios') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('configuracion-transmisiones') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Transmisiones') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('configuracion-gacetas') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Gacetas') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('configuracion-pronosticos') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Pronósticos') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('perfil-admin') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Perfil') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('salir.cierre') }}" class="block py-2 px-3 texto-primero hover:underline md:p-0">{{ __('Salir') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body class="bg-gray-100">
    {{ $slot }}
<body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>