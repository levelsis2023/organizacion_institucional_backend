<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InstitutionController;
use App\Http\Controllers\Api\PositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// Route::get('institutions/{id}/sub-institutions', [InstitutionController::class, 'getSubInstitutions']);
/*Route::get('institutions/{id}/all-subinstitutions', [InstitutionController::class, 'getAllSubInstitutions']);


Route::apiResource('institutions', InstitutionController::class)->parameters([
    'institutions' => 'id'
])->names('api.institutions');

Route::apiResource('areas', AreaController::class)->parameters([
    'areas' => 'id'
])->names('api.areas');

Route::apiResource('positions', PositionController::class)->parameters([
    'positions' => 'id'
])->names('api.positions');*/
