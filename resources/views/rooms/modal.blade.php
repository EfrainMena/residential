<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header" id="modalHeader">
              <h4 class="modal-title text-white" id="myModalLabel"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" id="room_form">
                  {{csrf_field()}}
                  <span id="form_output"></span>
                <div class="modal-body">
    
                      <div class="row mb-3 justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nº Habitación</label>
                                <input class="form-control" type="number" name="number" id="number" min="0" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <label>Piso</label>
                              <input class="form-control" type="text" name="level" id="level" max="3" required>
                          </div>
                      </div>
                      </div>

                      <div class="row mb-3 justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" name="category_id" id="category_id">
                                  <option value="">Selecciona una categoría</option>
                                  @foreach ($categories as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                      </div>
    
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="button_action" id="button_action" value="insert">
                  <input type="submit" name="submit" id="action" class="btn btn-cyan">
                  <input type="hidden" name="id" id="id" value="">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
          </div>
        </div>
      </div>