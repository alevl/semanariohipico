<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Polla;
use App\Models\PollasInscrita;
use App\Models\PollasDetalle;

class PollaSellar extends Component
{
    public $id_polla, $id;
    public $anotacion_visita=[];
    public $anotacion_casa=[];
    public $monedero;

    public function mount($id_polla)
    {
        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }

        $this->id_polla = $id_polla;
    }

    public function render()
    {
        $usuario = User::where('id', auth()->user()->id)->first();

        $mispollas = PollasInscrita::where('polla_id', $this->id_polla)
        ->where('usuario_id', auth()->user()->id)
        ->orderBy('id', 'asc')
        ->get();

        $informacion_polla = Polla::where('id', $this->id_polla)->get();

        $participantes_uno = PollasDetalle::where('polla_id', $this->id_polla)
        ->where('carrera', 1)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        $participantes_dos = PollasDetalle::where('polla_id', $this->id_polla)
        ->where('carrera', 2)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        $participantes_tres = PollasDetalle::where('polla_id', $this->id_polla)
        ->where('carrera', 3)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        $participantes_cuatro = PollasDetalle::where('polla_id', $this->id_polla)
        ->where('carrera', 4)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        $participantes_cinco = PollasDetalle::where('polla_id', $this->id_polla)
        ->where('carrera', 5)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        $participantes_seis = PollasDetalle::where('polla_id', $this->id_polla)
        ->where('carrera', 6)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();
        
        return view('livewire.usuario.polla-sellar', compact('usuario'))->with('mispollas', $mispollas)->with('informacion_polla', $informacion_polla)->with('participantes_uno', $participantes_uno)->with('participantes_dos', $participantes_dos)->with('participantes_tres', $participantes_tres)->with('participantes_cuatro', $participantes_cuatro)->with('participantes_cinco', $participantes_cinco)->with('participantes_seis', $participantes_seis);
    }



}
