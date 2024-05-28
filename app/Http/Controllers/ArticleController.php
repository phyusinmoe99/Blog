<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct()
    {

        $this->middleware("auth")->except(['index', 'detail']);
    }

    public function index()
    {

        // $data =[
        //     ['title' => 'Article one'],
        //     ['title' => 'Second article'],
        // ];
        //latest()=>last post first out
        //paginate()=>page separate
        $data = Article::latest()->paginate(5);

        return view("articles.index", ['articles' => $data]);
    }
    public function detail($id)
    {

        $data = Article::find($id);
        return view("articles.detail", ['article' => $data]);
    }
    public function add()
    {

        $data = Category::all();
        return view("articles.add", ['categories' => $data]);
    }
    public function edit($id)
    {
        $data = Article::find($id);
        $categoriesData = Category::all();
        return view("articles.edit", ['article' => $data], ['categories' => $categoriesData]);
    }
    public function update($id)
    {

        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = auth()->id();
        $article->save();
        return redirect("/articles");
    }
    public function create()
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = request()->user_id;
        $article->save();
        return redirect("/articles");
    }
    public function delete($id)
    {

        $article = Article::find($id);
        if(Gate::allows('delete-article' , $article))
        {
            $article->delete();
            return redirect("/articles")->with("info", "Article Deleted");
        }
        return back()->with('info' , 'Unauthorize');
    }
}
