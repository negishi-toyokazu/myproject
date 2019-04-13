<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Category;
use App\Answer;

use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
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

    //回答完了画面
    public function conpAnswer()
    {
        return view('question.answer_conp');
    }
    //bestanswer
    public function best(Request $request, $id)
    {
        Answer::where('id', $id)->update(['status' => 'ベストアンサー']);
        return redirect('question/mypage');
    }
}
