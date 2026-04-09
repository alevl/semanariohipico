<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Hipodromo;
use App\Models\Pronostico;

class Pronosticos extends Component
{
    public $fecha_invertida, $fecha_actual;

    public function mount()
    {
	    date_default_timezone_set('America/Caracas');
        $this->fecha_invertida = date('Y').date('m').date('d');
        $this->fecha_actual = date('d')."/".date('m')."/".date('Y');

        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $usuario = User::where('id', auth()->user()->id)->first();

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

        return view('livewire.usuario.pronosticos', compact('usuario'))->with('hipodromos', $hipodromos)->with('pronosticos', $pronosticos);
    }
}
