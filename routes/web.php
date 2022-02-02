<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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
/*DB::listen(function ($query) {
    var_dump($query->sql);
});*/

Route::get('/', function () {
  return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::middleware(['auth'])->group(function () {
  Route::resource("/courses", CourseController::class);
  Route::resource("/courses/{course}/homeworks", HomeworkController::class);
  Route::view("/join-class", "join-class");
  Route::post("/join-class", CourseController::class . '@joinClass');
  Route::delete("/courses/{course}/student/{student}", CourseController::class . '@deleteStudent')->name('courses.deleteStudent');
  Route::get("/courses/{course}/members", CourseController::class . '@showMembers')->name('courses.members');
});

require __DIR__ . '/auth.php';
