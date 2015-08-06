<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    <?php echo $car['year']." ".$car['make']." ".$car['model']." ".$car['serie'] ?>
                </h1>

                <hr />

                <div class="col-sm-12 center">
                    <ul class="status-bar">
                        <li class="<?php if ($car['transaction'] == 'purchased') { echo 'active';} ?>">
                            <span class="circle">1</span><br/>
                            Inventory
                        </li>
                        <li class="divider"></li>
                        <li class="<?php if ($car['transaction'] == 'sold') { echo 'active';} ?>">
                            <span class="circle">2</span><br/>
                            Sold
                        </li>
                        <li class="divider"></li>
                        <li class="<?php if ($car['transaction'] == 'in-transit') { echo 'active';} ?>">
                            <span class="circle">3</span><br/>
                            Transit
                        </li>
                        <li class="divider"></li>
                        <li class="<?php if ($car['transaction'] == 'delivered') { echo 'active';} ?>">
                            <span class="circle">4</span><br/>
                            Delivered
                        </li>
                    </ul>
                </div>

                <hr />

                <div class="col-sm-6">
                    <h2>Vehicle information</h2>
                    <p>
                        VIN: <?php echo $car['VIN'] ?><br/>
                        Mileage: <?php echo number_format($car['mileage'])." km" ?><br/>
                        Color: <?php echo $car['color'] ?><br/>
                        Estimated price: <strong><?php echo "$".number_format($car['estimated_price'], 2, '.', ',') ?></strong>
                    </p>
                    <p><em><?php echo $car['description'] ?></em></p>
                </div>

                <div class="col-sm-3">
                    <h2>Specs</h2>
                    <p>
                        Engine: <?php echo $car['engine'] ?><br/>
                        Transmission: <?php echo $car['transmission'] ?><br/>
                        Drivetrain: <?php echo $car['powertrain'] ?>
                    </p>
                </div>

                <div class="col-sm-3">
                    <h2>Features</h2>
                    <p>
                        Cruise control: <?php if ($car['cruise_control'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        A/C: <?php if ($car['ac'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        Sunroof: <?php if ($car['sunroof'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        Satellite radio: <?php if ($car['radio'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        Airbags: <?php if ($car['airbags'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                    </p>
                </div>

                <hr />

                <!--
                <div class="col-sm-12">
                    <h2>Pictures</h2>
                    <div class="well">

                    </div>
                </div>

                <hr />
                -->

                <div class="col-sm-6">
                    <h2>Supplier information</h2>
                    <?php
                        $supplier = $this->client_model->get($transactions[0]['client_id'])[0];
                    ?>
                    <p>
                        <strong><?php echo $supplier['name'] ?></strong><br/>
                        <?php echo $supplier['address'].", ".$supplier['country'] ?><br/>
                        <?php echo $supplier['phone'] ?>
                    </p>
                </div>

                <div class="col-sm-6">
                    <h2>Customer information</h2>
                    <?php if (count($transactions) > 1) : ?>
                    <?php
                        $client = $this->client_model->get(end($transactions)['client_id'])[0];
                    ?>
                    <p>
                        <strong><?php echo $client['name'] ?></strong><br/>
                        <?php echo $client['address'].", ".$supplier['country'] ?><br/>
                        <?php echo $client['phone'] ?>
                    </p>
                    <?php endif ?>
                </div>


                <?php if ($this->session->userdata('role') == "Manager" || $this->session->userdata('role') == "Salesman") { ?>
                <hr/>

                <div class="col-sm-12">
                    <h2>Detailed transactions</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>By</th>
                                <th>From/To</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transactions as $t): ?>
                            <?php
                                $emp = $this->employee_model->get($t['employee_id'])[0];
                                $cli = $this->client_model->get($t['client_id'])[0];
                            ?>
                            <tr>
                                <td><?php echo ucfirst($t['type']) ?></td>
                                <td><?php echo $emp['name'] ?></td>
                                <td><?php echo $cli['name'] ?></td>
                                <td><?php echo $t['date_added'] ?></td>
                                <td class="right">
                                    <a href="<?= site_url('transaction/delete') ?>/<?php echo $t['id'] ?>" class="delete-link">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->