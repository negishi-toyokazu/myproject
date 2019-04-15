<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Category;
use App\Answer;

use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    //toppage
    public function index(Request $request)
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

}
