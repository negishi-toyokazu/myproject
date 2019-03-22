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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['prefix' => 'question','middleware' =>  'auth'], function() {
//toppage
Route::get('/', 'QuestionController@add')->name('top');
Route::post('/', 'QuestionController@create');
//質問一覧
Route::get('/list', 'QuestionController@list')->name('list');
//質問内容
Route::get('/content', 'QuestionController@content')->name('content');
Route::post('/content', 'QuestionController@answer');
//マイページ
Route::get('/mypage', 'QuestionController@mypage')->name('mypage');
//質問詳細(投稿者)
Route::get('/detail', 'QuestionController@detail')->name('detail');
Route::post('/detail', 'QuestionController@status');
//新規登録
Route::get('/register', 'QuestionController@getRegister')->name('register');
Route::post('/register', 'QuestionController@postRegister');
//ログイン
Route::get('/login', 'QuestionController@getLogin')->name('login');
Route::post('/login', 'QuestionController@postLogin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
