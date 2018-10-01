<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Tag;
use App\User;
use Session;

class PostController extends Controller{


    public function __construct(){

        $this->middleware('auth');
        
    }

    public function index(){
            
        $posts = Post::orderBy('id', 'asc')->paginate(5);

        return view('posts.index', compact(['posts', 'ps']));

    }

   
    public function create(){



        $tags = Tag::all();

        return view('posts.create', compact(['tags']));
    }

   

    public function store(Request $request){

       

        $this->validate($request, array(

            'title'         => 'required|max:255',
            'body'          => 'required'

        ));

        $post = new Post;

        $post->title            = $request->title;
        $post->body             = $request->body;

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('posts.show', $post->id);
    }



  
    public function show($id){
        
        $post = Post::find($id);

        $tags = Tag::all();

        $comments = Comment::all();



        return view('posts.show', compact(['post', 'tags', 'comments']));

    }

   
    public function edit($id){
        
        $post = Post::find($id);

        $tags = Tag::all();


        $tags2 = array();
        foreach($tags as $tag)
            $tags2[$tag->id] = $tag->name;

        return view('posts.edit', compact(['post', 'tags2']));

    }

   
    public function update(Request $request, $id){

        $post = Post::find($id);

        if($request->input('slug') == $post->slug){

            $this->validate($request, array(

                'title'         => 'required|max:255',

                'body'          => 'required'

            ));

        }else{
            $this->validate($request, array(

                'title'         => 'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'          => 'required'

            ));
        }


        
        
        

        $post->title        = $request->input('title');
        $post->slug         = $request->input('slug');
        $post->body         = $request->input('body');

        $post->save();
        if(isset($request->tags))
            $post->tags()->sync($request->tags);
        else
            $post->tags()->sync(array());

        Session::flash('success', 'This post was successfully updated!');

        return redirect()->route('posts.show', $post->id);
        
    }

    
    public function destroy($id){
        
        $post = Post::find($id);

        $post->delete();

        $post->tags()->detach();

        Session::flash('success' ,'The post was successfully deleted!');

        return redirect()->route('posts.index');


    }
}
