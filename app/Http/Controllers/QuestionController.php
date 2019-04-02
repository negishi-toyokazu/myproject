<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Category;
use App\Answer;
//追加
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
        $question->category_id = $request->input('category_id');
        $question->user_id = Auth::id();
        $question->status = "未解決";
        $form = $request->all();
        $question->fill($form);
        $question->save();

        return redirect('question/view');
    }

    //質問一覧
    public function list(Request $request, $id)
    {
        //$categories = Category::all();
        $category = Category::find($id);
        //$question_id = Question::all();
        $questions = Question::where('category_id', $id)->get();


        return view('question.list', compact('category','questions','id'));
    }

    //質問内容
    public function content(Request $request, $id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', $id)->get();

        return view('question.content', compact('question', 'id', 'answers','category'));
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
        $answers = Answer::all();

        $answers_count = Answer::all(['question_id'])
                      ->groupBy('question_id')
                      ->count('question_id');

        return view('question.mypage', compact('questions', 'answers', 'answers_count'));
    }

    //質問詳細(投稿者向け)
    public function detail(Request $request, $id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', $id)->get();

        return view('question.detail', compact('question', 'id', 'answers'));
    }

    public function status(Request $request, $id)
    {
        Question::where('id', $id)->update(['status' => '解決済']);
        return redirect('question/mypage');
    }

    //新規登録完了画面
    public function conpRegister()
    {
        return view('question.register_conp');
    }

    //質問投稿画面
    public function contri()
    {
       return view('question.question_conp');
    }
}
