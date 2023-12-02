<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
<?php $this->load->view("headscript"); ?>

  <style>
    /* Style for category buttons */
    .category-buttons {
        text-align: center;
        margin-bottom: 20px;
    }

    .category-button {
        padding: 10px 20px;
        margin: 5px;
        background-color: #115d28; /* Change to your preferred background color */
        color: #fff; /* Change to your preferred text color */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .category-button:hover {
        background-color: #fff; /* Change to your preferred hover color */
        color:#000;
        border:1px solid #000;
    }
</style>

<body>
<!--header-->
<?php $this->load->view("header"); ?>
<!--//header-->
	
	<!--main-->
	<main class="site-main page-spacing">
        <!-- PageBanner -->
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/loc_vac.jpg');">
            <div class="container">
                <h3>Loc. Vacances</h3>
            </div>
        </div>
        <!-- PageBanner /- -->

        <div class="destination-mainblock">
            <div class="section-padding"></div>
            <div class="container popular-destination flex justify-content-center">
                <div class="section-header">
                    <h3>Agence Abwab Gueliz - Loc. Vacances</h3>
                </div>
                <div class="popular-destination-block">
                  
                   <button class="category-button" data-category="all">Afficher Tous</button>
                    <?php
   
    $categories = [
        19 => 'Appartement',
        21 => 'Villa',
    ];

    foreach ($categories as $categoryId => $categoryName) {
        echo '<button class="category-button" data-category="' . $categoryId . '">' . $categoryName . '</button>';
    }

?> 
      
              <?php if (empty($hotelGroups)) { ?>
                    <div class="row">
                        <div class="col-12">
                            <h1>Aucune Loc. Vacances disponible pour le moment.</h1>
                        </div>
                    </div>
                <?php } else { ?>    
                  
                    <?php
        $hotelGroups = array();
        foreach ($activities as $item) {
            $offre = get_min_offre_byServiceId($item->id);
            $chambres_min_prix = get_min_priceofchambres_byServiceId($item->id);
            $first_image = get_one_image_byServiceId($item->id);

            $sous_categorie_id = $item->sous_categorie_id;
            if (!isset($hotelGroups[$sous_categorie_id])) {
                $hotelGroups[$sous_categorie_id] = array();
            }
            $hotelGroups[$sous_categorie_id][] = $item;
        }

        foreach ($hotelGroups as $sous_categorie_id => $itemsGroup) {
            // if ($sous_categorie_id == 19) {
            //     echo "<h2>Appartement</h2>";
            // } elseif ($sous_categorie_id == 21) {
            //     echo "<h2>Villa</h2>";
            // } 
                    ?>
                    <div class="row category" data-category="<?= $sous_categorie_id ?>">
					<?php foreach ($itemsGroup  as $item){
                            $offre = get_min_offre_byServiceId($item->id);

                            $chambres_min_prix = get_min_priceofchambres_byServiceId($item->id);
                            $first_image = get_one_image_byServiceId($item->id);?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 popular-destination-left" style="margin-top:2em;">
                            <div class="popular-destinatonbox">
								<?php if ($offre != null){ ?>
                                <div class="ribbon-small">- <?= $offre->pourcentage; ?>%</div>
                            	<?php } ;?>
								<?php if ($offre != null){ ?>
                                    <div class="ribbon list-service-promo" style="display: flex;margin: 0px !important;height: 0px;">

                                        <?php $promo = $offre;
                                        if ($promo !=null && $promo->status !=0){
                                            ?>
                                            <input type="hidden" id="date<?= $promo->service_id; ?>" value="<?= $promo->date_fin; ?>">

                                            <h2 style="position: absolute;margin-left: 0px;background-color: #30151a91;color: white;padding: 9px;font-size: 17px;margin-top: 0px;">Fin de promo <b id="days<?= $promo->service_id; ?>">00</b><b>j</b> <b id="hours<?= $promo->service_id; ?>">00</b><b>h</b>
                                                <b id="minutes<?= $promo->service_id; ?>">00</b><b>min</b> <b id="seconds<?= $promo->service_id; ?>">00</b><b>s</b></h2>
                                            <div class="item-offer-clock" >

                                                <script>
                                                    var dte = document.getElementById('date<?= $promo->service_id; ?>');
                                                    // Set the date we're counting down to
                                                    var countDownDate<?= $promo->service_id; ?> = new Date(dte.value).getTime();
                                                    // alert(dte.value);
                                                    // Update the count down every 1 second
                                                    var x = setInterval(function() {

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
                                                                type   : "POST",
                                                                url    : "<?php echo site_url('service/change_status_by_id'); ?>",
                                                                data   : { id : <?= $promo->id; ?> , '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
                                                                async  : false,
                                                                success: function(response){
                                                                    if(response)
                                                                    {
                                                                        //  alert(response);
                                                                    }
                                                                }
                                                            });

                                                        }else{
                                                            document.getElementById('days<?= $promo->service_id; ?>').innerHTML=days;
                                                            document.getElementById('hours<?= $promo->service_id; ?>').innerHTML=hours;
                                                            document.getElementById('minutes<?= $promo->service_id; ?>').innerHTML=minutes;
                                                            document.getElementById('seconds<?= $promo->service_id; ?>').innerHTML=seconds;
                                                        }

                                                        // If the count down is over, write some text

                                                    }, 1000);

                                                </script>

                                                <p id="is_finish<?= $promo->service_id; ?>"> </p>
                                            </div>

                                        <?php } ?>

                                    </div>
                                	<?php } ;?>
								<img src="<?= base_url()?>assets/backend/services/<?= $first_image ?>" alt="<?= $item->titre; ?>"width="580" style="height:280px;border-radius:10px" />
                                <div class="popular-destination-info" style="background-color:#115d28;border-radius: 11px;">
									<div class="col-12">
										<span class="col-6"><?= $item->titre; ?></span>
										<span class="col-6"><i class="fa fa-map-marker"></i>&nbsp;<?= $item->lieu ?></span>
                                    
									</div> 
									<div class="col-12">
										<a href="<?= base_url()?>details/<?= str_replace(array(" ","*"),"-",$item->titre ).'-'.$item->id ?>.html" title="dettails">
											<h3>détails</h3>
										</a>
										<a href="<?= base_url()?>reservation.html/<?= $item->id ?>" title="Reserver maintenant">
											<h3>Réserver</h3>
										</a>
										<span class="amount"><?php if ($offre != null) echo "<del>".$offre->new_prix."Dh / Jour</del>  "; else echo $item->prix;  ?> Dh / Jour</span>
									</div>
									
								
                                </div>
                            </div>
                        </div>
					<?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
    </main>
	<!--//main-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/frontend/<?= base_url()?>assets/frontend/js/search.js"></script>

<script>
    $(document).ready(function() {
        // Initially, show all categories
        $('.category').show();

        // Button click handlers
        $('.category-button').click(function() {
            var categoryId = $(this).data('category');
            if (categoryId === 'all') {
                // Show all categories when "Afficher Tous" is clicked
                $('.category').show();
            } else {
                $('.category').hide();
                $('.category[data-category="' + categoryId + '"]').show();
            }
        });
    });
</script>
<!--footer-->
<?php $this->load->view("footer"); ?>
<!---footer-->

<!--script-->
<?php $this->load->view("footerscript"); ?>
<!---//script-->

<script type="text/javascript" src="<?= base_url()?>assets/frontend/<?= base_url()?>assets/frontend/js/search.js"></script>

</body>

</html>