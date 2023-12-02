<?php foreach ($voyages as $voyage) {
    $offre = get_min_offre_byServiceId($voyage->id);
    if($voyage->categorie_id ==1){
        $chambres_min_prix = get_min_priceofchambres_byServiceId($voyage->id);
    }else{
        $chambres_min_prix = $voyage->prix;
    }

    $first_image = get_one_image_byServiceId($voyage->id);
    ?>
    <!--deal-->
    <article class="one-half">
        <figure>
            <a href="<?= base_url() ?>details/<?= str_replace(array(" ", "*", "+", "/", "'"), "-", $voyage->titre) . '-' . $voyage->id ?>.html"
               title="<?= $voyage->titre; ?>">
                <img style="height: 300px; width: 100%"
                     src="<?= base_url() ?>assets/backend/services/<?= $first_image ?>"
                     alt="<?= $voyage->titre; ?>"/></a></figure>
        <div class="details">
            <h3> <?= $voyage->titre; ?>
                <span class="stars">
										<i class="material-icons">&#xE838;</i>
										<i class="material-icons">&#xE838;</i>
										<i class="material-icons">&#xE838;</i>
										<i class="material-icons">&#xE838;</i>
									</span>
            </h3>
            <span class="address"><i class="fa fa-map-marker"></i>  <?= $voyage->lieu; ?> </span>
            <span class="rating"> 8 /10</span>

            <span class="price">Prix : a partir de  <em
                    class="text-14px prix"><?php if ($offre != null) echo "<del>" . $chambres_min_prix . "MAD</del>  " . $offre->new_prix; else echo $chambres_min_prix; ?> MAD/nuit</em></span>
            <div class="description">
                <p>
                    <?= $voyage->petit_desc; ?>
                    <a href="<?= base_url() ?>details/<?= str_replace(array(" ", "*", "+", "/", "'"), "-", $voyage->titre) . '-' . $voyage->id ?>.html">Lire
                        plus</a></p>
            </div>
            <?php if ($offre != null) { ?>
                <div class="ribbon list-service-promo">

                    <?php $promo = $offre;
                    if ($promo != null && $promo->status != 0) {
                        ?>
                        <input type="hidden" id="date<?= $promo->service_id; ?>"
                               value="<?= $promo->date_fin; ?>">

                        <h2 class="date-fin-promo-details">Fin promo : <b
                                id="days<?= $promo->service_id; ?>">00</b><span>j</span> <b
                                id="hours<?= $promo->service_id; ?>">00</b><span>h</span>
                            <b id="minutes<?= $promo->service_id; ?>">00</b><span>min</span> <b
                                id="seconds<?= $promo->service_id; ?>">00</b><span>s</span></h2>
                        <div class="item-offer-clock">

                            <script>
                                var dte = document.getElementById('date<?= $promo->service_id; ?>');
                                // Set the date we're counting down to
                                var countDownDate<?= $promo->service_id; ?> = new Date(dte.value).getTime();
                                // alert(dte.value);
                                // Update the count down every 1 second
                                var x = setInterval(function () {

                                    // Get today's date and time
                                    var now = new Date().getTime();

                                    // Find the distance between now and the count down date
                                    var distance = countDownDate<?= $promo->service_id; ?> - now;

                                    // Time calculations for days, hours, minutes and seconds
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    if (distance <= 0) {
                                        clearInterval(x);
                                        document.getElementById("is_finish<?= $promo->service_id; ?>").innerHTML = "Promo Terminer";
                                        document.getElementById("is_finish<?= $promo->service_id; ?>").classList.add("prix");
                                        document.getElementById("is_finish<?= $promo->service_id; ?>").classList.add("text-14px");

                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url('service/change_status_by_id'); ?>",
                                            data: {
                                                id: <?= $promo->id; ?> ,
                                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                                            },
                                            async: false,
                                            success: function (response) {
                                                if (response) {
                                                    //  alert(response);
                                                }
                                            }
                                        });

                                    } else {
                                        document.getElementById('days<?= $promo->service_id; ?>').innerHTML = days;
                                        document.getElementById('hours<?= $promo->service_id; ?>').innerHTML = hours;
                                        document.getElementById('minutes<?= $promo->service_id; ?>').innerHTML = minutes;
                                        document.getElementById('seconds<?= $promo->service_id; ?>').innerHTML = seconds;
                                    }

                                    // If the count down is over, write some text

                                }, 1000);

                            </script>

                            <p id="is_finish<?= $promo->service_id; ?>"></p>
                        </div>

                    <?php } ?>

                </div>
            <?php }; ?>
            <a href="<?= base_url() ?>details/<?= str_replace(array(" ", "*", "+", "/", "'"), "-", $voyage->titre) . '-' . $voyage->id ?>.html"
               title="Reserver maintenant" class="gradient-button">Reserver maintenant</a>


        </div>
        <?php if ($offre != null) { ?>
            <div class="ribbon-small">- <?= $offre->pourcentage; ?>%</div>

        <?php }; ?>

    </article>
    <!--//deal-->
<?php } ?>

<!--bottom navigation-->
<div class="bottom-nav">
    <!--back up button-->
    <a href="#" class="scroll-to-top" title="Haut de page">Haut de page</a>
    <!--//back up button-->

    <!--pager-->
    <!--							<div class="pager">-->
    <!--								<span><a href="#">First page</a></span>-->
    <!--								<span><a href="#">&lt;</a></span>-->
    <!--								<span class="current">1</span>-->
    <!--								<span><a href="#">2</a></span>-->
    <!--								<span><a href="#">3</a></span>-->
    <!--								<span><a href="#">4</a></span>-->
    <!--								<span><a href="#">5</a></span>-->
    <!--								<span><a href="#">6</a></span>-->
    <!--								<span><a href="#">7</a></span>-->
    <!--								<span><a href="#">8</a></span>-->
    <!--								<span><a href="#">&gt;</a></span>-->
    <!--								<span><a href="#">Last page</a></span>-->
    <!--							</div>-->
    <!--//pager-->
</div>
<!--//bottom navigation-->