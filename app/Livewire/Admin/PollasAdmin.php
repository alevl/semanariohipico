<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Polla;
use App\Models\EstatusPolla;
use App\Models\PollasInscrita;
use App\Models\PollasDetalle;
use App\Models\Caballo;
use App\Models\Hipodromo;
use App\Models\Hora;
use App\Models\Carrera;
use App\Models\CarrerasDetalle;

class PollasAdmin extends Component
{
    public $open_edit = false;
    public $open_retiro = false;
    public $open_crear = false;

    public $search, $polla, $polla_editar, $estatus_polla, $lista_estatus, $lista_numeros, $caballo_retiro, $carrera_retiro;
    public $lista_hipodromos, $lista_horas, $hipodromo_id, $fecha, $hora_cierre, $inscripcion, $comision, $observacion, $hoy, $id_polla_retiro, $carreras_programadas;
    public $id_polla, $estatus_id, $primera_uno=0, $primera_dos=0, $primera_tres=0, $segunda_uno=0, $segunda_dos=0, $segunda_tres=0, $tercera_uno=0, $tercera_dos=0, $tercera_tres=0, $cuarta_uno=0, $cuarta_dos=0, $cuarta_tres=0, $quinta_uno=0, $quinta_dos=0, $quinta_tres=0, $sexta_uno=0, $sexta_dos=0, $sexta_tres=0;

    public function mount()
    {
        if(auth()->user()->nivel_id <> 2)
        {
            session()->flush();
            return redirect()->route('login');
        }

        date_default_timezone_set('America/Caracas');
        $this->hoy = date('d/m/Y');
    }

    public function render()
    {
        $this->lista_hipodromos = Hipodromo::orderBy('hipodromo','asc')->get();
        
        $this->lista_horas = Hora::where('id','>','0')->orderBy('id','asc')->get();
        $this->lista_estatus = EstatusPolla::orderBy('id', 'asc')->get();
        $this->lista_numeros = Caballo::orderBy('id','asc')->get();

        $pollas = Polla::select('pollas.*', 'hipodromos.*', 'estatus_pollas.*', 'pollas.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pollas.hipodromo_id')
        ->join('estatus_pollas', 'estatus_pollas.id', 'pollas.estatus_id')
        ->orderBy('pollas.id', 'desc')
        ->get();

        return view('livewire.admin.pollas-admin', compact('pollas'));
    }

    public function save()
    {
        $this->validate([
            'hipodromo_id' => 'required|integer',
            'fecha' => 'required',
            'hora_cierre' => 'required',
            'inscripcion' => 'required|numeric',
            'comision' => 'required|numeric',
            'carreras_programadas' => 'required|numeric',
        ]);
    
        $polla = Polla::create([
            'hipodromo_id' => $this->hipodromo_id,
            'propietario_id' => auth()->user()->id,
            'fecha' => $this->fecha,
            'hora_cierre' => $this->hora_cierre,
            'inscripcion' => $this->inscripcion,
            'comision' => $this->comision,
            'observacion' => $this->observacion,
            'estatus_id' => '1',
            'inscritos' => '0',
            'monto_pagar' => '0',
            'carreras_programadas' => $this->carreras_programadas,
        ]);

        $this->reset(['open_crear','hipodromo_id','fecha','hora_cierre', 'inscripcion', 'comision', 'observacion', 'carreras_programadas']);
        $this->dispatch('alert');
    }
   
    public function edit(Polla $polla_editar)
    {
        $this->estatus_polla = $polla_editar['estatus_id'];
        $this->estatus_id = $polla_editar['estatus_id'];
        $this->id_polla = $polla_editar['id'];

        $this->primera_uno = $polla_editar['primera_uno'];
        $this->primera_dos = $polla_editar['primera_dos'];
        $this->primera_tres = $polla_editar['primera_tres'];
        $this->segunda_uno = $polla_editar['segunda_uno'];
        $this->segunda_dos = $polla_editar['segunda_dos'];
        $this->segunda_tres = $polla_editar['segunda_tres'];
        $this->tercera_uno = $polla_editar['tercera_uno'];
        $this->tercera_dos = $polla_editar['tercera_dos'];
        $this->tercera_tres = $polla_editar['tercera_tres'];
        $this->cuarta_uno = $polla_editar['cuarta_uno'];
        $this->cuarta_dos = $polla_editar['cuarta_dos'];
        $this->cuarta_tres = $polla_editar['cuarta_tres'];
        $this->quinta_uno = $polla_editar['quinta_uno'];
        $this->quinta_dos = $polla_editar['quinta_dos'];
        $this->quinta_tres = $polla_editar['quinta_tres'];
        $this->sexta_uno = $polla_editar['sexta_uno'];
        $this->sexta_dos = $polla_editar['sexta_dos'];
        $this->sexta_tres = $polla_editar['sexta_tres'];

       $this->open_edit = true;
    }

