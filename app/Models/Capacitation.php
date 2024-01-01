<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capacitation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Capacitations';

    protected $fillable = [
        'CapacitationId',
        'CapacitationCode',
        'ApplicantId',
        'Status',
        'ProgresStudy',
        'CertificatePhot',
        'Institutions',
        'InitialDate',
        'EndDate',
        'Durations',
        'CertificationType',
        'Evaluation',
        'Score',
        'Observation'
    ];
}
