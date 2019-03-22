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
Route::get('/', 'QuestionController@add');
Route::post('/', 'QuestionController@create');
//質問一覧
Route::get('/list', 'QuestionController@list');
//質問内容
Route::get('/content', 'QuestionController@content');
Route::post('/content', 'QuestionController@answer');
//マイページ
Route::get('/mypage', 'QuestionController@mypage');
//質問詳細(投稿者)
Route::get('/detail', 'QuestionController@detail');
Route::post('/detail', 'QuestionController@status');
//新規登録
Route::get('/register', 'QuestionController@getRegister');
Route::post('/register', 'QuestionController@postRegister');
//ログイン
Route::get('/login', 'QuestionController@getLogin');
Route::post('/login', 'QuestionController@postLogin');
});
