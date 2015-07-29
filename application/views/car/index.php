<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Cars
                    <!-- Link or button to add a new car -->
                    <?php if ($this->session->userdata('role') == "Salesman" || $this->session->userdata('role') == "Manager") { ?>
                    <a href="<?= site_url('car/add') ?>" class="btn btn-success float-right">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    <?php } ?>
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
                        <th></th>
                        <th><!-- Year, Make, Model, Series, Color, VIN, Description --></th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="make_table" >
                        <?php foreach ($cars as $car): ?>
                        <tr>
                            <td>
                                <a href="<?= site_url('car/show') ?>/<?php echo $car['VIN'] ?>">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                            </td>
                            <td>
                                <?php
                                // Get model information
                                $car_model = $this->model_model->get($car['model_id']);
                                $car_make = $this->make_model->get($car_model[0]['make_id']);

                                echo "<h4>";
                                echo $car['year']." ";
                                echo $car_make[0]['name']." ";
                                echo $car_model[0]['name']." ";
                                echo $car_model[0]['serie'];
                                echo " <span class='label label-info'>";
                                echo "In-inventory";
                                echo "</span>";
                                echo "</h4>";

                                echo "<p>";
                                echo "VIN: ".$car['VIN']." | ";
                                echo $car['color']." | ";
                                echo number_format($car['mileage'])." km";
                                echo "</p>";

                                echo "<p class='small'>";
                                echo $car['description'];
                                echo "</p>";
                                ?>
                            </td>
                            <td><h4><?php echo "$".number_format($car['estimated_price'], 2, '.', ',') ?></h4></td>
                            <td>
                                <!-- Action: sold, in-transit, delivered -->
                                <a href="#" class="btn btn-primary">Sold?</a>
                            </td>
                            <td class="right">
                                <a href="<?= site_url('car/update') ?>/<?php echo $car['VIN'] ?>">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a><br/>
                                <a href="<?= site_url('car/delete') ?>?VIN=<?php echo $car['VIN'] ?>" class="delete-link">
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