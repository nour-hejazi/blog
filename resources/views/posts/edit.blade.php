@extends('main')
@section('title', ' | Edit')
@section('stylesheet')

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
        tinymce.init({ selector:'textarea' });
	</script>

@endsection
@section('content')
	

<div class="row">

	<div class="col-md-8">

	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, ['class' => 'form-control form-control-sm']) }}





		{{ Form::label('tags', 'Tags') }}
		{{ Form::select('tags[]', $tags2, null, array('class' => 'select2-multi form-control', 'multiple' => 'mulitple')) }}

		{{ Form::label('body', 'Body') }}
		{{ Form::textarea('body', null, ['class' => 'form-control form-control-sm']) }}

		
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
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-sm btn-block btn-danger')) !!}	
					</div>	

					<div class="col-md-6">
						{{ Form::submit('Save Changes', array('class' => 'btn btn-block btn-sm btn-success')) }}					
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


	{!! Form::close() !!}

</div>







@endsection

