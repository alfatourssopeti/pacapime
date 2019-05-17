<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('iscontent') ? ' has-error' : ''}}">
    {!! Form::label('Kell szöveg?', 'Menü?: ', ['class' => 'control-label']) !!}
    {!! Form::select('iscontent', array('0' => 'Igen', '1' => 'Nem'), 'S' ,['class' => 'form-control', 'required' => 'required']); !!}
    {!! $errors->first('iscontent', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('desc') ? ' has-error' : ''}}">
    {!! Form::label('desc', 'Description: ', ['class' => 'control-label']) !!}
    {!! Form::text('desc', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : ''}}">
    {!! Form::label('image', 'Kép: ', ['class' => 'control-label']) !!}
    {!! Form::file('image',['class' => 'form-control', 'required' => 'required']); !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
