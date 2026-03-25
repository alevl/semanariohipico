<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Polla;
use App\Models\RematesDetalle;
use App\Models\UserMovimiento;

class DashboardAdmin extends Component
{
    public function render()
    {
        $pollas_venta = Polla::where('estatus_id', '<>', 4)
        ->sum(\DB::raw('inscripcion * inscritos'));
    
        $remates_venta = RematesDetalle::select('remates.*', 'remates_detalles.*')
        ->join('remates', 'remates.id', 'remates_detalles.remate_id')
        ->where('remates.estatus_id', '<>', 4)
        ->sum('remates_detalles.monto');

        $pollas_pagar = Polla::where('estatus_id', '<>', 4)
        ->sum('monto_pagar');

        $remates_pagar = RematesDetalle::select('remates.*', 'remates_detalles.*')
        ->join('remates', 'remates.id', 'remates_detalles.remate_id')
        ->where('remates.estatus_id', '<>', 4)
        ->sum(\DB::raw('monto - ((monto * comision) / 100)'));

        $movimientos = UserMovimiento::select('operaciones.*', 'user_movimientos.*', 'users.*')
        ->join('users', 'users.id', 'user_movimientos.usuario_id')
        ->join('operaciones', 'operaciones.id', 'user_movimientos.operacion_id')
        ->orderBy('fecha_invertida', 'desc')
        ->take(20)
        ->get();

        return view('livewire.admin.dashboard-admin')->with('pollas_venta', $pollas_venta)->with('remates_venta', $remates_venta)->with('movimientos', $movimientos)->with('pollas_pagar', $pollas_pagar)->with('remates_pagar', $remates_pagar);
    }
}
