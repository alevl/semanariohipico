<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Caballo;
use App\Models\Numero;
use App\Models\Remate;
use App\Models\RematesDetalle;
use App\Models\RematesParametro;

class RemateCargarCarreraAdmin extends Component
{
    public $open_cargar = false;

    public $lista_caballos, $caballo_id, $numero_ejemplar, $carrera_remate, $monedero, $id_remate, $ejemplar;

    protected $listeners = ['render','delete'];
    
    public function mount($id_remate)
    {
        $this->id_remate = $id_remate;
        $carrera = Remate::where('id', $this->id_remate)->first();

        $this->carrera_remate = $carrera->carrera;
    }

    public function cargar()
    {
        $this->open_cargar = true;
    }

    public function save()
    {
        $this->validate([
            'numero_ejemplar' => 'required',
            'ejemplar' => 'required|max:20',
        ]);

        $parametros = RematesParametro::where('id', 1)->first();

        $detalle = RematesDetalle::create([
            'carrera' => $this->carrera_remate,
            'numero_ejemplar' => $this->numero_ejemplar,
            'ejemplar' =>  strtoupper($this->ejemplar),
            'remate_id' => $this->id_remate,
            'usuario_id' => 1,
            'monto' => $parametros->caso1_i,
            'puja_anterior' => 0,
        ]);

        $datos = Remate::where('id', $this->id_remate)->first();
        $comis = $datos->comision;

        $mon = $parametros->caso1_i - (($parametros->caso1_i * $comis) / 100 );

        $actualizar = Remate::where('id', $this->id_remate)
        ->update([
            'monto_pagar' => User::raw('monto_pagar + '. $mon),
        ]);

        $this->reset(['ejemplar']);
        $this->dispatch('alert');
    }

    public function render()
    {
        $remate = Remate::select('remates.*', 'hipodromos.*', 'remates.id as id')
        ->join('hipodromos', 'hipodromos.id', 'remates.hipodromo_id')
        ->where('remates.id', $this->id_remate)->first();

        $this->lista_caballos = Caballo::orderBy('caballo','asc')->get();

        $participantes_uno = RematesDetalle::where('remate_id', $this->id_remate)
        ->where('carrera', $this->carrera_remate)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        return view('livewire.admin.remate-cargar-carrera-admin')->with('participantes_uno', $participantes_uno)->with('remate', $remate);
    }

    public function delete($cabId)
    {
        $eliminar = RematesDetalle::where('id', $cabId)->delete();
    }
}
