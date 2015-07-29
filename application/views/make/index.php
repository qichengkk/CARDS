<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Make
                    <!-- Link or button to add a new make -->
                    <a href="<?= site_url('make/add') ?>" class="btn btn-success float-right">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    <!-- end -->
                </h1>

                <hr>

                <!-- Dynamic messages -->
                <div id="success" class="alert alert-success"></div>
                <div id="error" class="alert alert-danger"></div>
                <script>
                    $(function() {
                        $("#success").hide();
                        $("#error").hide();
                    });
                </script>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="make_table" >
                        <?php foreach ($make as $make_item): ?>
                        <tr>
                            <td><?php echo $make_item['id'] ?></td>
                            <td><?php echo $make_item['name'] ?></td>
                            <td>
                                <a href="<?= site_url('make/delete') ?>?id=<?php echo $make_item['id'] ?>">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->