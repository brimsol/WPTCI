<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web Page Test | Analyzer</title>

        <!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
        <link href="<?php echo base_url('/assets/front'); ?>/css/bootstrap.min.css" rel="stylesheet">
        <!-- MAIN CSS (REQUIRED ALL PAGE)-->
        <link href="<?php echo base_url('/assets/front'); ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url('/assets/front'); ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('/assets/front'); ?>/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>




        <!--
        ===========================================================
        BEGIN PAGE
        ===========================================================
        -->
        <div class="wrapper">
            <!-- BEGIN TOP NAV -->
            <div class="top_navbar">


                <!-- Begin Logo brand -->
                <div class="logo">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url('/assets/front'); ?>/img/logo.gif" alt="Verbat Technologies"></a>
                </div><!--logo-->

                <div class="head_right">

                    <div class="logout">
                        <a href="<?php echo site_url('logout'); ?>"><i class="fa fa-power-off"></i></a>
                    </div>

                    <div class="user_name">
                        <strong><?php echo $this->session->userdata('user_name'); ?></strong>
                    </div>

                </div><!-- /.top-nav-content -->

            </div><!-- /.top-navbar -->
            <!-- END TOP NAV -->



            <!-- BEGIN TOP MAIN NAVIGATION -->
            <div class="">
                <nav class="navbar square navbar-default no-border" role="navigation">
                    <div class="container-fluid">

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="" id="top-main-navigation">

                            <ul class="nav navbar-nav">

                                <li class="dropdown active">
                                    <a href="<?php echo site_url(); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="visible-sm visible-md"><i class="fa fa-dashboard"></i></span>
                                        <span class="hidden-sm hidden-md">
                                            <span class="hidden-xs home_icon_nav"> <i class="fa fa-home"></i></span>Home
                                        </span>
                                    </a>
                                </li>

                            </ul>
                            
                            <div class="points_count">								  
                                <span class="label label-info span-sidebar"><?php echo $this->session->userdata('points'); ?> points remaining</span>
                            </div>

                        </div><!-- /.navbar-collapse -->

                    </div><!-- /.container-fluid -->
                </nav>
                <!-- End inverse navbar -->
            </div><!-- /.top-main-navigation -->
            <!-- END TOP MAIN NAVIGATION -->
            <!-- BEGIN PAGE CONTENT -->
            <div class="page-content no-left-sidebar">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-8 col-centered">
                            <?php echo $this->ci_alerts->display('success'); ?>
                            <?php echo $this->ci_alerts->display('error'); ?>
                            <?php echo $this->ci_alerts->display('warning'); ?>
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        </div>