<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Caballo;
use App\Models\Carrera;
use App\Models\CarrerasJugada;
use App\Models\CarrerasDetalle;
use App\Models\Hipodromo;
use App\Models\Hora;
use App\Models\Tope;
use App\Models\Precio;
use App\Models\RegaliasNacionale;
use App\Models\RegaliasNacionalesDolare;
use App\Models\RegaliasInternacionale;
use App\Models\RegaliasColombiano;
use App\Models\RegaliasChileno;
use App\Models\RegaliasPeruana;
use App\Models\TipoApuesta;
use App\Models\User;
use App\Models\UsersMovimiento;

class CarrerasAdmin extends Component
{
    public $search, $numero_carrera_crear, $fecha_carrera_crear, $hora_cierre_crear, $caballo_ganador, $caballo_segundo, $caballo_tercero, $caballo_cuarto, $dividendo_ganador, $dividendo_segundo_show=0, $dividendo_segundo_place=0, $dividendo_ganador_show=0, $dividendo_ganador_place=0, $dividendo_tercero_show=0, $dividendo_pago_exacta=0, $dividendo_pago_trifecta=0, $dividendo_pago_superfecta=0, $cantidad_crear, $hipodromo_id_crear, $apuesta_id_crear=1;
    public $fecha_carrera, $hora_cierre, $cantidad, $hipodromo_id, $numero_carrera, $carrera_editar, $apuesta_id;
    public $id_carrera, $lista_caballos=[], $lista_premiacion=[], $lista_horas=[], $lista_hipodromos=[], $fecha_buscar, $lista_apuestas=[];
    public $fecha, $carrera, $ganador_crear=true, $place_crear=false, $show_crear=false, $exacta_crear=false, $trifecta_crear=false, $superfecta_crear=false;
    public $ganador_edit, $place_edit, $show_edit, $exacta_edit, $trifecta_edit, $superfecta_edit;
    public $fecha_ret, $carrera_ret, $hipodromo_id_ret, $caballo_retirar, $id_carrera_ret;
    public $carrera_llegada;
    public $open_premiacion = false;
    public $open_crear = false;
    public $open_retirar = false;
    public $open_edit = false;

    protected $listeners = ['render','delete'];

    public function mount()
    {
        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }

