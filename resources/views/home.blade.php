@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h3>Personal file storage</h3>
                <p>
                    Hello, {{ Auth::user()->name }}.
                </p>
                <p>
                    Here you can upload files to storage. You can upload images (<b>jpg</b>), videos (<b>mp4</b>),
                    and documents (<b>pdf</b>).
                </p>
            </div>
            <div class="col-lg-9 col-md-9">
                @include('layouts.inc.messages')
                <h3>File</h3>
                {!! Form::open(['url' => 'files/upload', 'files' => true, 'enctype' => 'multipart/data']) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Type file name for saving') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter file name']) }}
                        <br>
                        {{ Form::label('description', 'Enter file description') }}
                        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter file description']) }}
                        <br>
                        {{ Form::label('tag', 'Enter tag for file') }}
                        {{ Form::text('tag', '', ['class' => 'form-control', 'placeholder' => 'Enter tag']) }}
                        <br>
                        {{ Form::label('New file', 'Please, pick up file for upload') }}
                        {{ Form::file('image') }}
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                    </div>
                    <div>
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
