<table class="table table-responsive" id="comptables-table">
    <thead>
        <tr>
            <th>Matricule</th>
        <th>Password</th>
        <th>Secret</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comptables as $comptable)
        <tr>
            <td>{!! $comptable->matricule !!}</td>
            <td>{!! $comptable->password !!}</td>
            <td>{!! $comptable->secret !!}</td>
            <td>
                {!! Form::open(['route' => ['comptables.destroy', $comptable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comptables.show', [$comptable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comptables.edit', [$comptable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>