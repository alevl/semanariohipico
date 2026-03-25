<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Polla;
use App\Models\PollasDetalle;
use App\Models\Caballo;

class PollaCargarCarrerasAdmin extends Component
{
    public $id_polla, $carrera, $numero_ejemplar, $lista_numeros;

    public $open_cargar = false;

    public function mount($id_polla)
    {
        $this->id_polla = $id_polla;
    }

    protected $listeners = ['render','delete'];

    public function render()
    {
        $polla = Polla::select('pollas.*', 'hipodromos.*', 'pollas.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->where('pollas.id', $this->id_polla)->first();

        $comienzo = $polla->carreras_programadas;

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

        $this->lista_numeros = Caballo::orderBy('id','asc')->get();

        return view('livewire.admin.polla-cargar-carreras-admin', compact('polla'))->with('participantes_uno', $participantes_uno)->with('participantes_dos', $participantes_dos)->with('participantes_tres', $participantes_tres)->with('participantes_cuatro', $participantes_cuatro)->with('participantes_cinco', $participantes_cinco)->with('participantes_seis', $participantes_seis);
    }

    public function cargar()
    {
        $this->open_cargar = true;
    }

    public function save()
    {
        $this->validate([
            'carrera' => 'required|integer',
            'numero_ejemplar' => 'required|integer',
        ]);

        $detalle = PollasDetalle::create([
            'carrera' => $this->carrera,
            'numero_ejemplar' => $this->numero_ejemplar,
            'polla_id' => $this->id_polla,
        ]);

        $this->dispatch('alert');
    }

    public function delete(PollasDetalle $cab_id)
    {
        $cab_id->delete();
    }
}
