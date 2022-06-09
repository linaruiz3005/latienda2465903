<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;
    //relacion de producto con marca
    //toda relacion se expresa con una relacion 
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function marca(){
        return $this->belongsTo(marca::class);
    }
}
