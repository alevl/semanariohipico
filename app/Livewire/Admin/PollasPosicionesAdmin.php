<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Polla;
use App\Models\PollasInscrita;

class PollasPosicionesAdmin extends Component
{
    public $primer_lugar=0, $segundo_lugar=0, $tercer_lugar=0;

    public function mount($id_polla)
    {
        if(auth()->user()->nivel_id <> 2)
        {
            session()->flush();
            return redirect()->route('login');
        }
        $this->id_polla = $id_polla;
    }

    public function render()
    {
        $polla = Polla::select('pollas.*', 'hipodromos.*', 'pollas.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->where('pollas.id', $this->id_polla)->first();

        $posiciones = PollasInscrita::where('polla_id', $this->id_polla)
        ->orderBy('puntos_total', 'desc')
        ->get();

        $podio = PollasInscrita::select('pollas_inscritas.*', 'users.*')->where('pollas_inscritas.polla_id', $this->id_polla)
        ->join('users', 'users.id', 'pollas_inscritas.usuario_id')
        ->orderBy('pollas_inscritas.puntos_total', 'desc')
        ->take(3)
        ->get();

        $pollas = Polla::where('id', $this->id_polla)->first();
        $inscritos = $pollas->inscritos;
        $inscripcion_bruta = $pollas->inscripcion * $inscritos;
        $comision = $pollas->comision;

        $inscripcion = ($inscripcion_bruta - (($inscripcion_bruta * $comision) / 100));

        if($inscritos > 19)
        {
            $this->primer_lugar = number_format((($inscripcion * 83) / 100), 2);
            $this->segundo_lugar = number_format((($inscripcion * 10) / 100), 2);
            $this->tercer_lugar = number_format((($inscripcion * 7) / 100), 2);
        }
        else
        {
            if($inscritos > 9 and $inscritos < 20)
            {
                $this->primer_lugar = number_format((($inscripcion * 85) / 100), 2);
                $this->segundo_lugar = number_format((($inscripcion * 15) / 100), 2);
                $this->tercer_lugar = 0;
            }
            else
            {
                $this->primer_lugar = number_format((($inscripcion * 100) / 100),2);
                $this->segundo_lugar = 0;
                $this->tercer_lugar = 0;
            }
        }

        return view('livewire.admin.pollas-posiciones-admin')->with('polla', $polla)->with('posiciones', $posiciones)->with('podio', $podio);
    }

    
}
