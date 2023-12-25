<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InstitutionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// Route::get('institutions/{id}/sub-institutions', [InstitutionController::class, 'getSubInstitutions']);
Route::get('institutions/{id}/all-subinstitutions', [InstitutionController::class, 'getAllSubInstitutions']);


Route::apiResource('institutions', InstitutionController::class)->parameters([
    'institutions' => 'id'
])->names('api.institutions');
