<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
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
          Crear Cuenta
        </h1>
        
        <!-- Formulario -->
        <form method="POST" action="{{ route('registro') }}">
          @csrf
          <x-validation-errors class="mb-4" />

          <div class="mb-4">
            <label class="block text-gray-600 text-sm mb-2">Nombre completo</label>
            <input type="text" placeholder="Tu nombre" id="name" name="name" value="{{ old('name') }}"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <div class="mb-4">
            <label class="block text-gray-600 text-sm mb-2">Usuario</label>
            <input type="type" id="username" name="username" placeholder="alejandro" value="{{ old('username') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <div class="mb-4">
            <label class="block text-gray-600 text-sm mb-2">Contraseña</label>
            <input type="password" placeholder="********" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <div class="mb-6">
            <label class="block text-gray-600 text-sm mb-2">Confirmar contraseña</label>
            <input type="password" placeholder="********"  id="password2" name="password2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <button type="submit"
            class="w-full bg-green-800 hover:bg-green-600 text-white font-bold py-2 rounded-lg transition">
            Registrarse
          </button>
        </form>

        <!-- Enlace a login -->
        <p class="text-center text-sm text-gray-600 mt-6">
          ¿Ya tienes cuenta?
          <a href="{{ route('login') }}" class="text-green-800 hover:underline font-semibold">Inicia sesión</a>
        </p>
      </div>
    </div>
  </div>

</body>
</html>
