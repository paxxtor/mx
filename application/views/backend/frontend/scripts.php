<script src="<?php echo base_url();?>public/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/icons/feather-icon/feather-icon.js"></script>
<script src="<?php echo base_url();?>public/assets/js/sidebar-menu.js"></script>
<script src="<?php echo base_url();?>public/assets/js/scrollbar/simplebar.js"></script>
<script src="<?php echo base_url();?>public//assets/js/scrollbar/custom.js"></script>
<script src="<?php echo base_url();?>public/assets/js/config.js"></script>

<script src="<?php echo base_url();?>public/assets/js/chart/chartjs/chart.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/chartist/chartist.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="<?php echo base_url();?>public/assets/js/prism/prism.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/counter/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/counter/jquery.counterup.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/counter/counter-custom.js"></script>
<script src="<?php echo base_url();?>public/assets/js/owlcarousel/owl.carousel.js"></script>
<script src="<?php echo base_url();?>public/assets/js/owlcarousel/owl-custom.js"></script>
<?php if($page_name == "dashboard"):?>
<script src="<?php echo base_url();?>public/assets/js/dashboard/dashboard_2.js"></script>
<script src="<?php echo base_url();?>public/assets/js/tooltip-init.js"></script>
<?php endif;?>
<script src="<?php echo base_url();?>public/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/datatable/datatables/datatable.custom.js"></script>

<?php if($page_name == "calendar"):?>
<script src="<?php echo base_url();?>public/assets/js/calendar/tui-code-snippet.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/tui-time-picker.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/tui-date-picker.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/moment.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/chance.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/tui-calendar.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/calendars.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/schedules.js"></script>
<script src="<?php echo base_url();?>public/assets/js/calendar/app.js"></script>

<?php endif;?>

<script src="<?php echo base_url();?>public/assets/js/typeahead/typeahead.bundle.js"></script>

<script src="<?php echo base_url();?>public/assets/js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 5000
});
<?php if ($this->session->flashdata('success_message') != ""):?>
Toast.fire({
    icon: 'success',
    title: '<?php echo $this->session->flashdata("success_message");?>'
})
<?php endif;?>
<?php if ($this->session->flashdata('error_message') != ""):?>
Toast.fire({
    icon: 'error',
    title: '<?php echo $this->session->flashdata("error_message");?>'
})
<?php endif;?>
</script>

<script type="text/javascript">
localStorage.clear();

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

$(document).ready(function() {
    $(".defaul-show-toast").toast('show');
});
</script>
<script>
$(function() {
    $(".typehead").each(function() {

        table = $(this).data('table');
        $(this).attr('onclick', `openSelect('${table}',this.value)`);
        $(this).attr('name', table + '_name');
        $(this).attr('id', table + '_name');


        $(this).after(`
                        <table  id='${table}_search' class='table' style="width: 280px;"></table>
                        <div id="loader_${table}" class="spinner-border text-primary" style="display:none;" role="status"><span class="sr-only">Loading...</span></div>
                        <table  id='${table}_options' class='table' style="width: 280px;"></table>
                        `);


    });
});

function openSelect(table, value) {

    $('#loader_' + table).show();
    $.ajax({
        url: "<?php echo base_url().'admin/openSelect/';?>",
        type: "POST",
        data: {
            table: table,
            name: value,
        },
        success: function(response) {

            $('#loader_' + table).hide();
            $('#' + table + '_name').html('');
            $('#' + table + '_search').html(response);
            $('#' + table + '_new').focus();
            //console.log(response);
        },
        error: function() {
            console.log("error");
        }
    });

}

function getValues(table, value) {

    $('#loader_' + table).show();
    $.ajax({
        url: "<?php echo base_url().'admin/getValues/';?>",
        type: "POST",
        data: {
            table: table,
            name: value,
        },
        success: function(response) {

            $('#loader_' + table).hide();
            $('#' + table + '_options').html(response);
            //console.log(response);
        },
        error: function() {
            console.log("error");
        }
    });

}


function selectValue(table, id, name) {

    if (table != "") {
        $('#' + table + '_search').html('');
        $('#' + table + '_options').html('');
        $('#' + table + '_name').append(`<option value="${id}" selected>${name}</option>`);
    }
}

function addValue(table) {

    value = $('#' + table + '_new').val();
    if (value != "") {
        $('#loader_' + table).show();
        $.ajax({
            url: "<?php echo base_url().'admin/addValue/';?>",
            type: "POST",
            data: {
                table: table,
                name: value,
            },
            success: function(response) {
                $('#loader_' + table).hide();
                $('#' + table + '_search').html('');
                $('#' + table + '_options').html('');
                $('#' + table + '_name').append(`<option value="${response}" selected>${value}</option>`);
                //console.log(response);
            },
            error: function() {
                console.log("error");
            }
        });
    }
}

function deleteValue(table, element) {

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

            console.log($(element).data('id'));
            if (table != "") {

                $.ajax({
                    url: "<?php echo base_url().'admin/deleteValue/';?>",
                    type: "POST",
                    data: {
                        table: table,
                        id: $(element).data('id'),

                    },
                    success: function(response) {
                        element.parentElement.remove();
                        element.remove();

                        //console.log(response);
                    },
                    error: function() {
                        console.log("error");
                    }
                });
            }

        }
    })


}
</script>