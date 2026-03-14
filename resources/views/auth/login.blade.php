<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login - Semanario Hípico</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
:root{
    --principal:#0F3D2E;
    --secundario:#D4A017;
}
body{
    font-family: 'Poppins', sans-serif;
}
</style>
</head>

<body class="bg-gradient-to-r from-[#0F3D2E] to-[#1F6F4A] h-screen flex items-center justify-center">

<div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8">

{{-- LOGO --}}
<div class="flex justify-center mb-6">
    <img src="{{ asset('storage/sistema/logo.png') }}" alt="Semanario Hípico" class="h-24 w-auto">
</div>

<h2 class="text-2xl font-bold text-center text-[#0F3D2E] mb-8">
Bienvenido a Semanario Hípico
</h2>

<x-validation-errors class="mb-4" />
<form method="POST" action="{{ route('acceso.acceso') }}" class="space-y-5">
    @csrf

    <div>
        <label class="block text-gray-700 font-semibold mb-2">Usuario</label>
        <input type="text" name="username" value="{{ old('username') }}"
               class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
               placeholder="pedro" required autofocus>
    </div>

    <div>
        <label class="block text-gray-700 font-semibold mb-2">Contraseña</label>
        <input type="password" name="password"
               class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
               placeholder="********" required>
    </div>

    <div class="flex items-center justify-between">
        <label class="inline-flex items-center text-gray-700">
            <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-[#D4A017]">
            <span class="ml-2">Recordarme</span>
        </label>

        <a href="{{ route('password.request') }}" class="text-sm text-[#D4A017] hover:underline">
            ¿Olvidaste tu contraseña?
        </a>
    </div>

    <button type="submit"
            class="w-full bg-[#D4A017] text-white font-bold py-2 rounded-lg hover:bg-[#F2C94C] transition">
        Iniciar sesión
    </button>
</form>


</div>

</body>
</html>