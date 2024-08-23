<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Idea $idea)
    {   

        // Add the ideaId and userId to the validated data
        $validated['ideaId'] = $idea->id; // Assuming your foreign key column in comments table is `idea_id`
        $validated['userId'] = auth()->id(); // Assuming your foreign key column in comments table is `user_id`

        // Create the comment
        Like::create($validated);

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Like created successfully');
    }
}
