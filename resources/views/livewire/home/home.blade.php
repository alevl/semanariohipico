<div>
    <x-layouts.app>
        <div class="min-h-screen bg-gray-100 text-gray-800">

            <!-- HEADER -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                    <div>
                        <img src="{{ asset('storage/sistema/logo.png') }}" style="position:relative; margin:auto"
                            width="90px" />
                    </div>

                    <a href="/login"
                        class="bg-[#0F3D2E] hover:bg-green-700 text-white px-4 py-2 rounded font-semibold transition">
                        Iniciar Sesión
                    </a>
                </div>
            </header>

            <!-- HERO -->
            <section class="text-center py-12 px-6">
                <h2 class="text-3xl font-bold text-[#0F3D2E] mb-4">
                    Vive la emoción de las carreras como un profesional
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto mb-6">
                    Accede a pollas hípicas, remates adelantados y toda la información que necesitas para tomar mejores
                    decisiones.
                </p>

                <a href="/login"
                    class="bg-[#0F3D2E] hover:bg-green-700 text-white px-6 py-3 rounded-lg font-bold shadow transition">
                    Entrar al Sistema
                </a>
            </section>

            <!-- SERVICIOS -->
            <section class="max-w-6xl mx-auto px-6 py-8 grid md:grid-cols-3 gap-6">

                <!-- POLLAS -->
                <div class="bg-white p-5 rounded-xl shadow border-t-4 border-[#0F3D2E] text-center">
                    <div class="text-3xl mb-2">🎯</div>
                    <h3 class="font-bold text-lg text-[#0F3D2E] mb-2">Pollas Hípicas</h3>
                    <p class="text-sm text-gray-600">
                        Participa en nuestras pollas y demuestra tu conocimiento en cada jornada.
                    </p>
                </div>

                <!-- REMATES -->
                <div class="bg-white p-5 rounded-xl shadow border-t-4 border-[#0F3D2E] text-center">
                    <div class="text-3xl mb-2">💰</div>
                    <h3 class="font-bold text-lg text-[#0F3D2E] mb-2">Remates Adelantados</h3>
                    <p class="text-sm text-gray-600">
                        Accede a remates exclusivos antes de las carreras y aumenta tus oportunidades.
                    </p>
                </div>

                <!-- PRONOSTICOS -->
                <div class="bg-white p-5 rounded-xl shadow border-t-4 border-[#0F3D2E] text-center">
                    <div class="text-3xl mb-2">📊</div>
                    <h3 class="font-bold text-lg text-[#0F3D2E] mb-2">Pronósticos</h3>
                    <p class="text-sm text-gray-600">
                        Análisis y predicciones para ayudarte a elegir los mejores ejemplares.
                    </p>
                </div>

            </section>

            <!-- EXTRAS -->
            <section class="bg-white py-10 px-6 mt-6">
                <div class="max-w-5xl mx-auto text-center">

                    <h2 class="text-2xl font-bold text-[#0F3D2E] mb-6">
                        Todo en un solo lugar
                    </h2>

                    <div class="grid md:grid-cols-3 gap-6 text-sm">

                        <div>
                            <div class="text-2xl mb-2">📺</div>
                            <p class="font-semibold">Transmisiones Hípicas</p>
                        </div>

                        <div>
                            <div class="text-2xl mb-2">📰</div>
                            <p class="font-semibold">Gacetas Actualizadas</p>
                        </div>

                        <div>
                            <div class="text-2xl mb-2">⚡</div>
                            <p class="font-semibold">Resultados en Tiempo Real</p>
                        </div>

                    </div>

                </div>
            </section>

            <!-- CTA FINAL -->
            <section class="text-center py-10 px-6">
                <h3 class="text-xl font-bold text-[#0F3D2E] mb-4">
                    ¿Listo para comenzar?
                </h3>

                <a href="/login"
                    class="bg-[#0F3D2E] hover:bg-green-700 text-white px-6 py-3 rounded-lg font-bold shadow transition">
                    Acceder Ahora
                </a>
            </section>

            <!-- FOOTER -->
            <footer class="bg-[#0F3D2E] text-white text-center py-4 mt-6 text-sm">
                © {{ date('Y') }} Semanario Hípico - Todos los derechos reservados
            </footer>

        </div>
    </x-layouts.app>
</div>
