<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function mpago(){
        return $this->belongsTo(Mpago::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vdetalles(){
        return $this->hasMany(Vdetalle::class);
    }
}
