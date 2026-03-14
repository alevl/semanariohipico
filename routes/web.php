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
use App\Livewire\Usuario\RematesPujas;

use App\Livewire\Admin\DashboardAdmin;

use App\Livewire\SuperAdmin\DashboardSuperAdmin;

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

// PAGINA PRINCIPAL
Route::get('/', Home::class)->name('home');

// MENU USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', Dashboard::class)->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('transmisiones', Transmisiones::class)->name('transmisiones');
Route::middleware(['auth:sanctum', 'verified'])->get('gacetas', Gacetas::class)->name('gacetas');
Route::middleware(['auth:sanctum', 'verified'])->get('pronosticos', Pronosticos::class)->name('pronosticos');
Route::middleware(['auth:sanctum', 'verified'])->get('movimientos', Movimientos::class)->name('movimientos');
Route::middleware(['auth:sanctum', 'verified'])->get('pollas', Pollas::class)->name('pollas');
Route::middleware(['auth:sanctum', 'verified'])->get('sellar-polla/{id_polla}/{id}', PollaSellar::class)->name('sellar-polla');
Route::middleware(['auth:sanctum', 'verified'])->get('posiciones-polla/{id_polla}', PollasPosiciones::class)->name('posiciones-polla');
Route::middleware(['auth:sanctum', 'verified'])->get('remates', Remates::class)->name('remates');
Route::middleware(['auth:sanctum', 'verified'])->get('remates-posiciones/{id_remate}', RematesPosiciones::class)->name('remates-posiciones');
Route::middleware(['auth:sanctum', 'verified'])->get('remates-pujas/{id_remate}', RematesPujas::class)->name('remates-pujas');

// MENU ADMIN
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-admin', DashboardAdmin::class)->name('dashboard-admin');

// MENU SUPER ADMIN
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-super-admin', DashboardSuperAdmin::class)->name('dashboard-super-admin');