@extends('main')

@section('title','-All Posts')

@section('content')
    <div class="row">
        <div class="col mt-3">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-auto mt-3">
            <a href="{{route('posts.create')}}" class="btn btn-block btn-primary">Create New Post</a>
        </div>
    </div> <!--end of row -->

    {{--<div class="row">--}}
        {{--<div class="col-12">--}}
            {{--<table class="table table-responsive">--}}
                {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>#</th>--}}
                        {{--<th>Title</th>--}}
                        {{--<th>Body</th>--}}
                        {{--<th>Created At</th>--}}
                        {{--<th>Action</th>--}}
                    {{--</tr>--}}
                {{--</thead>--}}

                {{--<tbody>--}}
                    {{--@foreach($posts as $post)--}}
                        {{--<tr>--}}
                            {{--<th>{{$post->id}}</th>--}}
                            {{--<td>{{$post->title}}</td>--}}
                            {{--<td>{{ substr($post->body,0,50) }}</td>--}}
                            {{--<td>{{date('M d, Y h:ia',strtotime($post->created_at))}}</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{route('posts.show',$post->id)}}" class="btn btn-success btn-sm ">View</a>--}}

                                {{--<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive-md table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags($post->body),0,95) }}{{ strlen(strip_tags($post->body)) > 95 ? "...." : "" }}</td>
                        <td>{{ date('M d, Y',strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-success btn-sm ">View</a>
                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <div class="col-12">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>
@stop





