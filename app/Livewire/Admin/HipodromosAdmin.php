<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Hipodromo;

class HipodromosAdmin extends Component
{
    public $search, $id_hipodromo, $hipodromo;
    public $hipodromo_edit;

    public $open_edit = false;
    public $open_crear = false;

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
        $hipodromos = Hipodromo::
        where(function($q)
        {
            $q->orwhere('id', 'like', '%' . $this->search . '%');
            $q->orwhere('hipodromo', 'like', '%' . $this->search . '%');
        })
        ->orderBy('hipodromo','asc')
        ->get();

        return view('livewire.admin.hipodromos-admin')->with('hipodromos', $hipodromos);
    }

    public function edit(Hipodromo $hipodromo_editar)
    {
        $this->id_hipodromo = $hipodromo_editar['id'];
        $this->hipodromo_edit = $hipodromo_editar['hipodromo'];

        $this->open_edit = true;
    }

    public function update(){
        $this->validate([
            'hipodromo_edit' => 'required|max:30',
        ]);

        $actualizar = Hipodromo::where('id', $this->id_hipodromo)
        ->update([
            'hipodromo' => $this->hipodromo_edit,
        ]);

        $this->reset(['open_edit','hipodromo']);
        $this->dispatch('alert');
    }
    public function save()
    {
        $this->validate([
            'hipodromo' => 'required|max:30|unique:hipodromos',
        ]);

        $hipo = Hipodromo::create([
            'hipodromo' => $this->hipodromo,
        ]);

        $this->reset(['open_crear', 'hipodromo']);

        $this->dispatch('render');
        $this->dispatch('alert');
    }
}
