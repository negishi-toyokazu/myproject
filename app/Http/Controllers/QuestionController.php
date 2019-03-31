<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Category;
use App\Answer;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //toppage
    public function add()
    {
        $yasais = Category::where('class', '野菜')->get();
        $fruits = Category::where('class', '果物')->get();
        $categories = Category::all();

        return view('question.index', compact('yasais', 'fruits', 'categories'));
    }

    public function submitQuestion(Request $request)
    {
        $this->validate($request, Question::$rules);
        $question = new Question;
        $category = new Category;
        $question->category_id = $category->id;
        $question->user_id = Auth::id();
        $form = $request->all();
        $question->fill($form);
        $question->save();

        return redirect('question');
    }

    //質問一覧
    public function list()
    {
        $questions = Question::all();
        return view('question.list', compact('questions'));
    }


    //質問内容
    public function content(Request $request, $id)
    {
        $question = Question::find($id);

        return view('question.content', compact('question', 'id'));
    }

    public function answer(Request $request, $id)
    {
        $this->validate($request, Answer::$rules);
        $answer = new Answer;
        $answer->question_id = $id;
        $form = $request->all();
        $answer->fill($form);
        $answer->save();


        return redirect('question/list');
    }

    //mypage
    public function mypage()
    {
        $questions = Question::all();
        $answers =Answer::all();

        return view('question.mypage', compact('questions', 'answers'));
    }

    //質問詳細(投稿者向け)
    public function detail(Request $request, $id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', $id)->get();

        return view('question.detail', compact('question', 'id', 'answers'));
    }
    public function status()
    {
        return redirect('question/detail');
    }

    //新規登録完了画面
    public function conpRegister()
    {
        return view('question.register_conp');
    }
}
