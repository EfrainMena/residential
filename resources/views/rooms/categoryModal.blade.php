<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header" id="modalHeaderCategory">
              <h4 class="modal-title text-white" id="myModalLabel"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" id="category_form">
                  {{csrf_field()}}
                  <span id="form_output_cat"></span>
                <div class="modal-body">

                  <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nombre categoría</label>
                        <input class="form-control" type="text" name="name" id="name" autocomplete="off" required>
                      </div>
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label>Características</label>
                    <textarea class="form-control" name="characteristics" id="characteristics" cols="30" rows="4" maxlength="200" placeholder="Maximo 100 caracteres" ></textarea>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Precio Regular</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="regular_price" id="regular_price" placeholder="100.00">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"> Bs.</span>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Precio Fin de semana</label>
                          <div class="input-group">
                              <input type="text" class="form-control" name="weekend_price" id="weekend_price" placeholder="100.00">
                              <div class="input-group-text">
                                  <span class="fas fa-money-bill-alt"> Bs.</span>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <input type="hidden" name="button_action_cat" id="button_action_cat" value="insert">
                  <input type="submit" name="submit" id="action_cat" class="btn btn-cyan">
                  <input type="hidden" name="id" id="id_cat" value="">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
          </div>
        </div>
      </div>