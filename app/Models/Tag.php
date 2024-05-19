<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function tagable()
    {
        return $this->morphTo();

    }

    protected $fillable = ["name", "tagable_type", 'tagable_id'];

    protected $hidden = ['created_at', 'updated_at', 'id'];
}
