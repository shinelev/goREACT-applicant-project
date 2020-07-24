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
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="list-unstyled">
                        @foreach($files as $file)
                            @if ($file->type === 'image')
                            <li class="media">
                                <img class="d-flex mr-3 thumb" src="/storage/files/{{ $file->file }}"
                                     alt="Generic placeholder image">
                                <div class="media-body">
                                    <h2 class="mt-0 mb-1 font-weight-bold"> File name: {{ $file->name }}</h2>
                                    <h5 class="mt-0 mb-1 font-weight-bold"> Tags: {{ $file->tag }}</h5>
                                    Description: {{ $file->description }}
                                </div>
                            </li>
                            @elseif($file->type === 'pdf')
                                <li class="media">
                                    <img class="d-flex mr-3 thumb" src="{{url('/images/pdf_icon.png')}}" />
                                    <div class="media-body">
                                        <h2 class="mt-0 mb-1 font-weight-bold"> File name: {{ $file->name }}</h2>
                                        <h5 class="mt-0 mb-1 font-weight-bold"> Tags: {{ $file->tag }}</h5>
                                        Description: {{ $file->description }}
                                    </div>
                                </li>
                            @elseif($file->type === 'video')
                                <li class="media">
                                    <video class="d-flex mr-3 thumb" controls>
                                        <source src="/storage/files/{{ $file->file }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="media-body">
                                        <h2 class="mt-0 mb-1 font-weight-bold"> File name: {{ $file->name }}</h2>
                                        <h5 class="mt-0 mb-1 font-weight-bold"> Tags: {{ $file->tag }}</h5>
                                        Description: {{ $file->description }}
                                    </div>
                                </li>

                            @endif
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
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
