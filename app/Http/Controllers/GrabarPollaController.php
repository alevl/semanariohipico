<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollasInscrita;

class GrabarPollaController extends Controller
{
    public function procesar(Request $request)
    {
        $n=0;
        $id_polla_usuario = $request->id_polla_usuario;
        $id_polla = $request->id_polla;

        $primera = $request->primera;
        $segunda = $request->segunda;
        $tercera = $request->tercera;
        $cuarta = $request->cuarta;
        $quinta = $request->quinta;
        $sexta = $request->sexta;

        if(is_null($primera))
        {
            $primera[0]='';
        }
        else
        {
            $actualizacion = PollasInscrita::
            where('polla_id', $id_polla)
            ->where('usuario_id', auth()->user()->id)
            ->where('id', $id_polla_usuario)
            ->update([
                'carrera1' => $primera[0],
            ]);
        }

        if(is_null($segunda))
        {
            $segunda[0]='';
        }
        else
        {
            $actualizacion = PollasInscrita::
            where('polla_id', $id_polla)
            ->where('usuario_id', auth()->user()->id)
            ->where('id', $id_polla_usuario)
            ->update([
                'carrera2' => $segunda[0],
            ]);
        }

        if(is_null($tercera))
        {
            $tercera[0]='';
        }
        else
        {
            $actualizacion = PollasInscrita::
            where('polla_id', $id_polla)
            ->where('usuario_id', auth()->user()->id)
            ->where('id', $id_polla_usuario)
            ->update([
                'carrera3' => $tercera[0],
            ]);
        }

        if(is_null($cuarta))
        {
            $cuarta[0]='';
        }
        else
        {
            $actualizacion = PollasInscrita::
            where('polla_id', $id_polla)
            ->where('usuario_id', auth()->user()->id)
            ->where('id', $id_polla_usuario)
            ->update([
                'carrera4' => $cuarta[0],
            ]);
        }

        if(is_null($quinta))
        {
            $quinta[0]='';
        }
        else
        {
            $actualizacion = PollasInscrita::
            where('polla_id', $id_polla)
            ->where('usuario_id', auth()->user()->id)
            ->where('id', $id_polla_usuario)
            ->update([
                'carrera5' => $quinta[0],
            ]);
        }

        if(is_null($sexta))
        {
            $sexta[0]='';
        }
        else
        {
            $actualizacion = PollasInscrita::
            where('polla_id', $id_polla)
            ->where('usuario_id', auth()->user()->id)
            ->where('id', $id_polla_usuario)
            ->update([
                'carrera6' => $sexta[0],
            ]);
        }

        return redirect()->route('sellar-polla',  $id_polla)->with('actualizada','ok');
    }
}
