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

Route::group(['prefix' => 'question'], function () {
    //toppage
    Route::get('/', 'QuestionController@add')->name('top');
    Route::post('/', 'QuestionController@submitQuestion')->name('submit');
    //キーワード検索結果
    Route::get('/search', 'QuestionController@search')->name('search');
    //質問投稿完了画面
    Route::get('/contri', 'QuestionController@contri')->name('contri');
    //質問一覧
    Route::get('/list', 'QuestionController@list')->name('list');
    //質問分類
    Route::get('/list/{id}', 'QuestionController@listClass')->name('list.class');
    //質問内容
    Route::get('/content/{id}', 'QuestionController@content')->name('content');
    Route::post('/content/{id}', 'QuestionController@answer');
    //回答完了画面
    Route::get('/answer', 'QuestionController@conpAnswer');

    //マイページ
    Route::get('/mypage', 'QuestionController@mypage')->middleware('auth')->name('mypage');
    //プロフィール編集画面
    Route::get('/mypage/edit', 'QuestionController@edit')->middleware('auth')->name('edit');
    Route::post('/mypage/edit', 'QuestionController@update')->middleware('auth')->name('update');

    //質問詳細(投稿者)
    Route::get('/detail/{id}', 'QuestionController@detail')->name('detail');
    Route::post('/detail/{id}/kaiketu', 'QuestionController@status')->name('kaiketu');
    Route::post('/detail/{id}/best', 'QuestionController@best')->name('best');
    //新規登録
    Route::get('/register', 'Auth\RegisterController@getRegister')->name('touroku');
    Route::post('/register', 'Auth\RegisterController@create')->name('register.post');

    //新規登録完了
    Route::get('/register/conp', 'QuestionController@conpRegister');

    //ログイン
    Route::get('/sighin', 'Auth\LoginController@getSignin')->name('setuzoku');
    Route::post('/signin', 'QuestionController@postSignin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
