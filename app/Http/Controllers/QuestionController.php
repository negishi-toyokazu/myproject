<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Category;
use App\Answer;
use App\Bookmark;


use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create(Request $request)
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
        $questions = Question::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(10);

        return view('question.list_class', compact('category', 'questions', 'id'));
    }

    //質問内容
    public function content(Request $request, $id)
    {
        $question = Question::find($id);
        $user_id = Auth::id();
        $answers = Answer::where('question_id', $id)->get();

        $best_answer = Answer::where('question_id', $id)->where('status', 'ベストアンサー')->get();
        $has_favorite = Bookmark::where('question_id', $id)->where('status', 'お気に入り')->count();
        $bookmarks = Bookmark::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        return view('question.content', compact('question', 'id', 'answers', 'best_answer', 'has_favorite', 'bookmarks'));
    }

    public function favorite(Request $request, $id)
    {
        $bookmark = new Bookmark;
        $bookmark->status = "お気に入り";
        $bookmark->user_id = Auth::id();
        $bookmark->question_id = $request->input('question_id');

        $form = $request->all();
        unset($form['_token']);
        $bookmark->fill($form);
        $bookmark->save();

        return view('question.favorite');
    }

    public function favoriteDelete(Request $request)
    {
        Bookmark::find($request->id)->delete();
        return view('question.favorite_delete');
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

    //質問投稿画面
    public function contri()
    {
        return view('question.question_conp');
    }

    //新規登録完了画面
    public function conpRegister()
    {
        return view('question.register_conp');
    }
}
