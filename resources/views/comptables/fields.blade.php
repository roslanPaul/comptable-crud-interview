<!-- Matricule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricule', 'Matricule:') !!}
    {!! Form::text('matricule', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Secret Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secret', 'Secret:') !!}
    {!! Form::text('secret', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comptables.index') !!}" class="btn btn-default">Cancel</a>
</div>
