<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Perfil extends Component
{
    public $username, $name, $telefono;
    public $password1, $password2;

    public function render()
    {
        $usuario = User::where('id', auth()->user()->id)->first();

        $this->username = $usuario->username;
        $this->name = $usuario->name;
        $this->telefono = $usuario->telefono;

        return view('livewire.usuario.perfil');
    }

    public function actualizar()
    {
        $this->validate([
            'name' => 'required|max:45',
            'telefono' => 'max:20',
        ]);

        $actualizar = User::where('id', auth()->user()->id)
        ->update([
            'name' => $this->name,
            'telefono' => $this->telefono,
        ]);

        $this->dispatch('alert','Usuario actualizado');
    }

    public function actualizar_clave()
    {
        $this->validate([
            'password1' => 'required|max:255',
            'password2' => 'required|max:255',
        ]);

        if($this->password1 <> $this->password2)
        {
            $this->dispatch('no_coinciden');
        }
        else
        {
            $actualizar = User::where('id', auth()->user()->id)
            ->update([
                'password' => Hash::make($this->password1)
            ]);
    
            $this->dispatch('alert','Usuario actualizado');
        }
    }
}
