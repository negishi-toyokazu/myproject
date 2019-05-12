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
    return redirect('/question');
});

Route::group(['prefix' => 'question'], function () {
    //toppage
    Route::get('/', 'TopController@index')->name('top');
    Route::post('/', 'QuestionController@create')->name('submit');
    //キーワード検索結果
    Route::get('/search', 'TopController@search')->name('search');
    //質問投稿完了画面
    Route::get('/contri', 'QuestionController@contri')->name('contri');
    //質問一覧
    Route::get('/list', 'QuestionController@list')->name('list');
    //質問分類
    Route::get('/list/{id}', 'QuestionController@listClass')->name('list.class');
    //質問内容
    Route::get('/content/{id}', 'QuestionController@content')->name('content');
    Route::post('/content/{id}', 'AnswerController@answer')->name('answer');
    Route::post('/content/{id}/favorite', 'QuestionController@favorite')->name('favorite');
    Route::post('/content/{id}/favorite/delete', 'QuestionController@favoriteDelete')->name('favorite.delete');
    //回答完了画面
    Route::get('/answer', 'AnswerController@conpAnswer');

    //マイページ
    Route::get('/mypage', 'ProfileController@mypage')->middleware('auth')->name('mypage');
    //プロフィール編集画面
    Route::get('/mypage/edit', 'ProfileController@edit')->middleware('auth')->name('edit');
    Route::post('/mypage/edit', 'ProfileController@update')->middleware('auth')->name('update');

    //質問詳細(投稿者)
    Route::get('/detail/{id}', 'QuestionController@detail')->name('detail');
    Route::post('/detail/{id}/kaiketu', 'QuestionController@status')->name('kaiketu');
    Route::post('/detail/{id}/best', 'AnswerController@best')->name('best');
    //新規登録
    Route::get('/register', 'Auth\RegisterController@getRegister')->name('touroku');
    Route::post('/register', 'Auth\RegisterController@create')->name('register');

    //新規登録完了
    Route::get('/register/conp', 'QuestionController@conpRegister')->name('conp.register');

    //ログイン
    Route::get('/sighin', 'Auth\LoginController@getSignin')->name('setuzoku');
    Route::post('/signin', 'QuestionController@postSignin');
});

Route::get('/admin/category', 'AdminController@category')->name('category');
Route::post('/admin/category', 'AdminController@addCategory')->name('add.category');

Auth::routes();
