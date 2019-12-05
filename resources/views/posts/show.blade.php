@extends('main')

@section('title','-View Post')

@section('content')
    <div class="row">
        <div class="col-md-8 mt-3">

            <img src="{{asset('images/'.$post->image)}}" alt="this is wubba dubba">
            <h1>{{$post->title}}</h1>

            <p class="lead">{!! $post->body !!}</p>

            <hr>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-dark">{{$tag->name}}</span>
                @endforeach
            </div>

            <div id="backend-comments">
            <h3>Comments<small> {{ $post->comment->count() }} total</small></h3>

            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($post->comment as $comment)
                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>
                            <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>

        <div class="col-md-4 mt-3">
            <div class="card card-body">

                <dl class="row">
                    <dt class="col-sm-6 text-center">Url:</dt>
                    <dd class="col-sm-6 text-left"><a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a></dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-6 text-center">Category:</dt>
                    <dd class="col-sm-6 text-left">{{$post->category->name}}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-6 text-center">Created At:</dt>
                    <dd class="col-sm-6 text-left">{{date('M d, Y h:ia',strtotime($post->created_at))}}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-6 text-center">Last Updated:</dt>
                    <dd class="col-sm-6 text-left">{{date('M d, Y h:ia',strtotime($post->updated_at))}}</dd>
                </dl>

                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    {{--{{Html::linkRoute('posts.destroy','Delete',[$post->id],['class'=>'btn btn-danger btn-block'])}}--}}
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy',$post->id], 'method' => 'delete']) !!}
                        {{Form::submit('Delete',['class' => 'btn btn-danger btn-block'])}}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-2">
                        {{Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-success btn-block btn-h1-spacing'])}}
                    </div>
                </div>

            </div>
        </div>
@endsection

