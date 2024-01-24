<?php 
    $contract_details = $this->db->get_where('contract',array('contract_id'=>$contract_id))->result_array();
    foreach($contract_details as $contract):
?>
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
                        <li class="breadcrumb-item active">Editar contrato</li>
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
                                                <h4 class="mb-0">Editar contrato</h4>

                                            </div>
                                        </div>
                                        <div class="email-wrapper ">
                                            <form class="theme-form row needs-validation" action="<?php echo base_url(); ?>admin/lexdocs/update_contract/<?php echo base64_encode($contract['contract_id'])?>" method="POST" enctype="multipart/form-data" novalidate="">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombre<span style="color:red">*</span></label>
                                                        <input class="form-control" required type="text" name="name" value="<?php echo $contract['name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Identificación del contrato<span style="color:red">*</span></label>
                                                        <input class="form-control" required type="text" name="no_contract" value="<?php echo $contract['no_contract']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Tipo:</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" required data-table="contract_type" name="contract_type">
                                                            <option value="<?php echo $contract['type']; ?>" Selected><?php echo $this->crud_model->get_table_name('contract_type',$contract['type']);?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de contrato</label><span style="color:red">*</span>
                                                        <input class="form-control" required type="date" name="date" value="<?php echo $contract['date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Vendedor</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="salesman">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id'] == $contract['salesman'] ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Comprador</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="purchaseman">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id'] == $contract['purchaseman'] ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Estado:</label><span style="color:red">*</span>
                                                        <select class="form-select mb3 typehead" data-table="contract_status" name="contract_status">
                                                            <option value="<?php echo $row['contract_status_id']; ?>" Selected><?php echo $this->crud_model->get_table_name('contract_status',$contract['contract_status']);?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Valido desde</label><span style="color:red">*</span>
                                                        <input class="form-control" type="date" name="date_start" value="<?php echo $contract['date_start']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Valido hasta</label>
                                                        <input class="form-control" type="date" name="date_end" value="<?php echo $contract['date_end']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Encargado</label>
                                                        <select class="form-select js-example-basic-single" required name="manager_id">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id'] == $contract['manager_id'] ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-sm-12 col-md-12 mb-5">
                                                    <div class="action-wrapper">
                                                        <button class="btn btn-primary " style="float: right" type="submit"><i class="fa fa-file me-2"></i> Enviar</button>
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
<?php endforeach; ?>