@extends('main')
@section('title', '| Index')

@section('content')

	
<div class="row">
	<div class="col-md-12">
		<h1 class="text-center">Blog</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-8 offset-md-2">
		@foreach($posts as $post)
			<div style="margin-bottom: 45px">
				<h2>{{ $post->title }}</h2>	
				<h5>Published: 
					<span class="badge badge-info">
							{{ date('d-m-Y',  strtotime($post->created_at)) }}
					</span>
					<span class="badge badge-info">
							{{ date('H:i',  strtotime($post->created_at)) }}
					</span>
				</h5>

				<p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>

				<a href="{{ route('blog.single', $post->id) }}" class="btn btn-sm btn-primary">
					Read More
				</a>
			</div>
			<hr>
		@endforeach
	</div>
</div>

<div class="d-flex justify-content-center">
	{!! $posts->links(); !!}
</div>


@endsection