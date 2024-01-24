 <a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/proceedings_add/"><i class="icofont icofont-plus"></i></a>
 <div class="page-body">
     <div class="container-fluid">
         <div class="page-title">
             <div class="row">
                 <div class="col-12 col-sm-6">
                     <h3>Expedientes</h3>
                 </div>
                 <div class="col-12 col-sm-6">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                         <li class="breadcrumb-item">Expedientes</li>
                     </ol>
                 </div>
             </div>
         </div>
     </div>
     <!-- Container-fluid starts-->
     <div class="container-fluid user-card">
         <!-- Zero Configuration  Starts-->
         <div class="col-sm-12">
             <div class="card">
                 <div class="card-header pb-0">
                 </div>
                 <div class=" card-body">
                    
                     <div class="table-container">
                        <div class="additional-scroll-container table-responsive"> 
                            <div  class="additional-content">
                            <!-- Contenido con scroll adicional -->
                            </div>
                        </div>
                         <div class=" table-responsive ">
                           
                             <table class="table table-padded dataTable no-footer " id="pf1">
                                 <thead>
                                     <tr>
                                         <th>Descripción</th>
                                         <th>Responsable</th>
                                         <th>NIC</th>
                                         <th>Fecha de Alta</th>
                                         <th>Situación</th>
                                         <th>Procedimiento</th>
                                         <th>Cliente</th>
                                         <th><i><img class="img-public" src="<?php echo base_url().'public/uploads/public_title.svg';  ?>" /></i></th>
                                         <th>Acciones</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $proceedings = $this->db->order_by('proceeding_id','DESC')->get_where('proceeding',array('status'=>1))->result_array(); 
                                  foreach($proceedings as $proceeding):
                                  ?>
                                     <tr>
                                         <td><?php echo $proceeding['description'];?></td>
                                         <td>
                                             <a href="<?php echo base_url();?>admin/proceedings_details/<?php echo base64_encode($proceeding['proceeding_id'])?>">
                                                 <div class="user-with-avatar">
                                                     <img alt="" src="<?php echo $this->account_model->get_photo('directory',$proceeding['manager_id']);?>">
                                                     <span><?php echo $this->account_model->getUserFullName('directory',$proceeding['manager_id'])?></span>
                                                 </div>
                                             </a>
                                         </td>
                                         <td><a href="<?php echo base_url();?>admin/proceedings_details/<?php echo base64_encode($proceeding['proceeding_id'])?>"><?php echo $proceeding['nic'];?> </a></td>
                                         <td><?php echo $proceeding['discharge_date'];?></td>
                                         <td><?php echo $this->crud_model->get_table_name('proceeding_clasification',$proceeding['proceeding_clasification_id']);?></td>
                                         <td><?php echo $this->crud_model->get_table_name('proceeding_clasification',$proceeding['proceeding_clasification_id']);?></td>
                                         <td>
                                             <a href="<?php echo base_url();?>admin/proceedings_details/<?php echo base64_encode($proceeding['proceeding_id'])?>">
                                                 <div class="user-with-avatar">
                                                     <img alt="" src="<?php echo $this->account_model->get_photo('directory',$proceeding['client_id']);?>">
                                                     <span><?php echo $this->account_model->getUserFullName('directory',$proceeding['client_id'])?></span>
                                                 </div>
                                             </a>
                                         </td>
                                         <td style="text-align: -webkit-center;">
                                             <?php if($proceeding['public'] == 1):?><i><img src="<?php echo base_url(); ?>public/uploads/public.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Público" /></i><?php endif;?>
                                             <?php if($proceeding['public'] == 0):?><i><img src="<?php echo base_url(); ?>public/uploads/confidential.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Confidencial" /></i> <?php endif;?>
                                         </td>
                                         <td style="white-space: nowrap;">
                                             <a class="btn btn-primary" href="<?php echo base_url();?>admin/proceedings_details/<?php echo base64_encode($proceeding['proceeding_id'])?>"><i class="fa fa-file-text"></i></a>
                                             <?php if( $this->crud_model->get_permission('folder_delete') == 1):?>
                                             <a class="btn btn-primary" href="javascript:void(0)" onclick="deleteProceeding('<?php echo $proceeding['proceeding_id']; ?>')"><i class="fa fa-trash"></i></a>
                                             <?php endif;?>
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
         <!-- Zero Configuration  Ends-->
     </div>
 </div>
 <script>
$datatable = $('#pf1').DataTable({
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
    initComplete: function() {
        $('#pf1_length').css({
            'display': 'flex'
        });
        $('#pf1_length').append(`
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left:10px !important;align-self: center;color:white">
                <i class="fa fa-filter"></i> 
            </button> 
            <div class="dropdown-menu p-4" aria-labelledby="filterDropdown" id="filters"></div>
        </div>`);
        this.api()
            .columns()
            .every(function() {
                var column = this;
                if (column.index() == 4 || column.index() == 5) {


                    var select = $('<div class="form-group"> <label for="select1">' + $(column.header()).html() + '</label><select class="filter_select" ><option value=""><b>seleccionar</b></option></select></div>')
                        .appendTo($('#filters'));

                    select.find('select').on('change', function() {

                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                        if (val != "") {
                            $(this).addClass('filtrando');
                        } else {
                            $(this).removeClass('filtrando');
                        }


                        column.search(val, true, false).draw();
                    });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {

                            select.find('select').append('<option value="' + d + '">' + d + '</option>');

                        });
                }


            });
    },
});

function getDetails(table, directory_id) {

    $('#loader_' + table).show();
    $.ajax({
        url: "<?php echo base_url().'admin/getDirectoryDetails/';?>",
        type: "POST",
        data: {
            table: table,
            directory_id: directory_id,
        },
        success: function(response) {

            $('#result').html(response).fadeIn(1000);

            //console.log(response);
        },
        complete: function() {
            $('table.show-case').DataTable();
        },

        error: function() {
            console.log("error");
        }
    });

}


$(document).ready(function() {
  // Obtiene los elementos relevantes

  topScroll('pf1');

});

function topScroll(elemet_id)
{
    $('.additional-scroll-container').css({
  "width": "100%",
  "height": "20px", /* ajusta la altura según tus necesidades */
  "overflow-x": "scroll",
  "margin-bottom": "10px" 
  });
  var whidthh=$('#'+elemet_id).width();

  $('.additional-content').width(whidthh);
  $('#'+elemet_id).before();

  var scrollable1 = $('.table-responsive');
  var scrollable2 = $('.additional-scroll-container');

  // Sincroniza el desplazamiento horizontal
  scrollable1.scroll(function() {
    console.log(scrollable1.scrollLeft());
    scrollable2.scrollLeft(scrollable1.scrollLeft());
  });

  scrollable2.scroll(function() {
    scrollable1.scrollLeft(scrollable2.scrollLeft());
  });

}
 </script>
 <!-- footer start-->