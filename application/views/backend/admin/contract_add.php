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
                    <h3 style="  text-transform: uppercase;">Agregar contrato</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active"> Agregar contrato</li>
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
                                                <h4 class="mb-0">Nuevo contrato</h4>

                                            </div>
                                        </div>
                                        <div class="email-wrapper ">
                                            <form class="theme-form row needs-validation" action="<?php echo base_url(); ?>admin/lexdocs/create_contract" method="POST" enctype="multipart/form-data" novalidate="">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombre<span style="color:red">*</span></label>
                                                        <input class="form-control" required type="text" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Identificación del contrato<span style="color:red">*</span></label>
                                                        <input class="form-control" required type="text" name="no_contract">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Tipo:</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" required data-table="contract_type" name="contract_type">
                                                            <option value="">Seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de contrato</label><span style="color:red">*</span>
                                                        <input class="form-control" required type="date" name="date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Tipo de usuario:</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" required data-table="contract_user_type" name="user_type1">
                                                            <option value="">Seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Cliente</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="client1">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <div class="mb-3  mt-6">
                                                        <div class="form-check radio radio-success">
                                                            <input class="form-check-input" id="radio1" type="radio" name="principal_client" value="0" checked>
                                                            <label class="form-check-label" for="radio1">Marcar como principal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Tipo de usuario:</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" required data-table="contract_user_type" name="user_type2">
                                                            <option value="">Seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 ">
                                                    <div class="mb-3 ">
                                                        <label class="form-label" for="exampleFormControlSelect9">Cliente</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="client2">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <div class="mb-3 mt-3">
                                                        <div class="form-check radio radio-success">
                                                            <input class="form-check-input" id="radio2" type="radio" name="principal_client" value="1">
                                                            <label class="form-check-label" for="radio2">Marcar como principal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Estado:</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" data-table="contract_status" name="contract_status">
                                                            <option value="">Seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Válido desde</label><span style="color:red">*</span>
                                                        <input class="form-control" required type="date" name="expire_date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Válido hasta</label><span style="color:red">*</span>
                                                        <input class="form-control" required type="date" name="expire_date">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Encargado</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="manager_id">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-sm-12 col-md-12 mb-5">
                                                    <div class="action-wrapper">
                                                        <button class="btn btn-primary " style="float: right" type="submit"><i class="fa fa-file me-2"></i> Guardar</button>
                                                    </div>
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
<script type="text/javascript">
window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            form.classList.add('was-validated');
            var firstInvalid = form.querySelector(':invalid');
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                firstInvalid.focus();
            }
        }, false);
    });

}, false);
</script>