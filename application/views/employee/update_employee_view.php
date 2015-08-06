<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>

                <?php if($id_update == $this->session->userdata('employee_id')) {?>
                    <h1 class="">
                        Update My profile
                    </h1>
                <?php } else { ?>
                    <h1 class="">
                        Update <?php echo $name_update ?> profile
                    </h1>
                <?php } ?>


                <p>Note: you can not update email. If you have to, please contact bjc55311@encs.concordia.ca. </p>

                <hr>

                <img class='col-md-2 col-md-offset-1' src="<?php echo $image_url; ?>" alt="profile image" />

                <div class="col-md-9">

                <div id="update_form_error" class="alert alert-danger center"><!-- Dynamic --></div>

                <form id="update_form" class="form" method="post" action="<?=site_url('api/update_employee/'.$id_update)?>">

                    <div class="form-group col-xs-12">
                        <label class="control-label" for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name_update?>">
                    </div>

                    <div class="form-group col-xs-12">
                        <label class="control-label" for="email">Email:</label>
                        <input type="email" class="form-control" name="email" readonly value=<?php echo $email_update?>>
                    </div>

                    <div class="form-group col-xs-12">
                        <label class="control-label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Leave blank if no changes">
                    </div>

                    <div class="form-group col-xs-12">
                        <label class="control-label" for="role">Role:</label>
                        <?php if($this->session->userdata('role') == "Manager") {?>
                            <select class="form-control" name="role">
                                <option>Select role...</option>
                                <option class="divider"></option>

                                <option value="Manager" <?php if($role_update == "Manager") echo "selected"; ?>>Manager</option>
                                <option value="Salesman" <?php if($role_update == "Salesman") echo "selected"; ?>>Salesman</option>
                                <option value="Driver" <?php if($role_update == "Driver") echo "selected"; ?>>Driver</option>
                            </select>
                        <?php } else { ?>
                            <input type="text" class="form-control" name="role" readonly value=<?php echo $role_update?>>
                        <?php } ?>

                    </div>

                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Update">

                        <a href="<?=site_url('employee')?>" class="btn btn-link">Cancel</a>
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
                    window.location.href = '<?=site_url('employee')?>';
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



