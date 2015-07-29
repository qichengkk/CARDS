<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Car models
                    <!-- Link or button to add a new model -->
                    <a href="<?= site_url('model/add') ?>" class="btn btn-success float-right">
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
                        <th>Make</th>
                        <th>Model</th>
                        <th>Serie</th>
                        <th>type</th>
                        <th>From Year</th>
                        <th>To Year</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="make_table" >
                        <?php foreach ($model as $model_item): ?>
                        <tr>
                            <td><?php echo $model_item['id'] ?></td>
                            <td>
                                <?php
                                $make = $this->make_model->get($model_item['make_id']);
                                echo $make[0]['name'];
                                ?>
                            </td>
                            <td><?php echo $model_item['name'] ?></td>
                            <td><?php echo $model_item['serie'] ?></td>
                            <td><?php echo $model_item['type'] ?></td>
                            <td><?php echo $model_item['from_year'] ?></td>
                            <td><?php echo $model_item['to_year'] ?></td>
                            <td class="right">
                                <?php if (!empty($model_item['image'])) { ?>
                                <a href="./uploads/model/<?php echo $model_item['image'] ?>" target="blank">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                                <?php } ?>
                                <a href="<?= site_url('model/update') ?>/<?php echo $model_item['id'] ?>">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="<?= site_url('model/delete') ?>?id=<?php echo $model_item['id'] ?>" class="delete-link">
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

<script>
/*
$(document).ready(function(){

    // Delete with AJAX
    $(".delete-link").click(function(e){
        e.preventDefault;
        $(this).parent().parent().hide();
    });
});
*/
</script>