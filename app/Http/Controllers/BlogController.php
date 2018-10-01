<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class BlogController extends Controller{


	public function getIndex(){

		$posts = Post::paginate(2);

		return view('blog.index')->withPosts($posts);

	}
    	
	public function getSingle($id){


		$post = Post::where('id', '=', $id)->first();

		$comments = Comment::all();

		return view('blog.single', compact(['post', '$comments']));

	}


}
