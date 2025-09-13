<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="shortcut icon" href="{{ asset('storage/sistema/favicon.png') }}" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-100 font-sans">

  <!-- Fondo con imagen -->
  <div class="relative h-full w-full bg-cover bg-center" style="background-image: url({{ asset('storage/sistema/login.jpg') }});">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div> <!-- Capa oscura -->

    <!-- Contenedor centrado -->
    <div class="relative flex items-center justify-center h-full p-4">
      <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md shadow-lg rounded-2xl p-8">
        
        <img class="text-center" src="{{ asset('storage/sistema/logo.png') }}" />
        
        <!-- Título -->
        <h1 class="text-2xl font-bold text-center text-green-800 mb-4 mt-4">
          Iniciar Sesión
        </h1>
        
        <!-- Formulario -->
        <form method="POST" action="{{ route('acceso') }}">
          @csrf
          <x-validation-errors class="mb-4" />
          <div class="mb-4">
            <label class="block text-gray-600 text-sm mb-2">Usario</label>
            <input type="type" id="username" name="username" placeholder="alejandro" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
          </div>

          <div class="mb-4">
            <label class="block text-gray-600 text-sm mb-2">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="********" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
          </div>

          <div class="flex items-center justify-between mb-6">
            <label class="flex items-center text-sm text-gray-600">
              <input type="checkbox" class="mr-2"> Recordarme
            </label>
            <a href="#" class="text-sm text-green-800 hover:underline">¿Olvidaste tu contraseña?</a>
          </div>

          <button type="submit"
            class="w-full bg-green-800 hover:bg-green-600 text-white font-bold py-2 rounded-lg transition">
            Ingresar
          </button>
        </form>

        <!-- Enlace a registro -->
        <p class="text-center text-sm text-gray-600 mt-6">
          ¿No tienes cuenta?
          <a href="{{ route('register') }}" class="text-green-800 hover:underline font-semibold">Regístrate</a>
        </p>
      </div>
    </div>
  </div>

</body>
</html>
