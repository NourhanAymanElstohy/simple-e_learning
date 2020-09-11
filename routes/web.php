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
            return redirect('/courses');
        }
    } else {
        return redirect('/home');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

//============== Courses ====================

Route::group(['middleware' => 'auth'], function () {
    Route::get('/courses', 'CourseController@index')->name('courses.index');
    Route::get('/courses/create', 'CourseController@create')->name('courses.create');
    Route::post('/courses', 'CourseController@store')->name('courses.store');
    Route::get('/courses/{course}/edit', 'CourseController@edit')->name('courses.edit');
    Route::put('/courses/{course}', 'CourseController@update')->name('courses.update');
    Route::delete('/courses/{course}', 'CourseController@destroy')->name('courses.destroy');
});
