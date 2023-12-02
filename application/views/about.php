<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
<?php $this->load->view("headscript"); ?>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">

<!--header-->
<?php $this->load->view("header"); ?>
<!--//header-->

<!--main-->
<main class="site-main page-spacing">
        <!-- PageBanner -->
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/illuminated-minaret-symbolizes-spirituality-famous-blue-mosque-generated-by-ai.jpg');">
            <div class="container">
                <h3>à-propos</h3>
            </div>
        </div>
        <!-- PageBanner /- -->

        <!-- TourInfo -->
        <div class="container" style="    margin-bottom: 30px;">
            <div class="tourinfo-section">
                <div class="section-padding"></div>
                <div class="col-md-5">
                    <img src="<?= base_url()?>assets/frontend/images/istockphoto-482206266-612x612.jpg" alt="tourinfo-men" width="407" height="496" />
                </div>
                <div class="col-md-7 tourinfo-content">
                    <h3>plus de 5 ans d’expérience en tourisme expert</h3>
                    <p style="text-align:center">Agence Immobilier Abwabgueliz existe pour vous aider à Acheter / Louer / Vendre ou faire louer votre bien immobilier, et surtout réaliser la transaction immobilière la plus avantageuse pour vous.
 <br><br>
Faites confiance à Abwabgueliz car nous sommes les professionnels de l’immobilier.
  <br><br> 
Nos agences sont vos interlocuteurs privilégiés pour trouver ou bien tirer profit de votre bien, dans les meilleures conditions et avec le maximum d’efficacité.
  <br><br>
Abwabgueliz vous offre l’assurance de votre bien :
Au meilleur prix,
Dans les meilleurs délais,
Avec le maximum de sécurité</p>
                    <!-- <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-6">
                            <ul>
                                <li>toujours à vos côtés</li>
                                <li>La garantie du meilleur prix</li>
                                <li>l'innovation et l'originalité</li>
                                <li>support technique</li>
                            </ul>
                        </div> -->
                        <!--<div class="col-md-5 col-sm-5 col-xs-6">-->
                        <!--    <div class="tourinfo-img">-->
                        <!--        <img src="<?= base_url()?>assets/frontend/images/tourinfo-item.jpg" alt="tourinfo-item" width="270" height="193" />-->
                        <!--    </div>-->
                        <!--</div>-->
                    <!-- </div> -->
                </div>
                <div class="section-padding"></div>
            </div>
        </div>
        <!-- TourInfo /- -->

        <!-- Feature Section -->
      
        <!-- Feature Section /- -->

        

        <!-- Partner Section -->
        <!--<div class="container partner-section" style="margin-top:4em;">-->
        <!--    <div class="section-header">-->
        <!--        <h3>nos partenaires de confiance</h3> -->
        <!--    </div>-->
        <!--    <div class="partner-carousel">-->
        <!--        <div class="partner-box">-->
        <!--            <a href="#" title="partner"><img src="<?= base_url()?>assets/frontend/images/partner1.png" alt="partner1" width="96" height="78" /></a>-->
        <!--        </div>-->
        <!--        <div class="partner-box">-->
        <!--            <a href="#" title="partner"><img src="<?= base_url()?>assets/frontend/images/partner2.png" alt="partner2" width="82" height="87" /></a>-->
        <!--        </div>-->
        <!--        <div class="partner-box">-->
        <!--            <a href="#" title="partner"><img src="<?= base_url()?>assets/frontend/images/partner3.png" alt="partner3" width="96" height="85" /></a>-->
        <!--        </div>-->
        <!--        <div class="partner-box">-->
        <!--            <a href="#" title="partner"><img src="<?= base_url()?>assets/frontend/images/partner4.png" alt="partner4" width="86" height="93" /></a>-->
        <!--        </div>-->
        <!--        <div class="partner-box">-->
        <!--            <a href="#" title="partner"><img src="<?= base_url()?>assets/frontend/images/partner5.png" alt="partner5" width="126" height="61" /></a>-->
        <!--        </div>-->
        <!--        <div class="partner-box">-->
        <!--            <a href="#" title="partner"><img src="<?= base_url()?>assets/frontend/images/partner6.png" alt="partner6" width="116" height="63" /></a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="section-padding"></div>-->
        <!--</div>-->
        <!-- Partner Section /- -->

        <!-- CallOut -->
        <!--<div class="container-fluid no-padding callout-section">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-7 col-sm-7 col-xs-10">-->
        <!--                <div class="callout-content">-->
        <!--                    <h3>Si vous voulez réserver une visite</h3>-->
        <!--                    <span style="color:#f99d71;">Il vous suffit de communiquer avec notre équipe et de passer à l’action </span>-->
        <!--                    <ul>-->
        <!--                        <li><span class="icon icon-Phone2"></span><a href="tel:+212693939311" title=" +212 6 93 93 93 11">(+212) 6 93 93 93 11</a></li>-->
                                <!--<li><span class="icon icon-Mail"></span><a href="mailto:info@ponctuel-voyages.com" title="info@ponctuel-voyages.com">info@ponctuel-voyages.com</a></li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- CallOut /- -->
    </main>
<!--//main-->
<!--footer-->
<?php $this->load->view("footer"); ?>
<!---footer-->

<!--script-->
<?php $this->load->view("footerscript"); ?>
<!---//script-->


<script src="<?= base_url()?>assets/frontend/http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="<?= base_url()?>assets/frontend/<?= base_url()?>assets/frontend/js/infobox.js"></script>