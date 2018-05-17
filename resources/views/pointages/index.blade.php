@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Pointages</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pointages.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
            {{--Pointage list--}}
            <div class="panel panel-default">
                <table class="table table-striped responsive">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Matricule</th>
                        <th>Heure</th>
                        <th>Modifier</th>
                        <th><span></span>Action</th>
                    </tr>
                    </thead>
                    <tbody id="pointage-list">
                    @foreach ($pointages as $pointage)
                        <tr id="pointage{{ $pointage->id }}">
                            <td id="id">{{ $pointage->id }}</td>
                            <td id="matricule">{{ $pointage->matricule }}</td>
                            <td id="heure">{{ $pointage->heure }}</td>
                            <td id="modifier" value="{{$pointage->modifier}}">{{ $pointage->id==1 ? "true" : "false" }}</td>
                             <script>
                                function bool()
                                {
                                    var m =document.getElementById("modifier").val();
                                    if(m == 1)
                                        document.getElementById("modifier").value = "true";
                                    if(m == 0)
                                        document.getElementById("modifier").value = "false;"
                                }
                                bool();
                            </script>
                            <td>
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$pointage->id}}">Edit</button>
                                </div>
                                <div class="col-xs-6">
                                <form action="{{url('pointages', [$pointage->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                                 </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="debug"></div>
            </div>
            
    </div>
@endsection