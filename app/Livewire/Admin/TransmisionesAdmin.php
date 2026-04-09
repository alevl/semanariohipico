<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Transmisione;
use App\Models\Hipodromo;

class TransmisionesAdmin extends Component
{
    public $canal, $ruta;

    public $open_crear = false;

    protected $listeners = ['render','delete'];

    public function mount()
    {
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
            'canal' => 'required|max:20',
            'ruta' => 'required|max:100',
        ]);

        date_default_timezone_set('America/Caracas');
        $fecha = date('d/m/Y');
        $fecha_invertida = date('Ymd');

        $rut = Transmisione::create([
            'canal' => $this->canal,
            'fecha' => $fecha,
            'fecha_invertida' => $fecha_invertida,
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
