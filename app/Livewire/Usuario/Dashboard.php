<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Pronostico;
use App\Models\Gaceta;
use App\Models\UserMovimiento;
use App\Models\Pago;
use App\Models\RecargasRetiro;

class Dashboard extends Component
{
    public $usuario;
    public $open_crear = false;
    public $banco, $codigo, $telefono, $cedula, $referencia, $monto;

    public $fecha_invertida, $fecha_actual;

    public function mount()
    {
	    date_default_timezone_set('America/Caracas');
        $this->fecha_invertida = date('Y').date('m').date('d');
        $this->fecha_actual = date('d')."/".date('m')."/".date('Y');
    }

    public function render()
    {
        $this->usuario = User::where('id', auth()->user()->id)->first();

        $hipodromos = Pronostico::select('pronosticos.*', 'hipodromos.*')
        ->join('hipodromos', 'hipodromos.id', 'pronosticos.hipodromo_id')
        ->where('pronosticos.fecha_invertida', $this->fecha_invertida)
        ->orderBy('hipodromos.hipodromo', 'ASC')
        ->groupBy('pronosticos.hipodromo_id')->get();

        $pronosticos = Pronostico::select('pronosticos.*', 'hipodromos.*')
        ->join('hipodromos', 'hipodromos.id', 'pronosticos.hipodromo_id')
        ->where('pronosticos.fecha_invertida', $this->fecha_invertida)
        ->orderBy('hipodromos.hipodromo', 'ASC')
        ->orderBy('pronosticos.carrera', 'ASC')->get();

        $gacetas = Gaceta::select('gacetas.*', 'hipodromos.*')
        ->join('hipodromos', 'hipodromos.id', 'gacetas.hipodromo_id')
        ->where('gacetas.fecha_invertida', $this->fecha_invertida)
        ->orderBy('hipodromos.hipodromo', 'ASC')
        ->get();

        $movimientos = UserMovimiento::select('user_movimientos.*', 'operaciones.*')
        ->join('operaciones', 'operaciones.id', 'user_movimientos.operacion_id')
        ->where('user_movimientos.usuario_id', auth()->user()->id)
        ->orderBy('user_movimientos.fecha_invertida', 'DESC')
        ->get();

        return view('livewire.usuario.dashboard', compact('pronosticos'))->with('hipodromos', $hipodromos)->with('gacetas', $gacetas)->with('movimientos', $movimientos);
    }

    public function recarga()
    {
        $datos = Pago::first();

        $this->banco = $datos->banco;
        $this->codigo = $datos->codigo;
        $this->cedula = $datos->cedula;
        $this->telefono = $datos->telefono;

        $this->open_crear = true;
    }

    public function recarga_update()
    {
        $this->validate([
            'referencia' => 'required|numeric|max:99999999999999999999|unique:recargas_retiros,referencia',            
            'monto' => 'required|max:999999|numeric',
        ]);

   	    date_default_timezone_set('America/Caracas');

        $crear = RecargasRetiro::
        create([
            'usuario_id' => auth()->user()->id,
            'fecha' => date('d/m/Y'),
            'fecha_invertida' => date('Ymd'),
            'referencia' => $this->referencia,
            'operacion_id' => 2,
            'monto' => $this->monto,
            'descripcion' => 'Recarga de Saldo',
            'estatus_id' => 1,
        ]);

        $this->reset(['open_crear', 'referencia','monto']);
        $this->dispatch('alert');
    }
}
