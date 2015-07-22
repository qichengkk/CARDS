<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap library -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom fonts library -->
    <link href='http://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css">

    <!-- Custom javascript -->
    <script src="<?=base_url()?>public/js/home/template.js"> </script>
    <script src="<?=base_url()?>public/js/home/home.js"> </script>
    <script src="<?=base_url()?>public/js/home/event.js"> </script>
    <script src="<?=base_url()?>public/js/home/result.js"> </script>

    <script>
        $(function() {
            // init the hoome application
            var home = new Home();
        });
    </script>

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
                    <a href='../users/edit.html'>
                        <span class='glyphicon glyphicon-user'></span> John Smith
                    </a>
                </li>
                <li>
                    <a href='<?=site_url('home/logout')?>'><span class='glyphicon glyphicon-log-out'></span> Logout </a>
                </li>
            </ul>

            <ul class='nav navbar-nav navbar-center'>
                <li><a href='<?=site_url('home')?>'><span class='glyphicon glyphicon-home'></span></a></li>
                <li><a href='../cars/index.html'>Cars</a></li>
                <li><a href='../reports/index.html'>Reports</a></li>
                <li><a href='<?=site_url('employee')?>'>Employees</a></li>
            </ul>

        </div><!-- /.container-fluid -->
    </nav>
    <!-- end -->