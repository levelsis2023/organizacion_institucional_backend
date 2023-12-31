<?php

namespace App\Models\Levels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;
    public function Institutions(){
        return $this->belongToMany(Institutions::class, 'LevesInstitutions');
    }
}