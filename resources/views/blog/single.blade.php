@extends('main')
@section('title' , "| $post->title" )
@section('content')

	
	<div class="row">
		<div class="col-md-8 col offset-md-2">
			<h1 class="">{{ $post->title }}</h1>
			<p class="">{!! $post->body  !!}</p>
			<hr>

		</div>
	</div>

	@if(Auth::check())
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h2>Comments</h2>
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-md-8 offset-md-2">

				@foreach($post->comments as $comment)

					<div class="card" style="margin: 20px 0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-2" style="border-right: 1px solid #000">
									<img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg" id="author-image" alt="" style="width: 50px; height: 50px; border-radius: 50%">
								</div>
								<div class="col-md-10">
									<h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->format('d.m.Y') }}</h6>
									<p>{{ $comment->body }}</p>
								</div>
							</div>

						</div>
					</div>

				@endforeach

		</div>
	</div>
	@if(Auth::check())
		<div class="row">
			<div class="col-md-8 offset-md-2">
				{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

				<h3>Add New Comment</h3>
				<input type="hidden" value="{{ $post->id }}" name="id">
				{{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '5')) }}

				{{ Form::submit('Add New Comment', array('class' => 'btn btn-sm btn-block btn-success', 'style' => 'margin-top:25px')) }}
			</div>
		</div>
	@endif


@endsection