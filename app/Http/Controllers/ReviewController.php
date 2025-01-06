<?php


namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Other methods like index(), edit(), etc.

    public function store(Request $request, $courseId)
    {
        // Validate the incoming request
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Find the course by its ID
        $course = Course::findOrFail($courseId);

        // Get the currently authenticated user
        $user = auth()->user();

        // Create a new review for the course
        $course->reviews()->create([
            'user_id' => $user->id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        // Redirect back to the course page with a success message
        return redirect()->route('courses.show', $courseId)->with('success', 'Your review has been submitted!');
    }
}