<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id'];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function parent()
    {
        return $this->belongsTo(Institution::class, 'parent_id');
    }

    public function subInstitutions()
    {
        return $this->hasMany(Institution::class, 'parent_id');
    }
}
