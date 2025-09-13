<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Precio;
use App\Models\User;

class PreciosAdmin extends Component
{
    public $id_nacionales, $nac_ganador, $nac_place, $nac_show, $nac_exacta;
    public $id_internacionales, $inter_ganador, $inter_place, $inter_show, $inter_exacta;

    public $open_edit_nacionales = false;
    public $open_edit_internacionales = false;

    public function mount()
    {
        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $this->monedero = User::
        select('users.*','monedas.*')
        ->join('monedas', 'monedas.id','=','users.moneda_id')
        ->where('users.id', auth()->user()->id)
        ->first();

        $nacionales = Precio::where('moneda_id', 1)->orderBy('id', 'asc')->get();
        $internacionales = Precio::where('moneda_id', 2)->orderBy('id', 'asc')->get();

        return view('livewire.admin.precios-admin')->with('nacionales', $nacionales)->with('internacionales', $internacionales);
    }

    public function edit_nacionales(Precio $nacionales_editar)
    {
        $this->id_nacionales = $nacionales_editar['id'];
        $this->nac_ganador = $nacionales_editar['ganador'];
        $this->nac_place = $nacionales_editar['place'];
        $this->nac_show = $nacionales_editar['show'];
        $this->nac_exacta = $nacionales_editar['exacta'];

        $this->open_edit_nacionales = true;
    }

    public function update_nacionales(){
        $this->validate([
            'nac_ganador' => 'required|numeric',
            'nac_place' => 'required|numeric',
            'nac_show' => 'required|numeric',
            'nac_exacta' => 'required|numeric',
        ]);

        $actualizar = Precio::where('id', $this->id_nacionales)
        ->update([
            'ganador' => $this->nac_ganador,
            'place' => $this->nac_place,
            'show' => $this->nac_show,
            'exacta' => $this->nac_exacta,
        ]);

        $this->reset(['open_edit_nacionales','nac_ganador','nac_place','nac_show','nac_exacta']);
        $this->dispatch('alert');
    }

    public function edit_internacionales(Precio $internacionales_editar)
    {
        $this->id_internacionales = $internacionales_editar['id'];
        $this->inter_ganador = $internacionales_editar['ganador'];
        $this->inter_place = $internacionales_editar['place'];
        $this->inter_show = $internacionales_editar['show'];
        $this->inter_exacta = $internacionales_editar['exacta'];

        $this->open_edit_internacionales = true;
    }

    public function update_internacionales(){
        $this->validate([
            'inter_ganador' => 'required|numeric',
            'inter_place' => 'required|numeric',
            'inter_show' => 'required|numeric',
            'inter_exacta' => 'required|numeric',
        ]);

        $actualizar = Precio::where('id', $this->id_internacionales)
        ->update([
            'ganador' => $this->inter_ganador,
            'place' => $this->inter_place,
            'show' => $this->inter_show,
            'exacta' => $this->inter_exacta,
        ]);

        $this->reset(['open_edit_internacionales','inter_ganador','inter_place','inter_show','inter_exacta']);
        $this->dispatch('alert');
    }
}
