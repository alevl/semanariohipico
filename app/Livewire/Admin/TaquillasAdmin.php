<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\EstatusUsuario;
use App\Models\Nivele;
use Illuminate\Support\Facades\Hash;
use App\Models\Tope;
use App\Models\RegaliasNacionale;
use App\Models\RegaliasInternacionale;
use App\Models\Moneda;
use App\Models\Operacione;
use App\Models\UserMovimiento;
use DB;

class TaquillasAdmin extends Component
{
    use WithPagination;

    public $search, $id_usuario, $username_editar, $name, $banquero_id, $estatus_id, $nivel_id, $usuario_editar, $e_estatus, $lista_estatus, $lista_est=[], $cliente, $lista_usu=[], $lista_monedas=[], $moneda_id, $moneda_id_crear, $cod_pais, $caballos_minimo; 
    public $username, $name_crear, $banquero_id_crear, $estatus_id_crear, $nivel_id_crear, $cod_pais_crear, $caballos_minimo_crear, $id_usuario_clave, $name_clave, $username_clave, $nueva_clave, $clave_crear, $username_recarga, $name_recarga, $id_usuario_recarga, $monto_recarga, $lista_operaciones=[], $operacion_recarga=2;
    public $sort = 'name';
    public $direccion = 'asc';
    public $cant = 50;
    public $readyToLoad = false;
    public $open_edit = false;
    public $open_crear = false;
    public $open_clave = false;
    public $open_recarga = false;

    protected $listeners = ['render', 'resetear_clave'];

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

