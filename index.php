<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
$title = 'Home ';
	require './include/header.php'
	
?>


<!-- start banner Area -->
<div id="page_index">
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container padding">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 banner-left">
                    <h6 class="text-white">Away from monotonous life</h6>
                    <h1 class="text-white">Magical Travel</h1>
                    <p class="text-white">
                        "Escape the Ordinary, Embrace the Extraordinary - Where Every Journey Unveils a Tapestry of
                        Magical
                        Moments. Discover the Art of Travel with Us!"
                    </p>
                    <!-- <a href="#" class="primary-btn text-uppercase">Get Started</a> -->
                </div>
                <div class="col-lg-4 col-md-6 banner-right">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab"
                                aria-controls="flight" aria-selected="true">Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab"
                                aria-controls="hotel" aria-selected="false">Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="s.php">Costome Tour</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                            <form class="m-0 p-4 " action="" method="GET">
                                <div class="row gap-2">
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>From</small>
                                            <select class="w-100" id="flight_dep_select" name="from">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>To</small>
                                            <select class="w-100" id="flight_ari_select" name="to">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Flight Date</small>
                                            <input type="text"
                                                class="single-input single-input-primary border date-picker"
                                                name="flight_date" name="flight_date"
                                                value="<?php echo date('Y-m-d'); ?>" placeholder="Select a date "
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Select a date'">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Person</small>
                                            <input type="number" name="flight_person" name="flight_person"
                                                placeholder="Person" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Person'" value="1" required
                                                class="single-input single-input-primary border">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Ticket Class</small>
                                            <select class="w-100 " id="flight_select_class">
                                                <Option value="economy_class">Ecomony</Option>
                                                <Option value="business_class">Business</Option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class="text-center">
                                            <button type="button" id="search_flight_button"
                                                class="primary-btn text-uppercase">Search Flights</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                            <form class="m-0 p-4 " action="" method="GET">
                                <div class="row gap-2">
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Place</small>
                                            <select class="w-100 " id="hotel_place_select">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Check-in date</small>
                                            <input type="text" value="<?php echo date('Y-m-d'); ?>"
                                                class="single-input single-input-primary border date-picker"
                                                name="Check-in-date" placeholder="Select a date "
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Select a date'">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Check-out date</small>
                                            <input type="text"
                                                value="<?php echo date('Y-m-d', strtotime('+2 days')); ?>"
                                                class="single-input single-input-primary border date-picker"
                                                name="Check-out-date" placeholder="Select a date "
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Select a date'">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Adults(per room)</small>
                                            <input type="number" value="2" name="adults" placeholder="Adults"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults'"
                                                required class="single-input single-input-primary border">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class=" position-relative">
                                            <small>Total room</small>
                                            <input type="number" value="1" name="total-room" placeholder="Total rooms"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Total rooms'" required
                                                class="single-input single-input-primary border">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class="text-center">
                                            <button type="button" id="search_hotel_button"
                                                class="primary-btn text-uppercase">Search Hotels</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
                            <form class="form-wrap">
                                <input type="text" class="form-control" name="name" placeholder="From "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">
                                <input type="text" class="form-control" name="to" placeholder="To "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
                                <input type="text" class="form-control date-picker" name="start" placeholder="Start "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                                <input type="text" class="form-control date-picker" name="return" placeholder="Return "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                <input type="number" min="1" max="20" class="form-control" name="adults"
                                    placeholder="Adults " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Adults '">
                                <input type="number" min="1" max="20" class="form-control" name="child"
                                    placeholder="Child " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Child '">
                                <a href="#" class="primary-btn text-uppercase">Search Holidays</a>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start popular-destination Area -->
    <section class="popular-destination-area section-bg-white section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely
                            fast, day.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-destination relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/d1.jpg" alt="">
                        </div>
                        <div class="desc">
                            <a href="#" class="price-btn">$150</a>
                            <h4>Mountain River</h4>
                            <p>Paraguay</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-destination relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/d2.jpg" alt="">
                        </div>
                        <div class="desc">
                            <a href="#" class="price-btn">$250</a>
                            <h4>Dream City</h4>
                            <p>Paris</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-destination relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/d3.jpg" alt="">
                        </div>
                        <div class="desc">
                            <a href="#" class="price-btn">$350</a>
                            <h4>Cloud Mountain</h4>
                            <p>Sri Lanka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End popular-destination Area -->

    <!-- Start package Area -->
    <section class="price-area section-bg-gray section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">We Provide Affordable Tours</h1>
                        <p>Smart Adventures, Affordable Journeys: Where Intelligence Meets Exploration.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Cheap Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Luxury Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Camping Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End package Area -->


    <!-- Start Popular Hotels Area -->
    <section class="other-issue-area section-bg-white section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-9 ">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Hotels</h1>
                        <p>Where Luxury Meets Hospitality – Your Unforgettable Escape Awaits!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="img/h1.jpeg" alt="">
                        </div>
                        <a href="#">
                            <h4>Raffles Makkah Palace</h4>
                        </a>
                        <p>
                            <i class="fa fa-map-marker"></i> Mecca (Makkah), Saudi Arabia
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="single-other-issue">
                        <div class="thumb ">
                            <img class="img-fluid" src="img/h2.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>Ciragan Palace Kempinski Istanbul</h4>
                        </a>
                        <p>
                            <i class="fa fa-map-marker"></i> Istanbul, Turkey
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb border">
                            <img class="img-fluid" src="img/h3.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>Jumeirah Beach Hotel</h4>
                        </a>
                        <p>
                            <i class="fa fa-map-marker"></i> Dubai, United Arab Emirates
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="img/h4.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4>Yas Hotel Abu Dhabi</h4>
                        </a>
                        <p>
                            <i class="fa fa-map-marker"></i> Abu Dhabi, United Arab Emirates
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Popular hotels Area -->


    <!-- Start testimonial Area -->
    <section class="testimonial-area section-bg-gray section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Testimonial from our Clients</h1>
                        <p>Embarking on Dreams, Crafting Memories – Where Every Journey Becomes a Story.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="img/elements/user1.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more
                                effort you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="img/elements/user2.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just
                                how hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="img/elements/user1.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more
                                effort you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="img/elements/user2.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just
                                how hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="img/elements/user1.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more
                                effort you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="img/elements/user2.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just
                                how hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial Area -->

    <!-- Start explore BD Area -->
    <section class="home-about-area section-bg-white">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Bangladesh Unveiled:<br> Explore Beauty, Culture, Wonders
                    </h1>
                    <p>
                        Immerse yourself in the charm of this enchanting destination with personalized packages designed
                        just for you. Discover the beauty, culture, and wonders of Bangladesh on a journey crafted to
                        match
                        your preferences. Let the adventure begin!
                    </p>
                    <a href="#" class="primary-btn text-uppercase">Explore Bangladesh</a>
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="img/explorebd.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End explore BD Area -->


    <!-- Start blog Area -->
    <section class="recent-blog-area section-bg-gray section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Latest from Our Blog</h1>
                        <p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as
                            has.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-recent-blog-carusel ">
                    <div class="single-recent-blog-post item bg-white">
                        <div class="thumb">
                            <img class="img-fluid" src="img/b1.jpg" alt="">
                        </div>
                        <div class="details px-4 pb-2">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Low Cost Advertising</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item bg-white">
                        <div class="thumb">
                            <img class="img-fluid" src="img/b2.jpg" alt="">
                        </div>
                        <div class="details px-4 pb-2">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Creative Outdoor Ads</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item bg-white">
                        <div class="thumb">
                            <img class="img-fluid" src="img/b3.jpg" alt="">
                        </div>
                        <div class="details px-4 pb-2">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">It's Classified How To Utilize Free</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item bg-white">
                        <div class="thumb">
                            <img class="img-fluid" src="img/b1.jpg" alt="">
                        </div>
                        <div class="details px-4 pb-2">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Low Cost Advertising</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item bg-white">
                        <div class="thumb">
                            <img class="img-fluid" src="img/b2.jpg" alt="">
                        </div>
                        <div class="details px-4 pb-2">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Creative Outdoor Ads</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item bg-white">
                        <div class="thumb">
                            <img class="img-fluid" src="img/b3.jpg" alt="">
                        </div>
                        <div class="details px-4 pb-2">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">It's Classified How To Utilize Free</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<?php
require './include/footer.php';
?>
</body>

</html>