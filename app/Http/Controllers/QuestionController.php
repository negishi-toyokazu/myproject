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
        if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
          $question->image_path = basename($path);
        } else {
            $question->image_path = null;
        }
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        $question->fill($form);
        $question->save();

        return redirect('question/contri');
    }

    //質問一覧
    public function list()
    {
        $yasais = Category::where('class', '野菜')->get();
        $fruits = Category::where('class', '果物')->get();
        return view('question.list', compact('yasais', 'fruits'));
    }

    //質問分類
    public function listClass(Request $request, $id)
    {
        $category = Category::find($id);
        $questions = Question::where('category_id', $id)->get();


        return view('question.list_class', compact('category', 'questions', 'id'));
    }

    //質問内容
    public function content(Request $request, $id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', $id)->get();

        return view('question.content', compact('question', 'id', 'answers'));
    }

    public function answer(Request $request, $id)
    {
        $this->validate($request, Answer::$rules);
        $answer = new Answer;
        $category = new Category;
        $answer->question_id = $id;
        $answer->user_id = Auth::id();
        $answer->category_id = $request->input('category_id');
        $form = $request->all();
        $answer->fill($form);
        $answer->save();

        return redirect('question/answer');
    }

    //mypage
    public function mypage()
    {
        $user_id = Auth::id();
        $questions = Question::where('user_id', $user_id)->get();
        $answers = Answer::where('user_id', $user_id)->get();

        return view('question.mypage', compact('questions', 'answers'));
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

    //回答完了画面
    public function conpAnswer()
    {
        return view('question.answer_conp');
    }
}
