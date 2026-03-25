<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Pronostico;
use App\Models\Hipodromo;
use App\Models\Caballo;

class PronosticosAdmin extends Component
{
    public $carrera, $hipodromo, $marca1, $marca2, $marca3, $marca4, $fecha_buscar, $fecha, $id_pronostico;
    public $fecha_editar, $carrera_editar, $hipodromo_editar, $primera_marca, $segunda_marca, $tercera_marca, $cuarta_marca;

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
        $this->fecha_buscar = date('d/m/Y');
    }

    public function render()
    {
        $carreras = Pronostico::select('pronosticos.*', 'hipodromos.*', 'pronosticos.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pronosticos.hipodromo_id')
        ->where('pronosticos.fecha_carrera', $this->fecha_buscar)
        ->orderBy('pronosticos.carrera','asc')
        ->orderBy('pronosticos.hipodromo_id','asc')
        ->groupBy('pronosticos.hipodromo_id')->get();

        $pronosticos = Pronostico::select('pronosticos.*', 'hipodromos.*', 'pronosticos.id as id')
        ->join('hipodromos', 'hipodromos.id', 'pronosticos.hipodromo_id')
        ->where('pronosticos.fecha_carrera', $this->fecha_buscar)
        ->orderBy('pronosticos.carrera','asc')
        ->orderBy('pronosticos.hipodromo_id','asc')
        ->get();

        $lista_hipodromos = Hipodromo::orderBy('hipodromo', 'asc')->get();
        $lista_numeros = Caballo::orderBy('id', 'asc')->get();

        return view('livewire.admin.pronosticos-admin', compact('carreras'))->with('pronosticos', $pronosticos)->with('lista_hipodromos', $lista_hipodromos)->with('lista_numeros', $lista_numeros);
    }

    public function save()
    {
        $this->validate([
            'hipodromo' => 'required',
            'fecha' => 'required|date_format:d/m/Y',
            'carrera' => 'required',
        ]);
    
        $partes = explode('/', $this->fecha);
        $fecha_invertida = $partes[2] . $partes[1] . $partes[0];

        $grabar = Pronostico::create([
            'hipodromo_id' => $this->hipodromo,
            'carrera' => $this->carrera,
            'fecha_carrera' => $this->fecha,
            'fecha_invertida' => $fecha_invertida,
            'primera_marca' => $this->marca1,
            'segunda_marca' => $this->marca2,
            'tercera_marca' => $this->marca3,
            'cuarta_marca' => $this->marca4,
        ]);

        $this->reset(['marca1', 'marca2', 'marca3', 'marca4']);
        $this->dispatch('alert');
    }

    public function edit(Pronostico $editar)
    {
       $this->id_pronostico = $editar['id'];
       $this->fecha_editar = $editar['fecha_carrera'];
       $this->carrera_editar = $editar['carrera'];
       $this->primera_marca = $editar['primera_marca'];
       $this->segunda_marca = $editar['segunda_marca'];
       $this->tercera_marca = $editar['tercera_marca'];
       $this->cuarta_marca = $editar['cuarta_marca'];
       $this->hipodromo_editar = $editar['hipodromo_id'];

       $this->open_edit = true;
    }

    public function update()
    {
        $this->validate([
            'hipodromo_editar' => 'required',
            'carrera_editar' => 'required',
        ]);

        $actualizacion = Pronostico::where('id', $this->id_pronostico)
        ->update([
            'primera_marca' => $this->primera_marca,
            'segunda_marca' => $this->segunda_marca,
            'tercera_marca' => $this->tercera_marca,
            'cuarta_marca' => $this->cuarta_marca,
            'hipodromo_id' => $this->hipodromo_editar,
            'carrera' => $this->carrera_editar,
        ]);

        $this->reset(['open_edit']);
        $this->dispatch('alert');
    }

    public function delete($pronosticoId)
    {
        $eliminar = Pronostico::where('id', $pronosticoId)->delete();
    }
}
