<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalaPropperti extends Model
{
    protected $table="kalas_proppertis";
    protected $fillable = ["value", "propperti_id", 'kala_id '];

    protected $hidden = ['created_at', 'updated_at', 'id'];
public function getnamekala(){
    return $this->belongsToMany('App\Models\Kala');
}
    use HasFactory;
}
