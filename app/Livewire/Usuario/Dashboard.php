<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Polla;
use App\Models\PollasInscrita;
use App\Models\Remate;

class Dashboard extends Component
{

    public function render()
    {
        $usuario = User::where('id', auth()->user()->id)->first();

        $pollas_abiertas = Polla::select('pollas.*', 'hipodromos.*', 'pollas.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->where('pollas.estatus_id', 2)
        ->orderBy('pollas.id','asc')
        ->get();

        $pollas_inscritas = PollasInscrita::select('pollas.*', 'pollas_inscritas.*', 'hipodromos.*', 'pollas_inscritas.id as id', 'estatus_pollas.*', 'pollas.estatus_id as estatus_polla')
        ->join('pollas', 'pollas.id', 'pollas_inscritas.polla_id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->join('estatus_pollas', 'estatus_pollas.id', 'pollas.estatus_id')
        ->where('pollas_inscritas.usuario_id','=', auth()->user()->id)
        ->orderBy('pollas_inscritas.id','asc')
        ->get();

        $remates_disponibles = Remate::select('remates.*', 'hipodromos.*', 'remates.id as id')
        ->join('hipodromos', 'hipodromos.id', 'remates.hipodromo_id')
        ->where('remates.estatus_id', 2)
        ->orderBy('remates.hipodromo_id', 'asc')
        ->get();

        return view('livewire.usuario.dashboard', compact('usuario'))->with('pollas_abiertas', $pollas_abiertas)->with('pollas_inscritas', $pollas_inscritas)->with('remates_disponibles', $remates_disponibles);
    }
}
