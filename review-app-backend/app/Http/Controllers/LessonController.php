<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Resources\LessonCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // リレーションから同時に取得している
        $lessons = Lesson::with("teachers")
                   ->withAvg("reviews", "ease")
                   ->withAvg("reviews", "enrichment")
                   ->with("division.major.department.faculty")
                   ->get();

        return new LessonCollection($lessons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
