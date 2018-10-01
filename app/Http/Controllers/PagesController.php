<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;

use App\Post;

class PagesController extends Controller
{
    
    public function getIndex(){

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

    	return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
    	$first = 'Nour';
    	$last = 'Aljelani';
        $email = "nour.aljelani95@gmail.com";
    	$fullname = $first . ' ' . $last;
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

    	return view('pages.about')->withData($data);
    }

    public function getContact(){

    	return view('pages.contact');

    }

    public function postContact(Request $request){

        $this->validate(request(), array(

            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'

        ));

        $data = array(

            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message


        );

        Mail::send('email.contact', $data, function($message) use ($data){

            $message->from($data['email']);

            $message->to('nour.aljelani95@gmail.com');

            $message->subject($data['subject']);

        });

        Session::flush('success', 'Your Email was Sent!');

        return redirect()->url('/');

    }



}
