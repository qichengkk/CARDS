
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
                        <tbody>
                        <!-- An example of how we can show employees -->
                        <tr>
                            <td><span class="glyphicon glyphicon-user"></span></td>
                            <td>E0938340</td>
                            <td>John Smith</td>
                            <td>john.smith@johnsmitporsche.com</td>
                            <td>Manager</td>
                            <td>
                                <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <!-- ... -->
                        <tr>
                            <td><span class="glyphicon glyphicon-user"></span></td>
                            <td>E09312340</td>
                            <td>Gagan Singh</td>
                            <td>gagan@johnsmitporsche.com</td>
                            <td>Sales</td>
                            <td>
                                <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <!-- ... -->
                        <tr>
                            <td><span class="glyphicon glyphicon-user"></span></td>
                            <td>E045740</td>
                            <td>Lee Ho</td>
                            <td>lee@johnsmitporsche.com</td>
                            <td>Driver</td>
                            <td>
                                <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <!-- ... -->
                        <tr>
                            <td><span class="glyphicon glyphicon-user"></span></td>
                            <td>E0932240</td>
                            <td>Amritpal</td>
                            <td>Amrit@johnsmitporsche.com</td>
                            <td>Driver</td>
                            <td>
                                <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <!-- ... -->
                        <tr>
                            <td><span class="glyphicon glyphicon-user"></span></td>
                            <td>E0938355</td>
                            <td>Qicheng Lao</td>
                            <td>lao@johnsmitporsche.com</td>
                            <td>Manager</td>
                            <td>
                                <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <!-- ... -->
                        <tr>
                            <td><span class="glyphicon glyphicon-user"></span></td>
                            <td>E1238340</td>
                            <td>Dagoberto Ramirez</td>
                            <td>dago@johnsmitporsche.com</td>
                            <td>Sales</td>
                            <td>
                                <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <!-- ... -->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div><!-- end of page-content-wrapper -->