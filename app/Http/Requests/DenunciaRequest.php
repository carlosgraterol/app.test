<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Freshwork\ChileanBundle\Rut;

class DenunciaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'anonima'         => 'required|string',
            'nombre'          => 'nullable|string|max:40',
            'rut'             => 'nullable|cl_rut|max:12',
            'email'           => 'nullable|email|max:60',
            'delito_id'       => 'required|numeric',
            'fecha'           => 'required|date',
            'identifipersona' => 'required|string',
            'descripcion'     => 'required|string|max:1000',
            'conocimiento'    => 'required|string|max:60',
            'lugar'           => 'required|string|max:60',
            'otrolugar'       => 'nullable|string|max:60',
            'documento'       => 'nullable|max:1024|mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'anonima'         => 'denuncia anónima',
            'nombre'          => 'nombre',
            'rut'             => 'rut',
            'email'           => 'email',
            'delito_id'       => 'delito',
            'fecha'           => 'fecha',
            'identifipersona' => 'identificar persona',
            'descripcion'     => 'descripción',
            'conocimiento'    => 'conocimiento',
            'lugar'           => 'lugar',
            'otrolugar'       => 'otro lugar',
            'documento'       => 'documento',
        ];
    }
}
