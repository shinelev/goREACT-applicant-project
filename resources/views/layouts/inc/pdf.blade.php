<li class="media">
    <img class="d-flex mr-3 thumb" src="{{url('/images/pdf_icon2.png')}}"/>
    <div class="media-body">
        <h2 class="mt-0 mb-1 font-weight-bold"> File name: {{ $file->name }}</h2>
        <h5 class="mt-0 mb-1 font-weight-bold"> Tags: {{ $file->tag }}</h5>
        Description: {{ $file->description }}
    </div>
</li>
