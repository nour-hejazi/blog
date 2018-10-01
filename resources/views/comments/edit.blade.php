@extends('main')

@section('title', '| Edit Comment')

@section('content')

    <h1>Edit Comment</h1>

    {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}


        {{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '5')) }}

        {{ Form::submit('Update Comment', array('class' => 'btn btn-sm btn-success', 'style' => 'margin-top:25px')) }}

    {{ Form::close() }}

@endsection
