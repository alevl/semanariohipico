<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\UserMovimiento;

class Movimientos extends Component
{
    public $moneda, $operaciones, $fecha_i, $fecha_f;

    public $sort = 'fecha_invertida';
    public $direccion = 'desc';
    public $cant = 50;
    public $readyToLoad = false;

    protected $listeners = ['render' => 'render'];

    public function mount()
    {
        date_default_timezone_set('America/Caracas');
        $this->fecha_i = date('d')."/".date('m')."/".date('Y');
        $this->fecha_f = date('d')."/".date('m')."/".date('Y');
    }

    public function render()
    {
        $this->dia_inicio = substr($this->fecha_i, 0, 2);
        $this->mes_inicio = substr($this->fecha_i, 3, 2);
        $this->anio_inicio = substr($this->fecha_i, 6, 4);

        $this->dia_fin = substr($this->fecha_f, 0, 2);
        $this->mes_fin = substr($this->fecha_f, 3, 2);
        $this->anio_fin = substr($this->fecha_f, 6, 4);

        $this->fecha_inicio = $this->anio_inicio.$this->mes_inicio.$this->dia_inicio;
        $this->fecha_fin = $this->anio_fin.$this->mes_fin.$this->dia_fin;

        if($this->operaciones <> 0)
        {
            $movimientos = UserMovimiento::select('user_movimientos.*', 'operaciones.*')
            ->join('operaciones', 'operaciones.id', 'user_movimientos.operacion_id')
            ->where('user_movimientos.usuario_id', auth()->user()->id)
            ->where('user_movimientos.fecha_invertida','>=', $this->fecha_inicio)
            ->where('user_movimientos.fecha_invertida','<=', $this->fecha_fin)
            ->where('user_movimientos.operacion_id', $this->operaciones)
            ->orderBy('user_movimientos.fecha_invertida', 'DESC')
            ->get();
        }
        else
        {
            if($this->operaciones == 0)
            {
                $movimientos = UserMovimiento::select('user_movimientos.*', 'operaciones.*')
                ->join('operaciones', 'operaciones.id', 'user_movimientos.operacion_id')
                ->where('user_movimientos.usuario_id', auth()->user()->id)
                ->where('user_movimientos.fecha_invertida','>=', $this->fecha_inicio)
                ->where('user_movimientos.fecha_invertida','<=', $this->fecha_fin)
                ->orderBy('user_movimientos.fecha_invertida', 'DESC')
                ->get();
            }
        }

        return view('livewire.usuario.movimientos', compact('movimientos'));
    }
}
