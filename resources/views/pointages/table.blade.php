<table class="table table-responsive" id="pointages-table">
    <thead>
        <tr>
            <th>Matricule</th>
        <th>Heure</th>
        <th>Modifier</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pointages as $pointage)
        <tr>
            <td>{!! $pointage->matricule !!}</td>
            <td>{!! $pointage->heure !!}</td>
            <td>{!! $pointage->modifier !!}</td>
            <td>
                {!! Form::open(['route' => ['pointages.destroy', $pointage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pointages.show', [$pointage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pointages.edit', [$pointage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>