<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    //
    public function store()
    {

        //ini menjadi
        // $idea = new Idea([
        //     'content' => request()->input('content', ''), //kalau nak isi dlm ni...kene set modal untuk fillable
        // ]);

        // //@$idea->content = "test";
        // $idea->likes = 0;
        // $idea->save();

        //         session(['success' => 'Idea created successfully']);
        // return redirect()->route('dashboard');

        //cara kedua
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['userId'] = auth()->id();

        Idea::create($validated);


        return redirect()->route('dashboard')->with('success', 'Idea created sucessfully');  //with digunakan untuk declare session here
    }

    public function destroy($id)
    {
        $idea = Idea::where('id', $id)->firstOrFail();

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted sucessfully');
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        // return view('ideas.show',[
        //     'idea' => $idea,
        //     $editing
        // ]);
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {

        request()->validate([
            'content' => 'required|min:3|max:248'
        ]);
        $idea->content = request()->get('content', '');
        $idea->save();

        //$editing = true;
        return redirect()->route('ideas.show', $idea->id)->with('success', "idea updated sucessfully");
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }
}
