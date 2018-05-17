  @extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comptable
        </h1>
    </section>
    <div class="content">
        
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <form class="comptable-form" action="/comptables" id="create-form" method="POST"  enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                       <input type="hidden" name="_method" value="POST"/>
                        <!-- Matricule Field -->
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="matricule">Matricule :</label>
                            <div>
                                <input name="matricule" id="matricule" class="form-control" type="text">
                                <div id='matricule_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                            </div>
                        </div>
                        </div>
                        <!-- Password Field -->
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="password">Password :</label>
                            <div >
                                <input  name="password" id="password" class="form-control" type="password">
                                <div id='password_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                            </div>
                        </div> 
                        </div>
                        <!-- Secret Field -->
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="matricule">Random :</label>
                            <div class="">
                                 <input name="random" id="random" type="text" value="" readonly="readonly">
                            </div>
                            <script>
                                function secret() {
                                  var text = "";
                                  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                                  for (var i = 0; i < 5; i++)
                                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                                  
                                  document.getElementById("random").value= text;
                                }
                                
                                secret();
                            </script>
                        </div> 
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="secret">Secret :</label>
                            <div class="">
                                <input name="secret" id="secret" class="form-control" type="text">
                                <div id='secret_error' class='alert alert-danger text-center' style='display:none;'>Recopier le random.</div>
                            </div>
                        </div>  
                        </div>
                        <div class="row">
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <input type="hidden" id="fid" name="fid" value="1">
                            <a href="{!! route('comptables.create') !!}" class="btn btn-default">Cancel</a>
                        </div>
                        </div>
                        
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var comptables_index = "{!! route('comptables.index') !!}";
        var _token = "{{ csrf_token() }}";
    </script>
@endsection










