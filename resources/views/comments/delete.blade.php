@extends('main')

@section('title','-Delete Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>DELETE THIS COMMENT?</h1>
            <p>
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>Email:</strong> {{ $comment->email }}<br>
                <strong>Comment:</strong> {{ $comment->comment }}
            </p>

            {{Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'delete'])}}
                {{Form::submit('YES DELETE THIS COMMENT',['class'=>'btn btn-lg btn-danger btn-block'])}}

            {{Form::close()}}

        </div>
    </div>
@endsection
