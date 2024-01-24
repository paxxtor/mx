<?php   $proforma_invoice = $this->db->get_where('invoice',array('invoice_id'=>$invoice_id))->row_array(); ?>

<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 style="  text-transform: uppercase;">Editar factura proforma</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Factura proforma</li>
                        <li class="breadcrumb-item active"> Editar factura proforma</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="email-wrap">
            <div class="row">
                <div class="col-xl-12 box-col-12 col-md-12 ">
                    <div class="email-right-aside">
                        <div class="card email-body">
                            <div class="email-profile">
                                <div class="email-body">
                                    <div class="email-compose">
                                        <div class="email-top compose-border">
                                            <div class="compose-header">
                                                <h4 class="mb-0">Editar factura </h4>

                                            </div>
                                        </div>
                                        <div class="email-wrapper" style="padding:20px 20%;">
                                            <form class="theme-form" action="<?php echo base_url(); ?>admin/provisions_invoice/edit/<?php echo $invoice_id; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="col-sm-12 col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Expedientes</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" name="proceeding_id">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('proceeding', array('proceeding_status'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['proceeding_id'] ?>" <?php echo $proforma_invoice['proceeding_id'] ==  $mg['proceeding_id'] ?" selected":""; ?>><?php echo $mg['code']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Cliente</label><span style="color:red">*</span>
                                                        <select class="form-select js-example-basic-single" required name="client_id">
                                                            <option value="">Seleccionar</option>
                                                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                                                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $proforma_invoice['client_id'] ==  $mg['directory_id'] ?" selected":""; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                                                            <?php endforeach;  ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Factura<span style="color:red">*</span></label>
                                                        <input class="form-control" required type="text" name="invoice" value="<?php echo $proforma_invoice['invoice']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de emisión</label><span style="color:red">*</span>
                                                        <input class="form-control" required type="date" name="date" value="<?php echo $proforma_invoice['date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de vencimiento</label><span style="color:red">*</span>
                                                        <input class="form-control" required type="date" name="expire_date" value="<?php echo $proforma_invoice['expire_date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de cobro</label>
                                                        <input class="form-control" type="date" name="invoice_date" value="<?php echo $proforma_invoice['invoice_date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Importe<span style="color:red">*</span></label>
                                                        <input class="form-control" required type="number" name="amount" value="<?php echo $proforma_invoice['amount']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <textarea class="form-control" cols="10" rows="2" name="description"><?php echo $proforma_invoice['description']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Observaciones</label>
                                                    <textarea class="form-control" cols="10" rows="2" name="observation"><?php echo $proforma_invoice['observation']; ?></textarea>
                                                </div>

                                                <div class="col-sm-12 col-md-12 mb-3">
                                                    <div class="form-check checkbox checkbox-solid-dark">
                                                        <input class="form-check-input" id="steps1" type="checkbox" name="status" value="<?php echo $proforma_invoice['status']; ?>" <?php echo $proforma_invoice['status'] ==  1 ? "checked":""; ?>>
                                                        <label class="form-check-label mb-0" for="steps1">Cobrado</label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-sm-12 col-md-12 mb-5">
                                                    <div class="action-wrapper">
                                                        <button class="btn btn-primary " style="float: right" type="submit"><i class="fa fa-file me-2"></i> Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
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
</div>
<script>

</script>