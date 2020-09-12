<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Denuncia;

class Delito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_delito'
    ];

    public function denuncias(){
    	return $this->hasMany(Denuncia::class, 'delito_id', 'id');
    }
}
