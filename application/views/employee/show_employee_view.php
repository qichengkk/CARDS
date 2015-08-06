<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>

                <?php if($id_show == $this->session->userdata('employee_id')) {?>
                    <h1 class="">
                        My profile
                    </h1>
                <?php } else { ?>
                    <h1 class="">
                        <?php echo $name_show; ?> profile
                    </h1>
                <?php } ?>

                <hr>

                <img class='col-md-2 col-md-offset-1' src="<?php echo $image_url; ?>" alt="profile image" />

                <div class="col-md-9">


                    <form class="form">
                        <label class="control-label col-xs-3" for="name">Name:</label>
                        <div class="form-group col-xs-12">
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $name_show?>" >
                        </div>
                        <label class="control-label col-xs-3" for="email">Email:</label>
                        <div class="form-group col-xs-12">
                            <input type="email" class="form-control" name="email" readonly value="<?php echo $email_show?>" >
                        </div>
                        <label class="control-label col-xs-3" for="role">Role:</label>
                        <div class="form-group col-xs-12">
                            <input type="text" class="form-control" name="role" readonly value="<?php echo $role_show?>">
                        </div>
                        <label class="control-label col-xs-3" for="role">Date added:</label>
                        <div class="form-group col-xs-12">
                            <input type="text" class="form-control" name="role" readonly value="<?php echo $date_added_show?>">
                        </div>
                        <label class="control-label col-xs-4" for="role">Date modified:</label>
                        <div class="form-group col-xs-12">
                            <input type="text" class="form-control" name="role" readonly value="<?php echo $date_modified_show?>">
                        </div>

                        <div class="form-group col-xs-12">
                            <a href="<?=site_url('employee')?>" class="btn btn-link btn-lg">Back</a>
                        </div>
                    </form>
                </div>

        </div>
    </div>

</div><!-- end of page-content-wrapper -->



