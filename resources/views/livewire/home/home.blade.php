<div>
    <x-layouts.menu-home>
        <!-- Contenedor principal -->
        <div class="flex flex-1 relative">

            <!-- Columna Publicidad -->
            <aside class="bg-white p-4 shadow rounded fixed top-16 left-0 w-[200px] h-[calc(100vh-80px)] overflow-y-auto hidden md:block mt-6">
                <h2 class="text-lg font-bold mb-4">Publicidad</h2>
                <div class="space-y-4">
                    <div class="bg-gray-200 h-40 flex items-center justify-center rounded">Anuncio 1</div>
                    <div class="bg-gray-200 h-40 flex items-center justify-center rounded">Anuncio 2</div>
                    <div class="bg-gray-200 h-40 flex items-center justify-center rounded">Anuncio 3</div>
                </div>
            </aside>

            <!-- Columna Información -->
            <aside class="bg-white p-6 shadow rounded fixed top-16 left-[200px] w-[calc(100vw-560px)] h-[calc(100vh-80px)] overflow-y-auto hidden md:block mt-6">
                <!-- Espacio para imagen -->
                <img class="mb-6 w-full h-96 border-4 rounded" src="{{ asset('storage/sistema/imagen2.jpg') }}" />

                <h2 class="text-xl font-bold mb-4">Bienvenido a Semanario Hípico, tu mejor aliado para triunfar en las apuestas</h2>
                <p class="mb-6">
                    En nuestra plataforma encontrarás todo lo que un apostador serio necesita para maximizar sus ganancias: pronósticos precisos elaborados por expertos, gacetas oficiales con análisis detallados de cada carrera y transmisión en vivo para que no te pierdas ni un solo detalle de la acción.
                </p>
                <p class="mb-6">
                    Con Semanario Hípico estarás siempre un paso adelante, con información confiable y actualizada al instante para que tomes decisiones acertadas y vivas la emoción de las carreras al máximo. ¡Únete a nuestra comunidad y transforma cada apuesta en una victoria segura!
                </p>

                <h3 class="text-lg font-bold mb-2">Contacto</h3>
                <p class="mb-1">Tel: +58 123-4567890</p>
                <p>Email: contacto@pagina.com</p>
            </aside>

            <!-- Columna Pronósticos y Gacetas -->
            <main class="p-6 fixed top-16 right-0 w-[360px] h-[calc(100vh-80px)] overflow-y-auto bg-white shadow rounded hidden md:block mt-6">
                <h4 class="font-bold mb-6">Pronósticos - 11/08/2025</h4>

                <!-- Pronósticos -->
                <h5 class="font-bold mb-6">La Rinconada</h5>

                <section class="mb-8">
                    <!-- Carrera 1 -->
                    <article class="mb-6 shadow-md">
                        <h5 class="font-semibold mb-3">Carrera 1</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-2 rounded">
                                <p class="font-bold">#1 Gran Campeón</p>
                                <p class="font-bold">#3 Relámpago</p>
                                <p class="font-bold">#5 Bella Dama</p>
                                <p class="font-bold">#7 Veloz</p>
                            </div>
                        </div>
                    </article>
                    <article class="mb-6 shadow-md">
                        <h5 class="font-semibold mb-3">Carrera 2</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-2 rounded">
                                <p class="font-bold">#1 Gran Campeón</p>
                                <p class="font-bold">#3 Relámpago</p>
                                <p class="font-bold">#5 Bella Dama</p>
                                <p class="font-bold">#7 Veloz</p>
                            </div>
                        </div>
                    </article>
                    <article class="mb-6 shadow-md">
                        <h5 class="font-semibold mb-3">Carrera 3</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-2 rounded">
                                <p class="font-bold">#1 Gran Campeón</p>
                                <p class="font-bold">#3 Relámpago</p>
                                <p class="font-bold">#5 Bella Dama</p>
                                <p class="font-bold">#7 Veloz</p>
                            </div>
                        </div>
                    </article>
                </section>

                <!-- Gacetas -->
                <section>
                    <h4 class="font-bold mb-6">Gacetas - 11/08/2025</h4>
                    <div class="space-y-0">
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">La Rinconada</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">Del Mar</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">Gulstreampark</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">Valencia</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">zsdvjazhd</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">ahsdbjas</h3></a>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Responsive móvil -->
            <div class="md:hidden p-4 space-y-6">
                <!-- Publicidad -->
                <section>
                    <h2 class="text-lg font-bold mb-2">Publicidad</h2>
                    <div class="space-y-4">
                        <div class="bg-gray-200 h-40 flex items-center justify-center rounded">Anuncio 1</div>
                        <div class="bg-gray-200 h-40 flex items-center justify-center rounded">Anuncio 2</div>
                        <div class="bg-gray-200 h-40 flex items-center justify-center rounded">Anuncio 3</div>
                    </div>
                </section>

                <!-- Información -->
                <section>
                    <img class="mb-6 w-full h-96 border-4 rounded" src="{{ asset('storage/sistema/imagen2.jpg') }}" />

                    <h2 class="text-xl font-bold mb-4">Bienvenido a Semanario Hípico, tu mejor aliado para triunfar en las apuestas</h2>
                    <p class="mb-6">
                        En nuestra plataforma encontrarás todo lo que un apostador serio necesita para maximizar sus ganancias: pronósticos precisos elaborados por expertos, gacetas oficiales con análisis detallados de cada carrera y transmisión en vivo para que no te pierdas ni un solo detalle de la acción.
                    </p>
                    <p class="mb-6">
                        Con Semanario Hípico estarás siempre un paso adelante, con información confiable y actualizada al instante para que tomes decisiones acertadas y vivas la emoción de las carreras al máximo. ¡Únete a nuestra comunidad y transforma cada apuesta en una victoria segura!
                    </p>

                    <h3 class="text-lg font-bold mb-2">Contacto</h3>
                    <p class="mb-1">Tel: +58 123-4567890</p>
                    <p>Email: contacto@pagina.com</p>
                </section>

                <!-- Pronósticos y Gacetas -->
                <section>
                    <h4 class="font-bold mb-6">Pronósticos - 11/08/2025</h4>

                    <!-- Pronósticos -->
                    <h5 class="font-bold mb-6">La Rinconada</h5>
                    <!-- Pronósticos y gacetas aquí igual que en desktop -->
                    <article class="mb-6 shadow-md">
                        <h5 class="font-semibold mb-3">Carrera 1</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-2 rounded">
                                <p class="font-bold">#1 Gran Campeón</p>
                                <p class="font-bold">#3 Relámpago</p>
                                <p class="font-bold">#5 Bella Dama</p>
                                <p class="font-bold">#7 Veloz</p>
                            </div>
                        </div>
                    </article>
                    <article class="mb-6 shadow-md">
                        <h5 class="font-semibold mb-3">Carrera 2</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-2 rounded">
                                <p class="font-bold">#1 Gran Campeón</p>
                                <p class="font-bold">#3 Relámpago</p>
                                <p class="font-bold">#5 Bella Dama</p>
                                <p class="font-bold">#7 Veloz</p>
                            </div>
                        </div>
                    </article>
                    <article class="mb-6 shadow-md">
                        <h5 class="font-semibold mb-3">Carrera 3</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-2 rounded">
                                <p class="font-bold">#1 Gran Campeón</p>
                                <p class="font-bold">#3 Relámpago</p>
                                <p class="font-bold">#5 Bella Dama</p>
                                <p class="font-bold">#7 Veloz</p>
                            </div>
                        </div>
                    </article>

                    <h4 class="font-bold mb-6">Gacetas - 11/08/2025</h4>
                    <div class="space-y-0">
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">La Rinconada</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">Del Mar</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">Gulstreampark</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">Valencia</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">zsdvjazhd</h3></a>
                        </div>
                        <div class="bg-gray-50 p-2 shadow rounded">
                            <a href="#"><h3 class="font-semibold">ahsdbjas</h3></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </x-layouts.menu-home>
</div>