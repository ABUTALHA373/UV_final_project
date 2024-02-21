<?php
require __DIR__ . '/../config/db_con.php';

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
    <title><?php if(isset($title)){echo $title;} ?>|| Bookitfast</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--CSS============================================= -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/linearicons.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/jquery-ui.css">
    <!-- <link rel="stylesheet" href="css/nice-select.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">


</head>

<body>
    <header id="header">
        <div class="header-top ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-6 header-top-left ">
                        <div class="header-social">
                            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a>
                            <a href="https://instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                        <ul>
                            <?php 
                            if($isLoggedIn){
                                echo '<li><a href="'.BASE_URL.'profile.php">Profile</a></li>
                            <li style="margin-right: 0;"><a href="'.BASE_URL.'profile/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>';
                            }else{
                            echo '<li><a href="'.BASE_URL.'signup.php">SignUp</a></li>
                            <li style="margin-right: 0;"><a href="'.BASE_URL.'login.php">Login</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex px-3">
                <a href="<?php echo BASE_URL; ?>index.php"><img src="<?php echo BASE_URL; ?>img/logo.svg" alt=""
                        title="" height="35px" /></a>
                <div id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="<?php echo BASE_URL; ?>flights.php">Flight</a></li>
                        <li><a href="<?php echo BASE_URL; ?>hotels.php">Hotel</a></li>
                        <li><a href="<?php echo BASE_URL; ?>tours.html">Tour</a></li>
                        <li><a href="<?php echo BASE_URL; ?>blog/home.php">Blog</a></li>
                        <li><a href="<?php echo BASE_URL; ?>services.php">Services</a>
                            <!-- <ul>
                                <li><a href="#">Item One</a></li>
                                <li><a href="#">Item Two</a></li>
                            </ul> -->
                        </li>
                        <li><a href="<?php echo BASE_URL; ?>gallery.php">Gallary</a></li>
                        <!-- <li class="menu-has-children"><a href="">Blog</a>
                            <ul>
                                <li><a href="blog-home.html">Blog Home</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="menu-has-children"><a href="">Pages</a>
                            <ul>
                                <li><a href="elements.html">Elements</a></li>
                                <li class="menu-has-children"><a href="">Level 2 </a>
                                    <ul>
                                        <li><a href="#">Item One</a></li>
                                        <li><a href="#">Item Two</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li> -->
                    </ul>
                </div><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->