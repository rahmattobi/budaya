<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultura.id | Budaya Indonesia</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>logo.png" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img style="width: 180px; height: 60px;" src="<?= base_url('assets/') ?>logo.png" alt="" srcset="">
                </div>
    <div class="sidebar-menu">
        <ul class="menu">      
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item active ">
                    <a href="<?php echo site_url('c_admin') ?>" class='sidebar-link'>
                        <i data-feather="c_admin" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo site_url('c_admin/input_provinsi') ?>" class='sidebar-link'>
                        <i data-feather="c_admin" width="20"></i> 
                        <span>Provinsi</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo site_url('c_admin/baju_adat') ?>" class='sidebar-link'>
                        <i data-feather="c_admin" width="20"></i> 
                        <span>Baju Adat</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo site_url('c_admin/tarian_daerah') ?>" class='sidebar-link'>
                        <i data-feather="c_admin" width="20"></i> 
                        <span>Tarian Adat</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url() ?>c_admin/makanan_daerah" class="sidebar-link">
                        <i data-feather="c_admin" width="20"></i>
                        <span>Makanan Daerah</span>
                    </a>
                </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i>X</button>
</div>
        </div>



<!-- main menu          -->

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success mr-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon mr-2">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="<?= base_url('assets/') ?>images/default.jpg" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">hy, <?php echo  $this->session->userdata('nama'); ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url() ?>c_login/logout"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
 