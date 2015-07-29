<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>

    <!-- jQuery library -->
    <script src="<?=base_url()?>public/js/jquery.js"></script>
    <!-- Bootstrap library -->
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>

    <!-- Custom fonts library -->
    <link href='https://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css">

</head>

<body>

<!--    <!-- start wrapper -->-->
<!--    <div id='wrapper'>-->

    <!-- If use siderbar
    <div id='sidebar-wrapper'></div>
    -->

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid center">

            <ul class='nav navbar-nav navbar-left'>
                <li><a href='<?=base_url()?>home' class='brand'>CARDS</a></li>
            </ul>

            <ul class='nav navbar-nav navbar-right'>
                <li>
                    <a href='<?=base_url()?>employee/update/<?=$this->session->userdata('employee_id')?>'>
                        <span class='glyphicon glyphicon-user'></span> <?= $this->session->userdata('name');?>
                    </a>
                </li>
                <li>
                    <a href='<?=site_url('home/logout')?>'><span class='glyphicon glyphicon-log-out'></span> Logout </a>
                </li>
            </ul>

            <ul class='nav navbar-nav navbar-center'>
                <li><a href='<?=site_url('home')?>'><span class='glyphicon glyphicon-home'></span></a></li>
                <li><a href='../cars/index.html'>Cars</a></li>
                <?php if($this->session->userdata('role') == 'Manager' || $this->session->userdata('role') == 'Salesman') { ?>
                    <li><a href='<?=site_url('client')?>'>Clients</a></li>
                <?php } ?>

                <li><a href='../transactions/index.html'>Transactions</a></li>
                <li><a href='../reports/index.html'>Reports</a></li>
                <?php if($this->session->userdata('role') == 'Manager') { ?>
                    <li><a href='<?=site_url('employee')?>'>Employees</a></li>
                <?php } ?>

            </ul>

        </div><!-- /.container-fluid -->
    </nav>
    <!-- end -->