<div class="modal fade moda" id="ocupedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalHeaderOcuped">
        <h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <form method="POST" id="ocuped_form">
        {{ csrf_field() }}
        <span id="form_output_ocuped"></span>
        <div class="modal-body">

          <div class="row mb-3 justify-content-center">
            <div class="col-lg-4">
              <strong style="font-size: 20px;">Huésped:</strong>
              <label style="font-size: 20px;" id="name"></label>
              <label style="font-size: 20px;" id="surnames"></label>
            </div>
            <div class="col-lg-4">
                <strong style="font-size: 20px;">Documento:</strong>
                <label style="font-size: 20px;" id="document"></label>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-lg-7">
              <strong style="font-size: 20px;">Pais Origen:</strong>
              <label style="font-size: 20px;" id="origin_country"></label>
            </div>
            <div class="col-lg-5">
                <strong style="font-size: 20px;">Estado Civil:</strong>
                <label style="font-size: 20px;" id="civil_state"></label>
              </div>
          </div>

          <div class="row mb-3">
            <div class="col-lg-7">
                <strong style="font-size: 20px;">Departamento Origen:</strong>
                <label style="font-size: 20px;" id="origin_departament"></label>
            </div>
            <div class="col-lg-5">
                <strong style="font-size: 20px;">Profesión:</strong>
                <label style="font-size: 20px;" id="profession"></label>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-lg-4">
              <strong style="font-size: 20px;">Nacionalidad:</strong>
              <label style="font-size: 20px;" id="nationality"></label>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="client_id" id="client_id_ocuped">
          <input type="hidden" name="room_id" id="room_id_ocuped">
          <input type="hidden" name="button_action_ocuped" id="button_action_ocuped" value="vacate">
          <!--<button type="button" class="btn btn-facebook mr-auto to-clean"><i class="mdi mdi-bell-ring"></i>Mantenimiento</button>-->
          <input type="submit" name="submit" id="action_ocuped" class="btn btn-cyan">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>