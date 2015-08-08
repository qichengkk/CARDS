<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>

            <h1>Update Client: <small><?php echo $name_update?></small></h1>
            <hr>

            <div class="col-md-12">

                <div id="update_form_error" class="alert alert-danger center"><!-- Dynamic --></div>

                <form id="update_form" class="form" method="post" action="<?=site_url('api/update_client/'.$id_update)?>">
                    <legend>Basic info</legend>

                    <div class="form-group col-xs-12">
                        <label class="control-label" for="name">Name:</label>
                        <input type="text" class="form-control" name="client_name" value="<?php echo $name_update?>">
                    </div>

                    <!--type(showroom, auction, person, port)-->
                    <div class="form-group col-xs-6">
                        <label class="control-label" for="type">Type:</label>
                        <select class="form-control" name="client_type">
                            <option selected disabled>Select type...</option>

                            <option value="Owner" <?php if ($type_update == "Owner") echo "selected"; ?>>Owner</option>
                            <option value="Dealer" <?php if ($type_update == "Dealer") echo "selected"; ?>>Dealer</option>
                            <option value="Auction" <?php if ($type_update == "Auction") echo "selected"; ?>>Auction</option>
                            <option value="Showroom" <?php if ($type_update == "Showroom") echo "selected"; ?>>Showroom</option>

                        </select>
                    </div>

                    <!-- Contact -->
                    <div class="form-group col-xs-6">
                        <label class="control-label" for="phone">Phone:</label>
                        <input type="text" class="form-control" name="client_phone" value="<?php echo $phone_update?>">
                    </div>

                    <legend>Location</legend>

                    <div class="form-group col-xs-12">
                        <label class="control-label" for="address">Address:</label>
                        <input type="text" class="form-control" name="client_address" value="<?php echo $address_update?>">
                    </div>

                    <div class="form-group col-xs-12">
                        <label class="control-label" for="country">Country:</label>
                        <select class="form-control" name="client_country">
                            <option selected disabled>Select country...</option>

                            <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['name'] ?>"
                                    <?php if($country_update == $country['name']) echo "selected"; ?>><?php echo $country['name'] ?>
                                </option>
                            <?php endforeach ?>

                        </select>
                    </div>

                    <legend></legend>



                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Update">

                        <a href="<?=site_url('client')?>" class="btn btn-link">Cancel</a>
                    </div>
                </form>
            </div>


        </div>
    </div>

</div><!-- end of page-content-wrapper -->

<script type="text/javascript">
    $(function() {

        $("#update_form_error").hide();

        $("#update_form").submit(function(event) {

            event.preventDefault();

            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {

                if(o.result == 1) {
                    window.location.href = '<?=site_url('client')?>';
                } else {
                    $("#update_form_error").show();
                    var output = '<ul>';
                    for(var key in o.error) {
                        var value = o.error[key];
                        output += '<li>' + value + '</li>';
                    }
                    output += '</ul>';
                    $("#update_form_error").html(output);
                }

            }, 'json');
        });

    });
</script>



