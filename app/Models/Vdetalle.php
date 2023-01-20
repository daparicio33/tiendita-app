<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vdetalle extends Model
{
    use HasFactory;
    public function catalogo(){
        return $this->belongsToMany(Catalogo::class);
    }
    public function venta(){
        return $this->belongsTo(Venta::class);
    }
}
