<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::paginate(10);
        return response()->json(['positions' => $positions]);
    }

    public function show($id)
    {
        $position = Position::findOrFail($id);
        return response()->json(['position' => $position]);
    }

    public function store(Request $request)
    {
        $data =  $this->validate($request, [
            'code' => 'required|unique:positions',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'area_id' => 'required|exists:areas,id',
        ]);
        $position = Position::create([
            'uuid' => Str::uuid()->toString(),
            'code' => $request->code,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'area_id' => $request->area_id,
        ]);
        return response()->json(['position' => $position]);
    }

    public function update(Request $request, $id)
    {
        $data =  $this->validate($request, [
            'code' => 'required|unique:positions,code,' . $id,
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'area_id' => 'required|exists:areas,id',
        ]);

        $position = Position::findOrFail($id);
        $position->update([
            'code' => $request->code,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'area_id' => $request->area_id,
        ]);
        return response()->json(['position' => $position]);
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return response()->json(['message' => 'position deleted successfully']);
    }
}
