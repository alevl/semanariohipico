<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserMovimiento;
use App\Models\EstatusUsuario;
use App\Models\Nivele;
use Illuminate\Support\Facades\Hash;
use App\Models\Operacione;
use App\Models\Trato;

class UsuariosAdmin extends Component
{
    public $search, $id_usuario, $username_editar, $name, $telefono, $estatus_id, $nivel_id, $usuario_editar, $e_estatus, $lista_estatus, $lista_est=[], $cliente; 
    public $username, $name_crear, $telefono_crear, $estatus_id_crear, $nivel_id_crear, $id_usuario_clave, $name_clave, $username_clave, $nueva_clave, $clave_crear, $username_recarga, $name_recarga, $id_usuario_recarga, $monto_recarga, $lista_operaciones=[], $operacion_recarga=2, $lista_tratos, $trato, $trato_editar;
    public $monedero;
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
        if(auth()->user()->nivel_id <> 2)
        {
            session()->flush();
            return redirect()->route('login');
        }

        $this->cliente = new User();
    }

    public function render()
    {
        $this->monedero = User::
        select('users.*','monedas.*')
        ->join('monedas', 'monedas.id','=','users.moneda_id')
        ->where('users.id', auth()->user()->id)
        ->first();

        $this->lista_est = EstatusUsuario::orderBy('estatus','asc')->get();
        $this->lista_operaciones = Operacione::orderBy('id','asc')->get();
        $this->lista_tratos = Trato::orderBy('id','asc')->get();

        $usuarios = User::select('users.*', 'estatus_usuarios.*', 'niveles.*', 'users.id as id_usuario', 'tratos.*')
        ->join('estatus_usuarios', 'estatus_usuarios.id', 'users.estatus_id')
        ->join('niveles', 'niveles.id', 'users.nivel_id')
        ->join('tratos', 'tratos.id', 'users.trato_id')
        ->where('users.nivel_id', 1)
        ->orderBy('users.name', 'asc')
        ->get();

        return view('livewire.admin.usuarios-admin', compact('usuarios'));
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
        $this->trato_editar = $usuario_editar['trato_id'];
        $this->estatus_id = $usuario_editar['estatus_id'];

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

    public function update(){
        $this->validate([
            'name' => 'required|max:20',
            'telefono' => 'max:20',
            'estatus_id' => 'required|max:5',
            'trato_editar' => 'required|max:20',
        ]);

        $actualizar = User::where('id', $this->id_usuario)
        ->update([
            'name' => $this->name,
            'telefono' => $this->telefono,
            'estatus_id' => $this->estatus_id,
            'trato_id' => $this->trato_editar,
        ]);

        $this->reset(['open_edit', 'estatus_id', 'trato_editar']);
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
            'clave_crear' => 'required|max:255',
            'trato' => 'required|max:10',
        ]);

        $usuario = User::create([
            'username' => $this->username,
            'name' => $this->name_crear,
            'telefono' => $this->telefono_crear,
            'estatus_id' => $this->estatus_id_crear,
            'password' => Hash::make($this->clave_crear),
            'nivel_id' => 1,
            'propietario_id' => auth()->user()->id,
            'moneda_id' => 1,
            'trato_id' => $this->trato,
        ]);

        $this->reset(['open_crear', 'estatus_id_crear', 'username', 'telefono_crear', 'name_crear', 'estatus_id_crear','trato' ]);

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
        $this->reset(['open_edit', 'estatus_id','trato_editar']);

        $this->resetValidation();

        $this->open_edit = false;
    }

    public function cerrar_ventana_crear()
    {
        $this->reset(['open_crear', 'estatus_id_crear','username','telefono_crear','name_crear','estatus_id_crear','trato']);

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
    
            $crear = UserMovimiento::create([
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
    
            $crear = UserMovimiento::create([
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
