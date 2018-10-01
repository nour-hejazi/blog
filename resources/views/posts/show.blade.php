@extends('main')

@section('title', '| Show')

@section('content')


<div class="row">

	<div class="col-md-8">

		<h1>{{ $post->title }}</h1>
		<p class="lead">{!! $post->body !!}</p>


		<hr>
		<h4>Comments total: {{$post->comments()->count()}} </h4>
		@foreach($post->comments as $comment)

			<div class="card" style="margin: 20px 0">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2" style="border-right: 1px solid #000">
							<img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg" id="author-image" alt="" style="width: 50px; height: 50px; border-radius: 50%">
						</div>
						<div class="col-md-7">
							<h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->format('d.m.Y') }}</h6>
							<p>{{ $comment->body }}</p>
						</div>
						<div class="col-md-3">


							{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger btn-block', 'style' => 'margin-bottom:7px')) !!}

							{!! Form::close() !!}


							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-success btn-block">Edit</a>
							{{--<form action="{{ route('comments.destroy', $comment->id) }}" method="DELETE">--}}

								{{--<input type="submit" value="Delete" class="btn btn-danger btn-sm">--}}
							{{--</form>--}}


						</div>
					</div>

				</div>
			</div>

		@endforeach


		<div class="tags">
			@foreach($post->tags as $tag)
				<h4><span class="badge badge-pill badge-info">{{ $tag->name }}</span></h4>
			@endforeach
		</div>
		
	</div>


	<div class="col-md-4">
			
		<div class="card">

			<div class="card-body">
				<h6 class="card-title">Title</h6>
				<hr>





					
				

				<p class="card-text">Created At:
					<span class="badge badge-info">
						{{ date('d-m-Y',  strtotime($post->created_at)) }}
					</span>
					<span class="badge badge-info">
						{{ date('H:i',  strtotime($post->created_at)) }}
					</span>

				</p>

				<p class="card-text">Last Updated:
					<span class="badge badge-info">
						{{ date('d-m-Y', strtotime($post->updated_at)) }}
					</span>
					<span class="badge badge-info">
						{{ date('H:i', strtotime($post->updated_at)) }}
					</span>
				</p>

				<div class="row">
					<div class="col-md-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-sm btn-block btn-primary')) !!}		
					</div>	

					<div class="col-md-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger btn-block')) !!}

						{!! Form::close() !!}	
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{!! Html::linkRoute('posts.index', '<< See All Posts', null, array('class' => 'btn btn-sm btn-block btn-info', 'style' => 'margin-top:20px')) !!}
					</div>
				</div>
				

			</div>
		</div>

	</div>

</div>







@endsection