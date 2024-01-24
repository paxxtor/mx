<?php 
    $proceeding = $this->db->get_where('proceeding',array('proceeding_id'=>$proceeding_id))->result_array();
    foreach( $proceeding as $row):
?>
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
                    <h3>Editar Expediente</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Expedientes</li>
                        <li class="breadcrumb-item active"> Editar Expediente</li>
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
                    <form class="card needs-validation" action="<?php echo base_url(); ?>admin/proceedings/edit/<?php echo base64_encode($row['proceeding_id']);?>" method="post" enctype='multipart/form-data'  novalidate="">

                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Editar información</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlSelect9"><b>Etapa:</b></label><span style="color:red">*</span>
                                    <select class="form-select mb3 typehead" data-table="phase" required name="phase_id">
                                         <option value="<?php echo $row['phase_id']; ?>" selected><?php echo $this->crud_model->get_table_name('phase',$row['phase_id']);?></option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="steps" type="checkbox" name="derivative" value="1" <?php echo $row['derivative']==1?'checked':''; ?> onclick="showDerivaive(this)">
                                        <label class="form-check-label mb-0" for="steps"><b>CAUSA PENAL DERIVADA DE CARPETA:</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-4 derivative " style="display:<?php echo $row['derivative']==1?'block':'none'; ?>;">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9" ><b>Carpeta:</b></label><span style="color:red">*</span>
                                        <select class="form-select " name="type" onchange="getFolders(this.value);">
                                            <option value="">Seleccionar</option>
                                            <option value="1" <?php echo $row['type']==1?'Selected':''; ?> >CARPETA JUDICIAL</option>
                                            <option value="2" <?php echo $row['type']==2?'Selected':''; ?>>CARPETA INVESTIACIÓN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 derivative" style="display:<?php echo $row['derivative']==1?'block':'none'; ?>;">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Código de carpeta</b></label><span style="color:red">*</span>
                                        <select class="form-control basic"  name="carpet"  id="folders_nic" >
                                            <option value="">Seleccionar</option>
                                            <?php  $folders = $this->db->get_where('folder', array('type'=>$row['type']))->result_array();
                                                foreach ($folders as $fl): ?>
                                            <option value="<?php echo $fl['folder_id'] ?>" <?php echo $row['folder_id']==$fl['carpeta']?'selected':''; ?>><?php echo $fl['nic'] ?></option>
                                            <?php endforeach;  ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlSelect9"><b>Clasificación:</b></label><span style="color:red">*</span>
                                    <select class="form-select mb3 typehead" data-table="proceeding_clasification" required name="proceeding_clasification">
                                       <option value="<?php echo $row['proceeding_clasification_id']; ?>" Selected><?php echo $this->crud_model->get_table_name('proceeding_clasification',$row['proceeding_clasification_id']);?></option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 ">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Resposable:</label><span style="color:red">*</span>
                                        <select class="form-select basic" required name="manager_id">
                                            <option value="">Seleccionar</option>
                                            <?php  $managers = $this->db->get_where('directory', array('directory_rol_id'=>4))->result_array();
                                                foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $row['manager_id'] == $mg['directory_id'] ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Número interno de control:</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="nic" value="<?php echo $row['nic']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Número único de expediente:</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="nue" value="<?php echo $row['nue']; ?>" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de alta:</label><span style="color:red">*</span>
                                        <input class="form-control" type="date" name="discharge_date" required value="<?php echo $row['discharge_date']; ?>" onfocus="this.showPicker()">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de Finalización:</label>
                                        <input class="form-control" type="date" name="finish_date" value="<?php echo $row['finish_date']; ?>" onfocus="this.showPicker()">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlTextarea4">Descripción:</label><span style="color:red">*</span>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="description" required><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Categoría:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_category" required name="proceeding_category" required>
                                            <option value="<?php echo $row['proceeding_category_id']; ?>" Selected><?php echo $this->crud_model->get_table_name('proceeding_category',$row['proceeding_category_id']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Tipo:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_type" required name="proceeding_type" required>
                                             <option value="<?php echo $row['proceeding_type']; ?>" Selected><?php echo $this->crud_model->get_table_name('proceeding_type',$row['proceeding_type']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Asunto:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_razon" required name="proceeding_razon" required>
                                             <option value="<?php echo $row['proceeding_razon']; ?>" Selected><?php echo $this->crud_model->get_table_name('proceeding_razon',$row['proceeding_razon']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Situación:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_status" required name="proceeding_status" required>
                                            <option value="<?php echo $row['proceeding_status']; ?>" Selected><?php echo $this->crud_model->get_table_name('proceeding_status',$row['proceeding_status']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Procedimiento:</label><span style="color:red">*</span>
                                        <input class="form-control" type="text" name="proccess" value="<?php echo $row['proccess']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Cliente Factura:</label><span style="color:red">*</span>
                                        <select class="form-select" name="client_id" required>
                                            <option value="">Seleccionar</option>
                                            <?php  $managers = $this->db->get_where('directory', array('directory_rol_id'=>1))->result_array();
                                                 foreach ($managers as $mg): ?>
                                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $row['client_id'] == $mg['directory_id'] ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Parte:</label><span style="color:red">*</span>
                                        <select class="form-select mb3 typehead" data-table="proceeding_part" required name="proceeding_part">
                                            <option value="<?php echo $row['proceeding_type']; ?>" Selected><?php echo $this->crud_model->get_table_name('proceeding_type',$row['proceeding_type']);?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"><b>IMPORTES</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Cuantía:</label><span style="color:red">*</span>
                                        <input class="form-control" type="number" step="any" name="amount" required onchange="setTotal()" onkeyup="setTotal()" value="<?php echo $row['amount']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Intereses:</label><span style="color:red">*</span>
                                        <input class="form-control" type="number" step="any" name="interests" readonly value="<?php echo $row['interests']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Total:</label>
                                        <input class="form-control" type="number" step="any" name="total" readonly value="<?php echo $row['total']; ?>">
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="turn"  type="checkbox" name="turn" value="1"  <?php echo $row['turn']==1?'checked':''; ?>>
                                        <label class="form-check-label mb-0" for="turn"><b>Pro bono:</b></label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="confidential"  type="checkbox" name="confidential" value="1" <?php echo $row['confidential']==1?'checked':''; ?>>
                                        <label class="form-check-label mb-0" for="confidential"><b>Confidencial:</b></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check checkbox checkbox-solid-dark">
                                        <input class="form-check-input" id="public"  type="checkbox" name="public" value="1" <?php echo $row['public']==1?'checked':''; ?>>
                                        <label class="form-check-label mb-0" for="public"><b>Publicar en el portal del cliente</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Editar expediente</button>
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
    $('input[name=total]').val(parseFloat(total)+parseFloat(amount));

}


function showDerivaive(val) {
    isChecked = $(val).is(':checked')
    console.log(isChecked);
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
<?php endforeach; ?>