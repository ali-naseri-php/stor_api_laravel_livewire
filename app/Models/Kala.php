<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kala extends Model
{


    public function properties()
    {
        return $this->belongsToMany(propperti::class, 'kalas_proppertis', 'kala_id', 'propperti_id')
            ->withPivot('value');
    }
    public function kalavisits()
    {
        return $this->hasOne(Kalavisit::class);
    }

    protected $fillable = ["name", "weight",'price','number_kala','body'];

    protected $hidden = ['created_at', 'updated_at','id'];
    use HasFactory;
}
