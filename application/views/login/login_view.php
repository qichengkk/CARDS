


<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>

            <div class='col-md-12'>

                <hr>

                <div id="login_form_error" class="alert alert-danger center"><!-- Dynamic --></div>

                <form id ="login_form" class="form-horizontal" role="form" method="post" action="<?=site_url("api/login")?>">
                    <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label col-sm-3 col-sm-offset-1" for="email">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 col-sm-offset-1" for="pwd">Password:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                        </div>
                    </div>
                    </div>

                    <div class="form-group col-md-1" style="padding: 30px;">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-lg btn-primary center-block">Login</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div><!-- end of page-content-wrapper -->


<script type="text/javascript">
    $(function() {

        $("#login_form_error").hide();

        $("#login_form").submit(function(event) {
            event.preventDefault();

            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {

                if(o.result == 1) {
                    window.location.href = '<?=site_url('home')?>';
                } else {

                    $("#login_form_error").show();
                    var output = '<ul>';
                    for(var key in o.error) {
                        var value = o.error[key];
                        output += '<li>' + value + '</li>';
                    }
                    output += '</ul>';
                    $("#login_form_error").html(output);
                }

            }, 'json');
        });

    });
</script>