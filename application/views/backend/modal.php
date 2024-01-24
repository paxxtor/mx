<script type="text/javascript">
function modalRequest(url) {
    jQuery('#modalLG').modal('hide');
    jQuery('#modal1 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>public/uploads/loading.gif" width="10%"/></div>');
    jQuery('#modal1').modal('show', {
        backdrop: 'true'
    });
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#modal1 .modal-body').html(response);

            $('input[type="date"]').attr('onfocus', 'this.showPicker()');

            $(".typehead").each(function() {

                table = $(this).data('table');
                field = $(this).attr('name');
                console.log($(this).attr('name'))

                $(this).attr('onclick', `openSelect('${table}',this.value,'${field}')`);
                $(this).attr('id', field + '_name');


                $(this).after(`
                    <table  id='${field}_search' class='table' style="width: 280px;"></table>
                    <div id="loader_${field}" class="spinner-border text-primary" style="display:none;" role="status"><span class="sr-only">Loading...</span></div>
                    <table  id='${field}_options' class='table' style="width: 280px;"></table>
                    `);


            });

        }
    });

}

function modalLgRequest(url) {
    jQuery('#modal1').modal('hide');
    jQuery('#modalLG .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>public/uploads/loading.gif" width="10%"/></div>');
    jQuery('#modalLG').modal('show', {
        backdrop: 'true'
    });
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#modalLG .modal-body').html(response);

            $('input[type="date"]').attr('onfocus', 'this.showPicker()');

            $(".typehead").each(function() {

                table = $(this).data('table');
                field = $(this).attr('name');
                console.log($(this).attr('name'))

                $(this).attr('onclick', `openSelect('${table}',this.value,'${field}')`);
                $(this).attr('id', field + '_name');


                $(this).after(`
                    <table  id='${field}_search' class='table' style="width: 280px;"></table>
                    <div id="loader_${field}" class="spinner-border text-primary" style="display:none;" role="status"><span class="sr-only">Loading...</span></div>
                    <table  id='${field}_options' class='table' style="width: 280px;"></table>
                    `);


            });

        },
        complete: function(response) {
            $(".select2").select2();
        }
    });

}
</script>


<div class="modal fade" tabindex="-1" id="modal1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <br>
            </div>
            <div class="modal-body">...</div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalLG" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                <br>
            </div>
            <div class="modal-body">...</div>
        </div>
    </div>
</div>