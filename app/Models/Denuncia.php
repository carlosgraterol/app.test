<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delito;

class Denuncia extends Model
{
    use HasFactory;

    protected $fillable = [
        'anonima',
        'nombre',
        'rut',
        'email',
        'delito_id',
        'fecha',
        'identifipersona',
        'descripcion',
        'conocimiento',
        'lugar',
        'otrolugar',
        'documento',
    ];

    public function delitos(){
        return $this->belongsTo(Delito::class, 'delito_id', 'id');
    }
}