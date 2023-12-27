<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['uuid', 'code', 'name', 'phone', 'email', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
