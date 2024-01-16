<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Lesson;
use App\Http\Resources\ReviewCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lesson_id = $request->query("lesson");
        $reviews = Review::where("lesson_id", "=", $lesson_id)
                            ->with("user")
                            ->get();
        
        return new ReviewCollection($reviews);
    }

    public function search(Request $request) 
    {
        $lesson_id = $request->query("lesson");
        $query_review = Review::query();

        if($request->has("search")) {
           $search_word = $request->query("search");
           $query_review->where("content", "LIKE", "%$search_word%"); 
        }

        $filterd_reviews = $query_review
                            ->where("lesson_id", "=", $lesson_id)
                            ->with("user")
                            ->get();
        
        return new ReviewCollection($filterd_reviews); 
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
    public function show(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
