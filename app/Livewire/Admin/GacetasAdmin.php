<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Gaceta;

class GacetasAdmin extends Component
{
    public $fecha_invertida;

    public function mount()
    {
        date_default_timezone_set('America/Caracas');
        $this->fecha_invertida = date('Ymd');

        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $gacetas = Gaceta::select('gacetas.*', 'hipodromos.*')->join('hipodromos', 'hipodromos.id', '=', 'gacetas.hipodromo_id')->where('gacetas.fecha_invertida', $this->fecha_invertida)->orderBy('hipodromos.hipodromo', 'asc')->get();

        return view('livewire.admin.gacetas-admin', compact('gacetas'));
    }
}
