<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'WorkExperience';

    protected $fillable = [
        'WorkId',
        'WorkCode',
        'PositionId',
        'InstitutionType',
        'EntidadType',
        'InstitutionId',
        'AreaId',
        'Functions',
        'EmploymentRelationShip',
        'WorkModality',
        'MonthSalary',
        'InitialDate',
        'EndDate',
        'ExperenceTime',
        'ExperenceGeenral',
        'EndMotive'
    ];
}
