@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="text-center">
                    <h5>User personal files</h5>
                </div>
            </div>
        </div>
    </div>
    @if(count($files))
        <div class="container">
            <div class="row shadow-none p-3 mb-5 bg-light rounded">
                @foreach($files as $file)
                    <div class="col-lg-9 col-md-9">
                        <ul class="list-unstyled">
                            @if ($file->type === 'image')
                                @include('layouts.inc.image')
                                <br>
                            @elseif($file->type === 'pdf')
                                @include('layouts.inc.pdf')
                                <br>
                            @elseif($file->type === 'video')
                                @include('layouts.inc.video')
                                <br>
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-1 col-md-1">
                        @include('layouts.inc.download_form')
                    </div>
                    <div class="col-lg-1 col-md-1">
                    </div>
                    <div class="col-lg-1 col-md-1">
                        @include('layouts.inc.delete_form')
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div>
                        {{ $files->links() }}
                    </div>
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
