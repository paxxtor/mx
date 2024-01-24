<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/css/vendors/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.css">
<style>
.middle {
    width: 100%;
}

.middle h1 {
    font-family: "poppins", sans-serif;
    color: #fff;
}

.middle input[type="radio"] {
    display: none;
}

.middle input[type="radio"]:checked+.box {
    background-color: #001A15;
    border: 0px;
}

.middle input[type="radio"]:checked+.box span {
    color: white;
    transform: translateY(70px);
}

.middle input[type="radio"]:checked+.box span:before {
    transform: translateY(0px);
    opacity: 1;
}

.middle input[type="radio"]:checked+.box:before {
    font-family: 'batch' !important;
    color: #fff;
    content: "\e90d";
}

.middle .box {
    width: 115px;
    height: 40px;
    padding: 7px;
    border-radius: 5px;
    border: 1px solid #a0b5da;
    /*background-color: #f1f3f7;*/
    transition: all 250ms ease;
    will-change: transition;
    display: inline-block;
    text-align: center;
    margin-right: 8px;
    cursor: pointer;
    position: relative;
    font-family: "poppins", sans-serif;
    font-weight: 500;
}

.middle .box:before {
    font-family: 'batch' !important;
    color: #a0b5da;
    content: "\ea0f";
}

.middle .box:active {
    transform: translateY(10px);
}

.middle .box span {
    transform: translate(0, 60px);
    left: 0;
    right: 0;
    vertical-align: 1px;
    transition: all 300ms ease;
    font-size: 15px;
    user-select: none;
    color: #a0b5da;
}

.middle p {
    color: #fff;
    font-family: "poppins", sans-serif;
    font-weight: 400;
}

.middle p a {
    text-decoration: underline;
    font-weight: bold;
    color: #FFF;
}

.middles {
    width: 100%;
    text-align: center;
}

.middles h1 {
    font-family: "Dax", sans-serif;
    color: #000;
}

.middles input[type="radio"] {
    display: none;
}

.middles input[type="radio"]:checked+.box {
    background-color: #001A15;
    border: 0px;
}

.middles input[type="radio"]:checked+.box span {
    color: white;
    transform: translateY(21px);
}

.middles input[type="radio"]:checked+.box span:before {
    transform: translateY(0px);
    opacity: 1;
}

.middles .box {
    -webkit-box-shadow: 0px 5px 12px rgba(126, 142, 177, 0.25);
    box-shadow: 0px 5px 12px rgba(126, 142, 177, 0.25);
    width: 100px;
    height: 100px;
    border-radius: 12px;
    background-color: #fff;
    transition: all 250ms ease;
    will-change: transition;
    display: inline-block;
    text-align: center;
    cursor: pointer;
    position: relative;
    font-family: "Dax", sans-serif;
    font-weight: 900;
}

.middles .box:active {
    transform: translateY(10px);
}

.middles .box span {
    position: absolute;
    transform: translate(0, 11px);
    left: 0;
    right: 0;
    transition: all 300ms ease;
    font-size: 15px;
    user-select: none;
    color: #001A15;
}

.middles .box span:before {
    font-size: 1.2em;
    font-family: 'batch' !important;
    display: block;
    transform: translateY(-80px);
    opacity: 0;
    transition: all 300ms ease-in-out;
    font-weight: normal;
    color: white;
}

.middles .front-end span:before {
    content: '\f007';
    font-family: 'FontAwesome' !important;
}

.middles .back-end span:before {
    content: '\f1ad';
    font-family: 'FontAwesome' !important;
}

.middles p {
    color: #fff;
    font-family: "Dax", sans-serif;
    font-weight: 400;
}

.middles p a {
    text-decoration: underline;
    font-weight: bold;
    color: #FFF;
}

.middles p span:after {
    content: '\f007';
    font-family: 'FontAwesome';
    color: yellow;
}

.inputGroup {
    background-color: #fff;
    display: block;
    margin: 10px 0;
    position: relative;
}

.inputGroup label {
    padding: 20px 30px;
    width: 100%;
    -webkit-box-shadow: 0px 5px 12px rgba(126, 142, 177, 0.25);
    box-shadow: 0px 5px 12px rgba(126, 142, 177, 0.25);
    display: block;
    text-align: left;
    color: #3C454C;
    cursor: pointer;
    border-radius: 5px;
    position: relative;
    z-index: 2;
    -webkit-transition: color 200ms ease-in;
    transition: color 200ms ease-in;
    overflow: hidden;
}

