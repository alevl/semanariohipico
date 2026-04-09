<div>

    <body class="bg-gray-100">
        <div class="flex h-screen">
            <div id="sidebar"
                class="fixed lg:static inset-y-0 left-0 w-64 bg-[#0F3D2E] text-white transform -translate-x-full lg:translate-x-0 transition duration-200 ease-in-out z-40">
                <div class="p-6 text-2xl font-bold border-b border-green-900">
                    <img src="{{ asset('storage/sistema/logo.png') }}" style="position:relative; margin:auto"
                        width="120px" />
                </div>
                <nav class="p-4 space-y-3">
                    <a href="{{ route('dashboard') }}" class="block hover:bg-green-900 p-2 rounded">🏠 Dashboard</a>
                    <a href="{{ route('gacetas') }}" class="block hover:bg-green-900 p-2 rounded">📄 Gacetas</a>
                    <a href="{{ route('movimientos') }}" class="block hover:bg-green-900 p-2 rounded">💰 Monedero</a>
                    <a href="{{ route('pronosticos') }}" class="block hover:bg-green-900 p-2 rounded">⭐ Pronósticos</a>
                    <a href="{{ route('transmisiones') }}" class="block hover:bg-green-900 p-2 rounded">🎥
                        Transmisiones</a>
                    <a href="{{ route('perfil') }}" class="block hover:bg-green-900 p-2 rounded">👤 Perfil</a>
                    <a href="{{ route('salir.cierre') }}" class="block text-red-400 p-2 hover:text-red-500">🚪 Cerrar
                        Sesión</a>
                </nav>
            </div>

            <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-30 lg:hidden"></div>
            <div class="flex-1 flex flex-col">
                {{ $slot }}
            </div>
        </div>
    </body>
    <script>
        const menuBtn = document.getElementById("menuBtn")
        const sidebar = document.getElementById("sidebar")
        const overlay = document.getElementById("overlay")

        menuBtn.addEventListener("click", () => {

            sidebar.classList.toggle("-translate-x-full")
            overlay.classList.toggle("hidden")

        })

        overlay.addEventListener("click", () => {

            sidebar.classList.add("-translate-x-full")
            overlay.classList.add("hidden")

        })
    </script>
</div>
