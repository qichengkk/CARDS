<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    My profile
                </h1>

                <p>The following form can be used to create new employees as well.</p>

                <hr>

                <div id="register_form_error" class="alert alert-danger center"><!-- Dynamic --></div>

                <form id="register_form" class="form" method="post" action="<?=site_url('api/register')?>">
                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control" name="name" placeholder="John Smith">
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="email" class="form-control" name="email" placeholder="john.smith@johnsmithporsche.com">
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control" name="role" placeholder="Role">
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Submit">

                        <a href="<?=site_url('employee/index')?>" class="btn btn-link">Cancel</a>
                    </div>
                </form>


            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->

<script type="text/javascript">
    $(function() {

        $("#register_form_error").hide();

        $("#register_form").submit(function(event) {

            event.preventDefault();

            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {

                if(o.result == 1) {
                    window.location.href = '<?=site_url('employee/index')?>';
                } else {
                    $("#register_form_error").show();
                    var output = '<ul>';
                    for(var key in o.error) {
                        var value = o.error[key];
                        output += '<li>' + value + '</li>';
                    }
                    output += '</ul>';
                    $("#register_form_error").html(output);
                }

            }, 'json');
        });

    });
</script>



