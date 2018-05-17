@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pointage
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pointage, ['route' => ['pointages.update', $pointage->id], 'method' => 'patch']) !!}

                        @include('pointages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection