<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Gaceta;
use App\Models\Hipodromo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ConfiguracionGacetas extends Component
{
    use WithFileUploads;

    public $hipodromo_id, $ruta, $lista_hipodromos=[], $identificador, $logo_crear;

    public $open_crear = false;

    protected $listeners = ['render','delete'];

    public function mount()
    {
        $this->lista_hipodromos = Hipodromo::orderBy('hipodromo', 'asc')->get();
        $this->identificador = rand();

        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $gacetas = Gaceta::orderBy('fecha_invertida', 'desc')->get();

        return view('livewire.admin.configuracion-gacetas')->with('gacetas', $gacetas);
    }

    public function save()
    {
        $this->validate([
            'hipodromo_id' => 'required|max:30',
            'logo_crear' => 'required|mimes:pdf|max:2048',
        ]);

        date_default_timezone_set('America/Caracas');
        $fecha = date('d/m/Y');
        $fecha_invertida = date('Ymd');

        $archivo = $this->logo_crear->store('gacetas');
  
        $rut = Gaceta::create([
            'hipodromo_id' => $this->hipodromo_id,
            'fecha' => $fecha,
            'fecha_invertida' => $fecha_invertida,
            'ruta' => $archivo,
        ]);

        $this->reset(['open_crear', 'hipodromo_id', 'logo_crear']);

        $this->identificador = rand();

        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function delete($gacetaId)
    {
        $bus = Gaceta::where('id', $gacetaId)->first();

        Storage::delete([$bus->ruta]);

        $eliminar = Gaceta::where('id', $gacetaId)->delete();
    }
}
