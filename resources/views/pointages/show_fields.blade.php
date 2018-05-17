<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pointage->id !!}</p>
</div>

<!-- Matricule Field -->
<div class="form-group">
    {!! Form::label('matricule', 'Matricule:') !!}
    <p>{!! $pointage->matricule !!}</p>
</div>

<!-- Heure Field -->
<div class="form-group">
    {!! Form::label('heure', 'Heure:') !!}
    <p>{!! $pointage->heure !!}</p>
</div>

<!-- Modifier Field -->
<div class="form-group">
    {!! Form::label('modifier', 'Modifier:') !!}
    <p>{!! $pointage->modifier !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pointage->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pointage->updated_at !!}</p>
</div>

