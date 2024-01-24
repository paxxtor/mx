<form method="POST" action="<?php echo base_url();?>admin/events/create">
    <input type="hidden" name="doctor_id" value="<?php echo $this->session->userdata('login_user_id');?>">

    <div class="modal-body">
        <div class="card-widget">
            <div class="row">
                <div class="mb-3">
                    <h4>AGREAGAR EVENTO</h4>
                </div>
                <div class="col-sm-12  mb-3">
                    <div class="form-group ">
                        <label for="simpleinvput">Fecha y hora de finalización:</label>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="date" name="date_start" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 ">
                    <div class="form-group date-time-picker">
                        <div class="input-group ">
                            <input type="text" name="time_start" class="form-control timepicker">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12  mb-3">
                    <div class="form-group date-time-picker">
                        <label for="simpleinvput">Fecha y hora de finalización:</label>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group date-time-picker">
                        <div class="input-group date datepicker">
                            <input type="date" name="date_end" class="form-control" required><span style="display:none;" class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group date-time-picker">
                        <div class="input-group">
                            <input type="text" name="time_end" class="form-control timepicker" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">¿Qué tienes planeado?:</label>
                        <input id="fname" name="title" autocomplete='0' type="text" placeholder="Titulo" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Describe tu actividad:</label>
                        <textarea class="form-control" id="motivo" name="description" placeholder="Descripicion de la actividad o evento" rows="4" required></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>tipo de evento</label>
                        <select class="form-control" name="color">
                            <option value="1">Trabajo</option>
                            <option value="2">Familiar</option>
                            <option value="3">Social</option>
                            <option value="4">Viaje</option>
                        </select>
                    </div>
                </div>

                <div id="map"></div>

                <!-- 
                  The `defer` attribute causes the callback to execute after the full HTML
                  document has been parsed. For non-blocking uses, avoiding race conditions,
                  and consistent behavior across browsers, consider loading using Promises
                  with https://www.npmjs.com/package/@googlemaps/js-api-loader.
                  -->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</form>
<script>
$(document).ready(function() {
    $('.timepicker').timepicker({
        minuteStep: 1,
        showInputs: false,
        disableFocus: true
    });
});
</script>