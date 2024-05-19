<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public function imageable()
    {

        return $this->morphTo();

    }


    protected $fillable = ["url", "imageable_type", 'imageable_id'];

    protected $hidden = ['created_at', 'updated_at', 'id'];
}
