<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
if(!$isLoggedIn){
    header('Location:./login.php');
}
require './include/nheader.php';

?>
<div id="page_profile">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <!-- <h2 class="py-4 px-4 mb-2 bg-white border text-center">Account Settings</h2> -->
            <div class="row gap-3">
                <div class="col-md-4 col-lg-3 border bg-white p-0 m-0">
                    <div class="">
                        <div class="list-group corner-border" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action d-flex active" id="my-profile-list"
                                data-toggle="list" href="#my-profile" role="tab" aria-controls="home">
                                <i class="fa fa-user col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My
                                    Profile</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="my-booking-list"
                                data-toggle="list" href="#my-booking" role="tab" aria-controls="home">
                                <i class="fa fa-cloud-upload col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My
                                    Booking</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="my-uploads-list"
                                data-toggle="list" href="#my-uploads" role="tab" aria-controls="home">
                                <i class="fa fa-cloud-upload col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My Uploads</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="saved-list" data-toggle="list"
                                href="#saved" role="tab" aria-controls="home">
                                <i class="fa fa-heart col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Saved</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="list-home-list"
                                data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                <i class="fa fa-location-arrow col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Newsletter</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="change-password-list"
                                data-toggle="list" href="#list-change-password" role="tab" aria-controls="home">
                                <i class="fa fa-lock col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Change Password</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " href="javascript:void(0);"
                                id="deleteaccount" role="tab" aria-controls="home">
                                <i class="fa fa-user-times col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Delete Your Account</div>
                            </a>
                            <a href="<?php echo BASE_URL; ?>profile/logout.php"
                                class="list-group-item list-group-item-action d-flex ">
                                <i class="fa fa-sign-out col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Logout</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col border bg-white p-0 m-0">
                    <div class="">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- my profie -->
                            <div class="tab-pane fade show active" id="my-profile" role="tabpanel"
                                aria-labelledby="my-profile-list">
                                <div class="card-header">
                                    <h4 class="text-center">My Profile</h4>
                                </div>
                                <div class="p-3">
                                    <form action="" method="post" id="updateForm">
                                        <div class="row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">First Name:</label>
                                                <input type="text" id="first_name" name="first_name" placeholder="John"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'John'"
                                                    required class="single-input single-input-primary border">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Last Name:</label>
                                                <input type="text" id="last_name" name="last_name" placeholder="Doe"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Doe'"
                                                    required class="single-input single-input-primary border">
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Email:</label>
                                                <input type="email" id="email" name="email"
                                                    placeholder="example@mail.com" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'example@mail.com'" required readonly
                                                    class="single-input border bg-gray">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Phone Number:</label>
                                                <input type="tel" pattern="^[0-9 ()-]+$" id="phone_number"
                                                    name="phone_number" placeholder="Enter phone number"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter phone number'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Date of
                                                    Birth:<small>(yyyy-mm-dd)</small></label>
                                                <input type="text" id="dob" name="dob" placeholder="Enter Your DOB"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter Your DOB'" autoComplete="off"
                                                    required
                                                    class="single-input single-input-primary border date-picker">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">National ID (NID):</label>
                                                <input type="number" id="nid" name="nid" placeholder="Enter NID"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter NID'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Gender:</label>
                                                <div>
                                                    <select id="gender" name="gender" required class=>
                                                        <option value="" disabled selected>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Marital Status:</label>
                                                <div><select id="marital_status" name="marital_status" required
                                                        class="">
                                                        <option value="" disabled selected>Select Marital Status
                                                        </option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="widowed">Widowed</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Passport:</label>
                                                <input type="number" id="passport" name="passport"
                                                    placeholder="Enter Passport Number" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter Passport Number'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Country:</label>
                                                <div><select id="country" name="country" required class="">
                                                        <option value="" disabled selected>Select Your Country</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Religion:</label>
                                                <input type="text" id="religion" name="religion"
                                                    placeholder="Enter Religion" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter Religion'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0">Email verification:</label>
                                                <div>
                                                    <?php
                                                if($_SESSION['user_is_verified']==1){
                                                    echo '<span class="badge badge-success">Verified</span>';
                                                }else{
                                                    echo '<span class="badge badge-danger">Not verified</span>';
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <div class="row gap-3">
                                                    <div class="col p-0">
                                                        <button id="refreshbutton"
                                                            class="genric-btn info mr-5 w-100">Refresh</button>
                                                    </div>
                                                    <div class="col p-0">
                                                        <button id="updatebutton"
                                                            class="genric-btn primary w-100">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col m-0 p-0 col-sm">
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- booking -->
                            <div class="tab-pane fade" id="my-booking" role="tabpanel"
                                aria-labelledby="my-booking-list">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quisquam est
                                dicta,
                                sapiente vitae consequatur officiis harum, nobis quam iure debitis cum corporis quasi
                                facere
                                reiciendis. Adipisci, inventore est? Saepe numquam cum autem quia. Expedita amet dolore
                                iste
                                vero veritatis facilis provident obcaecati mollitia. Aperiam amet quaerat consequatur
                                totam
                                saepe quas placeat eveniet ex iure harum, veniam ea repellendus deleniti officia
                                corrupti
                                nulla
                                quos nemo similique ipsa sapiente mollitia id! Natus, rem nisi. Dolores dignissimos
                                aliquid
                                eligendi. Repellendus cum sequi amet ex ab eos hic deserunt mollitia praesentium quae
                                eum,
                                ipsa
                                maiores velit, repudiandae, vero commodi consequuntur natus nesciunt accusantium officia
                                qui
                                laborum rerum odit. Saepe qui quae neque repudiandae sunt voluptatibus assumenda ullam,
                                repellendus illo totam unde animi, eum eligendi sed laborum amet quam deleniti. Tempore
                                commodi,
                                adipisci et, dicta vel aliquid sint quae rerum, dolorum non quidem ipsa vitae doloremque
                                nesciunt ab placeat provident architecto temporibus cumque reprehenderit eveniet soluta
                                laboriosam dolores. Laboriosam molestiae commodi saepe. Cumque alias possimus, aut quas
                                minus
                                voluptates. Ea, incidunt? Minima aperiam aut repellat sequi optio eos, harum eius ad,
                                aspernatur
                                velit tempora corrupti, atque sed ipsum vitae quos debitis voluptate molestiae cum
                                distinctio
                                unde deleniti. Non cum eius rem. Quas, maxime ipsum?
                            </div>
                            <!-- uploads -->
                            <div class="tab-pane fade" id="my-uploads" role="tabpanel"
                                aria-labelledby="my-uploads-list">
                                <div class="card-header">
                                    <h4 class="text-center">Uploads</h4>
                                </div>
                                <div class="p-3">
                                    <form action="" method="post" id="gallery_upload">
                                        <div class="row justify-content-between">
                                            <div class="col-3 p-0 m-0">
                                                <!-- <label class="mb-0">Image:</label> -->
                                                <div class=" file">
                                                    <input type="file" name="gallery_image" id="gallery_image"
                                                        class="single-input single-input-primary border"
                                                        accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="col-5 p-0 m-0">
                                                <!-- <label class="mb-0">Caption:</label> -->
                                                <div class="">
                                                    <input type="text" id="gallery_caption" name="gallery_caption"
                                                        placeholder="write small caption"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Write small caption'" required
                                                        class="single-input single-input-primary border">
                                                </div>
                                            </div>
                                            <div class="col-3 p-0 m-0">
                                                <div class="">
                                                    <button id="submitgallery"
                                                        class="genric-btn primary w-100">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- saved -->
                            <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-list">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis illum laborum
                                praesentium
                                sit
                                a ipsam consequatur perferendis vero hic ad, amet debitis eum. Quam maiores quisquam
                                mollitia a
                                voluptatum nisi soluta doloremque, sit, reprehenderit sapiente consequuntur odio in odit
                                inventore accusantium eveniet possimus quos dignissimos ex aliquam accusamus temporibus
                                hic
                                iste
                                minima. Excepturi, cupiditate optio. Nesciunt provident, doloribus ratione assumenda
                                dignissimos
                                saepe veritatis earum soluta nulla sapiente fugiat cupiditate nam, consequuntur
                                doloremque
                                numquam repellendus eos inventore voluptas ipsa sequi, velit nostrum rerum dolores
                                distinctio?
                                Eaque possimus, expedita quidem earum neque corrupti obcaecati officia incidunt facere
                                aperiam
                                minus officiis cumque voluptatum sint voluptate rerum sed harum temporibus quibusdam
                                suscipit
                                eius placeat natus consequuntur accusantium! Odio mollitia eveniet earum! Ipsam, illo
                                nobis!
                                Officiis distinctio nostrum laborum iure commodi earum quasi ea error facilis nisi ipsa
                                consequuntur, unde quia cumque sunt rerum tempora architecto maiores. Perspiciatis, ad.
                                Et
                                repellat ipsa ullam odio enim velit officiis fuga adipisci commodi ipsam quod possimus
                                dignissimos nesciunt illo eum esse, cupiditate saepe assumenda incidunt dolorem
                                recusandae
                                ratione! A, nesciunt reprehenderit facilis consectetur ipsam alias beatae nemo repellat
                                sequi
                                debitis perferendis ullam inventore maxime sunt provident dolorem cumque, atque ab.
                                Dignissimos
                                iste enim sed labore dolor quo. Adipisci et doloremque nulla rem officiis reiciendis
                                velit
                                perspiciatis temporibus libero magni, quis accusantium, nemo voluptate dignissimos minus
                                aut
                                qui
                                fuga, maxime nam! Incidunt reprehenderit, sequi similique quas tenetur cupiditate
                                laborum?
                                Necessitatibus maxime eligendi velit saepe assumenda cum quia, rem architecto unde ab
                                iure
                                aspernatur omnis at! Est veniam exercitationem repellat vitae rerum doloremque sed
                                tempore
                                aperiam, alias minus repellendus voluptates fugit eius? Voluptatem blanditiis labore
                                mollitia
                                magni, quae expedita assumenda esse amet explicabo alias quibusdam veritatis sint, aut
                                cum
                                inventore quia, reiciendis corporis aspernatur qui voluptatum. Voluptatem hic voluptas
                                id,
                                saepe
                                reiciendis laborum, sunt velit, assumenda iure repudiandae amet? Voluptatum qui suscipit
                                dolorum
                                reiciendis quibusdam provident excepturi quas amet eum earum cumque, ratione ut tempore
                                atque at
                                soluta facilis, velit blanditiis deserunt? Tenetur vero quas similique blanditiis,
                                eligendi
                                fuga
                                dolorum doloremque soluta, harum error repellat nisi cumque at voluptas ipsam rerum quam
                                voluptatibus exercitationem? Consequatur laborum dolor soluta ut fugiat, assumenda
                                molestias
                                fugit ipsam modi quaerat, iste ab officia? Veniam, qui fugit sint sed odit quam unde ab!
                                Quia
                                qui libero numquam id dicta, mollitia ipsa! Similique, aliquid tempore facere unde ut
                                molestiae
                                dicta omnis alias, et voluptas delectus molestias est rerum eius obcaecati nulla,
                                corrupti
                                id
                                nemo magni odio dignissimos doloremque necessitatibus nisi numquam. Officia veniam eum
                                ea
                                omnis
                                voluptatem impedit nihil consequatur in suscipit laboriosam, sequi, ad iusto praesentium
                                necessitatibus architecto sapiente distinctio. Tempora aperiam ipsa voluptatem quos
                                obcaecati
                                perspiciatis facere facilis illo sunt veritatis, accusamus aspernatur cupiditate officia
                                magni
                                explicabo nostrum beatae saepe doloribus sapiente atque corrupti in maxime? Optio sunt
                                quo
                                explicabo, adipisci maxime animi numquam consequuntur ut iusto ea quae velit facilis
                                ratione
                                modi voluptate suscipit, at cupiditate similique. Fugiat molestiae dolorum quia sapiente
                                officia, eum velit iure nesciunt, quisquam illum enim. Cum vero repellendus laborum
                                voluptas
                                quibusdam, error ex! Obcaecati repellat magni libero amet.
                            </div>
                            <!-- newsletter -->
                            <!-- <div class="tab-pane fade" id="my-profile" role="tabpanel" aria-labelledby="my-profile-list">
                            <div class="card-header">
                                <h4 class="text-center">My Profile</h4>
                            </div>
                            <div class="p-3">
                                <form action="" method="post" id="updateForm">
                                    <div class="row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <label class="mb-0">First Name:</label>
                                            <input type="text" id="first_name" name="first_name" placeholder="John"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'John'"
                                                required class="single-input single-input-primary border">
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                            <label class="mb-0">Last Name:</label>
                                            <input type="text" id="last_name" name="last_name" placeholder="Doe"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Doe'"
                                                required class="single-input single-input-primary border">
                                        </div>
                                    </div>
                                    <div class="mt-3 row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <label class="mb-0">Email:</label>
                                            <input type="email" id="email" name="email" placeholder="example@mail.com"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'example@mail.com'" required readonly
                                                class="single-input border bg-gray">
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                            <label class="mb-0">Phone Number:</label>
                                            <input type="tel" id="phone_number" name="phone_number"
                                                placeholder="Enter phone number" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter phone number'" required
                                                class="single-input single-input-primary border">
                                        </div>
                                    </div>
                                    <div class="mt-3 row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <label class="mb-0">Date of Birth:<small>(yyyy-mm-dd)</small></label>
                                            <input type="text" id="dob" name="dob" placeholder="Enter Your DOB"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Your DOB'" autoComplete="off" required
                                                class="single-input single-input-primary border date-picker">
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                            <label class="mb-0">National ID (NID):</label>
                                            <input type="text" id="nid" name="nid" placeholder="Enter NID"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter NID'"
                                                required class="single-input single-input-primary border">
                                        </div>
                                    </div>
                                    <div class="mt-3 row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <label class="mb-0">Gender:</label>
                                            <div>
                                                <select id="gender" name="gender" required class=>
                                                    <option value="" disabled selected>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                            <label class="mb-0">Marital Status:</label>
                                            <div><select id="marital_status" name="marital_status" required class="">
                                                    <option value="" disabled selected>Select Marital Status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <label class="mb-0">Passport:</label>
                                            <input type="text" id="passport" name="passport"
                                                placeholder="Enter Passport Number" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Passport Number'" required
                                                class="single-input single-input-primary border">
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                            <label class="mb-0">Country:</label>
                                            <div><select id="country" name="country" required class="">
                                                    <option value="" disabled selected>Select Your Country</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <label class="mb-0">Religion:</label>
                                            <input type="text" id="religion" name="religion"
                                                placeholder="Enter Religion" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Religion'" required
                                                class="single-input single-input-primary border">
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                            <label class="mb-0">Email verification:</label>
                                            <div>
                                                <?php
                                                if($_SESSION['user_is_verified']==1){
                                                    echo '<span class="badge badge-success">Verified</span>';
                                                }else{
                                                    echo '<span class="badge badge-danger">Not verified</span>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row gap-3">
                                        <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                            <button id="updatebutton" class="genric-btn primary">Update</button>
                                        </div>
                                        <div class="col m-0 p-0 col-sm">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                            <!-- change password -->
                            <div class="tab-pane fade" id="list-change-password" role="tabpanel"
                                aria-labelledby="change-password-list">
                                <div class="card-header">
                                    <h4 class="text-center">Change password</h4>
                                </div>
                                <div class="p-3">
                                    <form action="" method="post" id="change_pass">
                                        <div class="px-lg-5">
                                            <div class="">
                                                <label class="mb-0">Current password:</label>
                                                <div class="relative">
                                                    <input type="password" id="current_password" name="current_password"
                                                        placeholder="Your Password" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Password'" required
                                                        class="single-input single-input-primary border">
                                                    <i class="fa fa-eye eye-right" id="cp_password-toggle"
                                                        aria-hidden="true"></i>
                                                </div>
                                                <small class=" text-danger error-info" id="pass_error"></small>
                                            </div>
                                            <div class="mt-3">
                                                <label class="mb-0">New password:</label>
                                                <div class="relative">
                                                    <input type="password" id="new_password" name="new_password"
                                                        placeholder="Your Password" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Password'" required
                                                        class="single-input single-input-primary border">
                                                    <i class="fa fa-eye eye-right" id="np_password-toggle"
                                                        aria-hidden="true"></i>
                                                </div>
                                                <small class=" text-danger error-info" id="np_error"></small>
                                            </div>
                                            <div class="mt-3">
                                                <label class="mb-0">Confirm new password:</label>
                                                <div class="relative">
                                                    <input type="password" id="con_new_password" name="con_new_password"
                                                        placeholder="Your Password" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Password'" required
                                                        class="single-input single-input-primary border">
                                                    <i class="fa fa-eye eye-right" id="cnp_password-toggle"
                                                        aria-hidden="true"></i>
                                                </div>
                                                <small class=" text-danger error-info" id="cnp_error"></small>
                                            </div>
                                            <div class="mt-3">
                                                <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                    <button id="updatepassword"
                                                        class="genric-btn primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
require './include/footer.php';
if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);
    if ($message=='verified') {
        
        echo '<script>Swal.fire({
            title: "Success!",
            text: "Your email is verified now!",
            icon: "success"
          });</script>';
    }else if ($message=='already_verified') {
        
        echo '<script>Swal.fire({
            title: "Already Verified!",
            text: "Your email has already been verified!",
            confirmButtonColor: "#f8b600",
            icon: "info"
          });</script>';
    }else if ($message=='invalid') {
        
        echo '<script>Swal.fire({
            title: "Invalid!",
            text: "Email verification invalid!",
            icon: "error"
          });</script>';
    }else if ($message=='token_error') {
        
        echo '<script>Swal.fire({
            title: "Token error!",
            text: "Something is wrong with the token!",
            icon: "error"
          });</script>';
    }
}
?>

</body>

</html>