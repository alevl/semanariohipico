<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalirController;
use App\Http\Controllers\GrabarPollaController;

use App\Livewire\Home\Home;

use App\Livewire\Usuario\Dashboard;
use App\Livewire\Usuario\Transmisiones;
use App\Livewire\Usuario\Gacetas;
use App\Livewire\Usuario\Pronosticos;
use App\Livewire\Usuario\Movimientos;
use App\Livewire\Usuario\Pollas;
use App\Livewire\Usuario\PollaSellar;
use App\Livewire\Usuario\PollasPosiciones;
use App\Livewire\Usuario\Remates;
use App\Livewire\Usuario\RematesPosiciones;
use App\Livewire\Usuario\Perfil;

use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\TransmisionesAdmin;
use App\Livewire\Admin\GacetasAdmin;
use App\Livewire\Admin\PronosticosAdmin;
use App\Livewire\Admin\PollasAdmin;
use App\Livewire\Admin\RematesAdmin;
use App\Livewire\Admin\RemateCargarCarreraAdmin;
use App\Livewire\Admin\RematesPosicionesAdmin;
use App\Livewire\Admin\UsuariosAdmin;
use App\Livewire\Admin\PollaCargarCarrerasAdmin;
use App\Livewire\Admin\PollasPosicionesAdmin;
use App\Livewire\Admin\PerfilAdmin;

use App\Livewire\SuperAdmin\DashboardSuperAdmin;
use App\Livewire\SuperAdmin\PerfilSuperadmin;

// LOGIN
Route::get('/turuta', function(){
    Artisan::call('storage:link');
});

Route::get('acceso', function () {
    return view('auth.login');
});
Route::post('acceso', [LoginController::class, 'acceso'])->name('acceso.acceso');
Route::post('salir',[SalirController::class, 'cierre'])->name('salir.cierre');
Route::get('salir',[SalirController::class, 'cierre'])->name('salir.cierre');
Route::post('grabar-polla',[GrabarPollaController::class, 'procesar'])->name('grabar-polla.procesar');

// PAGINA PRINCIPAL
Route::get('/', Home::class)->name('home');

// MENU USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', Dashboard::class)->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('transmisiones', Transmisiones::class)->name('transmisiones');
Route::middleware(['auth:sanctum', 'verified'])->get('gacetas', Gacetas::class)->name('gacetas');
Route::middleware(['auth:sanctum', 'verified'])->get('pronosticos', Pronosticos::class)->name('pronosticos');
Route::middleware(['auth:sanctum', 'verified'])->get('movimientos', Movimientos::class)->name('movimientos');
Route::middleware(['auth:sanctum', 'verified'])->get('sellar-polla/{id_polla}', PollaSellar::class)->name('sellar-polla');
Route::middleware(['auth:sanctum', 'verified'])->get('posiciones-polla/{id_polla}', PollasPosiciones::class)->name('posiciones-polla');
Route::middleware(['auth:sanctum', 'verified'])->get('remates-posiciones/{id_remate}', RematesPosiciones::class)->name('remates-posiciones');
Route::middleware(['auth:sanctum', 'verified'])->get('perfil', Perfil::class)->name('perfil');

// MENU ADMIN
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-admin', DashboardAdmin::class)->name('dashboard-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('transmisiones-admin', TransmisionesAdmin::class)->name('transmisiones-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('gacetas-admin', GacetasAdmin::class)->name('gacetas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('pronosticos-admin', PronosticosAdmin::class)->name('pronosticos-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('pollas-admin', PollasAdmin::class)->name('pollas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('remates-admin', RematesAdmin::class)->name('remates-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('remate-cargar-carrera-admin/{id_remate}', RemateCargarCarreraAdmin::class)->name('remate-cargar-carrera-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('remates-posiciones-admin/{id_remate}', RematesPosicionesAdmin::class)->name('remates-posiciones-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('usuarios-admin', UsuariosAdmin::class)->name('usuarios-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('pollas-posiciones-admin/{id_polla}', PollasPosicionesAdmin::class)->name('pollas-posiciones-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('polla-cargar-carreras-admin/{id_polla}', PollaCargarCarrerasAdmin::class)->name('polla-cargar-carreras-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('perfil-admin', PerfilAdmin::class)->name('perfil-admin');

// MENU SUPER ADMIN
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-super-admin', DashboardSuperAdmin::class)->name('dashboard-super-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('perfil-superadmin', PerfilSuperadmin::class)->name('dashboard-superadmin');