    public function update()
    {
        $this->validate([
            'estatus_id' => 'required|integer|max:7',
            'primera_uno' => 'numeric',
            'primera_dos' => 'numeric',
            'primera_tres' => 'numeric',
            'segunda_uno' => 'numeric',
            'segunda_dos' => 'numeric',
            'segunda_tres' => 'numeric',
            'tercera_uno' => 'numeric',
            'tercera_dos' => 'numeric',
            'tercera_tres' => 'numeric',
            'cuarta_uno' => 'numeric',
            'cuarta_dos' => 'numeric',
            'cuarta_tres' => 'numeric',
            'quinta_uno' => 'numeric',
            'quinta_dos' => 'numeric',
            'quinta_tres' => 'numeric',
            'sexta_uno' => 'numeric',
            'sexta_dos' => 'numeric',
            'sexta_tres' => 'numeric',
        ]);
    
        $actualizar = Polla::where('id', $this->id_polla)->update([
            'estatus_id' => $this->estatus_id, 
            'primera_uno' => $this->primera_uno,
            'primera_dos' => $this->primera_dos,
            'primera_tres' => $this->primera_tres,
            'segunda_uno' => $this->segunda_uno,
            'segunda_dos' => $this->segunda_dos,
            'segunda_tres' => $this->segunda_tres,
            'tercera_uno' => $this->tercera_uno,
            'tercera_dos' => $this->tercera_dos,
            'tercera_tres' => $this->tercera_tres,
            'cuarta_uno' => $this->cuarta_uno,
            'cuarta_dos' => $this->cuarta_dos,
            'cuarta_tres' => $this->cuarta_tres,
            'quinta_uno' => $this->quinta_uno,
            'quinta_dos' => $this->quinta_dos,
            'quinta_tres' => $this->quinta_tres,
            'sexta_uno' => $this->sexta_uno,
            'sexta_dos' => $this->sexta_dos,
            'sexta_tres' => $this->sexta_tres,
        ]);

        $llegada = Polla::where('id', $this->id_polla)
        ->orderBy('id','asc')
        ->get();

        foreach($llegada as $dato)
        {
            $primera_uno = $dato->primera_uno;
            $primera_dos = $dato->primera_dos;
            $primera_tres = $dato->primera_tres;

            $segunda_uno = $dato->segunda_uno;
            $segunda_dos = $dato->segunda_dos;
            $segunda_tres = $dato->segunda_tres;

            $tercera_uno = $dato->tercera_uno;
            $tercera_dos = $dato->tercera_dos;
            $tercera_tres = $dato->tercera_tres;

            $cuarta_uno = $dato->cuarta_uno;
            $cuarta_dos = $dato->cuarta_dos;
            $cuarta_tres = $dato->cuarta_tres;

            $quinta_uno = $dato->quinta_uno;
            $quinta_dos = $dato->quinta_dos;
            $quinta_tres = $dato->quinta_tres;

            $sexta_uno = $dato->sexta_uno;
            $sexta_dos = $dato->sexta_dos;
            $sexta_tres = $dato->sexta_tres;
        }

        $premios = PollasInscrita::where('polla_id', $this->id_polla)
        ->orderBy('id','asc')
        ->get();

        foreach($premios as $dato)
        {
            $id_usuario = $dato->usuario_id;
            $id_polla_usuario = $dato->id;

            if($primera_uno > 0 and $dato->carrera1 > 0)
            {
                if($primera_uno == $dato->carrera1)
                {
                    $puntos_carrera1 = 5;
                }
                else
                {
                    if($primera_dos > 0 and $dato->carrera1 > 0)
                    {
                        if($primera_dos == $dato->carrera1)
                        {
                            $puntos_carrera1 = 3;
                        }
                        else
                        {
                            if($primera_tres > 0 and $dato->carrera1 > 0)
                            {
                                if($primera_tres == $dato->carrera1)
                                {
                                    $puntos_carrera1 = 1;
                                }
                                else
                                {
                                    $puntos_carrera1 = 0;
                                }
                            }
                            else
                            {
                                $puntos_carrera1 = 0;
                            }
                        }
                    }
                    else
                    {
                        $puntos_carrera1 = 0;
                    }
                }
            }
            else
            {
                $puntos_carrera1 = 0;
            }
            if($segunda_uno > 0 and $dato->carrera2 > 0)
            {
                if($segunda_uno == $dato->carrera2)
                {
                    $puntos_carrera2 = 5;
                }
                else
                {
                    if($segunda_dos > 0 and $dato->carrera2 > 0)
                    {
                        if($segunda_dos == $dato->carrera2)
                        {
                            $puntos_carrera2 = 3;
                        }
                        else
                        {
                            if($segunda_tres > 0 and $dato->carrera2 > 0)
                            {
                                if($segunda_tres == $dato->carrera2)
                                {
                                    $puntos_carrera2 = 1;
                                }
                                else
                                {
                                    $puntos_carrera2 = 0;
                                }
                            }
                            else
                            {
                                $puntos_carrera2 = 0;
                            }
                        }
                    }
                    else
                    {
                        $puntos_carrera2 = 0;
                    }
                }
            }
            else
            {
                $puntos_carrera2 = 0;
            }

            if($tercera_uno > 0 and $dato->carrera3 > 0)
            {
                if($tercera_uno == $dato->carrera3)
                {
                    $puntos_carrera3 = 5;
                }
                else
                {
                    if($tercera_dos > 0 and $dato->carrera3 > 0)
                    {
                        if($tercera_dos == $dato->carrera3)
                        {
                            $puntos_carrera3 = 3;
                        }
                        else
                        {
                            if($tercera_tres > 0 and $dato->carrera3 > 0)
                            {
                                if($tercera_tres == $dato->carrera3)
                                {
                                    $puntos_carrera3 = 1;
                                }
                                else
                                {
                                    $puntos_carrera3 = 0;
                                }
                            }
                            else
                            {
                                $puntos_carrera3 = 0;
                            }
                        }
                    }
                    else
                    {
                        $puntos_carrera3 = 0;
                    }
                }
            }
            else
            {
                $puntos_carrera3 = 0;
            }

            if($cuarta_uno > 0 and $dato->carrera4 > 0)
            {
                if($cuarta_uno == $dato->carrera4)
                {
                    $puntos_carrera4 = 5;
                }
                else
                {
                    if($cuarta_dos > 0 and $dato->carrera4 > 0)
                    {
                        if($cuarta_dos == $dato->carrera4)
                        {
                            $puntos_carrera4 = 3;
                        }
                        else
                        {
                            if($cuarta_tres > 0 and $dato->carrera4 > 0)
                            {
                                if($cuarta_tres == $dato->carrera4)
                                {
                                    $puntos_carrera4 = 1;
                                }
                                else
                                {
                                    $puntos_carrera4 = 0;
                                }
                            }
                            else
                            {
                                $puntos_carrera4 = 0;
                            }
                        }
                    }
                    else
                    {
                        $puntos_carrera4 = 0;
                    }
                }
            }
            else
            {
                $puntos_carrera4 = 0;
            }

            if($quinta_uno > 0 and $dato->carrera5 > 0)
            {
                if($quinta_uno == $dato->carrera5)
                {
                    $puntos_carrera5 = 5;
                }
                else
                {
                    if($quinta_dos > 0 and $dato->carrera5 > 0)
                    {
                        if($quinta_dos == $dato->carrera5)
                        {
                            $puntos_carrera5 = 3;
                        }
                        else
                        {
                            if($quinta_tres > 0 and $dato->carrera5 > 0)
                            {
                                if($quinta_tres == $dato->carrera5)
                                {
                                    $puntos_carrera5 = 1;
                                }
                                else
                                {
                                    $puntos_carrera5 = 0;
                                }
                            }
                            else
                            {
                                $puntos_carrera5 = 0;
                            }
                        }
                    }
                    else
                    {
                        $puntos_carrera5 = 0;
                    }
                }
            }
            else
            {
                $puntos_carrera5 = 0;
            }

            if($sexta_uno > 0 and $dato->carrera6 > 0)
            {
                if($sexta_uno == $dato->carrera6)
                {
                    $puntos_carrera6 = 5;
                }
                else
                {
                    if($sexta_dos > 0 and $dato->carrera6 > 0)
                    {
                        if($sexta_dos == $dato->carrera6)
                        {
                            $puntos_carrera6 = 3;
                        }
                        else
                        {
                            if($sexta_tres > 0 and $dato->carrera6 > 0)
                            {
                                if($sexta_tres == $dato->carrera6)
                                {
                                    $puntos_carrera6 = 1;
                                }
                                else
                                {
                                    $puntos_carrera6 = 0;
                                }
                            }
                            else
                            {
                                $puntos_carrera6 = 0;
                            }
                        }
                    }
                    else
                    {
                        $puntos_carrera6 = 0;
                    }
                }
            }
            else
            {
                $puntos_carrera6 = 0;
            }

            $puntos_total = $puntos_carrera1 + $puntos_carrera2 + $puntos_carrera3 + $puntos_carrera4 + $puntos_carrera5 + $puntos_carrera6;

            $actualizacion = PollasInscrita::where('id',$id_polla_usuario)
            ->where('polla_id',$this->id_polla)
            ->where('id',$id_polla_usuario)
            ->where('usuario_id',$id_usuario)
            ->update([
                'puntos_carrera1' => PollasInscrita::raw($puntos_carrera1),
                'puntos_carrera2' => PollasInscrita::raw($puntos_carrera2),
                'puntos_carrera3' => PollasInscrita::raw($puntos_carrera3),
                'puntos_carrera4' => PollasInscrita::raw($puntos_carrera4),
                'puntos_carrera5' => PollasInscrita::raw($puntos_carrera5),
                'puntos_carrera6' => PollasInscrita::raw($puntos_carrera6),
                'puntos_total' => PollasInscrita::raw($puntos_total),
            ]);
        }

        /*FIN DE SUMAR LOS PUNTOS*/

        $this->reset(['open_edit']);
        $this->dispatch('alert');
    }

