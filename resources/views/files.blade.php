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
                <div class="col-1">#</div>
                <div class="col-2">name</div>
                <div class="col-3">description</div>
                <div class="col-2">tag</div>
                <div class="col-1">created_at</div>
                <div class="col-4">file</div>
                @foreach($files as $file)
                    @php
                    $number = 1
                    @endphp
                    <div class="row">
                        <div class="col-1">{{ $number }}</div>
                        <div class="col-2">{{ $file->name }}</div>
                        <div class="col-3">{{ $file->description }}</div>
                        <div class="col-2">{{ $file->tag }}</div>
                        <div class="col-1">{{ $file->created_at }}</div>
                        <div class="col-4">{{ $file->file }}</div>
                    </div>
                    @php
                        ++$number
                    @endphp
                @endforeach
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
