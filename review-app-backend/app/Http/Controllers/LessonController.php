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
    public function index(Request $request)
    {
        $faculty_id = $request->query("faculty");
        $per_page = 15;
        // リレーションから同時に取得している
        $lessons = Lesson::with("teachers")
                   ->withAvg("reviews", "ease")
                   ->withAvg("reviews", "enrichment")
                //    リレーション先をとってくるwithメソッドと、取得するデータをレコードで絞り込めるwhereHasメソッドを合わせたやべーやつ
                   ->withWhereHas("division.major.department.faculty", function($faculty) use ($faculty_id) {
                        $faculty->where("id", "=", $faculty_id);
                   }) 
                   ->paginate($per_page);

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
