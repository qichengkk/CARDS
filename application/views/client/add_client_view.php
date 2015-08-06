

<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Add new client
                </h1>

                <p>The following form can be used to create new clients.</p>

                <hr>

                <div id="add_client_form_error" class="alert alert-danger center"><!-- Dynamic --></div>

                <form id="add_client_form" class="form" method="post" action="<?=site_url('api/add_client')?>">

                    <legend>Basic info</legend>
                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control" name="client_name" placeholder="Name">
                    </div>

                    <!--type(showroom, auction, person, port)-->
                    <div class="form-group col-xs-6">
                        <select class="form-control" name="client_type">
                            <option>Select type...</option>
                            <option class="divider"></option>

                            <option value="auction">Auction</option>
                            <option value="person">Person</option>
                            <option value="port">Port</option>
                            <option value="showroom">Showroom</option>
                        </select>
                    </div>

                    <!-- Contact -->
                    <div class="form-group col-xs-6">
                        <input type="text" class="form-control" name="client_phone" placeholder="Phone">
                    </div>

                    <legend>Location</legend>

                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control" name="client_address" placeholder="Address">
                    </div>

                    <!-- City, Province -->
                    <!--<div class="form-group col-xs-8">
                        <input type="text" class="form-control" name="client_city" placeholder="City">
                    </div>

                    <div class="form-group col-xs-4">
                        <input type="text" class="form-control" name="client_state" placeholder="Province/State">
                    </div>-->

                    <!-- Postal Code/Zip, Country -->
                    <!--<div class="form-group col-xs-6">
                        <input type="text" class="form-control" name="client_postal" placeholder="Postal/Zip Code">
                    </div>-->

                    <div class="form-group col-xs-12">
                        <select class="form-control" name="client_country">
                            <option>Select country...</option>
                            <option class="divider"></option>

                            <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <legend></legend>
                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Add">

                        <a href="<?=site_url('client')?>" class="btn btn-link">Cancel</a>
                    </div>

                </form>


            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->

<script type="text/javascript">
    $(function() {

        $("#add_client_form_error").hide();

        $("#add_client_form").submit(function(event) {

            event.preventDefault();

            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {

                if(o.result == 1) {
                    window.location.href = '<?=site_url('client')?>';
                } else {
                    $("#add_client_form_error").show();
                    var output = '<ul>';
                    for(var key in o.error) {
                        var value = o.error[key];
                        output += '<li>' + value + '</li>';
                    }
                    output += '</ul>';
                    $("#add_client_form_error").html(output);
                }

            }, 'json');
        });

    });
</script>