        date_default_timezone_set('America/Caracas');
        $this->fecha_buscar = date('d/m/Y');
    }

    public function render()
    {
        $this->lista_horas = Hora::orderBy('id','asc')->get();
        $this->lista_caballos = Caballo::orderBy('caballo','asc')->get();
        $this->lista_hipodromos = Hipodromo::orderBy('hipodromo','asc')->get();
        $this->lista_apuestas = TipoApuesta::orderBy('id','asc')->get();

        $carreras_hipo = Carrera::where('fecha_carrera', $this->fecha_buscar)->orderBy('hipodromo_id','asc')->groupBy('hipodromo_id')->get();

        $carreras = Carrera::
        where('fecha_carrera', $this->fecha_buscar)
        ->where(function($q)
        {
            $q->orwhere('id', 'like', '%' . $this->search . '%');
            $q->orwhere('fecha_carrera', 'like', '%' . $this->search . '%');
            $q->orwhere('hora_cierre', 'like', '%' . $this->search . '%');
            $q->orwhere('numero_carrera', 'like', '%' . $this->search . '%');

            $q->orWhereHas('carrera_hipodromo', function($query) {
                return $query->where('hipodromo', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('carrera_apuesta', function($query) {
                return $query->where('apuesta', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy('numero_carrera','asc')
        ->get();

        return view('livewire.admin.carreras-admin', compact('carreras'))->with('carreras_hipo', $carreras_hipo);
    }

    public function edit(Carrera $carrera_editar)
    {
        $this->reset(['open_edit']);

        $this->resetValidation();

        $this->carrera_editar = $carrera_editar;
        $this->id_carrera = $carrera_editar['id'];
        $this->fecha_carrera = $carrera_editar['fecha_carrera'];
        $this->hora_cierre = $carrera_editar['hora_cierre'];
        $this->hipodromo_id = $carrera_editar['hipodromo_id'];
        $this->numero_carrera = $carrera_editar['numero_carrera'];
        
        if($carrera_editar['apuesta_id'] == 1)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        
        if($carrera_editar['apuesta_id'] == 2)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 3)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 4)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 5)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 6)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 7)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 8)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 9)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 10)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 11)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 12)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 13)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 14)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 15)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 16)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = false;
        }
        if($carrera_editar['apuesta_id'] == 17)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 18)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 19)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 20)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 21)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 22)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 23)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 24)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = false;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 25)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 26)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 27)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 28)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = false;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 29)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 30)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = false;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 31)
        {
            $this->ganador_edit = true;
            $this->place_edit = false;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }
        if($carrera_editar['apuesta_id'] == 32)
        {
            $this->ganador_edit = true;
            $this->place_edit = true;
            $this->show_edit = true;
            $this->exacta_edit = true;
            $this->trifecta_edit = true;
            $this->superfecta_edit = true;
        }

        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate([
            'numero_carrera' => 'required|max:5',
            'hipodromo_id' => 'required|max:5',
            'fecha_carrera' => 'required|max:10|date_format:d/m/Y',
            'hora_cierre' => 'required|max:5',
        ]);

        /*APUESTAS PERMITIDAS*/        
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 1;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 2;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 3;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 4;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 5;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 6;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 7;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 8;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 9;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 10;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 11;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 12;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 13;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 14;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 15;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == false)
        {
            $apuesta_permitida = 16;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 17;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 18;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 19;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 20;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 21;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 22;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 23;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == false and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 24;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 25;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 26;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 27;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == false and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 28;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 29;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == false and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 30;
        }
        if($this->ganador_edit == true and $this->place_edit == false and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 31;
        }
        if($this->ganador_edit == true and $this->place_edit == true and $this->show_edit == true and $this->exacta_edit == true and $this->trifecta_edit == true and $this->superfecta_edit == true)
        {
            $apuesta_permitida = 32;
        }
        /*FIN*/

        $actualizar = Carrera::where('id', $this->id_carrera)
        ->update([
            'fecha_carrera' => $this->fecha_carrera,
            'hora_cierre' => $this->hora_cierre,
            'hipodromo_id' => $this->hipodromo_id,
            'numero_carrera' => $this->numero_carrera,
            'apuesta_id' => $apuesta_permitida,
        ]);

        $this->reset(['open_edit']);
        $this->dispatch('alert');
    }

    public function save()
    {
        $this->validate([
            'numero_carrera_crear' => 'required|max:5',
            'hipodromo_id_crear' => 'required|max:5',
            'fecha_carrera_crear' => 'required|max:10|date_format:d/m/Y',
            'hora_cierre_crear' => 'required|max:5',
            'cantidad_crear' => 'required|max:5',
        ]);

        /*APUESTAS PERMITIDAS*/        
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 1;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 2;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 3;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 4;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 5;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 6;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 7;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 8;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 9;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 10;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 11;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 12;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 13;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 14;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 15;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == false)
        {
            $apuesta_permitida = 16;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 17;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 18;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 19;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 20;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 21;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 22;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 23;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == false and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 24;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 25;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 26;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 27;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == false and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 28;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 29;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == false and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 30;
        }
        if($this->ganador_crear == true and $this->place_crear == false and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 31;
        }
        if($this->ganador_crear == true and $this->place_crear == true and $this->show_crear == true and $this->exacta_crear == true and $this->trifecta_crear == true and $this->superfecta_crear == true)
        {
            $apuesta_permitida = 32;
        }
        /*FIN*/

        $carre = Carrera::create([
            'numero_carrera' => $this->numero_carrera_crear,
            'hipodromo_id' => $this->hipodromo_id_crear,
            'fecha_carrera' => $this->fecha_carrera_crear,
            'hora_cierre' => $this->hora_cierre_crear,
            'estatus_id' => 1,
            'apuesta_id' => $apuesta_permitida,
        ]);

        $n=1;
        while($n <= $this->cantidad_crear)
        {
            $detalle = CarrerasDetalle::create([
                'carrera_id' => $carre->id,
                'carrera' => $this->numero_carrera_crear,
                'numero_ejemplar' => $n,
                'fecha_carrera' => $this->fecha_carrera_crear,
            ]);
            $n=$n+1;
        }

        $this->reset(['open_crear','numero_carrera_crear','hipodromo_id_crear','fecha_carrera_crear','hora_cierre_crear','cantidad_crear','apuesta_id_crear','ganador_crear','place_crear','show_crear','exacta_crear','trifecta_crear','superfecta_crear']);
        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function premiacion(Carrera $carrera_llegada)
    {
        $this->id_carrera = $carrera_llegada['id'];

        $this->fecha = $carrera_llegada['fecha_carrera'];
        $this->carrera = $carrera_llegada['numero_carrera'];
        $this->hipodromo_id = $carrera_llegada['hipodromo_id'];
        $this->caballo_ganador = $carrera_llegada['caballo_ganador'];
        $this->caballo_segundo = $carrera_llegada['caballo_segundo'];
        $this->caballo_tercero = $carrera_llegada['caballo_tercero'];
        $this->caballo_cuarto = $carrera_llegada['caballo_cuarto'];
        $this->dividendo_ganador = $carrera_llegada['dividendo_ganador'];
        $this->dividendo_segundo_show = $carrera_llegada['dividendo_segundo_show'];
        $this->dividendo_segundo_place = $carrera_llegada['dividendo_segundo_place'];
        $this->dividendo_ganador_show = $carrera_llegada['dividendo_ganador_show'];
        $this->dividendo_ganador_place = $carrera_llegada['dividendo_ganador_place'];
        $this->dividendo_tercero_show = $carrera_llegada['dividendo_tercero_show'];
        $this->dividendo_pago_exacta = $carrera_llegada['dividendo_exacta'];
        $this->dividendo_pago_trifecta = $carrera_llegada['dividendo_trifecta'];
        $this->dividendo_pago_superfecta = $carrera_llegada['dividendo_superfecta'];

        $this->lista_premiacion = CarrerasDetalle::where('carrera_id', $this->id_carrera)->orderBy('numero_ejemplar','asc')->get();

        $this->open_premiacion = true;
    }

    public function retirar(Carrera $carrera_retirar)
    {
        $this->id_carrera_ret = $carrera_retirar['id'];

        $this->fecha_ret = $carrera_retirar['fecha_carrera'];
        $this->carrera_ret = $carrera_retirar['numero_carrera'];
        $this->hipodromo_id_ret = $carrera_retirar['hipodromo_id'];

        $this->lista_premiacion = CarrerasDetalle::where('carrera_id', $this->id_carrera_ret)->orderBy('numero_ejemplar','asc')->get();

        $this->open_retirar = true;
    }

    public function estatus($id, $valor)
    {
        if($valor == 1)
        {
            $esta = 2;
        }
        else
        {
            $esta = 1;            
        }

        $actualizar = Carrera::where('id', $id)->update([
            'estatus_id' => $esta,
        ]);

        $this->dispatch('render');
    }

    public function grabar_premiacion()
    {
        $this->validate([
            'caballo_ganador' => 'required|max:5',
            'dividendo_ganador' => 'required|numeric|max:99999',
            'caballo_segundo' => 'max:5',
            'caballo_tercero' => 'max:5',
            'caballo_cuarto' => 'max:5',
            'dividendo_segundo_show' => 'numeric|max:99999',
            'dividendo_segundo_place' => 'numeric|max:99999',
            'dividendo_ganador_show' => 'numeric|max:99999',
            'dividendo_ganador_place' => 'numeric|max:99999',
            'dividendo_tercero_show' => 'numeric|max:99999',
            'dividendo_pago_exacta' => 'numeric|max:99999',
            'dividendo_pago_trifecta' => 'numeric|max:99999',
            'dividendo_pago_superfecta' => 'numeric|max:99999',
        ]);

        $actualizar = Carrera::where('id', $this->id_carrera)->update([
            'caballo_ganador' => $this->caballo_ganador,
            'caballo_segundo' => $this->caballo_segundo,
            'caballo_tercero' => $this->caballo_tercero,
            'caballo_cuarto' => $this->caballo_cuarto,
            'dividendo_ganador' => $this->dividendo_ganador,
            'dividendo_segundo_show' => $this->dividendo_segundo_show,
            'dividendo_segundo_place' => $this->dividendo_segundo_place,
            'dividendo_ganador_show' => $this->dividendo_ganador_show,
            'dividendo_ganador_place' => $this->dividendo_ganador_place,
            'dividendo_tercero_show' => $this->dividendo_tercero_show,
            'dividendo_exacta' => $this->dividendo_pago_exacta,
            'dividendo_trifecta' => $this->dividendo_pago_trifecta,
            'dividendo_superfecta' => $this->dividendo_pago_superfecta,
        ]);

        $actualizar = CarrerasJugada::where('carrera_id', $this->id_carrera)->update([
            'caballo_ganador' => $this->caballo_ganador,
            'caballo_segundo' => $this->caballo_segundo,
            'caballo_tercero' => $this->caballo_tercero,
            'caballo_cuarto' => $this->caballo_cuarto,
            'dividendo_ganador' => $this->dividendo_ganador,
            'dividendo_segundo_show' => $this->dividendo_segundo_show,
            'dividendo_segundo_place' => $this->dividendo_segundo_place,
            'dividendo_ganador_show' => $this->dividendo_ganador_show,
            'dividendo_ganador_place' => $this->dividendo_ganador_place,
            'dividendo_tercero_show' => $this->dividendo_tercero_show,
            'dividendo_exacta' => $this->dividendo_pago_exacta,
            'dividendo_trifecta' => $this->dividendo_pago_trifecta,
            'dividendo_superfecta' => $this->dividendo_pago_superfecta,
        ]);

        $premiar = CarrerasJugada::where('carrera_id', $this->id_carrera)->get(); 
        foreach($premiar as $prem)
        {
            $id = $prem->id;
            $id_carr = $prem->carrera_id;
            $banquero = $prem->banquero_id;
            $taquilla = $prem->taquilla_id;
            $carrera = $prem->carrera;
            $hipodromo = $prem->hipodromo_id;
            
            $perdio_ganador = 0;
            $perdio_place = 0;
            $perdio_show = 0;
            $perdio_exacta = 0;
            $perdio_trifecta = 0;
            $perdio_superfecta = 0;
            
            $gano_ganador = 0;
            $gano_place = 0;
            $gano_show = 0;
            $gano_exacta = 0;

            $total_ganado = 0;
            $total_ganado_ganador = 0;
            $total_ganado_place = 0;
            $total_ganado_show = 0;
            $total_ganado_exacta = 0;
            $total_ganado_trifecta = 0;
            $total_ganado_superfecta = 0;
            $total_perdido = 0;
            $balance = 0;
            $regalia1 = 0;
            $regalia2 = 0;
            $regalia3 = 0;
            $regalia4 = 0;
            $viejo = 0;
            
            if($prem->moneda_id == 1)
            {
                $precios = Precio::where('moneda_id', 1)->first();
                $precio_ganador = $precios->ganador;
                $precio_place = $precios->place;
                $precio_show = $precios->show;
                $precio_exacta = $precios->exacta;
            
                $topes = Tope::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->where('moneda_id', 1)->first();
                $tope_ganador = $topes->maximo_dividendo;
                $tope_caballo = $topes->cupo_caballo;
                $regalias = RegaliasNacionale::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->first();
            }
            else
            {
                if($prem->moneda_id == 2)
                {
                    if(($hipodromo == 1) or ($hipodromo == 2))
                    {
                        $precios = Precio::where('moneda_id', 2)->first();
                        $precio_ganador = $precios->ganador;
                        $precio_place = $precios->place;
                        $precio_show = $precios->show;
                        $precio_exacta = $precios->exacta;
                        $precio_trifecta = $precios->trifecta;
                        $precio_superfecta = $precios->superfecta;
                    
                        $topes = Tope::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->where('moneda_id', 2)->first();
                        $tope_ganador = $topes->maximo_dividendo;
                        $tope_caballo = $topes->cupo_caballo;
                        $regalias = RegaliasNacionalesDolare::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->first();
                    }
                    else
                    {
                        $precios = Precio::where('moneda_id', 2)->first();
                        $precio_ganador = $precios->ganador;
                        $precio_place = $precios->place;
                        $precio_show = $precios->show;
                        $precio_exacta = $precios->exacta;
                        $precio_trifecta = $precios->trifecta;
                        $precio_superfecta = $precios->superfecta;

                        $topes = Tope::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->where('moneda_id', 2)->first();
                        $tope_ganador = $topes->maximo_dividendo;
                        $tope_caballo = $topes->cupo_caballo;
                        $regalias = RegaliasInternacionale::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->first();
                    }
                }
                else
                {
                    if($prem->moneda_id == 3)
                    {
                        $precios = Precio::where('moneda_id', 3)->first();
                        $precio_ganador = $precios->ganador;
                        $precio_place = $precios->place;
                        $precio_show = $precios->show;
                        $precio_exacta = $precios->exacta;
                        $precio_trifecta = $precios->trifecta;
                        $precio_superfecta = $precios->superfecta;

                        $topes = Tope::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->where('moneda_id', 3)->first();
                        $tope_ganador = $topes->maximo_dividendo;
                        $tope_caballo = $topes->cupo_caballo;
       
                        $regalias = RegaliasColombiano::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->first();
                    }
                    else
                    {
                        if($prem->moneda_id == 4)
                        {
                            $precios = Precio::where('moneda_id', 4)->first();
                            $precio_ganador = $precios->ganador;
                            $precio_place = $precios->place;
                            $precio_show = $precios->show;
                            $precio_exacta = $precios->exacta;
                            $precio_trifecta = $precios->trifecta;
                            $precio_superfecta = $precios->superfecta;
    
                            $topes = Tope::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->where('moneda_id', 4)->first();
                            $tope_ganador = $topes->maximo_dividendo;
                            $tope_caballo = $topes->cupo_caballo;
           
                            $regalias = RegaliasChileno::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->first();
                        }
                        else
                        {
                            if($prem->moneda_id == 5)
                            {
                                $precios = Precio::where('moneda_id', 5)->first();
                                $precio_ganador = $precios->ganador;
                                $precio_place = $precios->place;
                                $precio_show = $precios->show;
                                $precio_exacta = $precios->exacta;
                                $precio_trifecta = $precios->trifecta;
                                $precio_superfecta = $precios->superfecta;
        
                                $topes = Tope::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->where('moneda_id', 5)->first();
                                $tope_ganador = $topes->maximo_dividendo;
                                $tope_caballo = $topes->cupo_caballo;

                                $regalias = RegaliasPeruana::where('banquero_id', $banquero)->where('taquilla_id', $taquilla)->first();
                            }
                        }
                    }
                }
            }

            $i_caso1 = $regalias->i_caso1;
            $f_caso1 = $regalias->f_caso1;
            $modo1 = $regalias->modo1;
            $regalia1 = $regalias->regalia1;

            $i_caso2 = $regalias->i_caso2;
            $f_caso2 = $regalias->f_caso2;
            $modo2 = $regalias->modo2;
            $regalia2 = $regalias->regalia2;
        
            $i_caso3 = $regalias->i_caso3;
            $f_caso3 = $regalias->f_caso3;
            $modo3 = $regalias->modo3;
            $regalia3 = $regalias->regalia3;
        
            $i_caso4 = $regalias->i_caso4;
            $f_caso4 = $regalias->f_caso4;
            $modo4 = $regalias->modo4;
            $regalia4 = $regalias->regalia4; 
        
            $i_caso5 = $regalias->i_caso5;
            $f_caso5 = $regalias->f_caso5;
            $modo5 = $regalias->modo5;
            $regalia5 = $regalias->regalia5;

            /*PAGANDO GANADORES*/
            if($prem->caballo_ganador <> $prem->numero_ejemplar)
            {
                $perdio_ganador = $prem->apuesta_ganador;
            }
            else
            {
                if($prem->apuesta_ganador > 0.00 and $prem->dividendo_ganador > 0.00)
                {
                    if($prem->dividendo_ganador > $tope_ganador)
                    {
                        $dividendo_ganador = $tope_ganador;
                        $regalia1 = 0;
                        $regalia2 = 0;
                        $regalia3 = 0;
                        $regalia4 = 0;
                        $regalia5 = 0;

                        $base = $prem->apuesta_ganador / $precio_ganador;
                        $total_ganado_ganador = $base * $dividendo_ganador;
                    }
                    else
                    {
                        $dividendo_ganador = $prem->dividendo_ganador;

                        if($prem->dividendo_ganador >= $i_caso1 and $prem->dividendo_ganador <= $f_caso1)
                        {
                            $regalo = $regalia1;
                            $modo = $modo1;
                        }
                        else
                        {
                            if($prem->dividendo_ganador >= $i_caso2 and $prem->dividendo_ganador <= $f_caso2)
                            {
                                $regalo = $regalia2;
                                $modo = $modo2;
                            }
                            else
                            {
                                if($prem->dividendo_ganador >= $i_caso3 and $prem->dividendo_ganador <= $f_caso3)
                                {
                                    $regalo = $regalia3;
                                    $modo = $modo3;
                                }
                                else
                                {
                                    if($prem->dividendo_ganador >= $i_caso4 and $prem->dividendo_ganador <= $f_caso4)
                                    {
                                        $regalo = $regalia4;
                                        $modo = $modo4;
                                    }
                                    else
                                    {
                                        if($prem->dividendo_ganador >= $i_caso5)   
                                        {
                                            $regalo = $regalia5;
                                            $modo = $modo5;
                                        }
                                    }
                                }
                            }
                        }
                        $base = $prem->apuesta_ganador / $precio_ganador;

                        if($modo == "MAS")
                        {
                            if(($prem->dividendo_ganador + $regalo) > $tope_ganador)
                            {
                                $total_ganado_ganador = $base * $tope_ganador;
                            }
                            else
                            {
                                $total_ganado_ganador = $base * ($prem->dividendo_ganador + $regalo);
                            }
                        }
                        else
                        {
                            if(($prem->dividendo_ganador + $regalo) > $tope_ganador)
                            {
                                $total_ganado_ganador = $base * $tope_ganador;
                            }
                            else
                            {
                                $total_ganado_ganador = $base * $regalo;
                            }
                        }
                    }
                }
                else
                {
                    $perdio_ganador = $prem->apuesta_ganador;
                }

                if(($prem->caballo_ganador == $prem->numero_ejemplar) and $prem->apuesta_ganador > 0 )
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Ganador')->update([
                        'estatus_id' => 3,
                        'total_ganado' => $total_ganado_ganador,
                        'total_perdido' => $total_perdido,
                        'perdio_ganador' => 0,
                    ]);
                }
                else
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Ganador')->update([
                        'estatus_id' => 4,
                        'perdio_ganador' => $prem->apuesta_ganador,
                        'total_ganado' => 0,
                        'total_perdido' => $prem->apuesta_ganador,
                    ]);
                }
            }
            if($perdio_ganador > 0)
            {
                $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Ganador')->update([
                    'estatus_id' => 4,
                    'perdio_ganador' => $prem->apuesta_ganador,
                    'total_ganado' => 0,
                    'total_perdido' => $prem->apuesta_ganador,
                ]);
            }
            /*FIN DE PAGAR GANADOR*/

            /*PAGANDO PLACE*/
            if(($prem->caballo_ganador <> $prem->numero_ejemplar_place) and ($prem->caballo_segundo <> $prem->numero_ejemplar_place))
            {
                $perdio_place = $prem->apuesta_place;
            }
            else
            {
                if($prem->caballo_ganador == $prem->numero_ejemplar_place)
                {
                    if($prem->apuesta_place > 0.00 and $prem->dividendo_ganador_place > 0.00)
                    {
                        if($prem->dividendo_ganador_place > $tope_ganador)
                        {
                            $dividendo_place = $tope_ganador;
                            $base = $prem->apuesta_place / $precio_place;
                            $total_ganado_place = $base * $dividendo_place;
                        }
                        else
                        {
                            $dividendo_place = $prem->dividendo_ganador_place;    
                            $base = $prem->apuesta_place / $precio_place;
                            $total_ganado_place = $base * $dividendo_place;
                        }
                    }
                    else
                    {
                        $perdio_place = $prem->apuesta_place;
                    }
                }
                else
                {
                    if($prem->caballo_segundo == $prem->numero_ejemplar_place)
                    {
                        if($prem->apuesta_place > 0.00 and $prem->dividendo_segundo_place > 0.00)
                        {
                            if($prem->dividendo_segundo_place > $tope_ganador)
                            {
                                $dividendo_place = $tope_ganador;
                                $base = $prem->apuesta_place / $precio_place;
                                $total_ganado_place = $base * $dividendo_place;
                            }
                            else
                            {
                                $dividendo_place = $prem->dividendo_segundo_place;    
                                $base = $prem->apuesta_place / $precio_place;
                                $total_ganado_place = $base * $dividendo_place;
                            }
                        }
                        else
                        {
                            $perdio_place = $prem->apuesta_place;
                        }
                    }
                }
                if((($prem->caballo_ganador == $prem->numero_ejemplar_place) or ($prem->caballo_segundo == $prem->numero_ejemplar_place)) and $prem->apuesta_place > 0 )
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Place')->update([
                        'estatus_id' => 3,
                        'total_ganado' => $total_ganado_place,
                        'total_perdido' => $total_perdido,
                        'perdio_ganador' => 0,
                    ]);
                }
                else
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Place')->update([
                        'estatus_id' => 4,
                        'perdio_place' => $prem->apuesta_place,
                        'total_ganado' => 0,
                        'total_perdido' => $prem->apuesta_place,
                    ]);
                }    
            }
            if($perdio_place > 0)
            {
                $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Place')->update([
                    'estatus_id' => 4,
                    'perdio_place' => $prem->apuesta_place,
                    'total_ganado' => 0,
                    'total_perdido' => $prem->apuesta_place,
                ]);
            }
            /*FIN DE PAGAR PLACE*/

            /*PAGANDO SHOW*/
            if(($prem->caballo_ganador <> $prem->numero_ejemplar_show) and ($prem->caballo_segundo <> $prem->numero_ejemplar_show) and ($prem->caballo_tercero <> $prem->numero_ejemplar_show))
            {
                $perdio_show = $prem->apuesta_show;
            }
            else
            {
                if($prem->caballo_ganador == $prem->numero_ejemplar_show)
                {
                    if($prem->apuesta_show > 0.00 and $prem->dividendo_ganador_show > 0.00)
                    {
                        if($prem->dividendo_ganador_show > $tope_ganador)
                        {
                            $dividendo_show = $tope_ganador;
                            $base = $prem->apuesta_show / $precio_show;
                            $total_ganado_show = $base * $dividendo_show;
                        }
                        else
                        {
                            $dividendo_show = $prem->dividendo_ganador_show;    
                            $base = $prem->apuesta_show / $precio_show;
                            $total_ganado_show = $base * $dividendo_show;
                        }
                    }
                    else
                    {
                        $perdio_show = $prem->apuesta_show;
                    }
                }
                else
                {
                    if($prem->caballo_segundo == $prem->numero_ejemplar_show)
                    {
                        if($prem->apuesta_show > 0.00 and $prem->dividendo_segundo_show > 0.00)
                        {
                            if($prem->dividendo_segundo_show > $tope_ganador)
                            {
                                $dividendo_show = $tope_ganador;
                                $base = $prem->apuesta_show / $precio_show;
                                $total_ganado_show = $base * $dividendo_show;
                            }
                            else
                            {
                                $dividendo_show = $prem->dividendo_segundo_show;
                                $base = $prem->apuesta_show / $precio_show;
                                $total_ganado_show = $base * $dividendo_show;
                            }
                        }
                        else
                        {
                            $perdio_show = $prem->apuesta_show;
                        }
                    }
                    else
                    {
                        if($prem->caballo_tercero == $prem->numero_ejemplar_show)
                        {
                            if($prem->apuesta_show > 0.00 and $prem->dividendo_tercero_show > 0.00)
                            {
                                if($prem->dividendo_tercero_show > $tope_ganador)
                                {
                                    $dividendo_show = $tope_ganador;
                                    $base = $prem->apuesta_show / $precio_show;
                                    $total_ganado_show = $base * $dividendo_show;
                                }
                                else
                                {
                                    $dividendo_show = $prem->dividendo_tercero_show;
                                    $base = $prem->apuesta_show / $precio_show;
                                    $total_ganado_show = $base * $dividendo_show;
                                }
                            }
                            else
                            {
                                $perdio_show = $prem->apuesta_show;
                            }
                        }
                    }
                }

                if((($prem->caballo_ganador == $prem->numero_ejemplar_show) or ($prem->caballo_segundo == $prem->numero_ejemplar_show) or ($prem->caballo_tercero == $prem->numero_ejemplar_show)) and $prem->apuesta_show > 0 )
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Show')->update([
                        'estatus_id' => 3,
                        'total_ganado' => $total_ganado_show,
                        'total_perdido' => $total_perdido,
                        'perdio_ganador' => 0,
                    ]);
                }
                else
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Show')->update([
                        'estatus_id' => 4,
                        'perdio_show' => $prem->apuesta_show,
                        'total_ganado' => 0,
                        'total_perdido' => $prem->apuesta_show,
                    ]);
                }    
            }
            if($perdio_show > 0)
            {
                $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Show')->update([
                    'estatus_id' => 4,
                    'perdio_show' => $prem->apuesta_show,
                    'total_ganado' => 0,
                    'total_perdido' => $prem->apuesta_show,
                ]);
            }
            /*FIN DE PAGAR SHOW*/

            /*PAGANDO EXACTA*/
            if(($prem->caballo_ganador <> $prem->numero_ejemplar_exacta1) or ($prem->caballo_segundo <> $prem->numero_ejemplar_exacta2))
            {
                $perdio_exacta = $prem->apuesta_exacta;
            }
            else
            {
                if(($prem->caballo_ganador == $prem->numero_ejemplar_exacta1) and ($prem->caballo_segundo == $prem->numero_ejemplar_exacta2))
                {
                    if($prem->apuesta_exacta > 0.00 and $prem->dividendo_exacta > 0.00)
                    {
                        if($prem->dividendo_exacta > $tope_ganador)
                        {
                            $dividendo_exacta = $tope_ganador;
                            $base = $prem->apuesta_exacta / $precio_exacta;
                            $total_ganado_exacta = $base * $dividendo_exacta;
                        }
                        else
                        {
                            $dividendo_exacta = $prem->dividendo_exacta;    
                            $base = $prem->apuesta_exacta / $precio_exacta;
                            $total_ganado_exacta = $base * $dividendo_exacta;
                        }
                    }
                    else
                    {
                        $perdio_exacta = $prem->apuesta_exacta;
                    }
                }
                else
                {
                    $perdio_exacta = $prem->apuesta_exacta;
                }

                if((($prem->caballo_ganador == $prem->numero_ejemplar_exacta1) and ($prem->caballo_segundo == $prem->numero_ejemplar_exacta2)) and $prem->apuesta_exacta > 0 )
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Exacta')->update([
                        'estatus_id' => 3,
                        'total_ganado' => $total_ganado_exacta,
                        'total_perdido' => $total_perdido,
                        'perdio_ganador' => 0,
                    ]);
                }
                else
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Exacta')->update([
                        'estatus_id' => 4,
                        'perdio_exacta' => $prem->apuesta_exacta,
                        'total_ganado' => 0,
                        'total_perdido' => $prem->apuesta_exacta,
                    ]);
                }    
            }
            if($perdio_exacta > 0)
            {
                $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Exacta')->update([
                    'estatus_id' => 4,
                    'perdio_exacta' => $prem->apuesta_exacta,
                    'total_ganado' => 0,
                    'total_perdido' => $prem->apuesta_exacta,
                ]);
            }
            /*FIN DE PAGAR EXACTA*/

            /*PAGANDO TRIFECTA*/
            if(($prem->caballo_ganador <> $prem->numero_ejemplar_trifecta1) or ($prem->caballo_segundo <> $prem->numero_ejemplar_trifecta2) or ($prem->caballo_tercero <> $prem->numero_ejemplar_trifecta3))
            {
                $perdio_trifecta = $prem->apuesta_trifecta;
            }
            else
            {
                if(($prem->caballo_ganador == $prem->numero_ejemplar_trifecta1) and ($prem->caballo_segundo == $prem->numero_ejemplar_trifecta2) and ($prem->caballo_tercero == $prem->numero_ejemplar_trifecta3))
                {
                    if($prem->apuesta_trifecta > 0.00 and $prem->dividendo_trifecta > 0.00)
                    {
                        if($prem->dividendo_trifecta > $tope_ganador)
                        {
                            $dividendo_trifecta = $tope_ganador;
                            $base = $prem->apuesta_trifecta / $precio_trifecta;
                            $total_ganado_trifecta = $base * $dividendo_trifecta;
                        }
                        else
                        {
                            $dividendo_trifecta = $prem->dividendo_trifecta;    
                            $base = $prem->apuesta_trifecta / $precio_trifecta;
                            $total_ganado_trifecta = $base * $dividendo_trifecta;
                        }
                    }
                    else
                    {
                        $perdio_trifecta = $prem->apuesta_trifecta;
                    }
                }
                else
                {
                    $perdio_trifecta = $prem->apuesta_trifecta;
                }

                if((($prem->caballo_ganador == $prem->numero_ejemplar_trifecta1) and ($prem->caballo_segundo == $prem->numero_ejemplar_trifecta2) and ($prem->caballo_tercero == $prem->numero_ejemplar_trifecta3)) and $prem->apuesta_trifecta > 0 )
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Trifecta')->update([
                        'estatus_id' => 3,
                        'total_ganado' => $total_ganado_trifecta,
                        'total_perdido' => $total_perdido,
                        'perdio_ganador' => 0,
                    ]);
                }
                else
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Trifecta')->update([
                        'estatus_id' => 4,
                        'perdio_trifecta' => $prem->apuesta_trifecta,
                        'total_ganado' => 0,
                        'total_perdido' => $prem->apuesta_trifecta,
                    ]);
                }    
            }
            if($perdio_trifecta > 0)
            {
                $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Trifecta')->update([
                    'estatus_id' => 4,
                    'perdio_trifecta' => $prem->apuesta_trifecta,
                    'total_ganado' => 0,
                    'total_perdido' => $prem->apuesta_trifecta,
                ]);
            }
            /*FIN DE PAGAR TRIFECTA*/

            /*PAGANDO SUPERFECTA*/
            if(($prem->caballo_ganador <> $prem->numero_ejemplar_superfecta1) or ($prem->caballo_segundo <> $prem->numero_ejemplar_superfecta2) or ($prem->caballo_tercero <> $prem->numero_ejemplar_superfecta3) or ($prem->caballo_cuarto <> $prem->numero_ejemplar_superfecta4))
            {
                $perdio_superfecta = $prem->apuesta_superfecta;
            }
            else
            {
                if(($prem->caballo_ganador == $prem->numero_ejemplar_superfecta1) and ($prem->caballo_segundo == $prem->numero_ejemplar_superfecta2) and ($prem->caballo_tercero == $prem->numero_ejemplar_superfecta3) and ($prem->caballo_cuarto == $prem->numero_ejemplar_superfecta4))
                {
                    if($prem->apuesta_superfecta > 0.00 and $prem->dividendo_superfecta > 0.00)
                    {
                        if($prem->dividendo_superfecta > $tope_ganador)
                        {
                            $dividendo_superfecta = $tope_ganador;
                            $base = $prem->apuesta_superfecta / $precio_superfecta;
                            $total_ganado_superfecta = $base * $dividendo_superfecta;
                        }
                        else
                        {
                            $dividendo_superfecta = $prem->dividendo_superfecta;    
                            $base = $prem->apuesta_superfecta / $precio_superfecta;
                            $total_ganado_superfecta = $base * $dividendo_superfecta;
                        }
                    }
                    else
                    {
                        $perdio_superfecta = $prem->apuesta_superfecta;
                    }
                }
                else
                {
                    $perdio_superfecta = $prem->apuesta_superfecta;
                }

                if((($prem->caballo_ganador == $prem->numero_ejemplar_superfecta1) and ($prem->caballo_segundo == $prem->numero_ejemplar_superfecta2) and ($prem->caballo_tercero == $prem->numero_ejemplar_superfecta3) and ($prem->caballo_cuarto == $prem->numero_ejemplar_superfecta4)) and $prem->apuesta_superfecta > 0 )
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Superfecta')->update([
                        'estatus_id' => 3,
                        'total_ganado' => $total_ganado_superfecta,
                        'total_perdido' => $total_perdido,
                        'perdio_ganador' => 0,
                    ]);
                }
                else
                {
                    $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Superfecta')->update([
                        'estatus_id' => 4,
                        'perdio_superfecta' => $prem->apuesta_superfecta,
                        'total_ganado' => 0,
                        'total_perdido' => $prem->apuesta_superfecta,
                    ]);
                }    
            }
            if($perdio_superfecta > 0)
            {
                $actualizar2 = CarrerasJugada::where('id', $id)->where('carrera', $carrera)->where('carrera_id', $id_carr)->where('estatus_id','<>',1)->where('estatus_id','<>',6)->where('estatus_id','<>',7)->where('apuesta','Superfecta')->update([
                    'estatus_id' => 4,
                    'perdio_superfecta' => $prem->apuesta_superfecta,
                    'total_ganado' => 0,
                    'total_perdido' => $prem->apuesta_superfecta,
                ]);
            }
            /*FIN DE PAGAR SUPERFECTA*/
        }

        /*PAGANDO SI ES ONLINE*/

        $premiar = CarrerasJugada::where('carrera_id', $this->id_carrera)->where('online_pagado', 0)->where('origen_id', 2)->get(); 
        foreach($premiar as $prem)
        {
            if($prem->total_ganado > 0 and $prem->total_perdido < 1)
            {
                $actualizar = User::where('id', $prem->taquilla_id)->where('nivel_id', 4)
                ->update([
                    'monedero' => User::raw('monedero + '. $prem->total_ganado),
                ]);
    
                date_default_timezone_set('America/Caracas');
                $fecha_recarga = date('d')."/".date('m')."/".date('Y');
                $fecha_invertida_recarga = date('Y').date('m').date('d');
        
                $crear = UsersMovimiento::create([
                'usuario_id'=>$prem->taquilla_id,
                'fecha'=>$fecha_recarga,
                'fecha_invertida'=>$fecha_invertida_recarga,
                'operacion_id'=>2,
                'monto'=>$prem->total_ganado,
                'descripcion'=>'Premio por ticket '.$prem->ticket,
                ]);

                $actualizar2 = CarrerasJugada::where('id', $prem->id)
                ->update([
                    'online_pagado' => 1,
                ]);
            }
        }

        /*FIN DE PAGAR SI ES ONLINE*/
        
        $this->reset(['open_premiacion','caballo_ganador','dividendo_ganador']);
        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function grabar_retirar()
    {
        $this->validate([
            'caballo_retirar' => 'required|max:5',
        ]);

        $eliminar = CarrerasDetalle::where('carrera_id', $this->id_carrera_ret)->where('carrera', $this->carrera_ret)->where('numero_ejemplar', $this->caballo_retirar)->delete();

        $actualizar = CarrerasJugada::where('carrera_id', $this->id_carrera_ret)->where('carrera', $this->carrera_ret)->where('numero_ejemplar', $this->caballo_retirar)->update([
            'estatus_id'=>7,
        ]);

        $this->reset(['open_retirar','caballo_retirar']);
        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function delete($carreraId)
    {
        $eliminar = Carrera::where('id', $carreraId)->delete();
    }
}
