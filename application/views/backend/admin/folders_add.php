<style>
.table>tr.option:hover {
    background: #80808030;

}

.table>tr.newOption {
    background: #80808030;
    border: 1px solid #001a1530;
}

.table>tr.option {
    border: 1px solid #80808030;
}
</style>

<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Agregar carpeta <?php echo $type=="1"?'Judicial':'Investigación'; ?></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Carpeta <?php echo $type=="1"?'Judicial':'Investigación'; ?></li>
                        <li class="breadcrumb-item active"> Agregar carpeta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="">
            <div class="row">
                <div class="col-xl-12">
                    <form class="card needs-validation" action="<?php echo base_url(); ?>admin/folders/add" method="post" enctype='multipart/form-data' novalidate="">

                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Agregar información</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input class="form-control" type="hidden" name="type" value="<?php echo $type;?>">
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Número interno de control(NIC):</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="nic" value="<?php echo $this->crud_model->folder_code($type);?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Número único de causa(NUC):</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="nuc" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="arrested" type="checkbox" name="arrested" value="1" onclick="checkShow(this, 'arrested_div')">
                                        <label class="form-check-label mb-0" for="arrested"><b>Detenido:</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3 row arrested_div" style="display:none">
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="form-check checkbox checkbox-solid-dark">
                                            <input class="form-check-input" id="prision" type="checkbox" name="prision" value="1" onclick="checkShow(this, 'prision_type')">
                                            <label class="form-check-label mb-0" for="prision"><b>Prisión preventiva:</b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3 prision_type" style="display:none" id="">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Tipo:</label><span style="color:red">*</span>
                                            <select class="form-select basic" required name="prision_type">
                                                <option value="Oficiosa">Oficiosa</option>
                                                <option value="Justificada">Justificada </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3 prision_type">

                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="form-check checkbox checkbox-solid-dark">
                                            <input class="form-check-input " id="domiciliary" type="checkbox" name="domiciliary" value="1" onclick="checkShow(this, 'domiciliary_type')">
                                            <label class="form-check-label mb-0" for="domiciliary"><b>Arraigo Domiciliario:</b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mb-3 domiciliary_type">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Lugar:</label><span style="color:red">*</span>
                                            <select class="form-select basic" name="domiciliary_type">
                                                <option value="Centro Penitenciario">Centro Penitenciario</option>
                                                <option value="Separos">Separos </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mb-3 domiciliary_type">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre:</label><span style="color:red">*</span>
                                            <input class="form-control" type="text" name="domiciliary_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3 domiciliary_type" style="display:none">
                                        <div class="mb-3">
                                            <label class="form-label">Domicilio:</label><span style="color:red">*</span>
                                            <input class="form-control" type="text" name="domiciliary_name1" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlSelect9"><b>Etapa:</b></label><span style="color:red">*</span>
                                    <select class="form-select mb3 typehead" data-table="proceeding_steps" required name="steps">
                                        <option value="">Seleccionar</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 ">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Resposable:</label><span style="color:red">*</span>
                                        <select class="form-select basic" required name="manager_id">
                                            <option value="">Seleccionar</option>
                                            <?php  $managers = $this->db->get_where('directory', array('directory_rol_id'=>4))->result_array();
                                                foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de alta:</label><span style="color:red">*</span>
                                        <input class="form-control" type="date" name="discharge_date" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de Finalización:</label>
                                        <input class="form-control" type="date" name="finish_date">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlTextarea4">Descripción:</label><span style="color:red">*</span>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Categoría:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_category" required name="proceeding_category" required>
                                            <option value="">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Tipo:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_type" required name="proceeding_type" required>
                                            <option value="">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Asunto:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_razon" required name="proceeding_razon" required>
                                            <option value="">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Situación:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_status" required name="proceeding_status" required>
                                            <option value="">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Procedimiento:</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="proccess">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Cliente Factura:</label><span style="color:red">*</span>
                                        <select class="form-select" name="client_id" required>
                                            <option value="">Seleccionar</option>
                                            <?php  $managers = $this->db->get_where('directory', array('directory_rol_id'=>1))->result_array();
                                                 foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Parte:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_part" required name="proceeding_part">
                                            <option value="">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div>
                                        <label class="form-label"><b>IMPORTES</b></label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="turn" type="checkbox" name="turn" value="1" onclick="checkShow(this, 'pro_bono')">
                                        <label class="form-check-label mb-0" for="turn"><b>Pro Bono:</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 pro_bono">
                                    <label class="form-label">Cuantía:</label><span style="color:red">*</span>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input class="form-control" type="number" name="amount" step="any" required onchange="setTotal()" onkeyup="setTotal()">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 pro_bono">
                                    <label class="form-label">Intereses:</label><span style="color:red">*</span>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input class="form-control" type="hidden" name="interests" readonly value="<?php echo $this->db->get_where('settings', array('type' => 'interest'))->row()->description;?>">
                                        <input class="form-control" type="number" step="any" name="total_interests" readonly value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 pro_bono">
                                    <label class="form-label">Total:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input class="form-control" type="number" step="any" name="total" readonly value="0">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Delito:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="crime" required name="crime_id" required>
                                            <option value="">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Imputado:</label><span style="color:red">*</span>
                                        <select class="form-select" name="imputed_id" required>
                                            <option value="">Seleccionar</option>
                                            <?php   $managers = $this->db->where_in('directory_rol_id', array('1','2'))->get('directory')->result_array();
                                                 foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Denunciante:</label><span style="color:red">*</span>
                                        <select class="form-select" name="complainant_id" required>
                                            <option value="">Seleccionar</option>
                                            <?php  $managers = $this->db->where_in('directory_rol_id', array('1','2'))->get('directory')->result_array();
                                                 foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="cp_victim" type="checkbox" name="cp_victim" value="1" checked onclick="checkShow(this, 'victima')">
                                        <label class="form-check-label mb-0" for="cp_victim"><b>El Denunciante es la Victima u Ofendido:</b></label>
                                    </div>
                                </div>
                                <div class="col-md-12 victima" style="display:none">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Victima u Ofendido:</label><span style="color:red">*</span>
                                        <select class="form-select" name="victim_id">
                                            <option value="">Seleccionar</option>
                                            <?php  $managers = $this->db->where_in('directory_rol_id', array('1','2'))->get('directory')->result_array();
                                                 foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="confidential" checked type="checkbox" name="confidential" value="1">
                                        <label class="form-check-label mb-0" for="confidential"><b>Confidencial:</b></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="public" checked type="checkbox" name="public" value="1">
                                        <label class="form-check-label mb-0" for="public"><b>Publicar en el portal del cliente</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Agregar carpeta</button>
                        </div>
                    </form>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer start-->

<script type="text/javascript">
function setTotal() {

    var amount = $('input[name=amount]').val();
    var interest = $('input[name=interests]').val();

    var total = amount * parseFloat(interest / 100);
    var interest = $('input[name=total_interests]').val(parseFloat(total));

    $('input[name=total]').val(parseFloat(total) + parseFloat(amount));

}


function checkShow(val, classs) {
    isChecked = $(val).is(':checked')


    if (classs != "pro_bono") {
        if (isChecked) {

            $('.' + classs).show(500);

        } else {

            $('.' + classs).hide(500);

        }

    } else {
        if (!isChecked) {

            $('.' + classs).show(500);
            $('input[name="amount"]').attr('requiered', 'requiered');



        } else {

            $('.' + classs).hide(500);
            $('input[name="amount"]').removeAttr('requiered');

        }



    }

}

window.addEventListener('load', function() {
    $('.basic').select2();
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            var firstInvalid = form.querySelector(':invalid');
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                firstInvalid.focus();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);
</script>