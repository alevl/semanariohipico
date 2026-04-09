<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Transmisione;

class Transmisiones extends Component
{
    public $cantidad, $fecha_invertida, $video1, $video2, $video3, $video4, $video5, $video6, $video7, $video8, $video9, $video10, $video11, $video12, $video13, $video14, $video15, $video16, $video17, $video18, $video19, $video20, $video21;

    public function mount()
    {
        date_default_timezone_set('America/Caracas');
        $this->fecha_invertida = date('Ymd');

        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $usuario = User::where('id', auth()->user()->id)->first();

        $transmisiones = Transmisione::where('fecha_invertida', $this->fecha_invertida)->get();

        return view('livewire.usuario.transmisiones', compact('usuario'))->with('transmisiones', $transmisiones);
    }
    
    public function seleccionar_canal($canal, $pantalla)
    {
        if($pantalla == 1)
        {
            $this->video1 = $canal;
        }
        if($pantalla == 2)
        {
            $this->video2 = $canal;
        }
        if($pantalla == 3)
        {
            $this->video3 = $canal;
        }
        if($pantalla == 4)
        {
            $this->video4 = $canal;
        }
        if($pantalla == 5)
        {
            $this->video5 = $canal;
        }
        if($pantalla == 6)
        {
            $this->video6 = $canal;
        }
        if($pantalla == 7)
        {
            $this->video7 = $canal;
        }
        if($pantalla == 8)
        {
            $this->video8 = $canal;
        }
        if($pantalla == 9)
        {
            $this->video9 = $canal;
        }
        if($pantalla == 10)
        {
            $this->video10 = $canal;
        }
        if($pantalla == 11)
        {
            $this->video11 = $canal;
        }
        if($pantalla == 12)
        {
            $this->video12 = $canal;
        }
        if($pantalla == 13)
        {
            $this->video13 = $canal;
        }
        if($pantalla == 14)
        {
            $this->video14 = $canal;
        }
        if($pantalla == 15)
        {
            $this->video15 = $canal;
        }
        if($pantalla == 16)
        {
            $this->video16 = $canal;
        }
        if($pantalla == 17)
        {
            $this->video17 = $canal;
        }
        if($pantalla == 18)
        {
            $this->video18 = $canal;
        }
        if($pantalla == 19)
        {
            $this->video19 = $canal;
        }
        if($pantalla == 20)
        {
            $this->video20 = $canal;
        }
        if($pantalla == 21)
        {
            $this->video21 = $canal;
        }
    }
}
