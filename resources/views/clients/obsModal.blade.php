<div class="modal fade" id="obsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" id="modalHeaderState">
          <h4 class="modal-title text-white" id="myModalLabel"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="POST" id="obs_form">
              {{csrf_field()}}
              <span id="form_output_obs"></span>
            <div class="modal-body">
                  <div class="alert alert-danger">
                      <label>Observacion para: </label>
                      <label id="nameObs"></label>
                      <label id="surnamesObs"></label>
                  </div>

                  <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" type="date" name="date" id="date" required>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label>Descripcion</label>
                      <textarea class="form-control" name="description" id="description" cols="30" rows="7" maxlength="200" placeholder="Maximo 200 caracteres" required></textarea>
                  </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="client_id" id="client_id" value="">
              <input type="hidden" name="button_action_obs" id="button_action_obs" value="insert">
              <input type="submit" name="submit" id="action_obs" class="btn btn-cyan">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>