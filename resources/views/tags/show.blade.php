@extends('main')
@section('title', ' | $tag->name Tag')
@section('content')
	



<div class="row">
	<div class="col-md-8">
		<h1>
	
			<span class="badge badge-pill badge-info">
				{{ $tag->name }} 
			</span> Tag 

			<small>
				{{ $tag->posts()->count() }} Posts
			</small>

		</h1>
	</div>

	<div class="col-md-2">
		<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm btn-block">Edit</a>
	</div>

	<div class="col-md-2">
		{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}

			{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm btn-block')) }}

		{{ Form::close() }}
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">

			<thead>
				<tr>
					<th>Title</th>
					<th>Tags</th>
					<th>Action</th>
				</tr>	
			</thead>

			<tbody>
				@foreach($tag->posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->tags as $tag)
						<span class="badge badge-pill badge-info">
							{{ $tag->name }}
						</span>
						@endforeach
					</td>
					<td>
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">View</a>
					</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>

@endsection