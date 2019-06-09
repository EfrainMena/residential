<div class="modal fade moda" id="freeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalHeaderFree">
        <h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <form method="POST" id="free_form">
        {{ csrf_field() }}
        <span id="form_output_free"></span>
        <div class="modal-body">

          <div class="row mb-4">
            <div class="col-lg-4">
              <div class="form-group">
                <label>Documento</label>
                <div class="input-group">
                  <input type="text" id="code" class="form-control" placeholder="C.I. o Pasaporte" required>
                  <div class="input-group-text">
                    <span class="fas fa-search"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <label for="surnames">Nombre</label>
              <input type="text" id="firstname" class="form-control" readonly>
            </div>
            <div class="col-lg-4">
              <label for="surnames">Apellidos</label>
              <input type="text" id="secondname" class="form-control" readonly>
            </div>
          </div>
          <hr>

          <div class="row mb-3 justify-content-center">
            <div class="col-lg-4">
              <label>Fecha</label>
              <input type="date" name="date" id="date" class="form-control" value="<?php echo date("Y-m-d");?>" required>
            </div>
            <div class="col-lg-4">
              <label for=>Hora</label>
              <input type="time" name="hour" id="hour" class="form-control" value="<?php echo date("H:i");?>" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="client_id" id="client_id">
          <input type="hidden" name="user_username" value="{{ Auth::user()->username }}" id="user_username">
          <input type="hidden" name="user_name" value="{{ Auth::user()->name }}" id="user_name">
          <input type="hidden" name="room_id" id="room_id">
          <input type="hidden" name="button_action_free" id="button_action_free" value="insert">
          <button type="button" class="btn btn-warning mr-auto to-maintenance"><i class="mdi mdi-alert"></i>Mantenimiento</button>
          <input type="submit" name="submit" id="action_free" class="btn btn-cyan">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>