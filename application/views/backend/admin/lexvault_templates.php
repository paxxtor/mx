
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    
                    <h3 style="  text-transform: uppercase;">
                    <a href="<?php echo base_url(); ?>admin/lexvault">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                            <g fill="none" stroke-linejoin="round" stroke-width="4">
                                <path fill="#000" stroke="#000" d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" />
                                <path stroke="#fff" stroke-linecap="round" d="M32.4917 24.5H14.4917" />
                                <path stroke="#fff" stroke-linecap="round" d="M23.4917 15.5L14.4917 24.5L23.4917 33.5" />
                            </g>
                        </svg>
                    </a> LEXVAULT Plantillas
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
            <a class="btn btn-primary pull-right m-l-10" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_lexvault_template_add');">Agregar plantilla</a>
        </div>
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="basic-1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Campos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $this->db->where('status',1);
                                    $contracts = $this->db->get('lexvault_template')->result_array(); 
                                    foreach($contracts as $row):
                                    
                                ?>
                                <tr>
                                    <td><?php echo $row['name'];   ?></td>
                                    <td><?php echo $row['description'];   ?></td>
                                    <td>
                                        <ul style="list-style-type: disc;"><?php  $fields = json_decode($row['fields'],true); foreach ($fields as $valor) {
                                                        echo '<li>'.$valor . '</li>';
                                                    }  ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <a style="font-size:25px" href="<?php echo base_url();?>admin/lexvault_template_edit/<?php echo base64_encode( $row['lexvault_template_id']); ?>"><i class="fa fa-file-text"></i></a>
                                        &nbsp
                                        <a style="font-size:25px;" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_lexvault_template_edit/<?php echo base64_encode( $row['lexvault_template_id']); ?>');" ><i class="fa fa-pencil-square"></i></a>
                                        &nbsp
                                        <a style="font-size:25px;color:#E52727" href="javascript:void(0)" onclick="deleteLextvault('<?php echo $row['lexvault_template_id']; ?>')"><i class="fa fa-trash"></i></a>
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
            location.href = "<?php echo base_url(); ?>admin/lexvault_template/delete/" + id;

        }
    })
}
</script>