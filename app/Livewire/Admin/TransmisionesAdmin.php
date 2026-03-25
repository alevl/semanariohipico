<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Transmisione;
use App\Models\Hipodromo;

class TransmisionesAdmin extends Component
{
    public $hipodromo_id, $ruta, $lista_hipodromos=[];

    public $open_crear = false;

    protected $listeners = ['render','delete'];

    public function mount()
    {
        $this->lista_hipodromos = Hipodromo::orderBy('hipodromo', 'asc')->get();

        if(auth()->user()->nivel_id <> 2)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $transmisiones = Transmisione::orderBy('fecha_invertida', 'desc')
        ->get();
        
        return view('livewire.admin.transmisiones-admin')->with('transmisiones', $transmisiones);
    }

    public function save()
    {
        $this->validate([
            'hipodromo_id' => 'required|max:30',
            'ruta' => 'required|max:100',
        ]);

        date_default_timezone_set('America/Caracas');
        $fecha = date('d/m/Y');
        $fecha_invertida = date('Ymd');

        $rut = Transmisione::create([
            'hipodromo_id' => $this->hipodromo_id,
            'fecha' => $fecha,
            'fecha_invertida' => $fecha_invertida,
            'ruta' => $this->ruta,
        ]);

        $this->reset(['open_crear', 'hipodromo_id', 'ruta']);

        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function delete($transmisionId)
    {
        $eliminar = Transmisione::where('id', $transmisionId)->delete();
    }
}
