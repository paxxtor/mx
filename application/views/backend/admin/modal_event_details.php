
<?php 
    $event_details = $this->db->get_where('event',array('event_id'=>$param2))->result_array();
    foreach($event_details as $row):
?>
    <div class="modal-body">
		<div class="" style="background-color:<?php if($row['color'] ==1) echo '#528410'; if($row['color'] ==2) echo '#e0345e'; if($row['color'] ==3) echo '#6342ff'; if($row['color'] ==4) echo '#e6b517';?>; margin-top: -20px;height:50px;color:#fff; padding:10px;border-radius:10px">
		<h1><?php if($row['color'] ==1) echo 'Trabajo'; if($row['color'] ==2) echo 'Familia'; if($row['color'] ==3) echo 'Social'; if($row['color'] ==4) echo 'Viaje';?></h1>
		</div>
		<div  style="text-align:justify;padding:25px;">
		    <p style="margin-left:0px;"><i style="background-color: rgba(244, 164, 37, 0.25);padding:6px;border-radius:4px;color:#f4a72d;" class="fa fa-info-circle"></i> <a> <?php echo $row['title']; ?>.</a></p>
		    <p style="margin-left:0px;"><i style="background-color: rgba(244, 164, 37, 0.25);padding:6px;border-radius:4px;color:#f4a72d;" class="fa fa-text-width"></i> Descripción: <?php echo $row['description'];?></p>
		    <p style="margin-left:0px;"><i style="background-color: rgba(244, 164, 37, 0.25);padding:6px;border-radius:4px;color:#f4a72d;" class="fa fa-clock-o"></i> Inicio: <?php echo $row['date_start'].' '.$row['time_start'];?>.</p>
		    <p style="margin-left:0px;"><i style="background-color: rgba(244, 164, 37, 0.25);padding:6px;border-radius:4px;color:#f4a72d;" class="fa fa-clock-o"></i> Final: <?php echo $row['date_end'].' '.$row['time_end'];?>.</p>
		    <div style="display: flex;" >
		        <p style="margin-left:10px;cursor: pointer;"  onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_edit_event/<?php echo $row['event_id']; ?>' );" ><i style="background-color: #f4a72d;padding:6px;border-radius:4px;color:#fff;" class="fa fa-pencil"></i></p>
		        <p style="margin-left:10px;cursor: pointer;"  onclick="delete_event()" ><i style="background-color: red;padding:6px;border-radius:4px;color:#fff;" class="fa fa-trash"></i></p>
		    </div>
		</div>
	</div>
	<script>
	          function delete_event() {

              let timerInterval
        
          
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Este evento y la información relacionada seran eliminados permanentemente.",
                        type: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#9fd13b',
                        cancelButtonColor: '#fd4f57',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire({
                                title: 'Eliminando',
                                titleTextColor: '#000',
                                html: '',
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
                            location.href = "<?php echo base_url();?>admin/events/delete/<?php echo $row['event_id']?>";
                        }
                    })
        
        }
	</script>
<?php endforeach;?>

