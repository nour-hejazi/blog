@extends('main')
@section('title', ' | All Posts')
@section('content')



	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-block btn-sm btn-primary nour">
				Create New Post
			</a>

		</div>

		
		<div class="col-md-12">
			<hr>
		</div>
	

	</div><!-- end the row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th>Actions</th>
				</thead>

				<tbody>
					@foreach ($posts as $post)	
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}</td>
							<td>

								<a 
									href="{{ route('posts.show', $post->id) }}" 
									class="btn btn-sm btn-primary">

									View
								</a>

								<a 
									href="{{ route('posts.edit', $post->id) }}" 
									class="btn btn-sm btn-success">
									Edit
								</a>

							</td>
						</tr>
					@endforeach
				</tbody>

			</table>

		</div>
	</div>



	<div class="d-flex justify-content-center">
		{!! $posts->links(); !!}
	</div>


	

@endsection