<?php
$event = $this->db->get_where('event',array('event_id'=>$param2))->result_array();
foreach($event as $row):
?>
<form method="POST" action="<?php echo base_url();?>admin/events/update/<?php echo $param2; ?>">
    <input type="hidden" name="doctor_id" value="<?php echo $this->session->userdata('login_user_id');?>">

    <div class="modal-body">
        <div class="card-widget">
            <div class="row"> 
                <div class="mb-3">
                    <h4>EDITAR EVENTO</h4>
                </div>
                <div class="col-sm-12">
                    <div class="form-group date-time-picker">
                        <label for="simpleinvput">Fecha y hora de inicio:</label>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 ">
                    <div class="form-group date-time-picker">
                        <div class="input-group date datepicker" id="">
                            <input type="date" name="date_start" value="<?php echo $row['date_start']; ?>" class="form-control" required><span style="display:none;" class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 ">
                    <div class="form-group date-time-picker">
                        <div class="input-group date datepicker" id="">
                            <input type="time" name="time_start" value="<?php echo $row['time_start']; ?>"class="form-control" required><span style="display:none;" class="input-group-addon"><i data-feather="calendar"></i></span>
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
                        <div class="input-group date datepicker" id="">
                            <input type="date" name="date_end" class="form-control" value="<?php echo $row['date_end']; ?>"required><span style="display:none;" class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group date-time-picker">
                        <div class="input-group date datepicker" id="">
                            <input type="time" name="time_end" class="form-control" value="<?php echo $row['time_end']; ?>" required><span style="display:none;" class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">¿Qué tienes planeado?:</label>
                        <input id="fname" name="title" autocomplete='0' type="text" value="<?php echo $row['title']; ?>" placeholder="Titulo" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Describe tu actividad:</label>
                        <textarea class="form-control" id="motivo" name="description"  placeholder="Descripicion de la actividad o evento" rows="4" required><?php echo $row['description']; ?></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>tipo de evento</label>
                        <select class="form-control" name="color">
                            <option value="1" <?php echo $row['color']==1?'selected':''; ?> >Trabajo</option>
                            <option value="2" <?php echo $row['color']==2?'selected':''; ?>>Familiar</option>
                            <option value="3" <?php echo $row['color']==3?'selected':''; ?>>Social</option>
                            <option value="4" <?php echo $row['color']==4?'selected':''; ?>>Viaje</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</form>
<?php endforeach; ?>