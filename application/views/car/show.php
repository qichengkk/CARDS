<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    <?php echo $car['year']." ".$make['name']." ".$model['name']." ".$model['serie'] ?>
                </h1>

                <hr />

                <div class="col-sm-12 center">
                    <ul class="status-bar">
                        <li class="active">
                            <span class="circle">1</span><br/>
                            Inventory
                        </li>
                        <li class="divider"></li>
                        <li>
                            <span class="circle">2</span><br/>
                            Sold
                        </li>
                        <li class="divider"></li>
                        <li>
                            <span class="circle">3</span><br/>
                            Transit
                        </li>
                        <li class="divider"></li>
                        <li>
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
                        Engine: <?php echo $feature['engine'] ?><br/>
                        Transmission: <?php echo $feature['transmission'] ?><br/>
                        Drivetrain: <?php echo $feature['powertrain'] ?>
                    </p>
                </div>

                <div class="col-sm-3">
                    <h2>Features</h2>
                    <p>
                        Cruise control: <?php if ($feature['cruise_control'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        A/C: <?php if ($feature['air_conditioner'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        Sunroof: <?php if ($feature['sunroof'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        Satellite radio: <?php if ($feature['satellite_radio'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                        Airbags: <?php if ($feature['airbags'] == 0) { echo "No"; } else { echo "Yes"; } ?><br/>
                    </p>
                </div>

                <hr />

                <div class="col-sm-12">
                    <h2>Pictures</h2>
                    <div class="well">

                    </div>
                </div>

                <?php if ($this->session->userdata('role') == "Salesman" || $this->session->userdata('role') == "Manager") { ?>
                <hr />

                <div class="col-sm-6">
                    <h2>Supplier information</h2>
                    <p>
                        Name: <br/>
                        Address: <br/>
                        Phone:
                    </p>
                </div>

                <div class="col-sm-6">
                    <h2>Customer information</h2>
                    <p>
                        Name: <br/>
                        Address: <br/>
                        Phone:
                    </p>
                </div>

                <hr/>

                <div class="col-sm-12">
                    <h2>Detailed transactions</h2>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->