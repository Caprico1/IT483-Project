<?php

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
    return view('welcome');
});


Auth::routes();

//Public routes
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/course/{id}', 'CourseController@show')->name('course.show');

//Admin routes
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/course/create', 'CourseController@create')->name('course.create');
    Route::post('/course', 'CourseController@store')->name('course.store');
    Route::get('/course/{id}/edit', 'CourseController@edit')->name('course.edit');
    Route::put('/course/{id}', 'CourseController@update')->name('course.update');

    Route::get('/faculty/create', 'FacultyController@create')->name('faculty.create');
    Route::post('/faculty', 'FacultyController@store')->name('faculty.store');
    Route::get('/faculty/{id}/edit', 'FacultyController@edit')->name('faculty.edit');
    Route::put('/faculty/{id}', 'FacultyController@update')->name('faculty.update');

    Route::get('/news/create', 'NewsController@create')->name('news.create');
    Route::post('/news', 'NewsController@store')->name('news.store');
    Route::get('/news/{id}/edit','NewsController@edit')->name('news.edit');
    Route::put('/news/{id}', 'NewsController@update')->name('news.update');
});
