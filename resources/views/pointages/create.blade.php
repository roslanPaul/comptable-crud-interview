  @extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pointage
        </h1>
    </section>
    <div class="content">
        
        <div class="box box-primary">

            <div class="box-body">
                <div class="row align">
                    <form class="pointage-form" action="/pointages" id="create-form-pointage" method="POST"  enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                       <input type="hidden" name="_method" value="POST"/>
                        <!-- Matricule Field -->
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="matricule">Matricule :</label>
                            <div>
                                <select name="matricule" id='matricule' class="form-control">
                                @foreach ($comptables as $comptable)
                                    <option value="{{ $comptable->matricule }}">{{ $comptable->matricule }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div id='category_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                        </div>
                        </div>
                       
                       
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="heure">Heure :</label>
                            <div class="">
                                <input name="heure" id="heure" type="time"  class="form-control">
                                <div id='heure_error' class='alert alert-danger text-center' style='display:none;'>Recopier le random.</div>
                            </div>
                        </div>  
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="modifier">Modifier :</label>
                            <div>
                                <select name="modifier" id='modifier' class="form-control">
                                
                                    <option value="1">true</option>
                                    <option value="0">false</option>
                                </select>
                            </div>
                            <div id='category_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                            </div>
                        </div>
                        <div class="row">
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <input type="hidden" id="fid" name="fid" value="1">
                            <a href="{!! route('pointages.create') !!}" class="btn btn-default">Cancel</a>
                        </div>
                        </div>
                        
                        {!! csrf_field() !!}
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var comptables_index = "{!! route('pointages.index') !!}";
        var _token = "{{ csrf_token() }}";
    </script>
@endsection










