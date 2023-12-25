<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::all();
        return response()->json(['institutions' => $institutions]);
    }

    public function show($id)
    {
        $institution = Institution::findOrFail($id);
        return response()->json(['institution' => $institution]);
    }

    public function store(Request $request)
    {
        $data =  $this->validate($request, [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:institutions,id',
        ]);
        $institution = Institution::create($data);
        return response()->json(['institution' => $institution]);
    }

    public function update(Request $request, $id)
    {
        $data =  $this->validate($request, [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:institutions,id',
        ]);

        $institution = Institution::findOrFail($id);
        $institution->update($data);
        return response()->json(['institution' => $institution]);
    }

    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();
        return response()->json(['message' => 'Institution deleted successfully']);
    }

    // public function getSubInstitutions($id)
    // {
    //     $institution = Institution::findOrFail($id);

    //     // Obtener todas las subinstituciones de la institución
    //     $subInstitutions = $institution->subInstitutions;

    //     return response()->json(['subInstitutions' => $subInstitutions]);
    // }

    public function getAllSubInstitutions($id)
    {
        $institution = Institution::findOrFail($id);

        // Obtener todas las subinstituciones recursivamente
        $allSubInstitutions = $this->getAllSubInstitutionsRecursive($institution);

        return response()->json(['allSubInstitutions' => $allSubInstitutions]);
    }

    private function getAllSubInstitutionsRecursive($institution)
    {
        $subInstitutions = $institution->subInstitutions;

        $result = [];
        foreach ($subInstitutions as $subInstitution) {
            $result[] = [
                'id' => $subInstitution->id,
                'name' => $subInstitution->name,
                'subInstitutions' => $this->getAllSubInstitutionsRecursive($subInstitution),
            ];
        }

        return $result;
    }
}
