<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecruitCategoriesController;
use App\Http\Controllers\recruitPostsController;
use App\Http\Controllers\RegionsColtroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::post('/create-admin-user', [AuthController::class, 'createAdminUser']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::get('/get-all-recruit-categories', [RecruitCategoriesController::class, 'getAllCategories']);
    Route::post('/create-recruit-categories', [RecruitCategoriesController::class, 'createRecruitCategory']);

    Route::post('/create-admin-user', [AuthController::class, 'createAdminUser']);
    Route::get('/get-all-admin-users', [AuthController::class, 'getAllAdminUsers']);
    Route::get('/get-authenticated-user', [AuthController::class, 'getAuthenticatedUser']);

    Route::post('/create-region', [RegionsColtroller::class, 'createRegion']);
    Route::get('/get-all-regions', [RegionsColtroller::class, 'getAllRegions']);

    Route::post('/create-recruit-post', [recruitPostsController::class, 'createRecruitPost']);
});
