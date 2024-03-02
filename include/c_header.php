<?php

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>img/icon.svg">
    <meta name="author" content="Bookitfast">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title><?php if (isset($title)) {
                echo $title;
            } ?>|| Bookitfast</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--CSS============================================= -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/linearicons.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/css/boots.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/jquery-ui.css">
    <!-- <link rel="stylesheet" href="css/nice-select.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/owl.carousel.css">
    <link href="<?php echo BASE_URL; ?>admin/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <img src="<?php echo BASE_URL; ?>img/logo.svg" alt="" title="" height="35px" />
                </a>

                <ul class="sidebar-nav">
                    <!-- master admin -->
                    <?php
                    if ($adminloggedin && $adminmaster) {
                        echo '<li class="sidebar-header">Master Admin</li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/index.php">
                                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/users.php">
                                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/airlines.php">
                                    <i class="align-middle" data-feather="send"></i> <span class="align-middle">Airlines</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/hotels.php">
                                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Hotels</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/admins.php">
                                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Admins</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/blogs.php">
                                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Blog</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/transactions.php">
                                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Transaction</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/e-contacts.php">
                                    <i class="align-middle" data-feather="alert-circle"></i> <span class="align-middle">E-Contacts</span>
                                </a>
                            </li>
                            
                            ';
                    }
                    else if ($adminloggedin && $adminairline) {
                        echo '<li class="sidebar-header">Airline Admin</li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/index.php">
                                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/flights.php">
                                    <i class="align-middle" data-feather="send"></i> <span class="align-middle">Flights</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/flight-bookings.php">
                                    <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Bookings</span>
                                </a>
                            </li>';
                    }else if ($adminloggedin && $adminhotel) {
                        echo '<li class="sidebar-header">Hotel Admin</li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/index.php">
                                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/rooms.php">
                                    <i class="align-middle" data-feather="send"></i> <span class="align-middle">Rooms</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="' . BASE_URL . 'admin/hotel-bookings.php">
                                    <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Bookings</span>
                                </a>
                            </li>';
                    }
                    ?>
                </ul>

            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle top_profile_image_cont d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img id="top_image" class="avatar img-fluid rounded me-1 top_profile_image" />
                                <span class="text-dark" id="top_name"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/profile.php"><i
                                        class="align-middle me-1" data-feather="user"></i> Profile</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>