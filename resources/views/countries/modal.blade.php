<div class="modal fade" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header" id="modalHeader">
              <h4 class="modal-title" id="myModalLabel"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" id="country_form">
                  {{csrf_field()}}
                  <span id="form_output"></span>
                <div class="modal-body">
                      <div class="form-group">
                          <label>Pais</label>
                          <input type="text" class="form-control" name="name" id="name">
                      </div>
      
                      <div class="form-group">
                          <label>Nacionalidad</label>
                          <input type="text" name="nationality" id="nationality" class="form-control">
                      </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" value="">
                  <input type="hidden" name="button_action" id="button_action" value="insert">
                  <input type="submit" name="submit" id="action" class="btn btn-cyan">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
          </div>
        </div>
      </div>