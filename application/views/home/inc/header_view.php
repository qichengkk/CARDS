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
                <li class="hidden-xs"><a href='<?=base_url()?>home' class='brand'>CARDS</a></li>
                <li class="visible-xs dropdown">
                    <a href='<?=base_url()?>home' class='brand dropdown-toggle' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="icon">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                        CARDS
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href='<?=site_url('home')?>'>Home</a></li>
                        <li><a href='<?=site_url('car')?>'>Cars</a></li>
                        <li><a href='<?=site_url('client')?>'>Clients</a></li>
                        <li><a href='../transactions/index.html'>Transactions</a></li>
                        <li><a href='../reports/index.html'>Reports</a></li>
                        <?php if($this->session->userdata('role') == 'Manager') { ?>
                            <li><a href='<?=site_url('employee')?>'>Employees</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>

            <ul class='nav navbar-nav navbar-right'>
                <li>
                    <a href='<?=base_url()?>employee/update/<?=$this->session->userdata('employee_id')?>'>
                        <span class='glyphicon glyphicon-user'></span>
                        <span class="hidden-xs"><?= $this->session->userdata('name');?></span>
                    </a>
                </li>
                <li>
                    <a href='<?=site_url('home/logout')?>'>
                        <span class='glyphicon glyphicon-off'></span>
                        <span class="hidden-xs">Log out</span>
                    </a>
                </li>
            </ul>

            <ul class='nav navbar-nav navbar-center hidden-xs'>
                <li><a href='<?=site_url('home')?>'><span class='glyphicon glyphicon-home'></span></a></li>
                <li><a href='<?=site_url('car')?>'>Cars</a></li>
                <li><a href='<?=site_url('transaction')?>'>Transactions</a></li>
                <li><a href='<?=site_url('report')?>'>Reports</a></li>
                <?php if($this->session->userdata('role') == 'Manager') { ?>
                <li>
                    <a href='#' class='dropdown-toggle' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        more <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href='<?=site_url('employee')?>'>Employees</a></li>
                        <li><a href='<?=site_url('client')?>'>Client & Supplier</a></li>
                        <li class="divider"></li>
                        <li><a href='<?=site_url('make')?>'>Vehicle make</a></li>
                        <li><a href='<?=site_url('model')?>'>Vehicle model</a></li>
                    </ul>
                </li>
                <?php } ?>

            </ul>

        </div><!-- /.container-fluid -->
    </nav>
    <!-- end -->