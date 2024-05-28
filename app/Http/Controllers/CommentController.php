<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if(Gate::allows('delete-comment' , $comment)){
            $comment->delete();
            return back();
        }
        return back()->with('info','Unauthorize');
        
    }

    public function create()
    {

        $validator = validator(request()->all(), [
            "content" => "required",
            "article_id" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->id();
        $comment->save();
        return back();
    }
}
