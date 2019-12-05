@extends('main')

@section('title','-Edit Blog Post')

@section('stylesheets')
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
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=> 'patch','files'=>true]) !!}
    <div class="form-row mt-3">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{Form::label('title','Title:')}}
                {{Form::text('title',null, ['class' => 'form-control form-control-lg','required','maxlength' => '255'])}}
            </div>

            <div class="form-group">
                {{Form::label('slug','Slug:')}}
                {{Form::text('slug',null, ['class' => 'form-control','required','minlength' => '5','maxlength' => '255'])}}
            </div>

            <div class="form-group">
                {{Form::label('category_id','Category:')}}
                {{Form::select('category_id',$categories, null, ['class' => 'form-control','required'])}}
            </div>

            <div class="form-group">
                {{Form::label('tags','Tags:')}}

                {{Form::select('tags[]',$tags, null, ['class' => 'select2-selection--multiple form-control', 'multiple' => 'multiple'])}}
                {{--<select name="tags[]" id="tags" class="form-control select2-selection--multiple" multiple="multiple">--}}
                    {{--@foreach($tags as $tag)--}}
                        {{--<option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}


            </div>
            <div class="form-group">
                {{Form::label('featured_image','Update Featured Image')}}
                {{Form::file('featured_image',['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('body','Post Body:')}}
                {{Form::textarea('body',null, ['class' => 'form-control','required'])}}
            </div>
        </div>
        <div class="col-md-4 mb-3 mt-4">
            <div class="card">
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>Created at:</dt>
                        <dd>{{ date('M j, Y - H:i', strtotime($post-> created_at))}}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{ date('M j, Y - H:i', strtotime($post-> updated_at)) }}</dd>
                    </dl>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Laravel way to create an anchor element linked to a route -->
                            {{Form::submit('Cancel',['class' => 'btn btn-primary btn-block btn-danger'])}}
                        </div>
                        <div class="col-sm-6">
                            {{Form::submit('Save Changes',['class' => 'btn btn-primary btn-block'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close()!!}

@endsection

@section('scripts')
    {{Html::script('js/select2.min.js')}}

    <script type="text/javascript">
        $('.select2-selection--multiple').select2();

    </script>
@endsection

