<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Moneda;

class MonedasAdmin extends Component
{
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
        $monedas = Moneda::all();

        return view('livewire.admin.monedas-admin', compact('monedas'));
    }
}
