<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Remate;
use App\Models\EstatusRemate;
use App\Models\User;
use App\Models\Carrera;
use App\Models\Hora;
use App\Models\Hipodromo;

class RematesAdmin extends Component
{
    public $search, $remate, $monedero, $lista_hipodromos=[], $lista_horas=[], $hoy, $hipodromo_id, $fecha, $hora_cierre, $carrera, $comision, $observacion, $incentivo, $estatus_remate_id, $id_remate, $e_estatus, $lista_est = [];
    public $sort = 'id';
    public $open_crear = false;
    public $open_edit = false;

    protected $listeners = ['render','delete'];

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

        $remates = Remate::select('remates.*', 'hipodromos.*', 'remates.id as id')
        ->join('hipodromos', 'hipodromos.id', 'remates.hipodromo_id')
        ->orderBy('remates.id', 'desc')
        ->get();

        return view('livewire.admin.remates-admin', compact('remates'));
    }

    public function save()
    {
        $this->validate([
            'hipodromo_id' => 'required|integer|max:200',
            'fecha' => 'required',
            'hora_cierre' => 'required',
            'carrera' => 'integer|required',
            'comision' => 'required',
            'incentivo' => 'numeric',
        ]);
    
        $dia_cierre = substr($this->fecha, 0, 2);
        $mes_cierre = substr($this->fecha, 3, 2);
        $anio_cierre = substr($this->fecha, 6, 4);

        $cierre_carrera = $anio_cierre."-".$mes_cierre."-".$dia_cierre." ".$this->hora_cierre.":00";

        $remate = Remate::create([
            'hipodromo_id' => $this->hipodromo_id,
            'propietario_id' => auth()->user()->id,
            'fecha' => $this->fecha,
            'hora_cierre' => $this->hora_cierre,
            'carrera' => $this->carrera,
            'comision' => $this->comision,
            'incentivo' => $this->incentivo,
            'observacion' => $this->observacion,
            'estatus_id' => '1',
            'monto_pagar' => '0',
            'cierre_carrera' => $cierre_carrera,
        ]);

        $this->reset(['open_crear','hipodromo_id','fecha','hora_cierre', 'carrera', 'comision', 'observacion']);
        $this->dispatch('alert');
    }

    public function edit(Remate $remate_editar)
    {
       $this->id_remate = $remate_editar['id'];
       $this->e_estatus = $remate_editar['estatus_id'];
       $this->estatus_remate_id = $remate_editar['estatus_id'];
       $this->lista_est = $lista_estatus = EstatusRemate::orderBy('estatus','asc')->get();

       $this->open_edit = true;
    }

    public function update()
    {
        $this->validate([
            'estatus_remate_id' => 'required|integer|max:7',
        ]);
    
        $actualizar = Remate::where('id', $this->id_remate)->update([
            'estatus_id' => $this->estatus_remate_id, 
        ]);

        $this->reset(['open_edit']);
        $this->dispatch('alert');
    }

    public function order($sort)
    {
        if($this->sort == $sort)
        {
            if($this->direccion == 'desc') 
            {
                $this->direccion = 'asc';
            }
            else 
            {
                $this->direccion = 'desc';
            }
        }
        else
        {
            $this->sort = $sort;
            $this->direccion = 'asc';
        }
    }

    public function delete($remaId)
    {
        $eliminar = Remate::where('id', $remaId)->delete();
    }
}
