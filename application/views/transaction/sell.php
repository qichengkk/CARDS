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
                <form id="new_sell_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('transaction/sell') ?>/<?php echo $car['VIN']?>">

                    <!-- Client/Suplier information -->
                    <fieldset>
                        <legend>Customer information</legend>

                        <div id="fields-for-client-select" class="form-group col-xs-12">
                            <p>Select a customer from this list.</p>
                            
                            <select id="field-for-client-select" class="form-control" name="client_id" onchange='show_client_form()'>
                                <option>Select supplier...</option>

                                <?php foreach ($clients as $client) : ?>
                                <option value="<?php echo $client['CId'] ?>"><?php echo $client['name'] ?></option>
                                <?php endforeach ?>

                                <option value="X">Not in list</option>
                            </select>
                        </div>

                        <div id="fields-for-client">
                            <!-- Hidden by default. Visible when client is not in list. -->

                            <div class="form-group col-xs-8">
                                <input type="text" class="form-control" name="client_name" placeholder="Name">
                            </div>

                            <div class="form-group col-xs-4">
                                <select class="form-control" name="client_type">
                                    <option value="owner">Independant owner</option>
                                    <option value="deader">Dealer</option>
                                    <option value="auction">Auction</option>
                                    <option value="showroom">Showroom</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="form-group col-xs-12">
                                <input type="text" class="form-control" name="client_address" placeholder="123 Avenue, City, Province">
                            </div>

                            <!-- Contact -->
                            <div class="form-group col-xs-8">
                                <input type="text" class="form-control" name="client_phone" placeholder="Phone">
                            </div>

                            <!-- Country -->
                            <div class="form-group col-xs-4">
                                <select class="form-control" name="client_country">
                                    <?php foreach ($countries as $country) : ?>
                                    <option value="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Pricing information</legend>

                        <div class="form-group col-xs-6">
                            <label for="sell_price">Base price</label>
                            <input type="text" class="form-control" name="sell_price" placeholder="Price">
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="sell_price">Additional fees</label>
                            <input type="text" class="form-control" name="additional_fees" placeholder="Fees">
                        </div>  

                        <div class="form-group col-xs-12">
                            <label for="payment_method">Payment method</label>
                            <select class="form-control" name="payment_method">
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="wire">Wire transfer</option>
                            </select>
                        </div>
                    </fieldset>

                    <hr />

                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="<?= site_url('car') ?>" class="btn btn-link">Cancel</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->

<script>
$(document).ready(function(){

    // Hide client form
    // ----------------
    if ($('#field-for-client-select').val() == "Not in list") {
        $('#fields-for-client').show();
        $('fields-for-client-select').hide();
    } else {
        $('#fields-for-client').hide();
        $('fields-for-client-select').show();
    };

    // $('#fields-for-client').hide();
    $('#field-for-client-select').on('change', function() {
        if ($(this).val() == "X") {
            $('#fields-for-client').show();
            $('#fields-for-client-select').hide();
        };
    });
    // ----------------

});
</script>