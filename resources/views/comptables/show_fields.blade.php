<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $comptable->id !!}</p>
</div>

<!-- Matricule Field -->
<div class="form-group">
    {!! Form::label('matricule', 'Matricule:') !!}
    <p>{!! $comptable->matricule !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $comptable->password !!}</p>
</div>

<!-- Secret Field -->
<div class="form-group">
    {!! Form::label('secret', 'Secret:') !!}
    <p>{!! $comptable->secret !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $comptable->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $comptable->updated_at !!}</p>
</div>

