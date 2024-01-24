<?php 
    $proceeding = $this->db->get_where('proceeding',array('proceeding_id'=>$proceeding_id))->result_array();
    foreach( $proceeding as $row):
?>
<style>
.details {
    display: flex;
    margin-bottom: 10px;
}

.details .icon {
    width: 35px;
    height: 35px;
    border-radius: 5px;
    background-color: rgba(99, 98, 231, 0.08);
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-right: 15px;
}

.details h5 {
    font-size: 14px;
    margin-bottom: 5px;
    text-transform: capitalize;
}



.details p {
    font-size: 12px;
    line-height: 1;
    text-transform: capitalize;
    margin-bottom: 5px;
}

.nav-item {

    margin-top: 10px;
}
</style>
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/proceedings">Expedientes</a></li>
                        <li class="breadcrumb-item active"><?php echo $row['nue'];?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 xl-35">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Datos Generales</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                        <div class="card-body post-about">
                                            <div class="row">
                                                <div class="col-md-10 row " style="    justify-content: center;">
                                                    <div class="col-md-4 ">
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="user"></i></div>
                                                            <div>
                                                                <p>Número Único de Expediente (NUE)</p>
                                                                <h5><?php echo $row['nue'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="user"></i></div>
                                                            <div>
                                                                <p>Número Interno de Control (NIC)</p>
                                                                <h5><?php echo $row['nic'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="calendar"></i></div>
                                                            <div>
                                                                <p>Fecha de alta</p>
                                                                <h5><?php echo $row['discharge_date'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="calendar"></i></div>
                                                            <div>
                                                                <p>Fecha de finalización</p>
                                                                <h5><?php echo ($row['finish_date'] != '0000-00-00') ? $row['finish_date']:'Pendiente.';?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="menu"></i></div>
                                                            <div>
                                                                <p>Descripción</p>
                                                                <h5><?php echo $row['description'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="hash"></i></div>
                                                            <div>
                                                                <p>Categoría</p>
                                                                <h5><?php echo $this->crud_model->get_table_name('proceeding_category',$row['proceeding_category_id']);?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="hash"></i></div>
                                                            <div>
                                                                <p>Tipo</p>
                                                                <h5><?php echo $this->crud_model->get_table_name('proceeding_type',$row['proceeding_type']);?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="hash"></i></div>
                                                            <div>
                                                                <p>Asunto</p>
                                                                <h5><?php echo $this->crud_model->get_table_name('proceeding_razon',$row['proceeding_razon']);?></h5>
                                                            </div>
                                                        </div>

                                                        <div class=" details">
                                                            <div class="icon"><i data-feather="hash"></i></div>
                                                            <div>
                                                                <p>Situacion</p>
                                                                <h5><?php echo $this->crud_model->get_table_name('proceeding_status',$row['proceeding_status']);?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="hash"></i></div>
                                                            <div>
                                                                <p>Procedimiento</p>
                                                                <h5><?php echo $row['proccess'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class=" details">
                                                            <div class="icon"><i data-feather="user"></i></div>
                                                            <div>
                                                                <p>Cliente</p>
                                                                <h5><?php echo $this->account_model->getUserFullName('directory',$row['client_id'])?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="user"></i></div>
                                                            <div>
                                                                <p>Parte</p>
                                                                <h5><?php echo $this->crud_model->get_table_name('proceeding_part',$row['proceeding_part']);?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <div class=" details">
                                                            <div class="icon"><i data-feather="dollar-sign"></i></div>
                                                            <div>
                                                                <p>Cuantia</p>
                                                                <h5><?php echo $row['amount'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class=" details">
                                                            <div class="icon"><i data-feather="dollar-sign"></i></div>
                                                            <div>
                                                                <p>Interes</p>
                                                                <h5><?php echo $row['interests'];?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="mail"></i></div>
                                                            <div>
                                                                <p>Pro Bono</p>
                                                                <h5><?php echo $row['turn']==1?'SI':'NO';?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i data-feather="mail"></i></div>
                                                            <div>
                                                                <p>Confidencial</p>
                                                                <h5><?php echo $row['confidential']==1?'SI':'NO';?></h5>
                                                            </div>
                                                        </div>
                                                        <div class=" details">
                                                            <div class="icon"><i data-feather="mail"></i></div>
                                                            <div>
                                                                <p>Publicar en el portal del cliente</p>
                                                                <h5><?php echo $row['public']==1?'SI':'NO';?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                            <div>
                                                                <p>Responsable</p>
                                                                <h5><?php echo $this->account_model->getUserFullName('directory',$row['manager_id'])?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 ">
                                                    <div class="">
                                                        <a href="<?php echo base_url();?>admin/proceedings_edit/<?php echo $row['proceeding_id']?>" style="font-size:20px;color:green;padding-bottom:25px;"><i class="fa fa-edit m-r-5"></i>Editar</a><br><br>
                                                    </div>
                                                    <div class="">
                                                        <a href="javascript:void(0)" style="font-size:20px;color:#c64e40;padding-bottom:25px;"><i class="fa fa-trash-o m-r-5"></i>Eliminar</a><br><br>
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
                <div class="col-xl-12 col-lg-12 col-md-12 xl-65">
                    <div class="row">
                        <div class="col-sm-12 box-col-12">
                            <div class="card">
                                <div class="social-tab">
                                    <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                        <li class="nav-item"><a onclick="getDetails('proceeding_interveners',<?php echo $row['proceeding_id'];?>)" class="nav-link active" id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-users"></i>Intervinientes</a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_judged',<?php echo $row['proceeding_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Juzgados </a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_actions',<?php echo $row['proceeding_id'];?>)" class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i class="fa fa-fax"></i>Actuaciones</a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_files',<?php echo $row['proceeding_id'];?>)" class="nav-link" id="top-photos" data-bs-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false"><i class="fa fa-paperclip"></i>Documentos</a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_economic',<?php echo $row['proceeding_id'];?>)" class="nav-link " id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-money"></i>Datos Económicos</a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_invoices',<?php echo $row['proceeding_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Facturación </a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_insurance',<?php echo $row['proceeding_id'];?>)" class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i class="fa fa-fax"></i>Aseguradoras</a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_others',<?php echo $row['proceeding_id'];?>)" class="nav-link " id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-users"></i>Varios</a></li>
                                        <li class="nav-item"><a onclick="getDetails('proceeding_history',<?php echo $row['proceeding_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Historial </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- profile post start-->
                        <div class="col-sm-12" id="result">

                        </div>
                        <!-- profile post end                           -->
                    </div>
                </div>
                <!-- user profile fifth-style end-->
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    getDetails('proceeding_interveners', <?php echo $row['proceeding_id'];?>);
});

function getDetails(table, proceeding_id) {

    $('#loader_' + table).show();
    $.ajax({
        url: "<?php echo base_url().'admin/getDetails/';?>",
        type: "POST",
        data: {
            table: table,
            proceeding_id: proceeding_id,
        },
        success: function(response) {

            $('#result').html(response).fadeIn(1000);

            //console.log(response);
        },
        complete: function() {
            $('table.show-case').DataTable({
                "paging": true,
                "ordering": false,
                "orderable": false,
                "info": false,
                language: {
                    search: `<i style="font-size:20px" class="fa fa-search"></i>`,
                    "lengthMenu": "_MENU_",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next": `<i class="fa fa-chevron-circle-right"></i>`,
                        "previous": `<i class="fa fa-chevron-circle-left"></i>`
                    },
                },
            })
        },

        error: function() {
            console.log("error");
        }
    });

}

function deleteElement(table, id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "También se eliminará toda la información asociada.",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#9fd13b',
        cancelButtonColor: '#fd4f57',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/" + table + "/delete/" + id,
                success: function(data) {
                    console.log(data);
                    // show response from the php script.
                    if (data != 'Error') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 8000
                        });
                        Toast.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente'
                        })

                        getDetails(table, <?php echo $row['proceeding_id'];?>);

                        Toast.fire({
                            icon: 'success',
                            title: 'Eliminado'
                        })
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                },
            });


        }
    })
}
</script>
<!-- footer start-->
<?php endforeach; ?>