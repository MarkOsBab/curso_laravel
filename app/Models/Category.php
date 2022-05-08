<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts(){
        // Mostrar listado de los posts que tienen dicha categoría 
        return $this->hasMany(Post::class);
    }
}
