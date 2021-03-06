<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Add an Employee
                </h1>

                <p>The following form can be used to create new employees.</p>

                <hr>

                <div id="register_form_error" class="alert alert-danger center"><!-- Dynamic --></div>

                <form id="register_form" class="form" method="post" action="<?=site_url('api/register')?>">
                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                    </div>

                    <div class="form-group col-xs-12">
                        <select class="form-control" name="role">
                            <option>Select role...</option>
                            <option class="divider"></option>

                            <option value="Manager">Manager</option>
                            <option value="Salesman">Salesman</option>
                            <option value="Driver">Driver</option>
                        </select>
                    </div>

                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Add">

                        <a href="<?=site_url('employee')?>" class="btn btn-link">Cancel</a>
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
                    window.location.href = '<?=site_url('employee')?>';
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



