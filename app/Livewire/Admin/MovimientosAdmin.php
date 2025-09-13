<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\UserMovimiento;
use App\Models\User;
use App\Models\Banco;

class MovimientosAdmin extends Component
{
    public $moneda, $operaciones, $fecha_i, $fecha_f, $banquero, $telefono_contacto, $online;

    public $sort = 'fecha_invertida';
    public $direccion = 'desc';
    public $cant = 50;
    public $readyToLoad = false, $monedero;

    protected $listeners = ['render' => 'render'];

    public function mount()
    {
        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
        }

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

        $usuarios = User::where('nivel_id', 3)->get();

        if($this->operaciones <> 0)
        {
            $movimientos = UserMovimiento::
            where('usuario_id', $this->online)
            ->where('operacion_id', $this->operaciones)
            ->where('fecha_invertida','>=', $this->fecha_inicio)
            ->where('fecha_invertida','<=', $this->fecha_fin)
            ->orderBy($this->sort, $this->direccion)
            ->get();
        }
        else
        {
            if($this->operaciones == 0)
            {
                $movimientos = UserMovimiento::
                where('usuario_id', $this->online)
                ->where('fecha_invertida','>=', $this->fecha_inicio)
                ->where('fecha_invertida','<=', $this->fecha_fin)
                ->orderBy($this->sort, $this->direccion)
                ->get();
            }
        }

        return view('livewire.admin.movimientos-admin', compact('movimientos'))->with('usuarios', $usuarios);
    }
}
