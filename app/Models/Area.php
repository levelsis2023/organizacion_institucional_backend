<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'code', 'name', 'short_name', 'phone', 'email', 'institution_id'];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
