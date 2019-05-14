<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Category;
use App\Answer;
use App\Bookmark;
use Storage;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
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

        $bookmarks = Bookmark::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);

        return view('question.mypage', compact('questions', 'answers', 'results', 'user', 'bookmarks', 'status'));
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
            $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            $user->image_path = Storage::disk('s3')->url($path);
        }
        unset($form['_token']);
        unset($form['image']);
        $user->fill($form);
        $user->save();

        return redirect('question/mypage');
    }
}
