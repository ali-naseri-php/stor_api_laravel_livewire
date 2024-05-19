<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalavisit extends Model
{
    protected $fillable = ["number", "kala_id"];

    protected $hidden = ['created_at', 'updated_at',];
    public function kala()
    {
        return $this->belongsTo(Kala::class, 'kala_id','id');
    }
    protected $table='kalavisits';
    use HasFactory;
}
