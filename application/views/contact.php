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
                <h3>contactez-nous</h3>
            </div>
        </div>
        <!-- PageBanner /- -->

        <div class="container contactus-section">
            <div class="section-padding"></div>
            <div class="row">
                <div class="col-md-6 contactus-left">
                    <!-- Map -->
                    <div class="map">
                        <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.8342307044963!2d-8.008955184458474!3d31.63838884846965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee88970d88b9%3A0x3a668719565a78d7!2s2eme%20%C3%A9tage%2C%20App%20N%2C%202%20Av.%20Yacoub%20El%20Mansour%2C%20Marrakech%2040000!5e0!3m2!1sfr!2sma!4v1643040966721!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                    </div>
                    <!-- Map /- -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 office-add">
                            <h3 class="block-title">adresse du bureau</h3>
                            <p><span>réserver votre visite , </span>  Guéliz Marrakech - Maroc</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 contact-info">
                            <h3 class="block-title">Coordonnées</h3>
                            <p><span>TELE :</span><a href="tel:+212693939311" title="+212693939311">+212 6 93 93 93 11</a></p>
                            <!--<p><span>FIX 2 :</span><a href="tel:212524458849" title="011234567896">+212 524 45 88 49</a></p>-->
                            <!--<p><span>Email 1:</span><a href="mailto:ponctuelvoyages@gmail.com" title="info@ourdomain.com"> ponctuelvoyages@gmail.com</a></p>-->
                            <!--<p><span>Email 2:</span><a href="mailto:info@ponctuel-voyages.com" title="info@ourdomain.com"> info@ponctuel-voyages.com</a></p>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 contactus-right" style="    padding-left: 50px;">
                    <form style="border: none;" id="contact-form" action="https://formspree.io/f/xnqkllqo"
                        method="POST" class="contactus-form">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="Votre Nom " required="" class="form-control" id="input_name" placeholder="Nom Complet*" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="Votre email" required="" class="form-control" id="input_email" placeholder="Adresse Email*" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="Votre télephone" required="" class="form-control" id="input_phone" placeholder="téléphone" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea rows="5" name=" Votre message" required="" class="form-control" id="textarea_message" placeholder="votre Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="submit" value="Envoyer" >
                                </div>
                            </div>
                            <div id="alert-msg" class="alert-msg"></div>
                        </div>
                    </form>
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


<script src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="<?= base_url()?>assets/frontend/js/infobox.js"></script>


</body>

</html>