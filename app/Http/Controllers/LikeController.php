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

        $user = auth()->user();

        if (!$idea->isLikedBy($user)) {
            $idea->likes()->create(['userId' => $user->id],['ideaId' => $idea->id]);
        } else {
            $idea->likes()->where('userId', $user->id)->delete();
        }

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Like created successfully');
    }
}
