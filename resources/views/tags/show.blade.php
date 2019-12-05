@extends('main')

@section('title', "- $tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-8 mt-3">
            <h1>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} Posts</small></h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-block btn-primary float-lg-right mt-3">Edit</a>
        </div>

        <div class="col-md-2">
            {{Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'delete'])}}
            <button type="submit" value="Delete" class="btn btn-block btn-danger float-lg-right mt-3">Delete</button>
            {{Form::close()}}
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>@foreach($post->tags as $tag)
                                <span class="badge badge-secondary">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-primary btn-sm btn-block">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

