@extends('main')

@section('title','-Homepage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron mt-3">
                    <h1 class="display-4">Welcome to my blog.</h1>
                    <p class="lead">Thank you for visiting!This is a test website built in Laravel.Please read my popular post.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
                </div>
            </div>
        </div> <!--end of header row -->

        <div class="row">
            <div class="col-md-8">

               @foreach($posts as $post)

                    <div class="post">
                        <h3>{{$post->title}}</h3>
                        <p>{{substr(strip_tags($post->body), 0, 300)}}{{ strlen(strip_tags($post->body)) > 300 ? "..." : " " }}</p>
                        <a href="{{ url('blog', $post->slug) }}"class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

            @endforeach

            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>
@endsection
