<div class="modal fade" id="stateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalHeaderState">
        <h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form method="POST" id="state_form">
            {{csrf_field()}}
            <span id="form_output_state"></span>
          <div class="modal-body">
                <div class="form-group">
                    <label>Pais</label>
                    <input type="text" class="form-control" id="country" disabled>
                </div>

                <div class="form-group">
                    <label>Departamento</label>
                    <input type="text" name="name" id="nameDep" class="form-control">
                </div>
          </div>
          <div class="modal-footer">
              <input type="hidden" name="country_id" id="country_id" value="">
            <input type="hidden" name="button_action_state" id="button_action_state" value="insert">
            <input type="submit" name="submit" id="action_state" class="btn btn-cyan">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
      </form>
    </div>
  </div>
</div>