    public function retirar($id_polla_retiro)
    {
        $this->id_polla_retiro = $id_polla_retiro;
        $this->open_retiro = true;
    }

    public function retiro()
    {
        $ejemplar_retirado_oficial = $this->caballo_retiro;

        $pollas = PollasDetalle::
         where('polla_id', $this->id_polla_retiro)
        ->where('carrera', $this->carrera_retiro)
        ->where('numero_ejemplar', $this->caballo_retiro)
        ->delete();

        $numero_participantes = PollasDetalle::
         where('polla_id', $this->id_polla_retiro)
        ->where('carrera', $this->carrera_retiro)
        ->count();

        $op=1;
        while($op < $numero_participantes)
        {
            $op ++;

            $nuevo_numero = $this->caballo_retiro + 1;

            if($nuevo_numero > $numero_participantes + 1)
            {
                $this->caballo_retiro = 0;
            }
            else
            {
                $disponible = PollasDetalle::
                where('polla_id', $this->id_polla_retiro)
               ->where('carrera', $this->carrera_retiro)
               ->where('numero_ejemplar', $nuevo_numero)
               ->count();
       
                if($disponible > 0)
                {
                    if($this->carrera_retiro == 1)
                    {
                        $actualizacion = PollasInscrita::
                        where('polla_id', $this->id_polla_retiro)
                        ->where('carrera1', $ejemplar_retirado_oficial)
                        ->update([
                            'carrera1' => PollasInscrita::raw($nuevo_numero),
                        ]);
                    }
                    else
                    {
                        if($this->carrera_retiro == 2)
                        {
                            $actualizacion = PollasInscrita::
                            where('polla_id', $this->id_polla_retiro)
                            ->where('carrera2', $ejemplar_retirado_oficial)
                            ->update([
                                'carrera2' => PollasInscrita::raw($nuevo_numero),
                            ]);
                        }
                        else
                        {
                            if($this->carrera_retiro == 3)
                            {
                                $actualizacion = PollasInscrita::
                                where('polla_id', $this->id_polla_retiro)
                                ->where('carrera3', $ejemplar_retirado_oficial)
                                ->update([
                                    'carrera3' => PollasInscrita::raw($nuevo_numero),
                                ]);
                            }
                            else
                            {
                                if($this->carrera_retiro == 4)
                                {
                                    $actualizacion = PollasInscrita::
                                    where('polla_id', $this->id_polla_retiro)
                                    ->where('carrera4', $ejemplar_retirado_oficial)
                                    ->update([
                                        'carrera4' => PollasInscrita::raw($nuevo_numero),
                                    ]);
                                }
                                else
                                {
                                    if($this->carrera_retiro == 5)
                                    {
                                        $actualizacion = PollasInscrita::
                                        where('polla_id', $this->id_polla_retiro)
                                        ->where('carrera5', $ejemplar_retirado_oficial)
                                        ->update([
                                            'carrera5' => PollasInscrita::raw($nuevo_numero),
                                        ]);
                                    }
                                    else
                                    {
                                        if($this->carrera_retiro == 6)
                                        {
                                            $actualizacion = PollasInscrita::
                                            where('polla_id', $this->id_polla_retiro)
                                            ->where('carrera6', $ejemplar_retirado_oficial)
                                            ->update([
                                                'carrera6' => PollasInscrita::raw($nuevo_numero),
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                else
                {
                    $this->caballo_retiro = $this->caballo_retiro + 1;
                }
            }
        }
        $this->reset(['open_retiro']);
        $this->dispatch('alert');
    }


    public function delete($pollaId)
    {
        $actualizar = Polla::where('id', $pollaId)
        ->delete();
    }
}
