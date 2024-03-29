<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\UserAnswerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [controller::class, 'index'])->name('welcome');

Route::get('/', function () {
    return view('welcome');
});

// Route Resources
// route::resource('/students', \App\Http\Controllers\StudentsController::class);

Route::get('/', [HomeController::class, 'index']);
Route::get('/surveys', [SurveyController::class, 'index']);
Route::post('/surveys', [SurveyController::class, 'store']);

Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('posts', PostController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('members', MemberController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('quizzes', QuizzesController::class);
    Route::resource('presences', PresenceController::class);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/members/{id}/create', [MemberController::class, 'create'])->name('members.create');
    Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
    Route::resource('questions', QuestionsController::class);
});

// Route::resource('/posts', \App\Http\Controllers\PostController::class);
// Route::resource('/students', \App\Http\Controllers\StudentController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user-answer', UserAnswerController::class);
Route::get('/user-answer/{id}/create', [UserAnswerController::class, 'create'])->name('user-answer');

// Route Api
Route::get('/surveys/json', [SurveyController::class, 'getData']);