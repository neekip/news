@extends('main')

@section('title','-Edit Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-3"><h1>Edit Comment</h1>

            {{Form::model($comment,['route'=>['comments.update', $comment->id], 'method'=>'put'])}}

            <div class="form-group">
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,['class'=>'form-control', 'readonly'])}}
            </div>

            <div class="form-group">
                {{Form::label('email','Email:')}}
                {{Form::text('email',null,['class'=>'form-control', 'readonly'])}}
            </div>

            <div class="form-group">
                {{Form::label('comment','Comment:')}}
                {{Form::textarea('comment',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::submit('Update Comment',['class' => 'btn btn-primary btn-block'])}}
            </div>

            {{Form::close()}}
        </div>
    </div>
@endsection
