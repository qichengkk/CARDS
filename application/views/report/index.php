<div id='page-content-wrapper'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <h1 class="">
                    Reports
                </h1>

                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <?php if ($this->session->userdata('role') == 'Manager' || $this->session->userdata('role') == 'Salesman') : ?>
                            <a href="<?= site_url('report/sales_profit') ?>" type="button" class="btn btn-default active">Sales & Profit</a>
                        <?php endif ?>

                        <?php if ($this->session->userdata('role') == 'Manager') : ?>
                            <a href="<?= site_url('report/employee_performance') ?>" type="button" class="btn btn-default">Employee performance</a>
                        <?php endif ?>

                        <!--<a href="<?/*= site_url('report/client') */?>" type="button" class="btn btn-default">Client</a>-->

                    </div>
                </div>

                <hr />
            </div>

            <div class="col-md-12">
                <h2>Sales per month</h2>

                <ul class="bar-chart-h">
                    <?php foreach($sales as $sale): ?>
                        <li>
                            <span class="bar" style="height: <?php echo $sale['num']/$max_num * 100?>%"><?php echo $sale['num']?></span>
                            <span class="title"><?php echo $sale['month']?></span>
                        </li>
                    <?php endforeach ?>

                </ul>

            </div>

            <div class="col-md-12">
                <h2>Profit per month</h2>

                <ul class="bar-chart-v">

                    <?php foreach($profit as $p): ?>
                        <li>
                            <span class="title"><?php echo $p['month']?></span>
                            <span class="bar" style="width: 10%"><?php echo $p['profit']?></span>
                        </li>
                    <?php endforeach ?>

                </ul>

            </div>
        </div>
    </div>

</div><!-- end of page-content-wrapper -->