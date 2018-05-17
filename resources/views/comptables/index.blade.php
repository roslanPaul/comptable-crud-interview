@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Comptables</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('comptables.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
            {{--Comptable list--}}
            <div class="panel panel-default">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Matricule</th>
                        <th>Secret</th>
                        <th>Created_at</th>
                        <th><span>   </span>Action</th>
                    </tr>
                    </thead>
                    <tbody id="comptable-list">
                    @foreach ($comptables as $comptable)
                        <tr id="comptable{{ $comptable->id }}">
                            <td id="id">{{ $comptable->id }}</td>
                            <td id="matricule">{{ $comptable->matricule }}</td>
                            <td id="secret">{{ $comptable->secret }}</td>
                            <td>{{ $comptable->created_at }}</td>
                            <td>
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$comptable->id}}">Edit</button>
                                </div>
                                <div class="col-xs-6">
                                <form action="{{url('comptables', [$comptable->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                                 </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        @include('comptables.edit', $comptable) 
                    @endforeach
                    </tbody>
                </table>
                <div id="debug"></div>
            </div>
    </div>
@endsection

