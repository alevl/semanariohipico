<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CarrerasJugada;
use App\Models\User;
use App\Models\EstatusJugada;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Database\Query\Builder;

class ReportesAdmin extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'carreras_jugadas.fecha_jugada';
    public $direccion = 'desc';
    public $cant = 20;
    public $readyToLoad = false;
    public $fecha_inicio, $fecha_fin, $fecha_i, $fecha_f;
    public $id_ticket, $jugadas_detallee=[], $fecha_ticket, $hora_ticket, $estatus_ticket, $monto_ticket, $premio_ticket, $moneda_ticket;
    public $mostrar_encabezado=[], $mostrar_jugada=[], $jugada;

    public $taquilla=0, $banquero=0, $lista_banqueros = [], $lista_taquillas = [];
    public $open_ticket = false;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        if(auth()->user()->nivel_id <> 1)
        {
            session()->flush();
            return redirect()->route('login');
        }

        date_default_timezone_set('America/Caracas');
        $this->fecha_i = date('d')."/".date('m')."/".date('Y');
        $this->fecha_f = date('d')."/".date('m')."/".date('Y');

        $this->jugada = new CarrerasJugada();
    }

    public function render()
    {
        $this->dia_inicio = substr($this->fecha_i, 0, 2);
        $this->mes_inicio = substr($this->fecha_i, 3, 2);
        $this->anio_inicio = substr($this->fecha_i, 6, 4);

        $this->dia_fin = substr($this->fecha_f, 0, 2);
        $this->mes_fin = substr($this->fecha_f, 3, 2);
        $this->anio_fin = substr($this->fecha_f, 6, 4);

        $this->fecha_inicio = $this->anio_inicio.$this->mes_inicio.$this->dia_inicio;
        $this->fecha_fin = $this->anio_fin.$this->mes_fin.$this->dia_fin;

        $this->lista_banqueros = CarrerasJugada::groupBy('banquero_id')->get();
        $this->lista_taquillas = CarrerasJugada::where('banquero_id', $this->banquero)->groupBy('taquilla_id')->get();
        
        if($this->banquero == 0 and  $this->taquilla == 0) 
        {
            $jugadas = DB::table('carreras_jugadas')
            ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
            , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_apostado')
            , DB::raw('sum(carreras_jugadas.total_ganado) as total_ganado')
            , DB::raw('sum(carreras_jugadas.total_perdido) as total_perdido')
            )
            ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
            ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
            ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
            ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
            ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
            ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
            ->where('carreras_jugadas.monto_apuesta','>', 0)
            ->where('carreras_jugadas.estatus_id','<>', 1)
            ->groupBy('fecha_jugada')
            ->groupBy('taquilla_id')
            ->groupBy('carreras_jugadas.moneda_id')
            ->orderBy($this->sort, $this->direccion)
            ->get();

            $tnulos = DB::table('carreras_jugadas')
            ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
            , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_nulos')
            )
            ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
            ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
            ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
            ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
            ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
            ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
            ->where('carreras_jugadas.monto_apuesta','>', 0)
            ->where('carreras_jugadas.estatus_id', 6)
            ->groupBy('fecha_jugada')
            ->groupBy('taquilla_id')
            ->groupBy('carreras_jugadas.moneda_id')
            ->orderBy($this->sort, $this->direccion)
            ->get();

            $nnulos = DB::table('carreras_jugadas')
            ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
            , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_nulos')
            )
            ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
            ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
            ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
            ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
            ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
            ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
            ->where('carreras_jugadas.monto_apuesta','>', 0)
            ->where('carreras_jugadas.estatus_id', 6)
            ->groupBy('fecha_jugada')
            ->groupBy('taquilla_id')
            ->groupBy('carreras_jugadas.moneda_id')
            ->orderBy($this->sort, $this->direccion)
            ->get();

            $tdevolucion = DB::table('carreras_jugadas')
            ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
            , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_devolucion')
            )
            ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
            ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
            ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
            ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
            ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
            ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
            ->where('carreras_jugadas.monto_apuesta','>', 0)
            ->where('carreras_jugadas.estatus_id', 7)
            ->groupBy('fecha_jugada')
            ->groupBy('taquilla_id')
            ->groupBy('carreras_jugadas.moneda_id')
            ->orderBy($this->sort, $this->direccion)
            ->get();

            $ndevolucion = DB::table('carreras_jugadas')
            ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
            , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_devolucion')
            )
            ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
            ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
            ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
            ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
            ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
            ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
            ->where('carreras_jugadas.monto_apuesta','>', 0)
            ->where('carreras_jugadas.estatus_id', 7)
            ->groupBy('fecha_jugada')
            ->groupBy('taquilla_id')
            ->groupBy('carreras_jugadas.moneda_id')
            ->orderBy($this->sort, $this->direccion)
            ->get();

            $pagados = DB::table('carreras_jugadas')
            ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
            , DB::raw('sum(carreras_jugadas.total_ganado) as tpagado')
            )
            ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
            ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
            ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
            ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
            ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
            ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
            ->where('carreras_jugadas.monto_apuesta','>', 0)
            ->where('carreras_jugadas.estatus_id', 5)
            ->groupBy('fecha_jugada')
            ->groupBy('taquilla_id')
            ->groupBy('carreras_jugadas.moneda_id')
            ->orderBy($this->sort, $this->direccion)
            ->get();
        }
        else
        {
            if($this->banquero <> 0 and  $this->taquilla == 0) 
            {
                $jugadas = DB::table('carreras_jugadas')
                ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_apostado')
                , DB::raw('sum(carreras_jugadas.total_ganado) as total_ganado')
                , DB::raw('sum(carreras_jugadas.total_perdido) as total_perdido')
                )
                ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                ->where('carreras_jugadas.monto_apuesta','>', 0)
                ->where('carreras_jugadas.estatus_id','<>', 1)
                ->where('carreras_jugadas.banquero_id', $this->banquero)
                ->groupBy('fecha_jugada')
                ->groupBy('taquilla_id')
                ->groupBy('carreras_jugadas.moneda_id')
                ->orderBy($this->sort, $this->direccion)
                ->get();

                $tnulos = DB::table('carreras_jugadas')
                ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_nulos')
                )
                ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                ->where('carreras_jugadas.monto_apuesta','>', 0)
                ->where('carreras_jugadas.estatus_id', 6)
                ->where('carreras_jugadas.banquero_id', $this->banquero)
                ->groupBy('fecha_jugada')
                ->groupBy('taquilla_id')
                ->groupBy('carreras_jugadas.moneda_id')
                ->orderBy($this->sort, $this->direccion)
                ->get();
    
                $nnulos = DB::table('carreras_jugadas')
                ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_nulos')
                )
                ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                ->where('carreras_jugadas.monto_apuesta','>', 0)
                ->where('carreras_jugadas.estatus_id', 6)
                ->where('carreras_jugadas.banquero_id', $this->banquero)
                ->groupBy('fecha_jugada')
                ->groupBy('taquilla_id')
                ->groupBy('carreras_jugadas.moneda_id')
                ->orderBy($this->sort, $this->direccion)
                ->get();

                $tdevolucion = DB::table('carreras_jugadas')
                ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_devolucion')
                )
                ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                ->where('carreras_jugadas.monto_apuesta','>', 0)
                ->where('carreras_jugadas.estatus_id', 7)
                ->where('carreras_jugadas.banquero_id', $this->banquero)
                ->groupBy('fecha_jugada')
                ->groupBy('taquilla_id')
                ->groupBy('carreras_jugadas.moneda_id')
                ->orderBy($this->sort, $this->direccion)
                ->get();
    
                $ndevolucion = DB::table('carreras_jugadas')
                ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_devolucion')
                )
                ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                ->where('carreras_jugadas.monto_apuesta','>', 0)
                ->where('carreras_jugadas.estatus_id', 7)
                ->where('carreras_jugadas.banquero_id', $this->banquero)
                ->groupBy('fecha_jugada')
                ->groupBy('taquilla_id')
                ->groupBy('carreras_jugadas.moneda_id')
                ->orderBy($this->sort, $this->direccion)
                ->get();

                $pagados = DB::table('carreras_jugadas')
                ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                , DB::raw('sum(carreras_jugadas.total_ganado) as tpagado')
                )
                ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                ->where('carreras_jugadas.monto_apuesta','>', 0)
                ->where('carreras_jugadas.estatus_id', 5)
                ->where('carreras_jugadas.banquero_id', $this->banquero)
                ->groupBy('fecha_jugada')
                ->groupBy('taquilla_id')
                ->groupBy('carreras_jugadas.moneda_id')
                ->orderBy($this->sort, $this->direccion)
                ->get();
            }
            else
            {
                if($this->banquero == 0 and  $this->taquilla <> 0) 
                {
                    $jugadas = DB::table('carreras_jugadas')
                    ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                    , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_apostado')
                    , DB::raw('sum(carreras_jugadas.total_ganado) as total_ganado')
                    , DB::raw('sum(carreras_jugadas.total_perdido) as total_perdido')
                    )
                    ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                    ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                    ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                    ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                    ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                    ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                    ->where('carreras_jugadas.monto_apuesta','>', 0)
                    ->where('carreras_jugadas.estatus_id','<>', 1)
                    ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                    ->groupBy('fecha_jugada')
                    ->groupBy('taquilla_id')
                    ->groupBy('carreras_jugadas.moneda_id')
                    ->orderBy($this->sort, $this->direccion)
                    ->get();

                    $tnulos = DB::table('carreras_jugadas')
                    ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                    , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_nulos')
                    )
                    ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                    ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                    ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                    ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                    ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                    ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                    ->where('carreras_jugadas.monto_apuesta','>', 0)
                    ->where('carreras_jugadas.estatus_id', 6)
                    ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                    ->groupBy('fecha_jugada')
                    ->groupBy('taquilla_id')
                    ->groupBy('carreras_jugadas.moneda_id')
                    ->orderBy($this->sort, $this->direccion)
                    ->get();
        
                    $nnulos = DB::table('carreras_jugadas')
                    ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                    , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_nulos')
                    )
                    ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                    ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                    ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                    ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                    ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                    ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                    ->where('carreras_jugadas.monto_apuesta','>', 0)
                    ->where('carreras_jugadas.estatus_id', 6)
                    ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                    ->groupBy('fecha_jugada')
                    ->groupBy('taquilla_id')
                    ->groupBy('carreras_jugadas.moneda_id')
                    ->orderBy($this->sort, $this->direccion)
                    ->get();

                    $tdevolucion = DB::table('carreras_jugadas')
                    ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                    , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_devolucion')
                    )
                    ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                    ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                    ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                    ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                    ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                    ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                    ->where('carreras_jugadas.monto_apuesta','>', 0)
                    ->where('carreras_jugadas.estatus_id', 7)
                    ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                    ->groupBy('fecha_jugada')
                    ->groupBy('taquilla_id')
                    ->groupBy('carreras_jugadas.moneda_id')
                    ->orderBy($this->sort, $this->direccion)
                    ->get();
        
                    $ndevolucion = DB::table('carreras_jugadas')
                    ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                    , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_devolucion')
                    )
                    ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                    ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                    ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                    ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                    ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                    ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                    ->where('carreras_jugadas.monto_apuesta','>', 0)
                    ->where('carreras_jugadas.estatus_id', 7)
                    ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                    ->groupBy('fecha_jugada')
                    ->groupBy('taquilla_id')
                    ->groupBy('carreras_jugadas.moneda_id')
                    ->orderBy($this->sort, $this->direccion)
                    ->get();

                    $pagados = DB::table('carreras_jugadas')
                    ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                    , DB::raw('sum(carreras_jugadas.total_ganado) as tpagado')
                    )
                    ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                    ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                    ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                    ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                    ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                    ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                    ->where('carreras_jugadas.monto_apuesta','>', 0)
                    ->where('carreras_jugadas.estatus_id', 5)
                    ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                    ->groupBy('fecha_jugada')
                    ->groupBy('taquilla_id')
                    ->groupBy('carreras_jugadas.moneda_id')
                    ->orderBy($this->sort, $this->direccion)
                    ->get();
                }
                else
                {
                    if($this->banquero <> 0 and  $this->taquilla <> 0) 
                    {
                        $jugadas = DB::table('carreras_jugadas')
                        ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                        , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_apostado')
                        , DB::raw('sum(carreras_jugadas.total_ganado) as total_ganado')
                        , DB::raw('sum(carreras_jugadas.total_perdido) as total_perdido')
                        )
                        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                        ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                        ->where('carreras_jugadas.monto_apuesta','>', 0)
                        ->where('carreras_jugadas.estatus_id','<>', 1)
                        ->where('carreras_jugadas.banquero_id', $this->banquero)
                        ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                        ->groupBy('fecha_jugada')
                        ->groupBy('taquilla_id')
                        ->groupBy('carreras_jugadas.moneda_id')
                        ->orderBy($this->sort, $this->direccion)
                        ->get();

                        $tnulos = DB::table('carreras_jugadas')
                        ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                        , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_nulos')
                        )
                        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                        ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                        ->where('carreras_jugadas.monto_apuesta','>', 0)
                        ->where('carreras_jugadas.estatus_id', 6)
                        ->where('carreras_jugadas.banquero_id', $this->banquero)
                        ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                        ->groupBy('fecha_jugada')
                        ->groupBy('taquilla_id')
                        ->groupBy('carreras_jugadas.moneda_id')
                        ->orderBy($this->sort, $this->direccion)
                        ->get();
            
                        $nnulos = DB::table('carreras_jugadas')
                        ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                        , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_nulos')
                        )
                        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                        ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                        ->where('carreras_jugadas.monto_apuesta','>', 0)
                        ->where('carreras_jugadas.estatus_id', 6)
                        ->where('carreras_jugadas.banquero_id', $this->banquero)
                        ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                        ->groupBy('fecha_jugada')
                        ->groupBy('taquilla_id')
                        ->groupBy('carreras_jugadas.moneda_id')
                        ->orderBy($this->sort, $this->direccion)
                        ->get();

                        $tdevolucion = DB::table('carreras_jugadas')
                        ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                        , DB::raw('sum(carreras_jugadas.monto_apuesta) as total_devolucion')
                        )
                        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                        ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                        ->where('carreras_jugadas.monto_apuesta','>', 0)
                        ->where('carreras_jugadas.estatus_id', 7)
                        ->where('carreras_jugadas.banquero_id', $this->banquero)
                        ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                        ->groupBy('fecha_jugada')
                        ->groupBy('taquilla_id')
                        ->groupBy('carreras_jugadas.moneda_id')
                        ->orderBy($this->sort, $this->direccion)
                        ->get();
            
                        $ndevolucion = DB::table('carreras_jugadas')
                        ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                        , DB::raw('count(carreras_jugadas.estatus_id) as cantidad_devolucion')
                        )
                        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                        ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                        ->where('carreras_jugadas.monto_apuesta','>', 0)
                        ->where('carreras_jugadas.estatus_id', 7)
                        ->where('carreras_jugadas.banquero_id', $this->banquero)
                        ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                        ->groupBy('fecha_jugada')
                        ->groupBy('taquilla_id')
                        ->groupBy('carreras_jugadas.moneda_id')
                        ->orderBy($this->sort, $this->direccion)
                        ->get();

                        $pagados = DB::table('carreras_jugadas')
                        ->select('carreras_jugadas.*','estatus_tickets.*','users.*', 'carreras_jugadas.ticket as jugada_id','estatus_tickets.estatus as estatus', 'users.username as banquero', 'carreras_jugadas.estatus_id as estatus_id', 'monedas.moneda as moneda', 'taquilla.username as taquilla'
                        , DB::raw('sum(carreras_jugadas.total_ganado) as tpagado')
                        )
                        ->join('users', 'users.id', '=', 'carreras_jugadas.banquero_id')
                        ->join('users as taquilla', 'taquilla.id', '=', 'carreras_jugadas.taquilla_id')
                        ->join('estatus_tickets', 'estatus_tickets.id', '=', 'carreras_jugadas.estatus_id')
                        ->join('monedas', 'monedas.id', '=', 'carreras_jugadas.moneda_id')
                        ->where('carreras_jugadas.fecha_invertida','>=', $this->fecha_inicio)
                        ->where('carreras_jugadas.fecha_invertida','<=', $this->fecha_fin)
                        ->where('carreras_jugadas.monto_apuesta','>', 0)
                        ->where('carreras_jugadas.estatus_id', 5)
                        ->where('carreras_jugadas.banquero_id', $this->banquero)
                        ->where('carreras_jugadas.taquilla_id', $this->taquilla)
                        ->groupBy('fecha_jugada')
                        ->groupBy('taquilla_id')
                        ->groupBy('carreras_jugadas.moneda_id')
                        ->orderBy($this->sort, $this->direccion)
                        ->get();
                    }
                }
            }
        }

        return view('livewire.admin.reportes-admin', compact('jugadas'))->with('nnulos', $nnulos)->with('tnulos', $tnulos)->with('pagados', $pagados)->with('ndevolucion', $ndevolucion)->with('tdevolucion', $tdevolucion);
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
