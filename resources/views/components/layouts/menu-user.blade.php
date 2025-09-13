<body class="bg-gray-100 font-sans">
    <header class="bg-gray-200 text-green-700 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <img src="{{ asset('storage/sistema/logo.png') }}" class="h-14" alt="Semanario Hípico">
            <nav>
                <a href="{{ route('dashboard') }}" class="px-3 hover:underline">Inicio</a>
                <a href="{{ route('perfil') }}" class="px-3 hover:underline">Perfil</a>
                <a href="{{ route('salir.cierre') }}" class="px-3 hover:underline">Salir</a>
            </nav>
        </div>
    </header>

    {{ $slot }}

</body>
<script>
    function toggleAccordion(index) 
    {
        // Cierra todos los acordeones
        document.querySelectorAll("[id^='content-']").forEach(el => {
            el.style.maxHeight = "0px";
        });
        document.querySelectorAll("[id^='icon-']").forEach(el => {
            el.classList.remove("rotate-180");
        });

        const content = document.getElementById(`content-${index}`);
        const icon = document.getElementById(`icon-${index}`);

        // Si estaba cerrado, lo abrimos
        if (content.style.maxHeight === "0px" || !content.style.maxHeight) {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.classList.add("rotate-180");

            // Llevar el scroll del contenedor al inicio
            const container = document.getElementById(`content-${index}`);
            container.scrollTop = 0; 
        }
    }
</script>





