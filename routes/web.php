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

Route::group(['prefix' => 'question'], function() {
//toppage
Route::get('/', 'QuestionController@add')->name('top');
Route::post('/', 'QuestionController@submitQuestion');
//質問一覧
Route::get('/list', 'QuestionController@list')->name('list');
//質問内容
Route::get('/content/{id}', 'QuestionController@content')->name('content');
Route::post('/content', 'QuestionController@answer');
//マイページ
Route::get('/mypage', 'QuestionController@mypage')->name('mypage');
//質問詳細(投稿者)
Route::get('/detail', 'QuestionController@detail')->name('detail');
Route::post('/detail', 'QuestionController@status');
//新規登録
Route::get('/register', 'Auth\RegisterController@getRegister')->name('touroku');
Route::post('/register', 'Auth\RegisterController@create');

//新規登録完了
Route::get('/register/conp', 'QuestionController@conpRegister');
//ログイン
Route::get('/sighin', 'QuestionController@getSignin')->name('setuzoku');
Route::post('/signin', 'QuestionController@postSignin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
