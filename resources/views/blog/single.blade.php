@extends('main')

@section('title',"-".e($post->title))

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2 mt-3">
            <img src="{{ asset('images/'.$post->image) }}" height="400" width="800" alt="">
            <h1>{{$post->title}}</h1>
            <p>{!!$post->body!!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="comments-title"><i class="fas fa-comment-alt"></i>{{$post->comment->count()}} Comments</h3>
            @foreach($post->comment as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/".md5( strtolower(trim($comment->email)))."?s=50&d=mm" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{$comment->name}}</h4>
                            <p class="author-time">{{$comment->created_at->format('M d, Y-g:s A')}}</p>
                        </div>
                    </div>

                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2">
            {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'post']) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('name','Name:')}}
                        {{Form::text('name',null,['class'=>'form-control'])}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('email','Email')}}
                        {{Form::text('email',null,['class'=>'form-control'])}}
                    </div>
                </div>

                <div class="col-md-12">
                     <div class="form-group">
                          {{Form::label('comment','Comment:')}}
                          {{Form::textarea('comment',null, ['class'=>'form-control','rows'=>'5'])}}
                      </div>
                </div>

                <div class="form-group">
                     {{Form::submit('Add Comment',['class'=>'btn btn-primary btn block'])}}
                </div>
            </div>

            {{Form::close()}}

        </div>
    </div>

@endsection
