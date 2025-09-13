<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CarrerasJugada;
use App\Models\User;
use App\Models\EstatusJugada;
use Illuminate\Support\Facades\Hash;
use DB;

class TicketsTaquillaAdmin extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'carreras_jugadas.id';
    public $direccion = 'desc';
    public $cant = 20;
    public $readyToLoad = false;
    public $id_taquilla, $id_moneda;
    public $id_ticket, $jugadas_detallee=[], $fecha_ticket, $hora_ticket, $estatus_ticket, $monto_ticket, $premio_ticket, $moneda_ticket;
    public $mostrar_encabezado=[], $mostrar_jugada=[], $jugada, $fecha_inicio, $fecha_fin;

    public $taquilla=0, $banquero, $lista_banqueros = [], $lista_taquillas = [];
    public $open_ticket = false;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id_taquilla, $fecha_inicio, $fecha_fin)
    {
        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }

        $this->id_taquilla = $id_taquilla;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function render()
    {
        $jugadas = DB::table('carreras_jugadas')
        ->select('carreras_jugadas.*','hipodromos.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.name as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'origenes.origen as origen', 'monedas.abreviacion as moneda'
        , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_apostado')
        , DB::raw('sum(carreras_jugadas.total_ganado) as total_ganado')
        , DB::raw('sum(carreras_jugadas.total_perdido) as total_perdido')
        )
        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
        ->join('hipodromos', 'hipodromos.id', '=', 'carreras_jugadas.hipodromo_id')
        ->join('origenes', 'origenes.id', '=', 'carreras_jugadas.origen_id')
        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
        ->where('carreras_jugadas.monto_apuesta','>', 0)
        ->where('carreras_jugadas.estatus_id','<>', 1)
        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
        ->where('carreras_jugadas.taquilla_id', $this->id_taquilla)
        ->groupBy('ticket')
        ->orderBy($this->sort, $this->direccion)
        ->get();

        return view('livewire.admin.tickets-taquilla-admin', compact('jugadas'));
    }
    public function loadUsuarios()
    {
        $this->readyToLoad = true;
    }

    public function ticket($ticket_mostrar)
    {

        $this->mostrar_encabezado = CarrerasJugada::where('ticket', $ticket_mostrar)->take(1)->get();
        $this->mostrar_jugada = CarrerasJugada::where('ticket', $ticket_mostrar)->get();

        $this->open_ticket = true;
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
}
