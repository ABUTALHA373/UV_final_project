<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
if(!$isLoggedIn){
    header('Location:./login.php');
}
require './include/nheader.php';
?>

<div id="page_services">
    <!-- <section class="account-info-area section-padding">
        <div class="container">
            <h2 class="pb-4 px-2 ">Account Settings</h2>
            <div>
                <div class="col m-0 p-0 col-sm">
                    <label class="mb-0 req">Country:</label>
                    <div><select id="locations" name="country" required class="">
                            <option value="" disabled selected>Select Your Location</option>
                        </select></div>
                </div>
            </div>
        </div>
    </section> -->
    <section class="account-info-area section-bg-gray py-2">
        <div class="container p-0">
            <h2 class="py-4 px-4 bg-white border text-center">Emergency Contacts</h2>
            <div class="py-4 px-4  bg-white border h-50">
                <div class="py-2">
                    <form action="" method="post" style="max-width: 500px;" class="text-center m-auto"
                        id="locationForm">
                        <div>
                            <label>Your Location/City:</label>
                            <div>
                                <select id="locations" name="country" required class="">
                                    <option value="" disabled selected>Select Your Location</option>
                                    <!-- Add your location options here -->
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="genric-btn primary" id="searchBtn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="py-4 px-4 bg-white border h-50">
                <div class="py-2 d-flex flex-wrap gap-3" id="emergency_services">
                    <!-- <div class="card " style="flex-basis: 400px;flex-grow:1">
                        <h4 class="card-header fw-600 ">
                            Hospital
                        </h4>
                        <div class="card-body p-2">
                            <h5 class="card-title">Name: Special title treatment</h5>
                            <p class="card-text p-0 mb-1">Address:</p>
                            <p class="card-text p-0 mb-1">Phone:</p>
                            <a href="tel:+4733378901" class="genric-btn px-2 small primary">Call</a>
                            <a href="#" class="genric-btn px-2 small primary">Google Map</a>
                        </div>
                    </div>
                    <div class="card " style="flex-basis: 400px;flex-grow:1">
                        <h4 class="card-header fw-600 ">
                            Hospital
                        </h4>
                        <div class="card-body p-2">
                            <h5 class="card-title">Name: Special title treatment</h5>
                            <p class="card-text p-0 mb-1">Address:</p>
                            <p class="card-text p-0 mb-1">Phone:</p>
                            <a href="tel:+4733378901" class="genric-btn px-2 small primary">Call</a>
                            <a href="#" class="genric-btn px-2 small primary">Google Map</a>
                        </div>
                    </div> -->


                </div>
            </div>
        </div>
    </section>
</div>





<!-- 
<div class="container-fluid">
    <div class="row">
        <div class="col-2 collapse show d-md-flex bg-light pt-2 pl-0 min-vh-100" id="sidebar">
            <ul class="nav flex-column flex-nowrap overflow-hidden">
                <li class="nav-item">
                    <a class="nav-link text-truncate" href="#"><i class="fa fa-home"></i> <span
                            class="d-none d-sm-inline">Overview</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse"
                        data-target="#submenu1"><i class="fa fa-table"></i> <span
                            class="d-none d-sm-inline">Reports</span></a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item"><a class="nav-link py-0" href="#"><span>Orders</span></a></li>
                            <li class="nav-item">
                                <a class="nav-link  text-truncate collapsed py-1" href="#submenu1sub1"
                                    data-toggle="collapse" data-target="#submenu1sub1"><span>Customers</span></a>
                                <div class="collapse" id="submenu1sub1" aria-expanded="false">
                                    <ul class="flex-column nav pl-4">
                                        <li class="nav-item">
                                            <a class="nav-link p-1 text-truncate" href="#">
                                                <i class="fa fa-fw fa-clock-o"></i> Daily </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1 text-truncate" href="#">
                                                <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1 text-truncate" href="#">
                                                <i class="fa fa-fw fa-bar-chart"></i> Charts </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1 text-truncate" href="#">
                                                <i class="fa fa-fw fa-compass"></i> Areas </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link text-truncate" href="#"><i class="fa fa-bar-chart"></i> <span
                            class="d-none d-sm-inline">Analytics</span></a></li>
                <li class="nav-item"><a class="nav-link text-truncate" href="#"><i class="fa fa-download"></i> <span
                            class="d-none d-sm-inline">Export</span></a></li>
            </ul>
        </div>
        <div class="col pt-2">
            <h2>
                <a href="" data-target="#sidebar" data-toggle="collapse" class="d-md-none"><i
                        class="fa fa-bars"></i></a> Content
            </h2>
            <h6 class="hidden-sm-down">Shrink page width to see sidebar collapse</h6>
            <p>Codeply editor wolf moon retro jean shorts chambray sustainable roof party. Shoreditch vegan artisan
                Helvetica. Tattooed Codeply Echo Park Godard kogi, next level irony ennui twee squid fap selvage.
                Meggings flannel Brooklyn literally small batch, mumblecore PBR try-hard kale chips. Brooklyn vinyl
                lumbersexual bicycle rights, viral fap cronut leggings squid chillwave pickled gentrify mustache. 3 wolf
                moon hashtag church-key Odd Future. Austin messenger bag normcore, Helvetica Williamsburg sartorial tote
                bag distillery Portland before they sold out gastropub taxidermy Vice.</p>
        </div>
    </div>
</div> -->
<!-- 
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
            </li>
            <li>
                <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
            </li>
        </ul>
    </nav>

  
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>Collapsible Sidebar Using Bootstrap 4</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.</p>

    <div class="line"></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.</p>

    <div class="line"></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.</p>

    <div class="line"></div>

    <h3>Lorem Ipsum Dolor</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.</p>
</div>
</div> -->


<?php
require './include/footer.php';
?>

</body>

</html>