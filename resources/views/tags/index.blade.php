@extends('main')
@section('title', ' | All Tags')
@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>All Tags</h1>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>

			<tbody>

				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>

	<div class="col-md-3 offset-md-1">
		<div class="card">
			<div class="card-body">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

					<h2>New Tag</h2>
					{{ Form::label('name', 'Name') }}

					{{ Form::text('name', null, array('class' => 'form-control')) }}

					{{ Form::submit('Create New Tag', array('class' => 'btn btn-success btn-sm btn-block', 'style' => 'margin-top:20px'))}}

				{!! Form::close() !!}
			</div>
		</div>
	</div>

</div>



@endsection
