<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Idea $idea)
    {
        // Validate the incoming request data
        $validated = request()->validate([
            'content' => 'required|min:3|max:240',
        ]);

        // Add the ideaId and userId to the validated data
        $validated['ideaId'] = $idea->id; // Assuming your foreign key column in comments table is `idea_id`
        $validated['userId'] = auth()->id(); // Assuming your foreign key column in comments table is `user_id`

        // Create the comment
        Comment::create($validated);

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Comment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        //
        // $ideas = $user->ideas()->paginate(5);
        // return view('users.show',compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        //
        // $editing = true;
        // $ideas = $user->ideas()->paginate(5);
        // return view('users.show',compact('user', 'editing', 'ideas'));
        return redirect()->route('dashboard')->with('success', 'Idea created sucessfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Idea $idea)
    {
        //
        // $validated = request()->validate(
        //     [
        //         'name' => 'required|min:3|max:40',
        //         'bio' => 'nullable|min:1|max:255',
        //         'image' => 'image'
        //     ]
        //     );

        //     if(request()->has('image')){
        //         $imagePath = request()->file('image')->store('profile', 'public');
        //         $validated['image'] = $imagePath;

        //         Storage::disk('public')->delete($user->image);
        //     }

        // $user->update($validated);
        // return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $comment = Comment::where('id', $id)->firstOrFail();

        $comment->delete();

        return redirect()->route('dashboard')->with('success', 'Comment deleted sucessfully');
    }
}
