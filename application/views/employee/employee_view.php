
<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Employees
                    <!-- Link or button to add a new car -->
                    <a href="<?=site_url('employee/add')?>" class="btn btn-success float-right">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    <!-- end -->
                </h1>

                <p>This shows the list of employees and it should be visible by managers only!</p>

                <hr>

                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="employee_table" >
                        <!-- Dynamic load from employee database, refer to home.js / load_employee -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->