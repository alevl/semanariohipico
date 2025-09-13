<header class="bg-gray-200 text-white p-4 flex justify-between items-center shadow-md" style="height: 70px">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('storage/sistema/logo.png') }}" class="h-14" alt="Semanario Hípico">
    </a>

    <div class="space-x-2">
        <a href="register" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500">Registrarse</a>
        <a href="login" class="bg-white text-green-700 px-4 py-2 rounded hover:bg-gray-200">Login</a>
    </div>
</header>
<body class="bg-gray-100 flex flex-col min-h-screen">
    {{ $slot }}
</body>
