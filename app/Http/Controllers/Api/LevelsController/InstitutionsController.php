<?php

namespace App\Http\Controller\Api;
use App\Models\LevelsModel\Institutions;

class InstitutionsController extends Controller
{
    public function index()
    {
        $institutions = Instituntions::paginate(10);
        return response() -> json(['institutions' => $institutions]);
    }
}