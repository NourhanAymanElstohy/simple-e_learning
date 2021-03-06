<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $user = auth()->user();
    if ($user) {
        if ($user->hasRole('admin')) {
            return redirect('/admin');
        } else {
            return redirect('/home');
        }
    } else {
        return redirect('/home');
    }
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['role:admin']);

//============== Courses ====================
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/courses/create', 'CourseController@create')->name('courses.create');
    Route::post('/courses', 'CourseController@store')->name('courses.store');
    Route::get('/courses/{course}/edit', 'CourseController@edit')->name('courses.edit');
    Route::put('/courses/{course}', 'CourseController@update')->name('courses.update');
    Route::delete('/courses/{course}', 'CourseController@destroy')->name('courses.destroy');
});

Route::get('/courses', 'CourseController@index')->name('courses.index')->middleware('auth');
Route::get('/courses/{course}/students', 'CourseController@show')->name('courses.show')->middleware('auth');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/attach/{course}', 'CourseController@attach')->name('attach');
    Route::get('/detach/{course}', 'CourseController@detach')->name('detach');
});
//================ Students =================

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/students', 'StudentController@index')->name('students.index');
    Route::get('/students/create', 'StudentController@create')->name('students.create');
    Route::post('/students', 'StudentController@store')->name('students.store');
    Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');
    Route::delete('/students/{student}', 'StudentController@destroy')->name('students.destroy');
});
Route::put('/students/{student}', 'StudentController@update')->name('students.update')->middleware(['auth', 'verified']);
Route::get('/students/{student}', 'StudentController@show')->name('students.show')->middleware('auth');
