<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $ideas = $user->ideas()->paginate(5);
        return view('users.show',compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $editing = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.show',compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'bio' => 'nullable|min:1|max:255',
                'image' => 'image'
            ]
            );

            if(request()->has('image')){
                $imagePath = request()->file('image')->store('profile', 'public');
                $validated['image'] = $imagePath;

                if ($user->image) {
                    Storage::disk('public')->delete($user->image);
                }                
            }

        $user->update($validated);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