.inputGroup label:before {
    width: 100%;
    height: 10px;
    border-radius: 50%;
    content: '';
    background-color: #001A15;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%) scale3d(1, 1, 1);
    transform: translate(-50%, -50%) scale3d(1, 1, 1);
    -webkit-transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
    transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    z-index: -1;
}

.inputGroup label:after {
    width: 32px;
    height: 32px;
    content: '';
    border: 1px solid #D1D7DC;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
    background-repeat: no-repeat;
    background-position: 2px 3px;
    border-radius: 50%;
    z-index: 2;
    position: absolute;
    right: 30px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
    -webkit-transition: all 200ms ease-in;
    transition: all 200ms ease-in;
}

.inputGroup input:checked~label {
    color: #fff;
}

.inputGroup input:checked~label:before {
    -webkit-transform: translate(-50%, -50%) scale3d(56, 56, 1);
    transform: translate(-50%, -50%) scale3d(56, 56, 1);
    opacity: 1;
}

.inputGroup input:checked~label:after {
    background-color: #faaa4b;
    border-color: #faaa4b;
}

.inputGroup input {
    width: 32px;
    height: 32px;
    -webkit-box-ordinal-group: 2;
    order: 1;
    z-index: 2;
    position: absolute;
    right: 30px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
    visibility: hidden;
}
</style>

