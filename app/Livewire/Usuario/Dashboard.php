<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\UserMovimiento;
use App\Models\Polla;
use App\Models\PollasInscrita;
use App\Models\Remate;
use App\Models\Gaceta;

class Dashboard extends Component
{
    public $fecha_invertda;

    public function mount()
    {
        date_default_timezone_set('America/Caracas');
        $fecha = date('d/m/Y');
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

        $remates_abiertos = Remate::where('estatus_id', 2)
        ->orderBy('id','asc')
        ->get();

        $gacetas_disponibles = Gaceta::where('fecha_invertida', $this->fecha_invertida)->count('id');

        $pollas_abiertas = Polla::select('pollas.*', 'hipodromos.*', 'pollas.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->whereIn('pollas.estatus_id', [2,3,4,5])
        ->orderBy('pollas.id','asc')
        ->get();

        $pollas_inscritas = PollasInscrita::select('pollas.*', 'pollas_inscritas.*', 'hipodromos.*', 'pollas_inscritas.id as id', 'estatus_pollas.*', 'pollas.estatus_id as estatus_polla')
        ->join('pollas', 'pollas.id', 'pollas_inscritas.polla_id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->join('estatus_pollas', 'estatus_pollas.id', 'pollas.estatus_id')
        ->where('pollas_inscritas.usuario_id','=', auth()->user()->id)
        ->orderBy('pollas_inscritas.id','asc')
        ->get();

        $remates_disponibles = Remate::select('remates.*', 'hipodromos.*', 'remates.id as id')
        ->join('hipodromos', 'hipodromos.id', 'remates.hipodromo_id')
        ->where('remates.estatus_id', 2)
        ->orderBy('remates.hipodromo_id', 'asc')
        ->get();

        return view('livewire.usuario.dashboard', compact('usuario'))->with('pollas_abiertas', $pollas_abiertas)->with('pollas_inscritas', $pollas_inscritas)->with('remates_disponibles', $remates_disponibles)->with('remates_abiertos', $remates_abiertos)->with('gacetas_disponibles', $gacetas_disponibles);
    }

    public function inscripcion_polla($pollaId)
    {
        $abierta = Polla::where('id', $pollaId)->get();
        foreach($abierta as $detalle)
        {
            $estatus = $detalle->estatus_id;
            $inscripcion = $detalle->inscripcion;
            $comision = $detalle->comision;
        }
        if($estatus <> 2)
        {
            return redirect()->route('dashboard')->with('quiniela','no');
        }
        else
        {
            $billetera = User::where('id', auth()->user()->id)->first();
            $saldo_disponible = $billetera->monedero;

            if($inscripcion > $saldo_disponible)
            {
                return redirect()->route('dashboard')->with('monedero','no');
            }
            else
            {
                /*totalizando los inscritos*/
                $pagar = $inscripcion - (($inscripcion * $comision) / 100); 

                $actualizacion = Polla::where('id','=',$pollaId)
                ->update([
                    'inscritos' => Polla::raw('inscritos + 1'),
                    'monto_pagar' => Polla::raw('monto_pagar + '. $pagar),
                ]);

                /*actualizando la billetera*/
                $actualizacion = User::where('id', auth()->user()->id)
                ->update([
                    'monedero' => User::raw('monedero - '.$inscripcion),
                ]);

                /*asentar el movimiento*/
                date_default_timezone_set('America/Caracas');
                $fecha_apuesta = date('d')."/".date('m')."/".date('Y');
                $fecha_invertida_apuesta = date('Y').date('m').date('d');
        
                $crear = UserMovimiento::create([
                'usuario_id'=>auth()->user()->id,
                'fecha'=>$fecha_apuesta,
                'fecha_invertida'=>$fecha_invertida_apuesta,
                'operacion_id'=>1,
                'monto'=>$inscripcion,
                'descripcion'=>'Inscripción Polla '.$pollaId,
                ]);
    
                /*asentar la polla*/
                $inscripcion = PollasInscrita::create([
                    'polla_id' => $pollaId,
                    'usuario_id' => auth()->user()->id,
                    'estatus_id' => 5,
                ]);
                return redirect()->route('dashboard')->with('inscripcion','ok');
            }
        }
    }
}
