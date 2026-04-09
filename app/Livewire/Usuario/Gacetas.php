<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Gaceta;

class Gacetas extends Component
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

        $gacetas = Gaceta::select('gacetas.*', 'hipodromos.*')
        ->join('hipodromos', 'hipodromos.id', 'gacetas.hipodromo_id')
        ->where('gacetas.fecha_invertida', $this->fecha_invertida)
        ->orderBy('hipodromos.hipodromo', 'ASC')
        ->get();

        return view('livewire.usuario.gacetas', compact('usuario'))->with('gacetas', $gacetas);
    }
}
