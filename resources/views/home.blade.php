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

                @include('layouts.inc.upload_form')
            </div>
        </div>
    </div>
@endsection
