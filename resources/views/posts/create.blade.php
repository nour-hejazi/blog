@extends('main')
@section('title', '| Cerate')
@section('stylesheet')

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
        tinymce.init({ selector:'textarea' });
	</script>

@endsection
@section('content')
	
<div class="row">
	<div class="col-md-8 offset-md-2">
		<h1 style="margin-top: 20px">Create New Post</h1>
		<hr>		
	

{!! Form::open(array('route' => 'posts.store')) !!}
	
	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', null, array('class' => 'form-control form-control-sm')) }}






	{{ Form::label('tags', 'Tags') }}
	<select class="form-control select2-multi" multiple="multiple" name="tags[]">
		@foreach($tags as $tag)
			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
		@endforeach
		
		
	</select>



	{{ Form::label('body', 'Body') }}
	{{ Form::textarea('body', null, array('class' => 'form-control form-control-sm')) }}

	{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;')) }}

{!! Form::close() !!}


	</div>
</div>




@endsection