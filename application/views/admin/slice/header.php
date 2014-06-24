<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if (isset($title) && $title != '') {
    echo $title;
} else {
    echo "Web Page Test| Admin";
} ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('/assets/admin/'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <style>
            @font-face {
                font-family: 'FontAwesome';
                src: url('<?php echo base_url('/assets/admin/'); ?>/fonts/fontawesome-webfont.eot?v=4.0.3');
                src: url('<?php echo base_url('/assets/admin/'); ?>/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('<?php echo base_url('/assets/admin/'); ?>/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('<?php echo base_url('/assets/admin/'); ?>/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('<?php echo base_url('/assets/admin/'); ?>/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
                font-weight: normal;
                font-style: normal;
            }
        </style>
        <!-- daterange picker -->
        <link href="<?php echo base_url('/assets/admin/'); ?>/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('/assets/admin/'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('/assets/admin/'); ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('/assets/admin/'); ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!--Data Table-->
        <link href="<?php echo base_url('/assets/admin/'); ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Web Page Test
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">


                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this -> session -> userdata('user_name');?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                                         
                                <!-- Menu Footer-->
                                <li>
                                  
                                        <a href="<?php echo site_url('admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                               
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/customers'); ?>">
                                <i class="fa fa-user"></i> <span>Customers</span> 
                            </a>
                        </li>
                        
                         <li>
                            <a href="<?php echo site_url(); ?>">
                                <i class="fa fa-rocket"></i> <span>Back to Site</span> 
                            </a>
                        </li>
                         <!--
                           <li>
                            <a href="<?php echo site_url('admin/works'); ?>">
                                <i class="fa fa-rocket"></i> <span>All Works</span> 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/reports'); ?>">
                                <i class="fa fa-tasks"></i> <span>Reports</span> 
                            </a>
                        </li>
                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                                <li><a href="../charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a href="../charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                            </ul>
                        </li>-->

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php
                        if (isset($title) && $title != '') {
                            echo $title;
                        } else {
                            ?>
                            Welcome to dashboard,
                            <small>it all starts here</small>
<?php } ?>
                    </h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li>
                    </ol>-->
                </section>


                <!-- Main content -->
                <section class="content">
<?php echo $this->ci_alerts->display('success'); ?>
<?php echo $this->ci_alerts->display('error'); ?>
<?php echo $this->ci_alerts->display('warning'); ?>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>