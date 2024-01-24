<?php 
    $move = $this->db->get_where('movment_economic',array('movment_economic_id'=>$param2))->result_array(); 
    foreach ($move as $row):
?>
<style>
.details {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.progress-circle {
    width: 75px;
    height: 75px;
    border-radius: 50%;
        background-size: 99%;
    
    
}

.percentage {
    text-align: center;
    line-height: 59px;
    font-size: 14px;
    color: #001A15;
    font-weight: bold;
    background: white;
    width: 50px;
    height: 50px;
    border-radius: 100px;
    top: 12px;
    position: relative;
    right: -12px;
}

</style>
<div class="modal-body">
    <div class="row">
        <div class="col-md-8 row">
            <div class="col-md-12">
                <p><span style="padding: 6px 7px;background-color: rgba(99, 98, 231, 0.08);border-radius: 5px;"><?php echo $this->crud_model->get_table_name('economic_type',$row['type']);?></span> <?php echo $row['date'];?></p>
            </div>
            <div class="col-md-12">
                <h2>$<?php echo number_format($row['import'],2,'.',',');?></h2>
            </div>
            <div class="col-md-12">
                <h3><?php echo $row['description'];?></h3>
            </div>
            <div class="col-md-8 mb-3">
                <div class="details" style="    margin-top: 10px;">
                    <div>
                        <p style="    color: #999;">Número Único de Expediente (NUE)</p>
                        <h5><?php echo $this->db->get_where('proceeding',array('proceeding_id'=>$row['proceeding_id']))->row()->nue;?></h5>
                    </div>
                </div>
                <div class="details">
                    <div>
                        <p style="color: #999;">Cliente</p>
                        <div class="user-with-avatar">
                            <img alt="" src="<?php echo $this->account_model->get_photo('directory',$row['client_id']);?>" style="max-width:50px">
                            <span><?php echo  $this->account_model->getUserFullName('directory',$row['client_id']);?></span>
                        </div>
                    </div>
                </div>
                <div class="details">
                    <div>
                        <p style="    color: #999;">Responsable</p>
                        <div class="user-with-avatar">
                            <img alt="" src="<?php echo $this->account_model->get_photo('directory',$row['manager_id']);?>" style="max-width:50px">
                            <span><?php echo  $this->account_model->getUserFullName('directory',$row['manager_id']);?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="details">
                 <div class="progress-circle" id="progressCircle">
                    <div class="percentage" id="percentage">0%</div>
                </div>
                <div>
                    <p style="color: #999;">Total Cancelado</p>
                    <h2>$<?php $tota_imp = $this->crud_model->total_movment_economic_payment($row['movment_economic_id']); echo number_format($tota_imp,'2','.',',');?></h2>
                </div>
            </div>
            <div class="details" style="    margin-top: 50px;">
                <div>
                    <p ><span style="color: #999;">Monto: </span> <span>$ <?php echo number_format($row['import'],2,'.',',');?> MXN</span> </p>
                   
                </div>
            </div>
            <div class="details">
                <div>
                    <p><span style="color: #999;">Pagado: </span> <span>$ <?php echo  number_format($tota_imp,'2','.',',');?> MXN</span></p>
                     
                </div>
            </div>
            <div class="details">
                <div>
                    <p ><span  style="color: #999;">Pendiente: </span> <span style="  border-top:1px solid #999;padding-top:5px;  ">$ <?php echo number_format($row['import']-$tota_imp,'2','.',',');?> MXN</span></p>
                    
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <hr>

            <div>
                <h2>Pagos</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-padded dataTable no-footer economic_payments">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Monto</th>
                                        <th>Concepto</th>
                                        <th>Metodo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $proceeding_in = $this->db->get_where('economic_payment',array('movment_economic_id'=>$param2,'status'=>1))->result_array();
                                        foreach( $proceeding_in as $row2):
                                    ?>
                                    <tr>
                                        <td><?php echo $row2['date'];?></td>
                                        <td><?php echo $this->crud_model->get_table_name('economic_payment_type',$row2['type']);?></td>
                                        <td>$<?php echo number_format($row2['import'],2,'.',',');?></td>
                                        <td><?php echo $row2['description'];?></td>
                                        <td><?php echo $this->crud_model->get_table_name('payment_method',$row2['method']).$row2['status'];?></td>
                                        <td style="font-size:20px">
                                            <a class="" target="_blanck" href="<?php echo base_url();?>admin/comprobante/<?php echo $row2['economic_payment_id'];?>"><i class="fa fa-download"></i></a>
                                            <a class="" href="#" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_edit_economic_payment/<?php echo $row2['economic_payment_id'];?>');"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteEconomicMovement('<?php echo $row2['economic_payment_id']?>');"><i class="fa fa-trash m-r-5"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button class="btn btn-danger" onclick="deleteElement('movment_economic','<?php echo $row['movment_economic_id']?>');"><i class="fa fa-trash"></i> Eliminar</button>
    <button class="btn btn-warning" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_edit_economic_move/<?php echo $row['movment_economic_id'];?>');"><i class="fa fa-pencil-square-o"></i> Editar</button>
    <a class="btn btn-success" href="<?php echo base_url();?>admin/invoice_all_download/<?php echo $row['movment_economic_id'];?>" ><i class="fa fa-download"></i> Descargar comprobante</a>
    <button class="btn btn-primary" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_new_economic_payment/<?php echo $row['movment_economic_id']?>');"><i class="fa fa-plus-circle"></i> Cargar importe</button>
</div>
<script>
// Ajusta el porcentaje de carga
function setProgress(percentage) {
    const progressCircle = document.getElementById('progressCircle');
    const percentageElement = document.getElementById('percentage');

    const degrees = (percentage / 100) * 360;
    progressCircle.style.background = `conic-gradient(#001A15 ${degrees}deg, #e9e9e9 ${degrees}deg)`;
    percentageElement.textContent = `${percentage}%`;
}

// Ejemplo: establece el porcentaje de carga al 75%
var total = (<?php echo $tota_imp ?> * 100)/<?php echo $row['import']?>;
setProgress(total);

function deleteEconomicMovement( id) {
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
                url: "https://mayansource.com/mx/admin/movment_economic/delete/" + id,
                success: function(data) {
                    console.log(data);
                    modalLgRequest('<?php echo base_url();?>modal/popup/modal_economic_move/<?php echo $row['movment_economic_id'];?>');
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
                              getDetails('movment_economic', '<?php echo  $row['proceeding_id']; ?>');
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
<?php endforeach;?>