<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Cars
                    <!-- Link or button to add a new car -->
                    <?php if ($this->session->userdata('role') == "Salesman" || $this->session->userdata('role') == "Manager"): ?>
                    <a href="<?= site_url('car/add') ?>" class="btn btn-success float-right">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    <?php endif ?>
                    <!-- end -->
                </h1>

                <hr>

                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <?php if ($this->session->userdata('role') == 'Manager') : ?>
                        <a href="<?= site_url('car/') ?>" type="button" class="btn btn-default">All</a>
                    <?php endif ?>

                    <?php if ($this->session->userdata('role') == 'Manager' || $this->session->userdata('role') == 'Salesman') : ?>
                        <a href="<?= site_url('car/inventory') ?>" type="button" class="btn btn-default">Inventory</a>
                    <?php endif ?>

                        <a href="<?= site_url('car/sold') ?>" type="button" class="btn btn-default active">
                            <?php
                                if ($this->session->userdata('role') == 'Driver') {
                                    echo 'For Delivery';
                                } else {
                                    echo 'Sold';
                                }
                            ?>
                        </a>

                    <?php if ($this->session->userdata('role') == 'Driver') : ?>
                        <a href="<?= site_url('car/delivered') ?>" type="button" class="btn btn-default">Delivered</a>
                    <?php endif ?>
                    </div>
                </div>

                <hr class="borderless">

                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><!-- Year, Make, Model, Series, Color, VIN, Description --></th>
                        <th class="center">Type</th>
                        <th class="center">Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="make_table" >
                        <?php foreach ($cars as $car) {
                            if ($car['transaction'] == 'delivered' AND $this->session->userdata('role') == 'Driver') {
                                // Do nothing...
                            } else {
                                $d['car'] = $car;
                                $this->load->view('car/_car', $d);
                            }
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->