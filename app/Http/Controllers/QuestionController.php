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
    public function add(Request $request)
    {
        $yasais = Category::where('class', '野菜')->get();
        $fruits = Category::where('class', '果物')->get();
        $categories = Category::all();

        return view('question.index', compact('yasais', 'fruits', 'categories'));
    }
    //keyword
    public function search(Request $request)
    {
        $this->validate($request, ['keyword' => 'required']);
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $questions = Question::where('question', 'like', '%'.$keyword.'%')->get();
        }

        return view('question.search', compact('questions', 'keyword'));
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

        unset($form['_token']);
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

        $best_answer = Answer::where('question_id', $id)->where('status', 'ベストアンサー')->get();

        return view('question.content', compact('question', 'id', 'answers', 'best_answer'));
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
    public function mypage(Request $request)
    {
        $user_id = Auth::id();
        $status = $request->input('status');
        $user = Auth::user();

        if ($status == 'unresolved') {
            $results = Question::where('user_id', $user_id)->orderBy('created_at', 'desc')->where('status', '未解決')->paginate(10);
        } else {
            $results = Question::where('user_id', $user_id)->orderBy('created_at', 'desc')->where('status', '解決済')->paginate(10);
        }

        $questions = Question::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        $answers = Answer::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);

        return view('question.mypage', compact('questions', 'answers', 'results', 'status', 'user'));
    }
    //プロフィール編集画面
    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('question.edit', compact('user'));
    }

    //プロフィールupdate
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->introduction = $request->input('introduction');

        $form = $request->all();
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $user->image_path = basename($path);
        }
        unset($form['_token']);
        unset($form['image']);
        $user->fill($form);
        $user->save();

        return redirect('question/mypage');
    }

    //質問詳細(投稿者向け)
    public function detail(Request $request, $id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', $id)->get();
        $has_best_answer = Answer::where('question_id', $id)->where('status', 'ベストアンサー')->count();

        return view('question.detail', compact('question', 'id', 'answers', 'has_best_answer'));
    }

    public function status(Request $request, $id)
    {
        Question::where('id', $id)->update(['status' => '解決済']);
        return redirect('question/mypage');
    }

    public function best(Request $request, $id)
    {
        Answer::where('id', $id)->update(['status' => 'ベストアンサー']);
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
