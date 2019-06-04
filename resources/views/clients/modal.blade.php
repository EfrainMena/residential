<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" id="modalHeader">
          <h4 class="modal-title" id="myModalLabel"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="POST" id="client_form">
            {{ csrf_field() }}
          <span id="form_output"></span>
          <div class="modal-body">
            <div class="row mb-3 justify-content-center">
              <div class="col-lg-6">
                  <label >C.I. o Nº de pasaporte</label>
                  <input type="text" name="document" id="document" class="form-control" minlength="6" required>
              </div>
          </div>

          <div class="row mb-4">
              <div class="col-lg-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <div class="col-lg-6">
                  <label for="surnames">Apellidos</label>
                  <input type="text" name="surnames" id="surnames" class="form-control" required>
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-lg-4">
                  <label for="date">Fecha de Nacimiento</label>
                  <input type="date" name="birthdate" id="birthdate" class="form-control" required>
              </div>
              <div class="col-lg-4">
                  <label for="">Profesión</label>
                  <input type="text" name="profession" id="profession" class="form-control" required>
              </div>
              <div class="col-lg-4">
                  <label for="piece">Estado Civil</label>
                  <select name="civil_state" id="" class="form-control" required>
                    <option value="">Selecciona una opcion</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Viudo">Viudo</option>
                    <option value="Divorciado">Divorciado</option>
                  </select>
              </div>
          </div>
          
          <div class="row mb-3">
              <div class="col-lg-4">
                  <label>Procedencia</label>
                  <select id="countries_list" class="form-control" required>
                      <option value="">Selecciona un Pais</option>
                        @foreach ($countries as $data)
                          <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                  </select>
              </div>
              <div class="col-lg-4">
                  <label>&nbsp;</label>
                  <select name="origin_departament" id="origin_departament" class="form-control" required>

                  </select>
              </div>
              <div class="col-lg-4">
                <label for="piece">Nacionalidad</label>
                <select name="nationality" class="form-control" required>
                    <option value="">Selecciona una Nacionalidad</option>
                      @foreach ($countries as $data)
                        <option value="{{ $data->nationality }}">{{ $data->nationality }}</option>
                      @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="origin_country" id="origin_country" value="">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" value="" id="user_id">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="button_action" id="button_action" value="insert">
            <input type="submit" name="submit" id="action" class="btn btn-cyan">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>