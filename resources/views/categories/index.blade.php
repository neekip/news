@extends('main')

@section('title', '-All Categories')

@section('content')

    <div class="row">
        <div class="col-md-8 mt-3">
            <h1>Categories</h1>
            <table class="table table-responsive-md table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!--End of col-md-8 -->

        <div class="col-md-3 mt-3">
            <div class="card card-body bg-light">
                {!! Form::open(['route' => 'categories.store','method' => 'post']) !!}
                <h2>Add Category</h2>
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
