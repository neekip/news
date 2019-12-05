@extends('main')

@section('title', '-All Tags')

@section('content')

    <div class="row">
        <div class="col-md-8 mt-3">
            <h1>Tags</h1>
            <table class="table table-responsive-md table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id}}</th>
                        <td><a href="{{route('tags.show', $tag->id)}}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!--End of col-md-8 -->

        <div class="col-md-3 mt-3">
            <div class="card card-body bg-light">
                {!! Form::open(['route' => 'tags.store','method' => 'post']) !!}
                <h2>Add Tags</h2>
                <div class="form-group">
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                   {{Form::submit('Save',['class' => 'btn btn-primary btn-block'])}}
                </div>
            </div>
        </div>

    </div>

@endsection
