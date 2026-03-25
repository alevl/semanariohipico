<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UsersMovimiento;
use App\Models\Remate;
use App\Models\RematesDetalle;
use App\Models\RematesParametro;
use Carbon\Carbon;

class RematesPosicionesAdmin extends Component
{
    public $id_remate;
    public $monedero;

    public $remainingTime, $tiempo_remate; // tiempo restante en segundos


    public function mount($id_remate)
    {
        if(auth()->user()->nivel_id <> 2)
        {
            session()->flush();
            return redirect()->route('login');
        }

        $this->id_remate = $id_remate;

        $this->tiempo_remate = Remate::find($id_remate);
        $this->updateRemainingTime();
    }

    public function pujar($remate, $ejemplar)
    {
        $detalle_puja = RematesDetalle::where('remate_id', $remate)->where('numero_ejemplar', $ejemplar)->first();

        $precio_viejo = $detalle_puja->monto;
        $propietario_viejo = $detalle_puja->usuario_id;
        $precio_nuevo = 0;

        $para = RematesParametro::where('id', 1)->first();

        if(($precio_viejo >= $para->caso1_i) and ($precio_viejo <= $para->caso1_f))
        {
            $precio_nuevo = $precio_viejo + $para->caso1_m;
        }
        else
        {
            if(($precio_viejo >= $para->caso2_i) and ($precio_viejo <= $para->caso2_f))
            {
                $precio_nuevo = $precio_viejo + $para->caso2_m;
            }
            else
            {
                if(($precio_viejo >= $para->caso3_i) and ($precio_viejo <= $para->caso3_f))
                {
                    $precio_nuevo = $precio_viejo + $para->caso3_m;
                }
                else
                {
                    if(($precio_viejo >= $para->caso4_i) and ($precio_viejo <= $para->caso4_f))
                    {
                        $precio_nuevo = $precio_viejo + $para->caso4_m;
                    }
                }
            }
        }

        $disponible = User::where('id', auth()->user()->id)->first();

        if(($disponible->monedero < $precio_nuevo) and $disponible->trato_id == 1)
        {
            $this->dispatch('no_puja');
        }
        else
        {
            date_default_timezone_set('America/Caracas');
            $fecha_recarga = date('d')."/".date('m')."/".date('Y');
            $fecha_invertida_recarga = date('Y').date('m').date('d');

            $usu_nuevo = User::where('id', auth()->user()->id)->update([
                'monedero' => User::raw('monedero - '. $precio_nuevo),
            ]);
            $crear = UsersMovimiento::create([
            'usuario_id' => auth()->user()->id,
            'fecha' => $fecha_recarga,
            'fecha_invertida' => $fecha_invertida_recarga,
            'operacion_id'=>1,
            'monto' => $precio_nuevo,
            'descripcion' => 'Puja remate '.$remate,
            ]);

            if($propietario_viejo <> 1)
            {
                $usu_viejo = User::where('id', $propietario_viejo)->update([
                    'monedero' => User::raw('monedero + '. $precio_viejo),
                ]);
                $crear = UsersMovimiento::create([
                'usuario_id' => $propietario_viejo,
                'fecha' => $fecha_recarga,
                'fecha_invertida' => $fecha_invertida_recarga,
                'operacion_id'=>2,
                'monto' => $precio_viejo,
                'descripcion' => 'Reembolso Puja remate '.$remate,
                ]);
            }

            $actualizacion = RematesDetalle::where('remate_id', $remate)->where('numero_ejemplar', $ejemplar)->update([
                'usuario_id' => auth()->user()->id,
                'monto' => $precio_nuevo,
            ]);

            $remaining = Carbon::now('America/Caracas')->diffInSeconds($this->tiempo_remate->cierre_carrera, false);

            if ($remaining > 0 && $remaining <= 120) 
            {
                $this->tiempo_remate->cierre_carrera = Carbon::parse($this->tiempo_remate->cierre_carrera)->addSeconds(30);

                $this->tiempo_remate->save();
            }
        }
    }

    public function render()
    {
        Carbon::now('America/Caracas')->format('Y-m-d H:i:s');
        $this->updateRemainingTime();

        $this->monedero = User::
        select('users.*','monedas.*')
        ->join('monedas', 'monedas.id','=','users.moneda_id')
        ->where('users.id', auth()->user()->id)
        ->first();

        $remate = Remate::where('id', $this->id_remate)->first();

        $tabla_remate = RematesDetalle::where('remate_id', $this->id_remate)
        ->orderBy('numero_ejemplar', 'asc')
        ->get();

        $parametros = RematesParametro::where('id', 1)->first();

        return view('livewire.admin.remates-posiciones-admin')->with('tabla_remate', $tabla_remate)->with('remate', $remate)->with('parametros', $parametros);
    }

    public function updateRemainingTime()
    {
        $this->remainingTime = Carbon::now('America/Caracas')->diffInSeconds($this->tiempo_remate->cierre_carrera, false);
    }
}
