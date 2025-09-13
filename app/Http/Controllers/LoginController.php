<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function acceso(Request $request)
    {
        $credentials =  request()->only('username', 'password');

        if(Auth::attempt($credentials))
        {
            session(['nivel' => auth()->user()->nivel_id]);

            request()->session()->regenerate(); 

            if(session('nivel') == 1)
            {
                return redirect()->route('tablero');
            }
            else
            {
                if(session('nivel') == 2)
                {
                    return redirect()->route('taquillas-banquero');
                }
                else
                {
                    if(session('nivel') == 3)
                    {
                        return redirect()->route('dashboard');
                    }
                    else
                    {
                        if(session('nivel') == 4)
                        {
                            return redirect()->route('jugadas');
                        }                        
                    }
                }
            }
        }
        else
        {
            return back()->withErrors([
                'message'=>'Credenciales incorrectas'
            ]);
        }
    }

    public function registro(Request $request)
    {
        if($request->name == '' or $request->password == '' or $request->password2 == '' or $request->username == '')
        {
            return back()->withErrors([
                'message'=>'Los campos no pueden quedar vacios. Verifique'
            ]);
        }
        else
        {
            if($request->password <> $request->password2)
            {
                return back()->withErrors([
                    'message'=>'La clave no coincide con la confirmación. Verifique'
                ]);
            }
            else
            {
                $existe = User::where('username', $request->username)->count();
                if($existe > 0)
                {
                    return back()->withErrors([
                        'message'=>'El nombre de usuario ya existe, intente con otro nombre de usuario. Verifique'
                    ]);
                }
                else
                {
                    $crear = User::create([
                        'name' => $request->name,
                        'username' => $request->username,
                        'password' => Hash::make($request->password),
                        'nivel_id' => 2,
                        'estatus_id' => 2,
                    ]);

                    return redirect()->route('login')->withErrors([
                        'message'=>'Introduzca su usuario y password para ingresar']);
                }
            }
        }
    }
}
