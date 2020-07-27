<div>
    {!! Form::open(['action' => ['FilesController@downloadFile', $file->id], 'method' => 'get']) !!}
    <div class="form-group">
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"/>
    </div>
    <div>
        {{ Form::submit('download', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}
</div>
