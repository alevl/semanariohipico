<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalirController;

use App\Livewire\Home\Home;

use App\Livewire\Admin\Tablero;
use App\Livewire\Admin\PronosticosAdmin;
use App\Livewire\Admin\PantallasAdmin;
use App\Livewire\Admin\PerfilAdmin;
use App\Livewire\Admin\Recargas;
use App\Livewire\Admin\GacetasAdmin;
use App\Livewire\Admin\BanquerosAdmin;
use App\Livewire\Admin\CarrerasAdmin;
use App\Livewire\Admin\HipodromosAdmin;
use App\Livewire\Admin\MonedasAdmin;
use App\Livewire\Admin\MovimientosAdmin;
use App\Livewire\Admin\PreciosAdmin;
use App\Livewire\Admin\ReportesAdmin;
use App\Livewire\Admin\TaquillasAdmin;
use App\Livewire\Admin\TicketsAdmin;
use App\Livewire\Admin\TopesRegaliasAdmin;
use App\Livewire\Admin\TicketsTaquillaAdmin;
use App\Livewire\Admin\UsuariosAdmin;
use App\Livewire\Admin\Administradores;
use App\Livewire\Admin\ConfiguracionTransmisiones;
use App\Livewire\Admin\ConfiguracionGacetas;
use App\Livewire\Admin\ConfiguracionPronosticos;

use App\Livewire\Usuario\Dashboard;
use App\Livewire\Usuario\Movimientos;
use App\Livewire\Usuario\Transmisiones;
use App\Livewire\Usuario\Perfil;

use App\Livewire\Banquero\TaquillasBanquero;

use App\Livewire\Taquilla\Apuestas;

Route::post('acceso', [LoginController::class, 'acceso'])->name('acceso');
Route::post('registro', [LoginController::class, 'registro'])->name('registro');
Route::post('salir',[SalirController::class, 'cierre'])->name('salir.cierre');
Route::get('salir',[SalirController::class, 'cierre'])->name('salir.cierre');

/* Home */
Route::get('/', Home::class)->name('home');

/* Usuario */
Route::middleware(['auth:sanctum', 'verified'])->get('tablero', Tablero::class)->name('tablero');
Route::middleware(['auth:sanctum', 'verified'])->get('movimientos', Movimientos::class)->name('movimientos');
Route::middleware(['auth:sanctum', 'verified'])->get('transmisiones', Transmisiones::class)->name('transmisiones');
Route::middleware(['auth:sanctum', 'verified'])->get('perfil', Perfil::class)->name('perfil');

/* Admin */
Route::middleware(['auth:sanctum', 'verified'])->get('tablero', Tablero::class)->name('tablero');
Route::middleware(['auth:sanctum', 'verified'])->get('pronosticos-admin', PronosticosAdmin::class)->name('pronosticos-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('pantallas-admin', PantallasAdmin::class)->name('pantallas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('perfil-admin', PerfilAdmin::class)->name('perfil-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('recargas', Recargas::class)->name('recargas');
Route::middleware(['auth:sanctum', 'verified'])->get('gacetas-admin', GacetasAdmin::class)->name('gacetas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('banqueros-admin', BanquerosAdmin::class)->name('banqueros-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('carreras-admin', CarrerasAdmin::class)->name('carreras-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('monedas-admin', MonedasAdmin::class)->name('monedas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('precios-admin', PreciosAdmin::class)->name('precios-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('reportes-admin', ReportesAdmin::class)->name('reportes-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('taquillas-admin', TaquillasAdmin::class)->name('taquillas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('tickets-admin', TicketsAdmin::class)->name('tickets-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('topes-regalias-admin/{id_taquilla}', TopesRegaliasAdmin::class)->name('topes-regalias-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('tickets-taquilla-admin/{id_taquilla}/{fecha_inicio}/{fecha_fin}', TicketsTaquillaAdmin::class)->name('tickets-taquilla-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('usuarios-admin', UsuariosAdmin::class)->name('usuarios-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('hipodromos-admin', HipodromosAdmin::class)->name('hipodromos-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('movimientos-admin', MovimientosAdmin::class)->name('movimientos-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('administradores', Administradores::class)->name('administradores');
Route::middleware(['auth:sanctum', 'verified'])->get('gacetas-admin', GacetasAdmin::class)->name('gacetas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('configuracion-gacetas', ConfiguracionGacetas::class)->name('configuracion-gacetas');
Route::middleware(['auth:sanctum', 'verified'])->get('configuracion-transmisiones', ConfiguracionTransmisiones::class)->name('configuracion-transmisiones');
Route::middleware(['auth:sanctum', 'verified'])->get('configuracion-pronosticos', ConfiguracionPronosticos::class)->name('configuracion-pronosticos');

/* Banqueros */
Route::middleware(['auth:sanctum', 'verified'])->get('taquillas-banquero', TaquillasBanquero::class)->name('taquillas-banquero');

/* Taquillas */
Route::middleware(['auth:sanctum', 'verified'])->get('apuestas', Apuestas::class)->name('apuestas');
