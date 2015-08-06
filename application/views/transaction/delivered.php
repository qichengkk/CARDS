<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    <?php echo $car['year']." ".$car['make']." ".$car['model']." ".$car['serie'] ?>
                </h1>

                <hr />

                <!-- div id="new_make_form_error" class="alert alert-danger center" --><!-- Dynamic --><!-- /div -->
                <?php echo validation_errors(); ?>

                <!-- form id="new_model_form" class="form" method="post" accept-charset="utf-8" action="add" enctype="multipart/form-data" -->
                <?php echo form_open_multipart('transaction/attach_proof_of_delivery/'.$transaction_id, ['class' => 'form']);?>

                    <legend>Attach proof of delivery</legend>

                    <div class="form-group col-xs-12">
                        <input type="file" class="form-control" name="userfile">
                    </div>

                    <hr/>

                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Attach">
                        <a href="<?= site_url('home') ?>" class="btn btn-link">Skipl</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->