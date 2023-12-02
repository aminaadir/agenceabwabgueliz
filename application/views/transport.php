<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
<?php $this->load->view("headscript"); ?>

<body>
<!--header-->
<?php $this->load->view("header"); ?>
<!--//header-->
	
	<!--main-->
	<main class="site-main page-spacing">
        <!-- PageBanner -->
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/pagebanner-voiture.jpg');">
            <div class="container">
                <h3>TRANSPORT ET LOCATION</h3>
            </div>
        </div>
        <!-- PageBanner /- -->

        <div class="destination-mainblock">
            <div class="section-padding"></div>
            <div class="container popular-destination flex justify-content-center">
                <div class="section-header">
                    <h3>Ponctuel - transport</h3>
                </div>
                <div class="popular-destination-block">
                    <div class="row">
					<?php foreach ($transports as $transport){
                            $offre = get_min_offre_byServiceId($transport->id);

                            $chambres_min_prix = get_min_priceofchambres_byServiceId($transport->id);
                            $first_image = get_one_image_byServiceId($transport->id);?>
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

                                            <h2 style="position: absolute;margin-left: 0px;background-color: #30151a91;color: white;padding: 9px;font-size: 17px;margin-top: 0px;">Fin de la promo <b id="days<?= $promo->service_id; ?>">00</b><b>j</b> <b id="hours<?= $promo->service_id; ?>">00</b><b>h</b>
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
								<img src="<?= base_url()?>assets/backend/services/<?= $first_image ?>" alt="<?= $transport->titre; ?>"width="580" height="530" />
                                <div class="popular-destination-info" style="background-color:#115d28de;border-radius: 11px;">
									<div class="col-12">
										<span class="col-6"><?= $transport->titre; ?></span>
										<span class="col-6"><i class="fa fa-map-marker"></i>&nbsp;<?= $transport->lieu ?></span>
                                    
									</div> 
									<div class="col-12">
										<a href="<?= base_url()?>details/<?= str_replace(array(" ","*"),"-",$transport->titre ).'-'.$transport->id ?>.html" title="dettails">
											<h3>détails</h3>
										</a>
										<a href="<?= base_url()?>reservation.html/<?= $transport->id ?>" title="Reserver maintenant">
											<h3>Réserver</h3>
										</a>
										<span class="amount"><?php if ($offre != null) echo "<del>".$offre->new_prix."Dh / jour</del>  "; else echo $transport->prix;  ?> Dh / jour</span>
									</div>
									
								
                                </div>
                            </div>
                        </div>
					<?php } ?>
                    </div>
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
    </main>
	<!--//main-->

<!--footer-->
<?php $this->load->view("footer"); ?>
<!---footer-->

<!--script-->
<?php $this->load->view("footerscript"); ?>
<!---//script-->

<script type="text/javascript" src="<?= base_url()?>assets/frontend/<?= base_url()?>assets/frontend/js/search.js"></script>

</body>

</html>