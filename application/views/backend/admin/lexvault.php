<a class="floated-chat-btn " style="text-decoration: none;" href="javascript:void(0)" onclick="modalRequest('<?php echo base_url(); ?>modal/popup/modal_add_lexvault/');"><i class="icofont icofont-plus"></i></a>
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 style="  text-transform: uppercase;">LEXVAULT
                    </h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Lexvautl</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid user-card row">
        <!-- Zero Configuration  Starts-->
        <div class="col-12 col-sm-12 m-b-10">
            <a class="btn btn-primary pull-right m-l-10" href="<?php echo base_url();?>admin/lexvault_templates">Plantillas</a>
        </div>
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="basic-1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Plantilla</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $this->db->where('status',1);
                                    $lexvault = $this->db->get('lexvault')->result_array(); 
                                    foreach($lexvault as $row):
                                    
                                ?>
                                <tr>
                                    <td><?php echo $row['name'];   ?></td>
                                    <td><?php echo $row['date'];   ?></td>
                                    <td><?php echo $this->db->get_where('lexvault_template',array('lexvault_template_id'=>$row['lexvault_template_id']))->row()->name;   ?></td>
                                    <td>
                                        <a style="font-size:20px" href="<?php echo base_url();?>admin/lexvault_edit/<?php echo base64_encode( $row['lexvault_id']); ?>"><i class="fa fa-file-text"></i></a>
                                        <a style="font-size:20px;color:#E52727" href="javascript:void(0)" onclick="deleteLextvault('<?php echo $row['lexvault_id']; ?>')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero Configuration  Ends-->
    </div>
</div>
<script>
function deleteLextvault(id) {
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
            location.href = "<?php echo base_url(); ?>admin/lexvault/delete/" + id;

        }
    })
}
</script>