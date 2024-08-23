<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class DashboardController extends Controller
{
    //
    public function index(){
        //====json======
        $users = [  //'$' use for variable
            [
                'name' => "Alex",
                'age' => 38,
            ],

            [
                'name' => "Afifa",
                'age' => 23,
            ],

            [
                'name' => "Sofea",
                'age' => 7,
            ]
        ];

        //===== dia gunakan model untuk directly inser the data intophp myadmin
        // $idea = new Idea([
        //     'content' => 'i hansome', //kalau nak isi dlm ni...kene set modal untuk fillable
        // ]);

        // //@$idea->content = "test";
        // $idea->likes = 0;
        // $idea->save(); //untuk insert dalam database

        return view(
            'dashboard',
            [ //---data yang nak digunakan untuk views
                //'users' => $users
                //'ideas' => Idea::all(),  //untuk retrieve all information
                'ideas' => Idea::orderBy('created_at','DESC')->get()  //untuk susun the latest info yang masuk dalam created_at column at database //actually ideas here is variable
            ]
        );
    }

    public function welcome(){
        return view('welcome');
    }

    public function profile(){
        return view('profile');
    }
}