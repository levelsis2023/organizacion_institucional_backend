<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicFormation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'AcademicFormation';

    protected $fillable = [
        'AcademicId',
        'Item',
        'DegreesStudy',
        'Proffesion',
        'OtherProffesion',
        'AdvanceStudy',
        'Months',
        'Years',
        'CertificatePhoto',
        'Institutions',
        'InitialDate',
        'EndDate',
        'Observations',
        'ApplicantId'
    ];
}
