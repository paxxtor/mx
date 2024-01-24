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
                    <h3>Agregar Expediente</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Expedientes</li>
                        <li class="breadcrumb-item active"> Agregar Expediente</li>
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
                    <form class="card needs-validation" action="<?php echo base_url(); ?>admin/proceedings_add/edit/<?php echo base64_encode($row['folder_id']);?>" method="post" enctype='multipart/form-data'  novalidate="">

                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Agregar información</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlSelect9"><b>Etapa:</b></label><span style="color:red">*</span>
                                    <select class="form-select mb3 typehead" data-table="phase" required name="steps">
                                        <option value="">Seleccionar</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="steps" type="checkbox" name="derivative" value="1" onclick="showDerivaive(this)">
                                        <label class="form-check-label mb-0" for="steps"><b>CAUSA PENAL DERIVADA DE CARPETA:</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-4 derivative " style="display:none;">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9" ><b>Carpeta:</b></label><span style="color:red">*</span>
                                        <select class="form-select " name="type" onchange="getFolders(this.value);">
                                            <option value="">Seleccionar</option>
                                            <option value="1">CARPETA JUDICIAL</option>
                                            <option value="2">CARPETA INVESTIACIÓN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 derivative" style="display:none;">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Código de carpeta</b></label><span style="color:red">*</span>
                                        <select class="form-control basic"  name="carpet" value="" id="folders_nic"></select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlSelect9"><b>Clasificación:</b></label><span style="color:red">*</span>
                                    <select class="form-select mb3 typehead" data-table="proceeding_clasification" required name="proceeding_clasification">
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

                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Código:</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="code" value="<?php echo $this->crud_model->proceeding_code();?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de alta:</label><span style="color:red">*</span>
                                        <input class="form-control" type="date" name="discharge_date" required onfocus="this.showPicker()">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de Finalización:</label>
                                        <input class="form-control" type="date" name="finish_date" onfocus="this.showPicker()">
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
                                    <div class="">
                                        <label class="form-label"><b>IMPORTES</b></label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="turn"  type="checkbox" name="turn" value="1" onclick="checkShow(this, 'pro_bono')">
                                        <label class="form-check-label mb-0" for="turn"><b>Pro bono:</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 pro_bono">
                                     <label class="form-label">Cuantía:</label><span style="color:red">*</span>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                      </div>
                                       <input class="form-control" type="number" step="any" name="amount" required onchange="setTotal()" onkeyup="setTotal()">
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
                            <button class="btn btn-primary" type="submit">Agregar perfil</button>
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

function setTotal()
{

    var amount = $('input[name=amount]').val();
    var interest = $('input[name=interests]').val();
    
    var total = amount * parseFloat(interest/100); 
    var interest = $('input[name=total_interests]').val(parseFloat(total));
    
    $('input[name=total]').val(parseFloat(total)+parseFloat(amount));

}

function checkShow(val, classs) {
    isChecked = $(val).is(':checked')
    
    
    if(classs != "pro_bono")
    {
         if (isChecked) {

        $('.' + classs).show(500);

        } else {
    
            $('.' + classs).hide(500);
    
        }
        
    }else
    {
         if (!isChecked) {

            $('.' + classs).show(500);
            $('input[name="amount"]').attr('requiered','requiered');
        
        

        } else {
    
            $('.' + classs).hide(500);
            $('input[name="amount"]').removeAttr('requiered');
    
        }
        
        
        
    }
   
}

function showDerivaive(val) {
    isChecked = $(val).is(':checked')
    if (isChecked) {

        $('.derivative').show(500);

    } else {

        $('.derivative').hide(500);

    }
}


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
        complete: function(){
             $('.basic').select2();
        },
        error: function() {
            console.log("error");
        }
    });
}



window.addEventListener('load', function() {
    $('.basic').select2();
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            console.log(form);
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                    console.log('form submit');
            }
            form.classList.add('was-validated');
         
        }, false);
    });

}, false);
</script>