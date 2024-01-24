<?php 
    $folder = $this->db->get_where('folder',array('folder_id'=>$folder_id))->result_array();
    foreach( $folder as $row):
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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Carpeta  <?php echo $row['type']=="1"?'Judicial':'Investigación'; ?></li>
                        <li class="breadcrumb-item "><?php echo $row['nic'];?></li>
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
                                                                <p>Número Único de Causa (NUC)</p>
                                                                <h5><?php echo $row['nuc'];?></h5>
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
                                                                <p>Pro bono</p>
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
                                                   <?php if( $this->crud_model->get_permission('folder_edit') == 1):?>
                                                    <div class="">
                                                        <a href="<?php echo base_url();?>admin/folder_edit/<?php echo base64_encode($row['folder_id']); ?>" style="font-size:20px;color:green;padding-bottom:25px;"><i class="fa fa-edit m-r-5"></i>Editar</a><br><br>
                                                    </div>
                                                    <?php endif; ?>
                                                    
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
                                        <li class="nav-item"><a onclick="getDetails('folder_interveners',<?php echo $row['folder_id'];?>)" class="nav-link active" id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-users"></i>Intervinientes</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_judged',<?php echo $row['folder_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Juzgados </a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_actions',<?php echo $row['folder_id'];?>)" class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i class="fa fa-fax"></i>Actuaciones</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_files',<?php echo $row['folder_id'];?>)" class="nav-link" id="top-photos" data-bs-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false"><i class="fa fa-paperclip"></i>Documentos</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_economic',<?php echo $row['folder_id'];?>)" class="nav-link " id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-users"></i>Datos Económicos</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_invoices',<?php echo $row['folder_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Facturación </a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_insurance',<?php echo $row['folder_id'];?>)" class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i class="fa fa-fax"></i>Aseguradoras</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_others',<?php echo $row['folder_id'];?>)" class="nav-link " id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-users"></i>Varios</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_history',<?php echo $row['folder_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Historial </a></li>
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
var n = "0x7b77bdf1c7befbf6";
const hugeHex = BigInt(n)
const valuee = parseFloat(hugeHex) / 1000000000000000000;
console.log(valuee);

$(function() {
    getDetails('folder_interveners', <?php echo $row['folder_id'];?>);
});

number_format = function(number, decimals, dec_point, thousands_sep) {
    number = number.toFixed(decimals);

    var nstr = number.toString();
    nstr += '';
    x = nstr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? dec_point + x[1] : '';
    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

    return x1 + x2;
}

function getDetails(table, folder_id) {

    $('#loader_' + table).show();
    $.ajax({
        url: "<?php echo base_url().'admin/getFolderDetails/';?>",
        type: "POST",
        data: {
            table: table,
            folder_id: folder_id,
        },
        success: function(response) {

            $('#result').html(response).fadeIn(1000);

            //console.log(response);
        },
        complete: function() {
            $('table.show-case').DataTable({
        "paging":   true,
        "ordering": false,
        "orderable": false,
        "info":     false,
         language: { search: `<i style="font-size:20px" class="fa fa-search"></i>`,
         "lengthMenu": "_MENU_",
           "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       `<i class="fa fa-chevron-circle-right"></i>`,
                    "previous":   `<i class="fa fa-chevron-circle-left"></i>`                   
                },
         },
    });
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

                        getDetails(table, <?php echo $row['folder_id'];?>);

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

let timerInterval

function deleteFolder(folder_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Toma en cuenta que solo se eliminará la copia de tu mensaje.",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#9fd13b',
        cancelButtonColor: '#fd4f57',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Eliminando mensaje',
                titleTextColor: '#000',
                html: 'Esta ventana se cerrará en <strong></strong>.',
                timer: 2000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('strong').textContent = Swal
                            .getTimerLeft()
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            })
            location.href = "<?php echo base_url();?>admin/folders/delete/" + folder_id;
        }
    })
}
</script>
<!-- footer start-->
<?php endforeach; ?>