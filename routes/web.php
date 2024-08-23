<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/bla', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('users.profile');
});

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');  //index here mean the name of function in DashboardController
Route::post('/idea', [IdeaController::class, 'store']);
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit'); //guna {idea} sebab parameter edit is object //kene sama sanama dengan parameter
   //all of above === to resource below
//Route::resource('ideas',IdeaController::class);
//Definition Binding
//In Laravel, when defining a route with parameters like /{idea}, the parameter name (idea in this case) corresponds to the variable name you want to use in your route or controller method. Here's why you need to use {idea}:
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('ideas.update');


Route::get('/controllerTest2', [ProfileController::class, 'index']);

Route::get('/register',[
    AuthController::class,
    'register'
])->name('register');

Route::post('/register',[
    AuthController::class,
    'store'
]);

Route::get('/login',[
    AuthController::class,
    'login'
])->name('login');

Route::post('/login',[
    AuthController::class,
    'authenticate'
]);

Route::post('/logout',[
    AuthController::class,
    'logout'
])->name('logout');

Route::resource('users',UserController::class)->only('show','edit','update')->middleware('auth');

Route::post("users/{user}/follow", [FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');


//Route::resource('comments',CommentController::class)->only('show','edit','update','store');
Route::post('/comment/{idea}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/like/{idea}', [LikeController::class, 'store'])->name('likes.store');