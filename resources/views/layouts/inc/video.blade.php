<li class="media">
    <video class="d-flex mr-3 thumb" controls>
        <source src="/storage/{{ $file->file }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="media-body">
        <h2 class="mt-0 mb-1 font-weight-bold"> File name: {{ $file->name }}</h2>
        <h5 class="mt-0 mb-1 font-weight-bold"> Tags: {{ $file->tag }}</h5>
        Description: {{ $file->description }}
    </div>
</li>
