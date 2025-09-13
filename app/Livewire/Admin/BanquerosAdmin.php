<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UsersMovimiento;
use App\Models\EstatusUsuario;
use App\Models\Nivele;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Operacione;

class BanquerosAdmin extends Component
{
    use WithPagination;

    public $search, $id_usuario, $username_editar, $name, $telefono, $estatus_id, $nivel_id, $usuario_editar, $e_estatus, $lista_estatus, $lista_est=[], $cliente, $propietario_id, $propietario_id_editm, $lista_propietarios=[], $username_recarga, $name_recarga, $id_usuario_recarga, $monto_recarga, $lista_operaciones=[];
    public $username, $name_crear, $telefono_crear, $estatus_id_crear, $nivel_id_crear, $id_usuario_clave, $name_clave, $username_clave, $nueva_clave, $clave_crear, $operacion_recarga=2;
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
        $this->lista_propietarios = User::where('nivel_id', 1)->orderBy('name','asc')->get();
        $this->lista_operaciones = Operacione::orderBy('id','asc')->get();

        $banqueros = User::where('nivel_id', 2)
        ->where(function($q)
        {
            $q->orwhere('id', 'like', '%' . $this->search . '%');
            $q->orwhere('name', 'like', '%' . $this->search . '%');
            $q->orwhere('telefono', 'like', '%' . $this->search . '%');
            $q->orwhere('username', 'like', '%' . $this->search . '%');
 
            $q->orWhereHas('usuario_estatus', function($query) {
                return $query->where('estatus', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('usuario_propietario', function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->sort, $this->direccion)
        ->paginate($this->cant);

        return view('livewire.admin.banqueros-admin', compact('banqueros'));
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
        $this->telefono = $usuario_editar['telefono'];
        $this->e_estatus = $usuario_editar['estatus_id'];
        $this->estatus_id = $this->e_estatus;
        $this->propietario_id_edit = $usuario_editar['propietario_id'];

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
            'telefono' => 'max:20',
            'estatus_id' => 'required|max:5',
        ]);

        $actualizar = User::where('id', $this->id_usuario)
        ->update([
            'name' => $this->name,
            'telefono' => $this->telefono,
            'estatus_id' => $this->estatus_id,
        ]);

        $this->reset(['open_edit', 'estatus_id']);
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
            'telefono_crear' => 'max:20',
            'estatus_id_crear' => 'required|max:5',
            'propietario_id' => 'required|max:20',
            'clave_crear' => 'required|max:255',
        ]);

        $usuario = User::create([
            'username' => $this->username,
            'name' => $this->name_crear,
            'telefono' => $this->telefono_crear,
            'estatus_id' => $this->estatus_id_crear,
            'password' => Hash::make($this->clave_crear),
            'nivel_id' => 2,
            'propietario_id' => $this->propietario_id,
            'banquero_id' => auth()->user()->id,
            'moneda_id' => 1,
            'trato_id' => 1,
        ]);

        $this->reset(['open_crear', 'propietario_id','estatus_id_crear', 'username', 'telefono_crear', 'name_crear', 'estatus_id_crear']);

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
        $this->reset(['open_edit', 'estatus_id']);

        $this->resetValidation();

        $this->open_edit = false;
    }

    public function cerrar_ventana_crear()
    {
        $this->reset(['open_crear', 'estatus_id_crear','username','telefono_crear','name_crear','estatus_id_crear']);

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
