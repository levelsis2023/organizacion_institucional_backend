<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcademicFormation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcademicFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $academics = AcademicFormation::paginate(10);
        return response()->json(['academic' => $academics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data =  $this->validate($request, [
            'Item' => 'integer',
            'DegreesStudy' => 'string|max:20',
            'Proffesion' => 'string|max:20',
            'OtherProffesion' => 'string|max:200',
            'AdvanceStudy' => 'string|max:200',
            'Months' => 'integer',
            'Years' => 'integer',
            'CertificatePhoto' => 'string|max:100',
            'Institutions' => 'string|max:200',
            'InitialDate' => 'date',
            'EndDate' => 'date',
            'Observation' => 'text',
            'ApplicatId' => 'binary(16)|exists:Applicants,ApplicantsId',
        ]);
        $academic = AcademicFormation::create([
            'Item' => $request->Item,
            'DegreesStudy' => $request->DegreesStudy,
            'Proffesion' => $request->Proffesion,
            'OtherProffesion' => $request->OtherProffesion,
            'AdvanceStudy' => $request->AdvanceStudy,
            'Months' => $request->Months,
            'Years' => $request->Years,
            'CertificatePhoto' => $request->CertificatePhoto,
            'Institutions' => $request->Institutions,
            'InitialDate' => $request->InitialDate,
            'EndDate' => $request->EndDate,
            'Observation' => $request->Observation,
            'ApplicatId' => $request->ApplicatId,//'binary(16)|exists:Applicants,ApplicantsId',
            /*'uuid' => Str::uuid()->toString(),
            'Item' => $request->Item,
            'DegreesStudy' => $request->DegreesStudy,
            'phone' => $request->phone,
            'email' => $request->email,
            'area_id' => $request->area_id,*/
        ]);
        return response()->json(['academic' => $academic]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $academic = AcademicFormation::findOrFail($id);
        return response()->json(['academic' => $academic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data =  $this->validate($request, [
            'Item' => 'integer',
            'DegreesStudy' => 'string|max:20',
            'Proffesion' => 'string|max:20',
            'OtherProffesion' => 'string|max:200',
            'AdvanceStudy' => 'string|max:200',
            'Months' => 'integer',
            'Years' => 'integer',
            'CertificatePhoto' => 'string|max:100',
            'Institutions' => 'string|max:200',
            'InitialDate' => 'date',
            'EndDate' => 'date',
            'Observation' => 'text',
            'ApplicatId' => 'binary(16)|exists:Applicants,ApplicantsId',
        ]);
        $academic = AcademicFormation::findOrFail($id);
        $academic->update([
            'Item' => $request->Item,
            'DegreesStudy' => $request->DegreesStudy,
            'Proffesion' => $request->Proffesion,
            'OtherProffesion' => $request->OtherProffesion,
            'AdvanceStudy' => $request->AdvanceStudy,
            'Months' => $request->Months,
            'Years' => $request->Years,
            'CertificatePhoto' => $request->CertificatePhoto,
            'Institutions' => $request->Institutions,
            'InitialDate' => $request->InitialDate,
            'EndDate' => $request->EndDate,
            'Observation' => $request->Observation,
            'ApplicatId' => $request->ApplicatId,//'binary(16)|exists:Applicants,ApplicantsId',
            /*'uuid' => Str::uuid()->toString(),
            'Item' => $request->Item,
            'DegreesStudy' => $request->DegreesStudy,
            'phone' => $request->phone,
            'email' => $request->email,
            'area_id' => $request->area_id,*/
        ]);
        return response()->json(['academic' => $academic]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $academic = AcademicFormation::findOrFail($id);
        $academic->delete();
        return response()->json(['message' => 'academic deleted successfully']);
    }
}
