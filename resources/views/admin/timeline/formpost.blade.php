<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('desc') ? ' has-error' : ''}}">
    {!! Form::label('desc', 'Description: ', ['class' => 'control-label']) !!}
    {!! Form::text('desc', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('year') ? ' has-error' : ''}}">
    {!! Form::label('year', 'Year: ', ['class' => 'control-label']) !!}
    {!! Form::text('year', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('label_isactive') ? ' has-error' : ''}}">
    {!! Form::label('label_isactive', 'Label aktív?: ', ['class' => 'control-label']) !!}
    {!! Form::select('label_isactive', array('0' => 'Igen', '1' => 'Nem'), 'S' ,['class' => 'form-control', 'required' => 'required']); !!}
    {!! $errors->first('label_isactive', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Label: ', ['class' => 'control-label']) !!}
    {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
