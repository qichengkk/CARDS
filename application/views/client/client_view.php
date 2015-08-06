
<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Clients
                    <!-- Link or button to add a new car -->
                    <a href="<?=site_url('client/add')?>" class="btn btn-success float-right">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    <!-- end -->
                </h1>

                <p>This shows the list of clients and it is visible to managers and sales only!</p>

                <hr>

                <!-- Dynamic messages-->
                <div id="success" class="alert alert-success"></div>
                <div id="error" class="alert alert-danger"></div>
                <script>
                    $(function() {
                        $("#success").hide();
                        $("#error").hide();
                    });
                </script>


                <!-- client(id, name, type(showroom, auction, person, port), address, country, phone, date_added, date_modified)
                country(name, cut_off_year)-->


                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Cut_off_year</th>
                        <th>Phone</th>
                    </tr>
                    </thead>
                    <tbody id="client_table" >
                        <!-- Dynamic load from employee database, refer to client.js / load_employee -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->


<!-- Custom javascript -->
<script src="<?=base_url()?>public/js/home/template.js"> </script>
<script src="<?=base_url()?>public/js/home/event.js"> </script>
<script src="<?=base_url()?>public/js/home/result.js"> </script>
<script src="<?=base_url()?>public/js/home/client.js"> </script>

<script>
    $(function() {
        // init the employee application
        var client = new Client();
    });
</script>

