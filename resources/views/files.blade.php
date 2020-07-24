@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="text-center">
                    <p>
                        User personal files
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- List of files --}}
    @if(count($files))
        @foreach($files as $file)
            <div class="container">
                <div class="row">
                    <div class="col-md-1 col-lg-1">
                        #
                    </div>
                    <div class="col-md-1 col-lg-1">
                        file_name
                    </div>
                    <div class="col-md-1 col-lg-1">
                        file_type
                    </div>
                    <div class="col-md-1 col-lg-1">
                        file_name_saved
                    </div>
                    <div class="col-md-2 col-lg-2">
                        file_description
                    </div>
                    <div class="col-md-1 col-lg-1">
                        created_at
                    </div>
                    <div class="col-md-4 col-lg-5">
                        FILE
                    </div>
                    <div class="row">
                        <div class="col-md-1 col-lg-1">
                            {{ $file->id }}
                        </div>
                        <div class="col-md-1 col-lg-1">
                            {{ $file->file_name }}
                        </div>
                        <div class="col-md-1 col-lg-1">
                            {{ $file->file_type }}
                        </div>
                        <div class="col-md-1 col-lg-1">
                            {{ $file->file_name_saved }}
                        </div>
                        <div class="col-md-2 col-lg-2">
                            {{ $file->file_description }}
                        </div>
                        <div class="col-md-1 col-lg-1">
                            {{ $file->created_at }}
                        </div>
                        <div class="col-md-4 col-lg-5">
                            FILE
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="text-center">
                        <p>
                            Sorry, no files...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
