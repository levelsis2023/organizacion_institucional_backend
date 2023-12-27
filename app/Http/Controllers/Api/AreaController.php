<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::paginate(10);
        return response()->json(['area' => $areas]);
    }

    public function show($id)
    {
        $area = Area::findOrFail($id);
        return response()->json(['area' => $area]);
    }

    public function store(Request $request)
    {
        $data =  $this->validate($request, [
            'code' => 'required|unique:areas',
            'name' => 'required|string',
            'short_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'institution_id' => 'nullable|exists:institutions,id',
        ]);
        $area = Area::create([
            'uuid' => Str::uuid()->toString(),
            'code' => $request->code,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'institution_id' => $request->institution_id,
        ]);

        return response()->json(['area' => $area]);
    }

    public function update(Request $request, $id)
    {
        $data =  $this->validate($request, [
            'code' => 'required|unique:areas,code,' . $id,
            'name' => 'required|string',
            'short_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'institution_id' => 'nullable|exists:institutions,id',
        ]);

        $area = Area::findOrFail($id);
        $area->update([
            'code' => $request->code,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'institution_id' => $request->institution_id,
        ]);
        return response()->json(['area' => $area]);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return response()->json(['message' => 'area deleted successfully']);
    }
}