<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 style="  text-transform: uppercase;">Agregar <?php echo $this->db->get_where('action_type',array('action_type_id'=>$action_type))->row()->name;?></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><?php echo $this->db->get_where('action_type',array('action_type_id'=>$action_type))->row()->name;?></li>
                        <li class="breadcrumb-item active"> Agregar <?php echo $this->db->get_where('action_type',array('action_type_id'=>$action_type))->row()->name;?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="email-wrap">
            <div class="row">
                <div class="col-xl-12 box-col-12 col-md-12 ">
                    <div class="email-right-aside">
                        <div class="card email-body">
                            <div class="email-profile">
                                <div class="email-body">
                                    <div class="email-compose">
                                        <div class="email-top compose-border">
                                            <div class="compose-header">
                                                <h4 class="mb-0">Nueva actuación</h4>

                                            </div>
                                        </div>
                                        <div class="email-wrapper row">
                                            <form class="theme-form needs-validation" action="<?php echo base_url(); ?>admin/actions/add_actions" method="POST" enctype="multipart/form-data" novalidate="">
                                                <input type="hidden" name="action_type" value="<?php echo $action_type; ?>">
                                                <div class="col-sm-12 col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Para:</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" name="type" onchange="type_folder(this.value);" required>
                                                            <option value="">Seleccionar</option>
                                                            <option value="1">Expediente</option>
                                                            <option value="2">Carpeta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 expediente" style="display:none;">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Número Interno de Control (NIC):</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" name="proceeding_id">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('proceeding', array('proceeding_status'=>1,'status'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['proceeding_id'] ?>"><?php echo $mg['nic']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 row">
                                                    <div class="col-sm-8 col-md-4 folder " style="display:none;">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleFormControlSelect9"><b>Carpeta:</b></label><span style="color:red">*</span>
                                                            <select class="form-select " name="folder_type" onchange="getFolders(this.value);">
                                                                <option value="">Seleccionar</option>
                                                                <option value="1">CARPETA JUDICIAL</option>
                                                                <option value="2">CARPETA INVESTIACIÓN</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-8 folder" style="display:none;">
                                                        <div class="mb-3">
                                                            <label class="form-label"><b>Número Interno de Control (NIC):</b></label><span style="color:red">*</span>
                                                            <select class="form-control basic" name="folder_id" value="" id="folders_nic"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if($action_type == 4 || $action_type == 3):?>
                                                <div class="col-sm-12 col-md-12 mb-3">
                                                    <label class="form-label" for="exampleFormControlSelect9"><b>Etapa:</b></label><span style="color:red">*</span>
                                                    <select class="form-select mb3 typehead" data-table="phase" required name="phase_id">
                                                        <option value="">Seleccionar</option>
                                                    </select>
                                                </div>
                                                <?php endif; ?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de alta</label><span style="color:red">*</span>
                                                        <input class="form-control" name="discharge_date" type="date" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Responsable</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="directory_id">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php if($action_type == 5):?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Categoría</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" data-table="actions_category" required name="actions_category" required></select>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($action_type == 2 || $action_type == 3): ?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label"><?php if ($action_type == 3) echo "Asistentes"; else if($action_type == 2) echo 'Contacto'; ?><span style="color:red">*</span></label>
                                                        <input class="form-control" type="text" name="contacto">
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Asunto</label>
                                                    <input class="form-control" id="exampleInputPassword1" type="text" name="subject">
                                                </div>
                                                <div class="form-group">
                                                    <label>Observaciones</label>
                                                    <textarea id="text-box" name="message" cols="10" rows="2" name="message"></textarea>
                                                </div>
                                                <?php if($action_type == 4 ):?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Presentación</label><span style="color:red">*</span>
                                                        <input class="form-control" type="date" name="show_tramite">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Vencimiento</label><span style="color:red">*</span>
                                                        <input class="form-control" type="date" name="expire_tramite">
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <?php if($action_type == 2):?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipo de llamada<span style="color:red">*</span></label>
                                                        <select class="form-control" name="phone">
                                                            <option value="0">Saliente </option>
                                                            <option value="1">Entrante </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <?php if($action_type == 4):?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Estado<span style="color:red">*</span></label>
                                                        <select class="form-control" name="action_status">
                                                            <option value="1">Sin iniciar </option>
                                                            <option value="2">Iniciado </option>
                                                            <option value="3">Finalizado </option>
                                                            <option value="4">Vencido </option>
                                                            <option value="5">Cancelado </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php else: ?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Estado<span style="color:red">*</span></label>
                                                        <select class="form-control" name="action_status">
                                                            <option value="1">Planificada </option>
                                                            <option value="2">Realizada </option>
                                                            <option value="3">Cancelada </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Duracion <small>(En minutos)</small>-</label>
                                                        <input class="form-control" type="number" name="long" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 mb-3">
                                                    <div class="form-check checkbox checkbox-solid-dark">
                                                        <input class="form-check-input" id="steps1" type="checkbox" name="invoice" value="1">
                                                        <label class="form-check-label mb-0" for="steps1">Facturable</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 mb-3">
                                                    <div class="form-check checkbox checkbox-solid-dark">
                                                        <input class="form-check-input" id="steps2" type="checkbox" name="event" value="1">
                                                        <label class="form-check-label mb-0" for="steps2">Registrar en el Calendario</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 mb-3">
                                                    <div class="form-check checkbox checkbox-solid-dark">
                                                        <input class="form-check-input" id="steps3" type="checkbox" name="public" value="1">
                                                        <label class="form-check-label mb-0" for="steps3">Publicar en el perfil del cliente</label>
                                                    </div>
                                                </div>

                                                <div class="action-wrapper">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-file me-2"></i> Enviar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer start-->
<script src="<?php echo base_url() ?>public/assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>public/assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url() ?>public/assets/js/email-app.js"></script>

<script type="text/javascript">
function type_folder(val) {
    if (val == 1) {
        $('.expediente').show(500);
        $('.folder').hide(500);
    } else {
        $('.expediente').hide(500);
        $('.folder').show(500);
    }
}


$('.custom-file-container__image-clear').hide();
window.addEventListener('load', function() {
    $(".js-example-basic-single").select2();
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

    $("input[name='directory_type']").click(function() {
        if ($("#fisic_type").is(":checked")) {
            $("#fisica").show(500);
            $("#moral").hide(500);
        } else {
            $("#moral").show(500);
            $("#fisica").hide(500);

        }
    });


}, false);

function getFolders(val) {

    console.log(val);
    $.ajax({
        url: "<?php echo base_url().'admin/getFolders/';?>",
        type: "POST",
        data: {
            type: val,

        },
        success: function(response) {

            $('#folders_nic').html(response);
            //console.log(response);
        },
        complete: function() {
            $('.basic').select2();
        },
        error: function() {
            console.log("error");
        }
    });
}
</script>