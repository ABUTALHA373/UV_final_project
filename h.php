<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/nheader.php';
?>

<section class="account-info-area section-bg-gray pt-2">
    <div class="container p-0">
        <!-- <h2 class="py-4 px-4 mb-2 bg-white border text-center">Hotels</h2> -->

        <select class="js-example-basic-single" id="select2" name="state">
            <option value="AL">Alabama</option>
            ...
            <option value="WY">Wyoming</option>
        </select>
        <div class="py-4 px-4 mb-2 bg-white border">
            <form class="m-0 p-0" action="search_hotels.php" method="GET">
                <div class="row">
                    <div class="col-sm-0 col-lg-10 d-flex p-0 justify-content-lg-around">
                        <div class="mt-10 m-2 border w-25">
                            <div class="default-select " id="default-select">
                                <select class="w-100 js-example-basic-single">
                                    <option selected disabled>Place</option>
                                    <option value="1">Spanish</option>
                                    <option value="1">Arabic</option>
                                    <option value="1">Portuguise</option>
                                    <option value="1">Bengali</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-10 m-2 border w-25">
                            <input type="text" class="single-input date-picker" name="Check-in-date"
                                placeholder="Check-in-date " onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Check-in-date'">
                        </div>
                        <div class="mt-10 m-2 border w-25">
                            <input type="text" class="single-input date-picker" name="Check-out-date"
                                placeholder="Check-out-date " onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Check-out-date'">
                        </div>
                        <div class="mt-10 m-2 border w-25">
                            <input type="number" name="adults" placeholder="Adults" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Adults'" required class="single-input">
                        </div>
                    </div>
                    <div class="col-sm-0 col-lg-2 p-0">
                        <div class="mt-10 m-2 d-sm-flex justify-content-sm-center ">
                            <button type="submit" class="genric-btn primary w-100">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class=" row m-0">
            <div class="col-lg-3 mb-4 p-0">
                <div class="border p-4 bg-white h-100 ">
                    <div class="row bb pb-2 m-0">
                        <div class="col-10">
                            <h4>Filters</h4>
                        </div>
                        <div class="col-2">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample"><b><i class="fa fa-chevron-down"
                                        aria-hidden="true"></i></b>
                            </a>
                        </div>
                    </div>
                    <div class="collapse show" id="collapseExample">
                        <div class="border mt-10 px-2 pt-2">
                            <h6 class="border-bottom mb-2">Hotel Rating:</h6>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating5" value="1">
                                <label class="" for="rating5">5 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating4" value="1">
                                <label class="" for="rating4">4 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating3" value="1">
                                <label class="" for="rating3">3 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating2" value="1">
                                <label class="" for="rating2">2 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating1" value="1">
                                <label class="" for="rating1">1 star</label>
                            </div>
                        </div>

                        <div class="border mt-10 px-2 pt-2">
                            <h6 class="border-bottom mb-2">Popularity:</h6>
                            <div class="">
                                <input class="" type="checkbox" name="popularity" id="high" value="1">
                                <label class="" for="high">High</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="popularity" id="medium" value="1">
                                <label class="" for="medium">Medium</label>
                            </div>

                        </div>
                        <div class="border mt-10 px-2 pt-2">
                            <h6 class="border-bottom mb-2">Price order:</h6>
                            <div class="">
                                <input class="" type="checkbox" name="price_order" id="h2l" value="1">
                                <label class="" for="h2l">Low to High</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="price_order" id="l2h" value="1">
                                <label class="" for="l2h">High to Low</label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class=" col-lg-9 mb-4 p-0">
                <div class="p-4 border bg-white h-100 ml-lg-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, ducimus aperiam
                        praesentium vitae
                        ad beatae distinctio laudantium velit ex suscipit quisquam. Laboriosam
                        minima quo beatae modi?
                        Voluptates nemo totam asperiores exercitationem ducimus eveniet maiores qui
                        minima! Sed laborum
                        placeat, perferendis aspernatur, saepe veniam itaque a ratione odio delectus
                        at fugiat minus
                        commodi, iure hic eligendi nisi. Quo cumque ut exercitationem natus unde
                        accusantium amet
                        tempore aliquid eligendi eius a dignissimos, nihil voluptas itaque libero,
                        error dolores soluta
                        iusto molestias deleniti ipsa. Id quisquam doloribus unde iure accusantium
                        qui eaque possimus
                        aliquid consequuntur reprehenderit quo excepturi atque cupiditate alias
                        rerum soluta magni
                        consectetur, accusamus veniam, voluptates sit nam vitae ipsum suscipit!
                        Deserunt et in modi.
                        Voluptates porro iusto consectetur dolores sapiente fugiat neque quidem
                        ullam eum, aliquid
                        tenetur fuga pariatur esse tempore, magni ab. Blanditiis quam necessitatibus
                        sequi, animi
                        aspernatur officia hic voluptas recusandae neque facilis possimus excepturi
                        sapiente,
                        repudiandae ducimus? Quos, dolorum sit cupiditate deserunt eaque dolor
                        molestiae vero voluptas
                        earum ratione blanditiis at quaerat ipsa nisi libero itaque aspernatur ipsam
                        quisquam aperiam?
                        Id, sint ipsam dolorum vel dolorem adipisci molestiae mollitia sequi
                        voluptate sapiente dolores,
                        et quis laudantium, voluptatibus distinctio ea inventore iure cumque error
                        pariatur enim nihil
                        atque qui. Quas quibusdam impedit labore laudantium, accusantium debitis
                        quod ab praesentium
                        natus inventore fuga quaerat magni expedita tempora odit laboriosam. Quos ut
                        error voluptatem
                        vel illo quibusdam! Maxime, similique. Sed alias, voluptate laudantium quasi
                        numquam impedit!
                        Accusantium, maiores eum. Aliquid minus labore incidunt quidem rem
                        molestias, quam laboriosam
                        corporis facere. Consectetur, autem nam cumque dolor nemo voluptatum optio
                        delectus ullam
                        repudiandae, dolores illo adipisci ipsum quidem dolorem totam, molestias
                        blanditiis! Ad rem ea
                        eaque sit soluta reprehenderit, modi ipsum repellendus obcaecati ullam,
                        voluptatem vitae nemo
                        iusto unde quasi officiis! Quae natus praesentium, maiores sit dignissimos
                        ducimus aspernatur
                        inventore, enim reiciendis commodi dicta quam minus quasi officiis! Dolores,
                        eaque assumenda.
                        Quae voluptate, corporis sit iste cumque possimus provident magni corrupti
                        molestiae ab,
                        expedita sequi unde, quidem distinctio quibusdam. Eos est quam voluptates
                        blanditiis facilis
                        iste quisquam, ratione molestiae obcaecati eligendi? Nihil quidem magnam
                        accusamus molestias ea
                        voluptas facere aliquid hic ab velit! Assumenda voluptatem possimus amet
                        delectus harum
                        expedita. Quia incidunt labore soluta quidem, sunt atque omnis excepturi,
                        asperiores commodi
                        optio obcaecati qui aut debitis, tempore cupiditate impedit laudantium
                        numquam dolore sit fugiat
                        quam a molestias? Reiciendis, vel! Minus, rem, placeat assumenda sed error
                        numquam dolorem
                        dolorum harum ipsum cupiditate eius modi ea esse deleniti aut! Voluptatibus
                        eaque enim hic?
                        Magni enim a eaque delectus veniam commodi quisquam, labore ut placeat,
                        ipsam sit aliquam earum
                        in autem? Commodi sit eveniet qui totam dolorem expedita officiis nostrum
                        esse facere inventore
                        nemo tempora, maxime ducimus explicabo omnis dolores minus molestiae? Ullam
                        ut repudiandae
                        aliquid, quaerat molestiae dolores dolorum maxime ipsum delectus quod eum,
                        error exercitationem.
                        Error libero nemo reprehenderit, non iure nihil deleniti. Quaerat doloribus
                        tenetur omnis iure
                        nostrum qui, libero modi doloremque magni dolore reprehenderit sed natus
                        voluptatum ad nihil
                        ullam repellendus cum aperiam soluta minima. Cum est illum et quaerat nulla?
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End about-info Area -->


<?php
require './include/footer.php';
?>
<script>
// JavaScript code to remove the "show" class when screen size is less than lg
const filterToggle = document.getElementById('filterToggle');
const filterCollapse = document.getElementById('collapseExample');

function checkScreenSize() {
    if (window.innerWidth < 992) { // 992px is the lg breakpoint in Bootstrap
        filterCollapse.classList.remove('show');
    } else {
        filterCollapse.classList.add('show');
    }
}

// Initial check on page load
checkScreenSize();

// Check on window resize
window.addEventListener('resize', checkScreenSize);


// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#select2').select2();
});
</script>
</body>

</html>