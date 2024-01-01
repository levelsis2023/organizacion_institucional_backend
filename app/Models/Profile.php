<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Profile';

    protected $fillable = [
        'ProfileId',
        'ProfileCode',
        'PositionLevel',
        'Education',
        'Capacitation',
        'EspecificExperence',
        'GeneralExperence',
        'Salary',
        'CreationDate',
        'CurrentPosition',
        'AppointmentDate',
        'NamedPerson',
        'PositionId'
    ];
}
