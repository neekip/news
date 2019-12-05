@extends('main')

@section('title','-Contact Me')

@section('content')
        <div class="col-md-12 mt-4">
            <h1>Contact Me</h1>
            <hr>
            <form action="{{url('contact')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <textarea name="message" id="message" class="form-control">Type your message here...</textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-primary">
            </form>
    </div>
@endsection
