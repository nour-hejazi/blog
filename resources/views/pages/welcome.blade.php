@extends('main')
@section('title', '| Home')
@section('content')
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card" style="margin: 10px 0">
						<div class="card-body">
							<h1 class="display-4 text-center">Blog System</h1>
							<p class="lead text-center">You Are Welcome in our Blog System.</p>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="container">
		<div class="row">
			<div class="col-md-8">

				@foreach ($posts as $post)
					<div class="post">
						<h3>{{ $post->title }}</h3>
						<p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "....." : "" }}</p>
						<a href="{{ url('blog/' . $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
					</div>
					<hr>
				@endforeach

				
				

			</div>

			{{--<div class="col-md-3 offset-md-1">--}}
				{{--<h2>Sidebar</h2>--}}
			{{--</div>--}}
		</div>	
		</div>

                   
@endsection