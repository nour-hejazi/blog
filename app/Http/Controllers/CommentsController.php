<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;

use Illuminate\Support\Facades\Session;

class CommentsController extends Controller{


    public function __construct(){

        $this->middleware('auth');

    }

    public function store(){


        $this->validate(request(), array(
           'body' => 'required|min:2|max:255'
        ));



        $comment = new Comment();
        $comment->post_id = request('id');
        $comment->body = request('body');


        $comment->save();

        Session::flash('success', 'Your comment has been successfully saved!');

        return back();
    }




    public function edit($id){

        $comment = Comment::find($id);

        return view('comments.edit', compact(['comment']));

    }


    public function update(Request $request, $id){

        $this->validate(request(), array(
           'body' => 'required|min:2|max:255'
        ));

        $comment = Comment::find($id);

        $comment->body = $request->body;

        $comment->save();

        Session::flash('success', 'Your comment has been successfully Updated!');

        return redirect()->route('posts.show', $comment->post->id);

    }


    public function destroy($id){

        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'Your comment has been successfully Deleted!');

        return redirect()->route('posts.show', $post_id);

    }
}
