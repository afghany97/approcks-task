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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('boards','BoardsController');

Route::post('boards/{board}/{record}/{issue}/update','RecordIssuesController@update')->name('record.issues.update');

Route::resource('issues','IssuesController');

Route::post('issues/{issue}/comments','CommentsController@store')->name('issue.comments.store');