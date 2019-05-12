<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function category()
    {
      return view('admin.category');
    }

    public function addCategory(Request $request)
    {
      $this->validate($request, Category::$rules);
        $category = new Category;
        $form = $request->all();
        $category->fill($form);
        unset($form['_token']);
        $category->save();

        session()->flash('message', 'カテゴリを追加しました。');

        return redirect('question');
    }
}
