{!! Form::open(['url' => 'files/upload', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{ Form::label('name', 'Type file name for saving') }}
    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter file name']) }}
    <br>
    {{ Form::label('description', 'Enter file description') }}
    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter file description', 'id' => 'textarea']) }}
    <br>
    {{ Form::label('tag', 'Enter tag for file') }}
    {{ Form::text('tag', '', ['class' => 'form-control', 'placeholder' => 'Enter tag']) }}
    <br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                   aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">
                Please, pick up file for upload
            </label>
        </div>
    </div>
    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"/>
</div>
<div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
</div>
{!! Form::close() !!}
