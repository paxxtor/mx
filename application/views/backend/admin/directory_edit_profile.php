<?php 

$directory = $this->db->get_where('directory',array('directory_id'=>base64_decode($directory_id)))->result_array();
foreach ($directory as $row) :

?>
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

.switch input:checked+.switch-state{
     background-color: #4db3a1;
}
</style>

<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Editar <?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$type))->row()->name;?></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$type))->row()->name;?></li>
                        <li class="breadcrumb-item active"> Editar <?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$type))->row()->name;?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-12">
                    <form class="card needs-validation" action="<?php echo base_url(); ?>admin/directory/edit/<?php echo base64_decode($directory_id); ?>" method="post" enctype='multipart/form-data' novalidate="">

                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Editar información</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div style="display:<?php echo ($type == 9)?'none':'flex';?>">
                                <div class="col-sm-12">
                                    <hr>
                                    <div class="middles">
                                        <label>
                                            <input type="radio" id="fisic_type" value="0" name="directory_type" <?php echo $row['directory_type']== 0 ?'checked':'';?> checked="" required="">
                                            <div class="front-end box">
                                                <span>Física</span>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" id="moral_type" value="1" name="directory_type" <?php echo $row['directory_type']== 1 ?'checked':'';?> >
                                            <div class="back-end box">
                                                <span> Moral</span>
                                            </div>
                                        </label>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row" id="fisica">
                                <div class="col-sm-12 col-md-12" style="text-align: center;">
                                    <div class="mb-3 mt-3">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DATOS <?php echo ($type != 9)?'PERSONA FÍSICA':'';?></h4>
                                    </div>
                                </div>
                                <div class="row col-md-12 profile-title">
                                    <div class="col-md-4 ">
                                        <div class="media">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url('<?php echo base_url();?>public/assets/images/user/7.jpg');"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre(s)</label>
                                            <input class="form-control" type="text"  name="name" required value="<?php echo $row['name'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo ($type != 9)?'Primer apellido':'Referencia';?></label>
                                            <input class="form-control" type="text"  name="first_last_name" value="<?php echo $row['first_last_name'];?>">
                                        </div>
                                        <div class="mb-3" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                            <label class="form-label">Segundo Apelldio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['second_last_name'];?>" name="second_last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Identificación Oficial:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="io_oficial" required name="io_oficial" >
                                            <option value="">Seleccionar</option>
                                             <option value="<?php echo $row['io_oficial']; ?>" Selected><?php echo $this->crud_model->get_table_name('io_oficial',$row['io_oficial']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9 )?'none':'block';?>">
                                    <div class="mb-3">
                                        <label class="form-label">Número/Folio</label>
                                        <input class="form-control" type="text" value="<?php echo $row['folio'];?>" name="folio" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9 )?'none':'block';?>">
                                    <div class="mb-3">
                                        <label class="form-label">Registro Federal de Contribuyente(RFC)</label>
                                        <input class="form-control" type="text" value="<?php echo $row['frc'];?>" name="frc" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9 )?'none':'block';?>">
                                    <div class="mb-3">
                                        <label class="form-label">Clave Única de Registro de Población(CURP)</label>
                                        <input class="form-control" type="text" value="<?php echo $row['curp'];?>" name="curp" >
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;text-align: center;display:<?php echo ($type == 9 &&  $row['nacionality'] == '')?'none':'block';?>">
                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">EN SU CASO </h4>
                                    <div class=" text-end" style="top: -43px;position: relative;">
                                        <label class="switch">
                                          <input type="checkbox" onclick="switchDiv('en_su_caso')" <?php echo (  $row['nacionality'] == '')?'':'checked';?>><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6  en_su_caso" style="display:<?php echo ( $row['nacionality'] == '')?'none':'block';?>">
                                    <div class="mb-3 ">
                                        <label class="form-label" for="exampleFormControlSelect9">Nacionalidad:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="nacionality"  name="nacionality" >
                                            <option value="">Seleccionar</option>
                                            <option value="<?php echo $row['nacionality']; ?>" Selected><?php echo $this->crud_model->get_table_name('nacionality',$row['nacionality']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6  en_su_caso" style="display:<?php echo ( $row['nacionality'] == '')?'none':'block';?>">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Documento con el que acredita la situación migratoria y estancia legal en el país:<span style="color:red">*</span></label>
                                            <select class="form-select mb3 typehead" data-table="doc_migration"  name="passport" >
                                                <option value="">Seleccionar</option>
                                                <option value="<?php echo $row['passport']; ?>" Selected><?php echo $this->crud_model->get_table_name('doc_migration',$row['passport']);?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Fecha de vencimiento</label>
                                            <input class="form-control" type="date" name="expire_passport" value="<?php echo $row['expire_passport'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Actividad autorizada a realizar:</label><span style="color:red">*</span>
                                            <select class="form-select mb3 typehead" data-table="activity"  name="activity_authorizated" >
                                                <option value="">Seleccionar</option>
                                                <option value="<?php echo $row['activity_authorizated']; ?>" Selected><?php echo $this->crud_model->get_table_name('activity',$row['activity_authorizated']);?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12    mb-3" style="text-align: center;height: 30px;">
                                    <div class="">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DOMICILIO (PERSONAL Y/O FISCAL)</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('individual_address')" <?php echo (  $row['street'] == '')?'':'checked';?>><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row individual_address" style="display:<?php echo (  $row['street'] == '')?'none':'flex';?>">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Calle</label>
                                            <input class="form-control" type="text" value="<?php echo $row['street'];?>" name="street">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">No. Exterior</label>
                                            <input class="form-control" type="text" value="<?php echo $row['no_extern'];?>" name="no_extern">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">No. Interior</label>
                                            <input class="form-control" type="text" value="<?php echo $row['no_intern'];?>" name="no_intern">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Colonia</label>
                                            <input class="form-control" type="text" value="<?php echo $row['colony'];?>" name="colony">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Demarcación Territorial o Municipio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['municipality'];?>" name="municipality">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">C.P.</label>
                                            <input class="form-control" type="text" value="<?php echo $row['c_p'];?>" name="c_p">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Entidad Federativa</label>
                                            <input class="form-control" type="text" value="<?php echo $row['federity_entity'];?>" name="federity_entity">
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="text-align: center;height: 30px;">
                                    <div class="mb-3 ">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">CORREO Y TELEFONOS</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('individual_email_phone')" <?php echo (  $row['phone'] == '' || $row['cell'] == '' || $row['email'] == '' || $row['whatsapp'] == '' || $row['facebook'] == '')?'':'checked';?>><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row individual_email_phone" style="display:<?php echo (  $row['phone'] == '' || $row['cell'] == '' || $row['email'] == '' || $row['whatsapp'] == '' || $row['facebook'] == '') ?'none':'flex';?>;">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Teléfono</label>
                                            <input class="form-control" type="number" name="phone" value="<?php echo $row['phone'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Celular</label>
                                            <input class="form-control" type="number" name="cell" value="<?php echo $row['cell'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Correo electrónico</label>
                                            <input class="form-control" type="email" name="email" value="<?php echo $row['email'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Whatsapp</label>
                                            <input class="form-control" type="number" name="whatsapp" value="<?php echo $row['whatsapp'];?>">
                                            <small>(con el codigo de area)</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input class="form-control" type="text" value="<?php echo $row['facebook'];?>" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input class="form-control" type="text" value="<?php echo $row['instagram'];?>" name="instagram">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">twitter</label>
                                            <input class="form-control" type="text" value="<?php echo $row['twitter'];?>" name="twitter">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="height: 30px;text-align: center;display:<?php echo ($type == 9)?'none':'block';?>">
                                    <div class=" ">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DATOS DEL REPRESENTANTE LEGAL, APODERADO O TUTOR</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('individual_represntative')" <?php echo (  $row['name_representative'] == '')?'':'checked';?> ><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row individual_represntative" style="display:<?php echo (  $row['name_representative'] == '')?'none':'flex';?>">
                                    <div class="col-md-12" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre(s)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['name_representative'];?>" name="name_representative">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label">Primer Apelldio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name_representative'];?>" name="first_last_name_representative">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label">Segundo Apelldio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['second_last_name_representative'];?>" name="second_last_name_representative">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Identificación Oficial:</label><span style="color:red">*</span>
                                            <select class="form-select mb3 typehead" data-table="io_oficial"  name="dni_representative" >
                                                <option value="">Seleccionar</option>
                                                <option value="<?php echo $row['dni_representative']; ?>" Selected><?php echo $this->crud_model->get_table_name('io_oficial',$row['dni_representative']);?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label">Número/Folio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['folio_representative'];?>" name="folio_representative">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label">Registro Federal de Contribuyente(RFC)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['frc_representative'];?>" name="frc_representative">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label">Clave Única de Registro de Población(CURP)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['curp_representative'];?>" name="curp_representative">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Nacionalidad:</label><span style="color:red">*</span>
                                            <select class="form-select mb3 typehead" data-table="nacionality"  name="nacionality_representative" >
                                                <option value="">Seleccionar</option>
                                                <option value="<?php echo $row['nacionality_representative']; ?>" Selected><?php echo $this->crud_model->get_table_name('nacionality',$row['nacionality_representative']);?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                        <div class="col-sm-12 col-md-12" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlSelect9">Documento con el que acredita la situación migratoria y estancia legal en el país:<span style="color:red">*</span></label>
                                                <select class="form-select mb3 typehead" data-table="doc_migration"  name="passport_representative" >
                                                    <option value="">Seleccionar</option>
                                                    <option value="<?php echo $row['passport_representative']; ?>" Selected><?php echo $this->crud_model->get_table_name('doc_migration',$row['passport_representative']);?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                            <div class="mb-3">
                                                <label class="form-label">Fecha de vencimiento</label>
                                                <input class="form-control" type="date" name="expire_passport_representative" value="<?php echo $row['expire_passport_representative'];?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12" style="display:<?php echo ($type == 9)?'none':'block';?>">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlSelect9">Actividad autorizada a realizar:</label><span style="color:red">*</span>
                                                <select class="form-select mb3 typehead" data-table="activity"  name="activity_authorizated_representative" >
                                                    <option value="">Seleccionar</option>
                                                     <option value="<?php echo $row['activity_authorizated_representative']; ?>" Selected><?php echo $this->crud_model->get_table_name('activity',$row['activity_authorizated_representative']);?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="moral" style="display:none">
                                <div class="col-sm-12 col-md-12" style="text-align: center;">
                                    <div class="mb-3 mt-3">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DATOS PERSONA MORAL</h4>
                                    </div>
                                </div>
                                <div class="row col-md-12 profile-title">
                                    <div class="col-md-4 ">
                                        <div class="media">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url('<?php echo base_url();?>public/assets/images/user/7.jpg');"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Denominacion o razón social</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="name_moral">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Registro Federal de Contribuyentes (RFC)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="frc_moral">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="text-align: center;height: 30px;">
                                    <div class="">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">ACTA CONSTITUTIVA O PÓLIZA</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('acta_constitutiva')"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-12 row acta_constitutiva" style="display:none">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número ó Fólio del Acta o Póliza</label>
                                            <input class="form-control" type="txt" name="poliza_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Fecha de otorgamiento</label>
                                            <input class="form-control" type="date" name="grant_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre del Notario ó Corredor Público que lo expide</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="notary_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Municipio Demarcaion Territorial del Notario ó Corredor Público que lo expide</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="notary_municipality">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Notario ó Correduría</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="notary_number">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Entidad Federativa</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="notary_entity">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12" style="text-align: center;">
                                        <div class="mb-3 mt-3">
                                            <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE LA PROPIEDAD Y DE COMERCIO</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Folio ó Número</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="folio_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Fecha</label>
                                            <input class="form-control" type="date" name="folio_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Entidad Federativa</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="folio_entity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="text-align: center;height: 30px;">
                                    <div class="">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DATOS DEL REPRESENTANTE LEGAL, APODERADO O TUTOR</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('moral_representative')"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row moral_representative" style="display:none">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre(s)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="name_representative_moral">
                                        </div>
    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Primer Apelldio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="first_last_name_representative_moral">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Segundo Apelldio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="second_last_name_representative_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Identificación Oficial</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="dni_representative_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Número/Folio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="folio_representative_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Registro Federal de Contribuyente(RFC)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="frc_representative_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Clave Única de Registro de Población(CURP)</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="curp_representative_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Nacionalidad:</label><span style="color:red">*</span>
                                            <select class="form-select mb3 typehead" data-table="nacionality"  name="nacionality_representative_moral" >
                                                <option value="">Seleccionar</option>
                                                 <option value="<?php echo $row['nacionality_representative_moral']; ?>" Selected><?php echo $this->crud_model->get_table_name('nacionality',$row['nacionality_representative_moral']);?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
    
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlSelect9">Documento con el que acredita la situación migratoria y estancia legal en el país:<span style="color:red">*</span></label>
                                                <select class="form-select mb3 typehead" data-table="doc_migration"  name="passport_representative_moral" >
                                                    <option value="">Seleccionar</option>
                                                     <option value="<?php echo $row['passport_representative_moral']; ?>" Selected><?php echo $this->crud_model->get_table_name('doc_migration',$row['passport_representative_moral']);?></option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Fecha de vencimiento</label>
                                                <input class="form-control" type="date" name="expire_passport_representative_moral">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlSelect9">Actividad autorizada a realizar:</label><span style="color:red">*</span>
                                                <select class="form-select mb3 typehead" data-table="activity"  name="activity_authorizated_representative_moral" >
                                                    <option value="">Seleccionar</option>
                                                     <option value="<?php echo $row['activity_authorizated_representative_moral']; ?>" Selected><?php echo $this->crud_model->get_table_name('activity',$row['activity_authorizated_representative_moral']);?></option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="text-align: center;height: 30px;">
                                    <div class="">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">INSTRUMENTO O DOCUMENTO CON EL QUE ACREDITA LA REPRESENTACIÓN</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('moral_docs')"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row moral_docs" style="display:none">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Tipo de Poder Notarial</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="doc_notary_power">
                                            <small>Especificar si se trata de: Poder General para Pleitos y Cobranzas; Poder General para Actos de Dominio; Poder General para Actos de Administración, Poder Especial</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número/Folio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="doc_folio">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre del Notario, Corredor Público o Juez</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="doc_notary">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Notaría, Correduría o Juzgado</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="doc_notary_number">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Inscripción en el Registro Público de la propiedad y de comercio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="doc_inscription">
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="text-align: center;height: 30px;">
                                    <div class="">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DOMICILIO (PERSONAL Y/O FISCAL)</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('moral_address')"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row moral_address" style="display:none">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Calle</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="street_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">No. Exterior</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" Exterior" name="no_extern_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">No. Interior</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" Interior" name="no_intern_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Colonia</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="colony_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Demarcación Territorial o Municipio</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="municipality_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">C.P.</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="c_p_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Entidad Federativa</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="federity_entity_moral">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3" style="text-align: center;height: 30px;">
                                    <div class="">
                                        <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">CORREO Y TELEFONOS</h4>
                                        <div class=" text-end" style="top: -43px;position: relative;">
                                            <label class="switch">
                                              <input type="checkbox" onclick="switchDiv('moral_correo')"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 row moral_correo" style="display:none">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Teléfono</label>
                                            <input class="form-control" type="number" name="phone_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Celular</label>
                                            <input class="form-control" type="number" name="phone_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Correo electrónico</label>
                                            <input class="form-control" type="email" name="email_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Whatsapp</label>
                                            <input class="form-control" type="number" name="whatsapp_moral">
                                            <small>(con el codigo de area)</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="facebook_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="instagram_moral">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">twitter</label>
                                            <input class="form-control" type="text" value="<?php echo $row['first_last_name'];?>" name="twitter_moral">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Guardar</button>
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

function switchDiv(div){
    $('.'+div).toggle(500);
    
    if(div=="en_su_caso")
    {
        var attr = $('select[name=nacionality]').attr('required');
      
        if (typeof attr == 'undefined'  ) 
        {
            $('select[name=nacionality]').attr('required','required');
            $('select[name=passport]').attr('required','required');
            $('select[name=activity_authorizated]').attr('required','required');
            
        }else
        {
            $('select[name=nacionality]').removeAttr('required');  
            $('select[name=passport]').removeAttr('required');  
            $('select[name=activity_authorizated]').removeAttr('required');  
        }
              
    }
    
    if(div=="individual_represntative")
    {
        var attr = $('select[name=name_representative]').attr('required');

        if (typeof attr == 'undefined'  ) 
        {
            
            $('input[name=name_representative]').attr('required','required');
            $('select[name=dni_representative]').attr('required','required');
            $('select[name=passport_representative]').attr('required','required');
            $('select[name=activity_authorizated_representative]').attr('required','required');
            
        }else
        {
            $('input[name=name_representative]').removeAttr('required');  
            $('select[name=dni_representative]').removeAttr('required');  
            $('select[name=passport_representative]').removeAttr('required');  
            $('select[name=activity_authorizated_representative]').removeAttr('required');  
        }
              
    }
    
    if(div=="moral_representative")
    {
        var attr = $('select[name=nacionality_representative_moral]').attr('required');

        if (typeof attr == 'undefined'  ) 
        {
            
            $('select[name=nacionality_representative_moral]').attr('required','required');
            $('select[name=passport_representative_moral]').attr('required','required');
            $('select[name=activity_authorizated_representative_moral]').attr('required','required');
            
        }else
        {
            $('select[name=nacionality_representative_moral]').removeAttr('required');  
            $('select[name=passport_representative_moral]').removeAttr('required');  
            $('select[name=activity_authorizated_representative_moral]').removeAttr('required');  
        }
              
    }
    
}
window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            console.log(form);
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    $("input[name='directory_type']").click(function() {
        if ($("#fisic_type").is(":checked")) {
            $("#fisica").show(500);
            $("#moral").hide(500);
            
            
          
            
            $('input[name=name_moral]').removeAttr('required');  ;
            $('input[name=frc_moral]').removeAttr('required');  ;

            $('input[name=name]').attr('required','required');;  
            $('select[name=io_oficial]').attr('required','required');;  
            
            
        } else {
            $("#moral").show(500);
            $("#fisica").hide(500);

            $('input[name=name_moral]').attr('required','required');
            $('input[name=frc_moral]').attr('required','required');

            $('input[name=name]').removeAttr('required');  
            $('select[name=io_oficial]').removeAttr('required');  
          
        }
    });


}, false);
</script>
<?php endforeach; ?>