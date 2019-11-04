<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\RegularExpressionTest;

class PostCommentController extends Controller
{
    //


    public function index(){


        $comments=Comment::paginate(5);
        return view('admin.message')->with('comments',$comments);

    }
    public function store(CommentRequest $request){

        $comment=new Comment();
        $comment->post_id= $request->post_id;
        $comment->body=$request->body;

        Auth::user()->comments()->save($comment);

        return redirect()->back();


    }

    public function delete($id){

        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }

//
}
