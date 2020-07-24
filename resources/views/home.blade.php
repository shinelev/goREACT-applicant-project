@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h3>Personal file storage</h3>
                <p>
                    Here you can upload files to storage. Includes video files and images.
                </p>
            </div>
            <div class="col-lg-9 col-md-9">
                @include('layouts.inc.messages')
                <h3>File</h3>
                {!! Form::open(['url' => 'files/upload']) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Type file name for saving') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter file name']) }}
                        {{ Form::label('description', 'Enter file description') }}
                        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter file name']) }}
                        {{ Form::label('New file', 'Please, pick up file for upload') }}
                        {{ Form::file('file') }}
                    </div>
                    <div>
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
