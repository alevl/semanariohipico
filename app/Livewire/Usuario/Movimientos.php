<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\UserMovimiento;
use App\Models\RecargasRetiro;
use Carbon\Carbon;

class Movimientos extends Component
{
    public $fecha_invertida, $fecha_actual;
    public $monto_recarga, $referencia, $fecha_recarga, $monto_retiro, $tipo_movimiento;
    public $open_recarga = false;
    public $open_retiro = false;

    public function mount()
    {
	    date_default_timezone_set('America/Caracas');
        $this->fecha_invertida = date('Y').date('m').date('d');
        $this->fecha_actual = date('d')."/".date('m')."/".date('Y');
    }

    public function render()
    {
        $usuario = User::where('id', auth()->user()->id)->first();

        $query = UserMovimiento::select('user_movimientos.*', 'operaciones.*')
        ->join('operaciones', 'operaciones.id', 'user_movimientos.operacion_id')
        ->where('user_movimientos.usuario_id', auth()->user()->id);
        if($this->tipo_movimiento != 0) 
        {
            $query->where('user_movimientos.operacion_id', $this->tipo_movimiento);
        }
        $movimientos = $query
        ->orderBy('user_movimientos.fecha_invertida', 'DESC')
        ->orderBy('user_movimientos.id', 'DESC')
        ->get();

        return view('livewire.usuario.movimientos', compact('usuario'))->with('movimientos', $movimientos);
    }

    public function recarga()
    {
        $this->validate([
            'referencia' => 'required|numeric|max:99999999999999999999|unique:recargas_retiros',
            'monto_recarga' => 'required|max:999999|numeric',
            'fecha_recarga' => 'required|max:10|date_format:d/m/Y',
        ]);

   	    date_default_timezone_set('America/Caracas');

        $fecha_invertida = date('Ymd', strtotime($this->fecha_recarga));

        $registrar = RecargasRetiro::create([
            'fecha' => $this->fecha_recarga,
            'referencia' => $this->referencia,
            'fecha_invertida' => $fecha_invertida,
            'monto' => $this->monto_recarga,
            'descripcion' => 'Recarga de Saldo',
            'operacion_id' => 2,
            'usuario_id' => auth()->user()->id,
            'estatus_id' => 1,
        ]);

        $this->reset(['open_recarga', 'fecha_recarga', 'referencia', 'monto_recarga']);
        $this->dispatch('alert');
    }

    public function retiro()
    {
        $this->validate([
            'monto_retiro' => 'required|max:999999|numeric',
        ]);

   	    date_default_timezone_set('America/Caracas');

        $fecha_retiro = date('d/m/Y');
        $fecha_invertida = date('Ymd');

        if(auth()->user()->monedero >= $this->monto_retiro)
        {
            $actualizar = User::where('id', auth()->id())->decrement('monedero', $this->monto_retiro);
            
            $registrar = RecargasRetiro::create([
                'fecha' => $fecha_retiro,
                'fecha_invertida' => $fecha_invertida,
                'monto' => $this->monto_retiro,
                'descripcion' => 'Retiro de Saldo',
                'operacion_id' => 1,
                'usuario_id' => auth()->user()->id,
                'estatus_id' => 1,
            ]);

            $registrar_movimiento = UserMovimiento::create([
                'fecha' => $fecha_retiro,
                'fecha_invertida' => $fecha_invertida,
                'monto' => $this->monto_retiro,
                'descripcion' => 'Retiro de Saldo',
                'operacion_id' => 1,
                'usuario_id' => auth()->user()->id,
            ]);

            $this->reset(['open_retiro', 'monto_retiro']);
            $this->dispatch('alert');
        }
        else
        {
            $this->reset(['open_retiro', 'monto_retiro']);
            $this->dispatch('no_saldo');
        }
    }
}
