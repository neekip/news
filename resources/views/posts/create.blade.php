@extends('main')

@section('title','-Create New Post')

@section('stylesheets')
    {{Html::style('css/parsley.css')}}
    {{Html::style('css/select2.min.css')}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins:'link code',
            member:false
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <h1>Create New Post</h1>
            <hr>
            {{Form::open(['route'=>'posts.store', 'method'=>'post', 'data-parsley-validate' => '', 'files'=>true])}}
                <div class="form-group">
                    {{Form::label('title','Title:')}}
                    {{Form::text('title',null, ['class' => 'form-control','required','maxlength' => '255'])}}
                </div>

                <div class="form-group">
                    {{Form::label('slug','Slug:')}}
                    {{Form::text('slug',null, ['class' => 'form-control','required','minlength' => '5','maxlength' => '255'])}}
                </div>

                <div class="form-group">
                    {{Form::label('category_id','Category:')}}
                    <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>

            <div class="form-group">
                {{Form::label('tags','Tags:')}}
                <select name="tags[]" id="tags" class="form-control select2-selection--multiple" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{Form::label('featured_image','Upload Featured Image:')}}
                {{Form::file('featured_image',['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                        {{Form::label('body','Post Body:')}}
                        {{Form::textarea('body',null, ['class' => 'form-control',])}}
                </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Create Post</button>

            {{Form::close()}}
        </div>
    </div>
@endsection

@section('scripts')
    {{Html::script('js/parsley.min.js')}}
    {{Html::script('js/select2.min.js')}}

    <script type="text/javascript">
         $('.select2-selection--multiple').select2();

    </script>
@endsection
