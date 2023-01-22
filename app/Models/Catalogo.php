<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;
    public function vdetalles(){
        return $this->hasMany(Vdetalle::class);
    }
    public function cdetalles(){
        return $this->hasMany(Cdetalle::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
