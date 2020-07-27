<div>
    {!! Form::open(['action' => ['FilesController@delete', $file->id], 'method' => 'delete']) !!}
    <div class="form-group">
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"/>
    </div>
    <div>
        {{ Form::submit('delete', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}
</div>
