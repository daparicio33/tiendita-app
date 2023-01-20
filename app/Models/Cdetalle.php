<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cdetalle extends Model
{
    use HasFactory;
    public function catalogo(){
        return $this->belongsToMany(Catalogo::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
