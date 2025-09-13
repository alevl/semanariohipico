<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Transmisione;
use App\Models\Hipodromo;

class ConfiguracionTransmisiones extends Component
{
    public $canal, $ruta, $fecha_invertida;

    public $open_crear = false;

    protected $listeners = ['render','delete'];

    public function mount()
    {
        date_default_timezone_set('America/Caracas');
        $this->fecha_invertida = date('Ymd');

        $this->lista_hipodromos = Hipodromo::orderBy('hipodromo', 'asc')->get();

        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $transmisiones = Transmisione::where('fecha_invertida', $this->fecha_invertida)->orderBy('fecha_invertida', 'desc')->get();

        return view('livewire.admin.configuracion-transmisiones')->with('transmisiones', $transmisiones);
    }

    public function save()
    {
        $this->validate([
            'canal' => 'required|max:20',
            'ruta' => 'required|max:100',
        ]);

        date_default_timezone_set('America/Caracas');
        $fecha = date('d/m/Y');
        $fecha_invertida = date('Ymd');

        $rut = Transmisione::create([
            'fecha' => $fecha,
            'fecha_invertida' => $fecha_invertida,
            'canal' => $this->canal,
            'ruta' => $this->ruta,
        ]);

        $this->reset(['open_crear', 'canal', 'ruta']);

        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function delete($transmisionId)
    {
        $eliminar = Transmisione::where('id', $transmisionId)->delete();
    }
}
