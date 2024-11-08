<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
if(!$isLoggedIn){
    header('Location:./login.php');
}
require './include/nheader.php';
?>
<div class="section-gap">
    <div class="container">
        <h2 class="pb-4">Account Settings</h2>
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                        href="#list-home" role="tab" aria-controls="home">Home</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                        href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                        href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                        aria-labelledby="list-home-list">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa, sapiente ex dolor ratione
                        quisquam rerum id in perferendis distinctio error tempora ad nostrum pariatur sit dicta commodi
                        nihil voluptatem? Totam minus dolorum porro maiores, est distinctio iste et quia vitae
                        laboriosam, repellat maxime, voluptatem deserunt praesentium unde qui doloremque ducimus natus
                        facilis corrupti aperiam expedita quibusdam reiciendis! Temporibus asperiores eos dolor fugit
                        beatae illum, debitis eaque alias, quae necessitatibus inventore, enim similique molestias.
                        Pariatur quia consequuntur aliquid cumque architecto, culpa mollitia soluta, aperiam esse
                        tempore, in eos consequatur tempora beatae? Quo, eveniet suscipit doloremque consequatur aperiam
                        ducimus aliquid neque? Id!</div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quisquam est dicta,
                        sapiente vitae consequatur officiis harum, nobis quam iure debitis cum corporis quasi facere
                        reiciendis. Adipisci, inventore est? Saepe numquam cum autem quia. Expedita amet dolore iste
                        vero veritatis facilis provident obcaecati mollitia. Aperiam amet quaerat consequatur totam
                        saepe quas placeat eveniet ex iure harum, veniam ea repellendus deleniti officia corrupti nulla
                        quos nemo similique ipsa sapiente mollitia id! Natus, rem nisi. Dolores dignissimos aliquid
                        eligendi. Repellendus cum sequi amet ex ab eos hic deserunt mollitia praesentium quae eum, ipsa
                        maiores velit, repudiandae, vero commodi consequuntur natus nesciunt accusantium officia qui
                        laborum rerum odit. Saepe qui quae neque repudiandae sunt voluptatibus assumenda ullam,
                        repellendus illo totam unde animi, eum eligendi sed laborum amet quam deleniti. Tempore commodi,
                        adipisci et, dicta vel aliquid sint quae rerum, dolorum non quidem ipsa vitae doloremque
                        nesciunt ab placeat provident architecto temporibus cumque reprehenderit eveniet soluta
                        laboriosam dolores. Laboriosam molestiae commodi saepe. Cumque alias possimus, aut quas minus
                        voluptates. Ea, incidunt? Minima aperiam aut repellat sequi optio eos, harum eius ad, aspernatur
                        velit tempora corrupti, atque sed ipsum vitae quos debitis voluptate molestiae cum distinctio
                        unde deleniti. Non cum eius rem. Quas, maxime ipsum?
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit doloribus id neque aut sint?
                        Obcaecati et animi odio ipsa voluptates harum incidunt, ea dolore hic quia aliquam quibusdam
                        saepe sint, rem nostrum maxime aperiam iste. Mollitia repellat, atque sunt id libero suscipit
                        nostrum excepturi laboriosam consequuntur explicabo eum incidunt ullam. Debitis eius
                        voluptatibus molestiae nihil totam necessitatibus perspiciatis omnis, amet rerum earum.
                        Assumenda corporis ducimus veritatis doloremque repudiandae natus, ipsum commodi molestias! Non
                        voluptas natus dolore quo reprehenderit cum at eligendi magnam ad, repellendus neque deserunt
                        doloribus ipsa pariatur consequuntur, obcaecati culpa praesentium unde maxime nostrum corporis
                        quis quisquam! Magni molestias veritatis minima repudiandae odio recusandae officiis obcaecati
                        libero nihil iusto exercitationem voluptatibus eveniet, incidunt commodi. Minus ipsam provident
                        illum voluptatum fuga odio quae eius aliquam necessitatibus sapiente repellendus, incidunt
                        maxime? Distinctio sit, cum ipsa, soluta dicta, tempore cupiditate hic aspernatur quisquam
                        veritatis quidem qui. Perspiciatis hic inventore sapiente laudantium repudiandae repellendus,
                        natus beatae! Asperiores incidunt voluptate eaque repellat natus, facilis neque libero? Minima,
                        earum architecto commodi iusto assumenda libero cupiditate consequuntur similique maiores,
                        exercitationem, molestias totam. Est incidunt quis similique suscipit aliquam quam saepe cum
                        architecto. Et deserunt quidem molestiae fugit corporis! Esse cupiditate alias libero est dolore
                        autem incidunt soluta deserunt dolores eaque? Distinctio esse totam ab ducimus deleniti saepe
                        delectus voluptates iste dolorem, recusandae suscipit aliquam incidunt eius aliquid quis vitae
                        reiciendis! Vitae eaque sapiente inventore repellendus dolorem illum a quam, voluptas
                        dignissimos officia consequatur tenetur enim labore vel nisi corrupti? Saepe cupiditate
                        similique quam culpa cumque amet eos illum omnis. Iusto optio asperiores ipsum suscipit sequi et
                        perferendis reprehenderit natus eveniet nihil maiores cupiditate quibusdam quae hic laudantium
                        repellendus dolor qui autem porro cum atque, nemo recusandae sit aspernatur. Corrupti expedita
                        totam dolorum, aut sapiente est temporibus pariatur voluptas veritatis mollitia in eum, earum
                        similique provident.
                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis illum laborum praesentium sit
                        a ipsam consequatur perferendis vero hic ad, amet debitis eum. Quam maiores quisquam mollitia a
                        voluptatum nisi soluta doloremque, sit, reprehenderit sapiente consequuntur odio in odit
                        inventore accusantium eveniet possimus quos dignissimos ex aliquam accusamus temporibus hic iste
                        minima. Excepturi, cupiditate optio. Nesciunt provident, doloribus ratione assumenda dignissimos
                        saepe veritatis earum soluta nulla sapiente fugiat cupiditate nam, consequuntur doloremque
                        numquam repellendus eos inventore voluptas ipsa sequi, velit nostrum rerum dolores distinctio?
                        Eaque possimus, expedita quidem earum neque corrupti obcaecati officia incidunt facere aperiam
                        minus officiis cumque voluptatum sint voluptate rerum sed harum temporibus quibusdam suscipit
                        eius placeat natus consequuntur accusantium! Odio mollitia eveniet earum! Ipsam, illo nobis!
                        Officiis distinctio nostrum laborum iure commodi earum quasi ea error facilis nisi ipsa
                        consequuntur, unde quia cumque sunt rerum tempora architecto maiores. Perspiciatis, ad. Et
                        repellat ipsa ullam odio enim velit officiis fuga adipisci commodi ipsam quod possimus
                        dignissimos nesciunt illo eum esse, cupiditate saepe assumenda incidunt dolorem recusandae
                        ratione! A, nesciunt reprehenderit facilis consectetur ipsam alias beatae nemo repellat sequi
                        debitis perferendis ullam inventore maxime sunt provident dolorem cumque, atque ab. Dignissimos
                        iste enim sed labore dolor quo. Adipisci et doloremque nulla rem officiis reiciendis velit
                        perspiciatis temporibus libero magni, quis accusantium, nemo voluptate dignissimos minus aut qui
                        fuga, maxime nam! Incidunt reprehenderit, sequi similique quas tenetur cupiditate laborum?
                        Necessitatibus maxime eligendi velit saepe assumenda cum quia, rem architecto unde ab iure
                        aspernatur omnis at! Est veniam exercitationem repellat vitae rerum doloremque sed tempore
                        aperiam, alias minus repellendus voluptates fugit eius? Voluptatem blanditiis labore mollitia
                        magni, quae expedita assumenda esse amet explicabo alias quibusdam veritatis sint, aut cum
                        inventore quia, reiciendis corporis aspernatur qui voluptatum. Voluptatem hic voluptas id, saepe
                        reiciendis laborum, sunt velit, assumenda iure repudiandae amet? Voluptatum qui suscipit dolorum
                        reiciendis quibusdam provident excepturi quas amet eum earum cumque, ratione ut tempore atque at
                        soluta facilis, velit blanditiis deserunt? Tenetur vero quas similique blanditiis, eligendi fuga
                        dolorum doloremque soluta, harum error repellat nisi cumque at voluptas ipsam rerum quam
                        voluptatibus exercitationem? Consequatur laborum dolor soluta ut fugiat, assumenda molestias
                        fugit ipsam modi quaerat, iste ab officia? Veniam, qui fugit sint sed odit quam unde ab! Quia
                        qui libero numquam id dicta, mollitia ipsa! Similique, aliquid tempore facere unde ut molestiae
                        dicta omnis alias, et voluptas delectus molestias est rerum eius obcaecati nulla, corrupti id
                        nemo magni odio dignissimos doloremque necessitatibus nisi numquam. Officia veniam eum ea omnis
                        voluptatem impedit nihil consequatur in suscipit laboriosam, sequi, ad iusto praesentium
                        necessitatibus architecto sapiente distinctio. Tempora aperiam ipsa voluptatem quos obcaecati
                        perspiciatis facere facilis illo sunt veritatis, accusamus aspernatur cupiditate officia magni
                        explicabo nostrum beatae saepe doloribus sapiente atque corrupti in maxime? Optio sunt quo
                        explicabo, adipisci maxime animi numquam consequuntur ut iusto ea quae velit facilis ratione
                        modi voluptate suscipit, at cupiditate similique. Fugiat molestiae dolorum quia sapiente
                        officia, eum velit iure nesciunt, quisquam illum enim. Cum vero repellendus laborum voluptas
                        quibusdam, error ex! Obcaecati repellat magni libero amet.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require './include/footer.php';
?>

</body>

</html>