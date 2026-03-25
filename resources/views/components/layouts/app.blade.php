<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og:description" content="hipismo">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('storage/sistema/favicon.png') }}" type="image/x-icon">
    <!--ICONOS-->
    <link rel="stylesheet" href="{{ asset('librerias/iconos/iconos/icofont.css') }}">
    <!--TAILWIND-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!--MIS ESTILOS-->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')

    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                '',
                message,
                'success'
            )
        })

        Livewire.on('no_coinciden', function(message) {
            Swal.fire(
                'Passwords no coinciden',
                '',
                'error'
            )
        })

        Livewire.on('quiniela_no_disponible', function(message) {
            Swal.fire(
                'La inscripción cerró. Disculpe las molestias ocasionadas',
                '',
                'error'
            )
        })

        Livewire.on('saldo_insuficiente', function(message) {
            Swal.fire(
                'No tiene el saldo suficiente para sella la apuesta',
                '',
                'error'
            )
        })

        Livewire.on('no_saldo', function(message) {
            Swal.fire(
                'No tiene el saldo suficiente para realizar este retiro',
                '',
                'error'
            )
        })

        Livewire.on('no_existe', function(message) {
            Swal.fire(
                'Equipo NO existe',
                '',
                'error'
            )
        })

        Livewire.on('existe_jugador', function(message) {
            Swal.fire(
                'El jugador ya fue procesado',
                '',
                'error'
            )
        })

        Livewire.on('no_puja', function(message) {
            Swal.fire(
                'No tiene el saldo suficiente para pujar por ese ejemplar',
                '',
                'error'
            )
        })

        Livewire.onPageExpired((response, message) => {
            location.reload()
        })
    </script>
</body>

</html>
