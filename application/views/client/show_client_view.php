<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    <a href="" onClick="history.go(-1);return true;" class="btn btn-success">
                        <span class="glyphicon glyphicon-step-backward">Return</span>
                    </a>
                    <?php echo $name ?>
                </h1>

                <hr />

                <div class="col-sm-4">
                    <h2>Basic information</h2>
                    <p>
                        Name: <?php echo $name ?><br/>
                        Type: <?php echo $type ?><br/>
                        Phone: <?php echo $phone ?><br/>
                    </p>
                </div>

                <div class="col-sm-5">
                    <h2>Location</h2>
                    <p>
                        Address: <?php echo $address ?><br/>
                    </p>
                </div>

                <div class="col-sm-3">
                    <h2>Specification</h2>
                    <p>
                        Country: <?php echo $country ?><br/>
                        Cut_off_year: <?php echo $cut_off_year ?><br/>
                    </p>
                </div>

                <hr />


                <div class="col-sm-12">
                    <h2>Related Vehicles</h2>

                    <table class="table">
                        <thead>
                        <tr>
                            <th class="center">Action</th>
                            <th class="center">Car VIN</th>
                            <th class="center">Car Information</th>
                            <th class="center">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cars as $car): { ?>
                            <tr>
                                <td class="center"> <?php echo $car['type']?></td>
                                <td class="center"> <?php echo $car['vin'] ?></td>
                                <td class="center"> <?php echo $car['year']." ".$car['make_name']." ".$car['name']." ".$car['serie'] ?></td>
                                <td class="center"> <?php echo $car['date_added'] ?></td>
                            </tr>
                        <?php } endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->