        $this->cliente = new User();
    }

    public function render()
    {
        $this->lista_est = EstatusUsuario::orderBy('estatus','asc')->get();
        $this->lista_usu = User::where('nivel_id', 2)->get();
        $this->lista_monedas = Moneda::orderBy('id','asc')->get();
        $this->lista_operaciones = Operacione::orderBy('id','asc')->get();

        $taquillas = User::where('nivel_id', 4)
        ->where(function($q)
        {
            $q->orwhere('id', 'like', '%' . $this->search . '%');
            $q->orwhere('name', 'like', '%' . $this->search . '%');
            $q->orwhere('username', 'like', '%' . $this->search . '%');
            $q->orwhere('cod_pais', 'like', '%' . $this->search . '%');
            $q->orwhere('caballos_minimo', 'like', '%' . $this->search . '%');
 
            $q->orWhereHas('usuario_estatus', function($query) {
                return $query->where('estatus', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('usuario_banquero', function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('usuario_propietario', function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('usuario_moneda', function($query) {
                return $query->where('moneda', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->sort, $this->direccion)
        ->paginate($this->cant);

        return view('livewire.admin.taquillas-admin', compact('taquillas'));
    }

    public function loadUsuarios()
    {
        $this->readyToLoad = true;
    }

    public function edit(User $usuario_editar)
    {
        $this->reset(['open_edit', 'estatus_id']);

        $this->resetValidation();

        $this->usuario_editar = $usuario_editar;
        $this->id_usuario = $usuario_editar['id'];
        $this->username_editar = $usuario_editar['username'];
        $this->name = $usuario_editar['name'];
        $this->banquero_id = $usuario_editar['banquero_id'];
        $this->e_estatus = $usuario_editar['estatus_id'];
        $this->estatus_id = $this->e_estatus;
        $this->moneda_id = $usuario_editar['moneda_id'];
        $this->cod_pais = $usuario_editar['cod_pais'];
        $this->caballos_minimo = $usuario_editar['caballos_minimo'];

        $this->open_edit = true;
    }
    public function clave(User $usuario_editar)
    {
        $this->reset(['open_clave', 'name_clave', 'nueva_clave', 'username_clave']);

        $this->resetValidation();

        $this->usuario_editar = $usuario_editar;
        $this->id_usuario_clave = $usuario_editar['id'];
        $this->name_clave = $usuario_editar['name'];
        $this->username_clave = $usuario_editar['username'];

        $this->open_clave = true;
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

    public function update()
    {
        $this->validate([
            'name' => 'required|max:20',
            'estatus_id' => 'required|max:5',
            'cod_pais' => 'required|max:5',
            'caballos_minimo' => 'required|numeric|max:10',
        ]);

        $actualizar = User::where('id', $this->id_usuario)
        ->update([
            'name' => $this->name,
            'estatus_id' => $this->estatus_id,
            'cod_pais' => $this->cod_pais,
            'caballos_minimo' => $this->caballos_minimo,
        ]);

        $this->reset(['open_edit', 'estatus_id', 'cod_pais', 'caballos_minimo']);
        $this->dispatch('alert');
    }
    public function update_clave()
    {
        $this->validate([
            'nueva_clave' => 'required|max:255',
        ]);

        $actualizar = User::where('id', $this->id_usuario_clave)
        ->update([
            'password' => Hash::make($this->nueva_clave),
        ]);

        $this->reset(['open_clave', 'name_clave', 'nueva_clave', 'username_clave']);
        $this->dispatch('alert');
    }

    public function save()
    {
        $this->validate([
            'username' => 'required|string|max:15|unique:users',
            'name_crear' => 'required|max:20',
            'banquero_id_crear' => 'required|max:5',
            'estatus_id_crear' => 'required|max:5',
            'moneda_id_crear' => 'required|max:5',
            'cod_pais_crear' => 'required|max:5',
            'caballos_minimo_crear' => 'required|numeric|max:10',
        ]);

        $propi = User::where('id', $this->banquero_id_crear)->first();

        $usuario = User::create([
            'username' => $this->username,
            'name' => $this->name_crear,
            'banquero_id' => $this->banquero_id_crear,
            'estatus_id' => $this->estatus_id_crear,
            'password' => Hash::make('123456789'),
            'nivel_id' => 4,
            'propietario_id' => $propi->propietario_id,
            'moneda_id' => $this->moneda_id_crear,
            'cod_pais' => $this->cod_pais_crear,
            'caballos_minimo' => $this->caballos_minimo_crear,
            'trato_id' => 1,
        ]);

        $tope1 = Tope::create([
            'banquero_id'=>$this->banquero_id_crear,
            'taquilla_id'=>$usuario->id,
            'moneda_id'=>1,
            'apuesta_minima'=>20,
            'apuesta_maxima'=>100,
            'maximo_dividendo'=>200,
            'cupo_caballo'=>500,
        ]);
        
        $tope2 = Tope::create([
            'banquero_id'=>$this->banquero_id_crear,
            'taquilla_id'=>$usuario->id,
            'moneda_id'=>2,
            'apuesta_minima'=>2,
            'apuesta_maxima'=>7,
            'maximo_dividendo'=>50,
            'cupo_caballo'=>50,
        ]);

        $regalia1 = RegaliasNacionale::create([
        'banquero_id'=>$this->banquero_id_crear,
        'taquilla_id'=>$usuario->id,
        'i_caso1'=>20,
        'f_caso1'=>36.1,
        'modo1'=>'IGUAL',
        'regalia1'=>34,
        'i_caso2'=>36.11,
        'f_caso2'=>42.1,
        'modo2'=>'IGUAL',
        'regalia2'=>40,
        'i_caso3'=>42.11,
        'f_caso3'=>200,
        'modo3'=>'MAS',
        'regalia3'=>18,
        'i_caso4'=>0,
        'f_caso4'=>0,
        'modo4'=>'MAS',
        'regalia4'=>0,
        'i_caso5'=>0,
        'f_caso5'=>0,
        'modo5'=>'MAS',
        'regalia5'=>0
        ]);
    
        $regalia2 = RegaliasInternacionale::create([
        'banquero_id'=>$this->banquero_id_crear,
        'taquilla_id'=>$usuario->id,
        'i_caso1'=>2,
        'f_caso1'=>50,
        'modo1'=>'MAS',
        'regalia1'=>0.6,
        'i_caso2'=>0,
        'f_caso2'=>0,
        'modo2'=>'MAS',
        'regalia2'=>0,
        'i_caso3'=>0,
        'f_caso3'=>0,
        'modo3'=>'MAS',
        'regalia3'=>0,
        'i_caso4'=>0,
        'f_caso4'=>0,
        'modo4'=>'MAS',
        'regalia4'=>0,
        'i_caso5'=>0,
        'f_caso5'=>0,
        'modo5'=>'MAS',
        'regalia5'=>0
        ]);    
    
        $this->reset(['open_crear', 'moneda_id', 'estatus_id_crear', 'username', 'banquero_id_crear', 'name_crear', 'estatus_id_crear', 'moneda_id_crear', 'cod_pais_crear', 'caballos_minimo_crear']);

        $this->dispatch('render');
        $this->dispatch('alert');
    }

    public function resetear_clave($usuarioId)
    {
        $actualizar = User::where('id', $usuarioId)
        ->update([
            'password' => Hash::make('123456789'),
        ]);
    }

    public function cerrar_ventana_update()
    {
        $this->reset(['open_edit', 'estatus_id','caballos_minimo']);

        $this->resetValidation();

        $this->open_edit = false;
    }

    public function cerrar_ventana_crear()
    {
        $this->reset(['open_crear', 'estatus_id_crear','username','banquero_id_crear','name_crear','estatus_id_crear', 'cod_pais_crear','caballos_minimo']);

        $this->resetValidation();

        $this->open_crear = false;
    }

    public function recarga(User $usuario_editar)
    {
        $this->id_usuario_recarga = $usuario_editar['id'];
        $this->username_recarga = $usuario_editar['username'];
        $this->name_recarga = $usuario_editar['name'];
        $this->open_recarga = true;
    }

    public function update_recarga()
    {
        $this->validate([
            'monto_recarga' => 'required|numeric',
        ]);
      
        date_default_timezone_set('America/Caracas');
        $fecha_recarga = date('d')."/".date('m')."/".date('Y');
        $fecha_invertida_recarga = date('Y').date('m').date('d');

        if($this->operacion_recarga == 2)
        {
            $actualizar = User::where('id', $this->id_usuario_recarga)
            ->update([
                'monedero' => User::raw('monedero + '. $this->monto_recarga),
            ]);
    
            $crear = UsersMovimiento::create([
            'usuario_id'=>$this->id_usuario_recarga,
            'fecha'=>$fecha_recarga,
            'fecha_invertida'=>$fecha_invertida_recarga,
            'operacion_id'=>2,
            'monto'=>$this->monto_recarga,
            'descripcion'=>'Recarga de saldo prepago',
            ]);
        }
        else
        {
            $actualizar = User::where('id', $this->id_usuario_recarga)
            ->update([
                'monedero' => User::raw('monedero - '. $this->monto_recarga),
            ]);
    
            $crear = UsersMovimiento::create([
            'usuario_id'=>$this->id_usuario_recarga,
            'fecha'=>$fecha_recarga,
            'fecha_invertida'=>$fecha_invertida_recarga,
            'operacion_id'=>1,
            'monto'=>$this->monto_recarga,
            'descripcion'=>'Descuento de saldo prepago',
            ]);    
        }

        $this->reset(['open_recarga', 'name_recarga', 'username_recarga','monto_recarga', 'operacion_recarga']);
        $this->dispatch('alert','Monedero recargado');
    }

    public function delete($usuarioId)
    {
        $actualizar = User::where('id', $usuarioId)
        ->delete();
    }
}
