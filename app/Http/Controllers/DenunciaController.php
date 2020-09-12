<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DenunciaRequest;
use App\Models\Denuncia;
use App\Models\Delito;

class DenunciaController extends Controller
{
    public function index(){

    	$delitos = Delito::all();
    	return view('denuncia.denuncia', compact('delitos'));

    }

    public function storedenuncia(DenunciaRequest $request){

    	if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $documento = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/upload/', $documento);
        }else{
            $documento = '';
        }

        $denuncia = Denuncia::create([
        	'anonima'         => $request->input('anonima'),
            'nombre'          => $request->input('nombre'),
            'rut'             => $request->input('rut'),
            'email'           => $request->input('email'),
            'delito_id'       => $request->input('delito_id'),
            'fecha'           => $request->input('fecha'),
            'identifipersona' => $request->input('identifipersona'),
            'descripcion'     => $request->input('descripcion'),
            'conocimiento'    => $request->input('conocimiento'),
            'lugar'           => $request->input('lugar'),
            'otrolugar'       => $request->input('otrolugar'),
            'documento'       => $documento,
        ]);

        if ($denuncia) {
            return redirect()->route('home')->with('status','¡Su denuncia ha sido enviada correctamente!');
        }else{
            return redirect()->route('perfil.estudios')->with('statuswarning','Su denuncia no pudo ser enviada debido a un error interno. Por favor intente de nuevo.');
        }
    }
}
