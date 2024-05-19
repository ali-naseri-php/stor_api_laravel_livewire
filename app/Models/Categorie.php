<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;


    protected $fillable = ["name", "categorie_id"];

    protected $hidden = ['created_at', 'updated_at'];
    public function categorie_id()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')->select('id', 'name');

    }
}
