
<!-- Modal -->
<div class="modal fade" id="editModal{{$comptable->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editer comptable</h5>
      </div>
      <div class="modal-body">
         <form class="comptable-form" action="/comptables/{{$comptable->id}}"  id="edit-form" method="POST"  enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
             <input type="hidden" name="_method" value="PATCH"/>
             <div class="row">
              <div class="form-group col-md-4">
                <label class="control-label" for="id">ID :</label>
                  <div>
                    <input type="text" name="id" value="{{$comptable->id}}" readonly="readonly" />
                  </div>
              </div>
              </div>
              <!-- Matricule Field -->
              <div class="row">
              <div class="form-group col-md-4">
                  <label class="control-label" for="matricule">Matricule :</label>
                  <div>
                      <input name="matricule" id="matricule" class="form-control" type="text" value="{{ $comptable->matricule }}">
                      <div id='matricule_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                  </div>
              </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="{{ $comptable->id }}">Save changes</button>
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