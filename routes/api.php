<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


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

Route::post("/login", LoginController::class)->name("login");
Route::post("/logout", LogoutController::class)->name("logout");
Route::post("/register", [UserController::class, "store"])->name("register");

Route::middleware('auth:sanctum')->group(function() {
    Route::get("/lesson/search", [LessonController::class, "search"])->name("lesson_search");
    Route::apiResource("lesson", LessonController::class);

    Route::get("/review/search", [ReviewController::class, "search"])->name("review_search");
    Route::apiResource("review", ReviewController::class)->only(["index", "create", "store", "update", "destroy"]);
    
    Route::apiResource("faculty", FacultyController::class)->only(["index", "create", "store", "update", "destroy"]);
    
    Route::apiResource("department", DepartmentController::class)->only(["index", "create", "store", "update", "destroy"]);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});