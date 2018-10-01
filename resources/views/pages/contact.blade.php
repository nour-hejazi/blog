@extends('main')
@section('title', '| Contact')
@section('content')

           <div class="row" style="margin-top: 20px">
               <div class="col-md-12">
                   <h1>Contact Me</h1>
                   <hr>
                   <form action="{{ url('contact') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <input name="email" placeholder="Email" class="form-control">
                       </div>

                       <div class="form-group">
                           <input name="subject" placeholder="Subject" class="form-control">
                       </div>

                       <div class="form-group">
                           <textarea name="message" placeholder="Message" class="form-control"></textarea>
                       </div>

                       <input class="btn btn-success" type="submit" value="Send Message">

                   </form>
               </div>
           </div>
      
@stop  