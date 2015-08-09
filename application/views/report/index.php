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
                            <a id="btn_sales_profit" type="button" onclick="show_sales_profit()" class="btn btn-default active">Sales & Profit</a>
                        <?php endif ?>

                        <?php if ($this->session->userdata('role') == 'Manager') : ?>
                            <a id="btn_employees" type="button" onclick="show_employees()" class="btn btn-default">Employees</a>
                            <a id="btn_clients" type="button" onclick="show_clients()" class="btn btn-default">Clients</a>
                        <?php endif ?>
                    </div>
                </div>

                <hr />
            </div>

            <!-- views for sales_profit -->
            <div id="sales_profit">
                <div class="col-md-6">
                    <h2>General information</h2>
                    <p>
                        Cars in inventory: <?php echo $car_inventory ?><br/>
                        Cars sold: <strong><?php echo $car_sold ?><br/></strong>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>Overall Profit</h2>
                    <p>
                        Overall profit: <strong><?php echo "$".number_format($overall_profit, 2, '.', ',') ?></strong>
                    </p>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h2>Sales by month</h2>

                    <ul class="bar-chart-h">

                        <!-- get max num -->
                        <?php $max_num = 0; foreach($sales as $sale):
                            if($sale['num'] > $max_num) {
                                $max_num = $sale['num'];
                            }?>
                        <?php endforeach ?>

                        <?php foreach($sales as $sale): ?>
                            <li>
                                <span class="bar" style="height: <?php echo $sale['num']/$max_num * 100?>%"><?php echo $sale['num']?></span>
                                <span class="title"><?php echo $sale['month']?></span>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="col-md-12">
                    <hr>
                    <h2>Profit by month</h2>

                    <ul class="bar-chart-v">

                        <!-- get max num -->
                        <?php /*$max_profit = 0; $min_profit = 0; foreach($profit as $p):
                            if($p['profit'] > $max_profit) {
                                $max_profit = $p['profit'];
                            }
                            if($p['profit'] < $min_profit) {
                                $min_profit = $p['profit'];
                            } */?><!--
                        <?php /*endforeach */?>

                        <?php /*foreach($profit as $p): */?>
                            <li>
                                <span class="title"><?php /*echo $p['month']*/?></span>
                                <span class="bars"><span class="bar" style="width: <?php /*echo ($p['profit'] - $min_profit)/($max_profit-$min_profit)*/?>"><?php /*echo $p['profit']*/?></span></span>
                            </li>
                        <?php /*endforeach */?> -->

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="center">Month</th>
                                <th class="center">Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($profit as $p): { ?>
                                    <tr>
                                    <td class="center"> <?php echo $p['month']?></td>
                                    <td class="center"> <?php echo "$".number_format($p['profit'], 2, '.', ',') ?></td>
                                    </tr>
                                <?php } endforeach ?>
                            </tbody>
                        </table>
                    </ul>
                </div>
            </div>

            <!-- views for employees -->
            <div id = "employees">
                wtf
            </div>

            <!-- views for clients -->
            <div id = "clients">
                wtf
            </div>

        </div>
    </div>

</div><!-- end of page-content-wrapper -->

<script>
    $(document).ready(function(){

        $('#sales_profit').show();
        $('#employees').hide();
        $('#clients').hide();

        /*$("#test").click(function(){
            $("#sales_profit").hide();
        });*/
    });

    var show_sales_profit = function() {

        $('#sales_profit').show();
        $('#employees').hide();
        $('#clients').hide();

        $("#btn_sales_profit").addClass("active");
        $('#btn_employees').removeClass("active");
        $('#btn_clients').removeClass("active");

    };

    var show_employees = function() {

        $('#sales_profit').hide();
        $('#employees').show();
        $('#clients').hide();

        $("#btn_sales_profit").removeClass("active");
        $('#btn_employees').addClass("active");
        $('#btn_clients').removeClass("active");

    };

    var show_clients = function() {

        $('#sales_profit').hide();
        $('#employees').hide();
        $('#clients').show();

        $("#btn_sales_profit").removeClass("active");
        $('#btn_employees').removeClass("active");
        $('#btn_clients').addClass("active");

    };

</script>