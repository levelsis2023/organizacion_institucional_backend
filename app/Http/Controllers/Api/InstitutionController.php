<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'code' => 'required|unique:institutions',
            'name' => 'required|string',
            'short_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'born_code' => 'required|string',
            'parent_id' => 'nullable|exists:institutions,id',
        ]);
        $institution = Institution::create([
            'uuid' => Str::uuid()->toString(),
            'code' => $request->code,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'born_code' => $request->born_code,
            'parent_id' => $request->parent_id,
        ]);
        return response()->json(['institution' => $institution]);
    }

    public function update(Request $request, $id)
    {
        $data =  $this->validate($request, [
            'code' => 'required|unique:institutions,code,' . $id,
            'name' => 'required|string',
            'short_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'born_code' => 'required|string',
            'parent_id' => 'nullable|exists:institutions,id',
        ]);

        $institution = Institution::findOrFail($id);
        $institution->update([
            'code' => $request->code,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'born_code' => $request->born_code,
            'parent_id' => $request->parent_id,
        ]);
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
