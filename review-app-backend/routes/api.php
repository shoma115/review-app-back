<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/lesson/search", [LessonController::class, "search"]);
Route::apiResource("lesson", LessonController::class);

Route::apiResource("review", ReviewController::class)->only(["index", "create", "store", "update", "destroy"]);

Route::apiResource("faculty", FacultyController::class)->only(["index", "create", "store", "update", "destroy"]);

Route::apiResource("department", DepartmentController::class)->only(["index", "create", "store", "update", "destroy"]);