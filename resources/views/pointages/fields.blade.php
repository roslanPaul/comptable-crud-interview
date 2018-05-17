<!-- Matricule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricule', 'Matricule:') !!}
    {!! Form::text('matricule', null, ['class' => 'form-control']) !!}
</div>

<!-- Heure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('heure', 'Heure:') !!}
    {!! Form::date('heure', null, ['class' => 'form-control']) !!}
</div>

<!-- Modifier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modifier', 'Modifier:') !!}
    {!! Form::select('modifier', ['true' => 'true', 'false' => 'false'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pointages.index') !!}" class="btn btn-default">Cancel</a>
</div>
