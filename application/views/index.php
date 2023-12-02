<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <style>
    /* Style par défaut pour l'icône */
    .fa-calendar-minus {
      color: black;
    }

    
    .status-div {
        background-color: #115d28; /* Couleur de fond personnalisée */
        padding: 10px; /* Marge intérieure pour l'apparence */
        text-align: center; /* Pour centrer le texte */
    }

    .status-available {
        color: white; /* Couleur du texte si des places sont disponibles */
        font-weight: bold;
    }

    .status-full {
        color: white; /* Couleur du texte si le forfait est complet */
        font-weight: bold;
    }


  </style>


    </head>

<?php $this->load->view("headscript"); ?>
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">

<!--header-->
<?php $this->load->view("header"); ?>
<!--//header-->
<!--main-->
<main class="site-main page-spacing">
    
           
        <!-- PhotoSlider2 -->
        <div class="container-fluid no-padding photoslider2">
            <!-- PhotoSlider2 Carousel-->
            <div class="container-fluid no-padding photoslider2-carousel">
                <!-- Booking Form -->
             
                <section class="home-slider-section">
               <div class="home-slider">
                  <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(assets/frontend/images/hp-slider-menara-tours-2.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">TRAVELLING AROUND THE WORLD</h2>
                                 <p>Taciti quasi, sagittis excepteur hymenaeos, id temporibus hic proident ullam, eaque donec delectus tempor consectetur nunc, purus congue? Rem volutpat sodales! Mollit. Minus exercitationem wisi.</p>
                                 <a href="#" class="button-primary">CONTINUE READING</a>
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div>
                  <!-- <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(assets\frontend\images\slider-banner-2.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">EXPERIENCE THE NATURE'S BEAUTY</h2>
                                 <p>Taciti quasi, sagittis excepteur hymenaeos, id temporibus hic proident ullam, eaque donec delectus tempor consectetur nunc, purus congue? Rem volutpat sodales! Mollit. Minus exercitationem wisi.</p>
                                 <a href="#" class="button-primary">CONTINUE READING</a>
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div> -->
               </div>
            </section>
            <!-- slider html start -->
            <!-- Home search field html start -->
            <div class="trip-search-section shape-search-section" style="    padding-bottom: 0px;">
               <div class="slider-shape"></div>
               <div class="container">
                  <div class="trip-search-inner white-bg d-flex">
                     <div class="input-group">
                        <label> Search Destination* </label>
                        <input type="text" name="s" placeholder="Enter Destination">
                     </div>
                     <div class="input-group">
                        <label> Pax Number* </label>
                        <input type="text" name="s" placeholder="No.of People">
                     </div>
                     <div class="input-group width-col-3">
                        <label> Checkin Date* </label>
                        <i class="far fa-calendar"></i>
                        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                     </div>
                     <div class="input-group width-col-3">
                        <label> Checkout Date* </label>
                        <i class="far fa-calendar"></i>
                        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                     </div>
                     <div class="input-group width-col-3">
                        <label class="screen-reader-text"> Search </label>
                        <input type="submit" name="travel-search" value="INQUIRE NOW">
                     </div>
                  </div>
               </div>
            </div>
            </div>
            <!-- PhotoSlider2 Carousel /- -->
        </div>
        <!-- PhotoSlider2 /- -->
        <br>
        <br>
        <br>
<div  >
<section class="package-section" style="padding-bottom: 60px;">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">EXPLOREZ DE GRANDS LIEUX</h5>
                           <h2>FORFAITS POPULAIRES</h2>
                           <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
                        </div>
                     </div>
                  </div>
                  <div class="package-inner">
                  <?php if (empty($activities)) { ?>
    <div class="row">
        <div class="col-12">
            <h1 style="text-align:center; width: 90%; margin: 0 auto;">Aucune Offre Omra disponible pour le moment.</h1>
        </div>
    </div>
<?php } else { 
  ?> 
                     <div class="row">
                        <?php foreach ($activities as $key => $activity) {
    $first_image = get_one_image_byServiceId($activity->id);
    ?>
                        <div class="col-lg-4 col-md-6">
                           <div class="package-wrap">
                              <figure class="feature-image">
                                 <a href="#">
                                 <img style="height: 280px;"  src="<?= base_url() ?>assets/backend/services/<?= $first_image ?>" alt="<?= $activity->titre; ?>" alt="">
                                 </a>
                              </figure>
                              <div class="package-price">
                                 <h6>
                                    <span> <?php echo $prix = $activity->prix; ?>DH</span> / par person
                                 </h6>
                              </div>
                              <div class="package-content-wrap">
                                 <div class="package-meta text-center">
                                    <ul>
                                       <!-- <li>
                                          <i class="far fa-clock"></i>
                                          7D/6N
                                       </li> -->
                                       <!-- <li>
                                          <i class="fas fa-user-friends"></i>
                                          People: 5
                                       </li> -->
                                       <li>
                                       <?php
                        if ($activity->statusDeForfait == "1") {
                            echo '<span style="color:white;" class="status-available">Places disponibles</span>';
                        } else {
                            echo '<span style="color:white;" class="status-full">Complet</span>';
                        }
                        ?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="package-content">
                                    <h3>
                                       <?= $activity->titre; ?>
                                    </h3>
                                   
                                    <table class="table table-responsive" style="border-bottom: white;">
                            <tbody style="font-family: sans-serif;">
                                <tr>
                                    <th style="color: black;
    font-size: medium;
    font-family: serif;"><i style="color: black;" class="fa-regular fa-calendar fa-lg"></i>&nbsp;&nbsp;Disponibilité: <?php echo $disponibilite = $activity->disponibilite; ?></th>
                                </tr>
                                <tr>
                                    <th style="color: black;
    font-size: medium;
    font-family: serif;"> <i style="color: black;" class="fa-solid fa-plane-departure fa-lg"></i>&nbsp;&nbsp;<?php echo $lieu = $activity->lieu; ?></th>
                                </tr>
                                <tr>
                                    <th style="color: black;
    font-size: medium;
    font-family: serif;"> <i style="color: black;" class="fa-solid fa-plane-arrival fa-lg"></i>&nbsp;&nbsp;<?php echo $lieu2 = $activity->lieu2; ?></th>
                                </tr>
                                <tr>
                                    <td style="font-size: large; font-weight: bolder; color: #6d071a; display: flex; flex-direction: row-reverse; border-top: none;"> <div class="review-area">
                                       <span class="review-text">(25 reviews)</span>
                                       <div class="rating-start" title="Rated 5 out of 5">
                                          <span style="width: 60%"></span>
                                       </div>
                                    </div></td>
                                </tr>
                            </tbody>
                        </table>
                               
                                    <div class="btn-wrap">
                                       <a  href="<?= base_url() ?>details/<?= str_replace(array(" ", "*"), "-", $activity->titre) . '-' . $activity->id ?>.html"  class="button-text width-12">VOIR LES DÉTAILS<i class="fas fa-arrow-right"></i></a>
                                       <!-- <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                      

                        <?php } } // Fin de la boucle foreach ?>
                        <script>
    function trimString(text, maxLength) {
        if (text.length > maxLength) {
            return text.slice(0, maxLength) + '...';
        }
        return text;
    }

    // Utilisation de la fonction pour tronquer le paragraphe
    const paragraph = document.querySelector('.text p');
    const maxLength = 150;

    if (paragraph) {
        const originalText = paragraph.textContent;
        const trimmedText = trimString(originalText, maxLength);
        paragraph.textContent = trimmedText;
    }
</script>
                     </div>
                     <div class="btn-wrap text-center">
                        <a  <?php if($page_name == "Activités"){ ?> class="active" <?php } ?>><a href="<?= base_url()?>allservices.html" class="button-primary">VOIR TOUS LES FORFAITS</a>
                     </div>
                  </div>
               </div>
            </section>

            <section class="destination-section" style="padding-bottom: 50px;">
               <div class="container">
                  <div class="section-heading">
                     <div class="row align-items-end">
                        <div class="col-lg-7">
                           <h5 class="dash-style">DESTINATION POPULAIRE</h5>
                           <h2>DESTINATION AU TOP</h2>
                        </div>
                        <div class="col-lg-5">
                           <div class="section-disc">
                               Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="destination-inner destination-three-column">
                     <div class="row">
                        <div class="col-lg-7">
                           <div class="row">
                           <?php if (empty($voyages)) { ?>
                    <div class="row">
                        <div class="col-12">
                            <h1 style="text-align:center; width: 90%;
    margin: 0 auto;">Aucune Forfiat Omra Ramadan  disponible pour le moment.</h1>
                        </div>
                    </div>
                <?php } else { 
               foreach ($voyages as $voyage){
                $offre = get_min_offre_byServiceId($voyage->id);
                $chambres_min_prix = get_min_priceofchambres_byServiceId($voyage->id);

                $first_image = get_one_image_byServiceId($voyage->id);
                ?>
                              <div class="col-sm-6">
                                 <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                       <img src="assets\frontend\images\img1.jpg" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                       <a href="<?= base_url() ?>details/<?= str_replace(array(" ", "*"), "-", $voyage->titre) . '-' . $voyage->id ?>.html" ><?php echo $lieu = $voyage->lieu; ?></a>
                                    </div>
                                    <div class="desti-content">
                                       <h3>
                                          <a href="<?= base_url() ?>details/<?= str_replace(array(" ", "*"), "-", $voyage->titre) . '-' . $voyage->id ?>.html" ><?= $voyage->titre; ?></a>
                                       </h3>
                                       <div class="rating-start" title="Rated 5 out of 4">
                                          <span style="width: 53%"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              <?php } ;?>
    <?php } ;?>
                           </div>
                        </div>
                      
                     </div>
                     <div class="btn-wrap text-center">
                        <a class="button-primary" <?php if($page_name == "Deals Hotels"){ ?> class="active" <?php } ?> href="<?= base_url()?>voyages-organises.html"  aria-labelledby="dropdownMenuLink"href="#">MORE DESTINATION</a>
                     </div>
                  </div>
               </div>
            </section>
            <section class="special-section" style="padding-bottom: 60px;">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">OFFRE DE VOYAGE & RÉDUCTION</h5>
                           <h2>OFFRE SPÉCIALE DE VOYAGE</h2>
                           <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
                        </div>
                     </div>
                  </div>
                  <div class="special-inner">
                     <div class="row">
                     <?php if (empty($hotels)) { ?>
                    <div class="row">
                        <div class="col-12">
                            <h1 style="text-align:center; width: 90%;
    margin: 0 auto;">Aucune Offre Hajj disponible pour le moment.</h1>
                        </div>
                    </div>
                <?php } else { 
                foreach ($hotels as $hotel){
                  $offre = get_min_offre_byServiceId($hotel->id);
                  $chambres_min_prix = get_min_priceofchambres_byServiceId($hotel->id);

                    $first_image = get_one_image_byServiceId($hotel->id);
                 
                            ?>
                        <div class="col-md-6 col-lg-4">
                           <div class="special-item">
                              <figure class="special-img">
                                 <img src="assets\frontend\images\img9.jpg" alt="">
                              </figure>
                              <div class="badge-dis">
                                 <span>
                                    <strong><?= $hotel->percent; ?>%</strong>
                                    off
                                 </span>
                              </div>
                              <div class="special-content">
                                 <div class="meta-cat">
                                    <a href="#"><?= $hotel->lieu2; ?></a>
                                 </div>
                                 <h3>
                                    <a href="#"><?= $hotel->titre; ?></a>
                                 </h3>
                                 <div class="package-price">
                                    Price:
                                    <del><?= $hotel->prix_initial; ?>DH</del>
                                    <ins><?= $hotel->prix; ?>DH</ins>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ;?>
    <?php } ;?>
                      
                     </div>
                  </div>
               </div>
            </section>
            <section class="best-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-5">
                        <div class="section-heading">
                           <h5 class="dash-style">NOTRE GALERIE DE VISITES</h5>
                           <h2>PHOTOS PARTAGÉES DES MEILLEURES VOYAGEURS</h2>
                           <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Esse? Aut nostrum, ornare quas provident laoreet nesciunt odio voluptates etiam, omnis.</p>
                        </div>
                        <figure class="gallery-img">
                           <img src="assets\frontend\images\img12.jpg" alt="">
                        </figure>
                     </div>
                     <div class="col-lg-7">
                        <div class="row">
                           <div class="col-sm-6">
                              <figure class="gallery-img">
                                 <img src="assets\frontend\images\img13.jpg" alt="">
                              </figure>
                           </div>
                           <div class="col-sm-6">
                              <figure class="gallery-img">
                                 <img src="assets\frontend\images\img13.jpg" alt="">
                              </figure>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <figure class="gallery-img">
                                 <img src="assets\frontend\images\img15.jpg" alt="">
                              </figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <section class="subscribe-section" style="background-image: url(assets/frontend/images/img16.jpg);">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7">
                        <div class="section-heading section-heading-white">
                           <h5 class="dash-style">OFFRE FORFAIT VACANCES</h5>
                           <h2>SPÉCIAL VACANCES -25% !</h2>
                           <h4>Inscrivez-vous maintenant pour recevoir des offres spéciales et des informations sur les meilleurs forfaits, mises à jour et réductions !!</h4>
                           <div class="newsletter-form">
                              <form>
                                 <input type="email" name="s" placeholder="Your Email Address">
                                 <input type="submit" name="signup" value="SIGN UP NOW!">
                              </form>
                           </div>
                           </div>
                     </div>
                  </div>
               </div>
            </section>
</div>

        
         <!-- omraRamadan -->
 
     <!--fin de OmraRamadan  -->
<!-- hajj -->
 
<!-- finHajj -->
<div class="container">
    <div class="row"><div class="col-md-12"> <h2 style="text-align: center;color: #115d28;">Pourquoi choisir Notre Agence<img  src="<?= base_url()?>assets/frontend/images/Screenshot_2023-10-26_114104-removebg-preview.png" style="height: 110px;" alt="">? </h2></div></div>
    <br>
    <br>
<div class="row">
<div class="col-md-4">
    
   <center><img  src="<?= base_url()?>assets/frontend/images/percent-150x150-1.png" style="height: 110px;" alt=""></center> 
<h4 style="text-align: center;"><b>Nos Formules</b></h4>
<p style="text-align: center;font-weight: 600;">Excellent service d'accompagnement, prix raisonnables, hôtel de qualité proche de la Terre Sainte.</p>
</div>
<div class="col-md-4">
    
   <center><img  src="<?= base_url()?>assets/frontend/images/group-150x150-1.png" style="height: 110px;" alt=""></center> 
<h4 style="text-align: center;"><b>Notre Équipe</b></h4>
<p style="text-align: center;font-weight: 600;">Tous nos circuits disposent d'une équipe permanente pour garantir un hébergement de qualité. Des guides touristiques locaux parlant français et arabe vous aident à rendre votre voyage inoubliable.</p>
</div>
<div class="col-md-4">
    
   <center><img  src="<?= base_url()?>assets/frontend/images/travel-150x150-1.png" style="height: 110px;" alt=""></center> 
<h4 style="text-align: center;"><b>Notre Expérience </b></h4>
<p style="text-align: center;font-weight: 600;">Bénéficiez de l'expérience de nos guides et managers locaux dans tout ce qui concerne le voyage (visites, offres, etc.)</p>
</div>
</div>
</div>
     <!-- info -->
 
<!--vidoethique-->
<!-- <div class="container"> -->
  <div class="row">
    <div class="col-md-12">
    <div class="map" style="margin-bottom: 0px;">
                        <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.8342307044963!2d-8.008955184458474!3d31.63838884846965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee88970d88b9%3A0x3a668719565a78d7!2s2eme%20%C3%A9tage%2C%20App%20N%2C%202%20Av.%20Yacoub%20El%20Mansour%2C%20Marrakech%2040000!5e0!3m2!1sfr!2sma!4v1643040966721!5m2!1sfr!2sma" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                    </div>
    </div>
  </div>
<!-- </div> -->






<!--/vidoethique-->
<script>
  // Fonction pour changer l'icône lors du survol du premier paragraphe
  function changeIcon() {
    const iconElement = document.querySelector('.fa-calendar-minus');
    if (iconElement) {
      iconElement.classList.remove('fa-calendar-minus');
      iconElement.classList.add('fa-calendar-check');
    }
  }

  // Fonction pour restaurer l'icône lorsqu'on quitte le survol du premier paragraphe
  function restoreIcon() {
    const iconElement = document.querySelector('.fa-calendar-check');
    if (iconElement) {
      iconElement.classList.remove('fa-calendar-check');
      iconElement.classList.add('fa-calendar-minus');
    }
  }
</script>

<script>
  // Fonction pour changer l'icône lors du survol du deuxième paragraphe
  function changeIcon2() {
    const iconElement2 = document.querySelector('.fa-calendar-minus2'); // Utilisez une classe différente pour le deuxième paragraphe
    if (iconElement2) {
      iconElement2.classList.remove('fa-calendar-minus2');
      iconElement2.classList.add('fa-calendar-check');
    }
  }

  // Fonction pour restaurer l'icône lorsqu'on quitte le survol du deuxième paragraphe
  function restoreIcon2() {
    const iconElement2 = document.querySelector('.fa-calendar-check2'); // Utilisez une classe différente pour le deuxième paragraphe
    if (iconElement2) {
      iconElement2.classList.remove('fa-calendar-check2');
      iconElement2.classList.add('fa-calendar-minus2');
    }
  }
</script>



     <!-- finInfo -->
</main>
<!--//main-->

<!--footer-->
<?php $this->load->view("footer"); ?>
<!---footer-->

<!--script-->
<?php $this->load->view("footerscript"); ?>
<!---//script-->

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.form').hide();
            $('#form1').show();
            $('.f-item:nth-child(1)').addClass('active');
            $('.f-item:nth-child(1) span').addClass('checked');

            $('#hero-gallery').lightSlider({
                gallery: true,
                item: 1,
                pager: false,
                gallery: false,
                slideMargin: 0,
                speed: 2000,
                pause: 1000,
                mode: 'fade',
                auto: true,
                loop: true,
                onSliderLoad: function () {
                    $('#hero-gallery').removeClass('cS-hidden');
                }
            });
        });
    })(jQuery);
</script>
<script>
    $(document).ready(function() {
        // Initialisation du carrousel
        $('#carouselExampleControls').carousel();
    });
</script>



<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.js"></script>
      <script src="../../../cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
      <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
      <script src="assets/vendors/countdown-date-loop-counter/loopcounter.js"></script>
      <script src="assets/js/jquery.counterup.js"></script>
      <script src="assets/vendors/modal-video/jquery-modal-video.min.js"></script>
      <script src="assets/vendors/masonry/masonry.pkgd.min.js"></script>
      <script src="assets/vendors/lightbox/dist/js/lightbox.min.js"></script>
      <script src="assets/vendors/slick/slick.min.js"></script>
      <script src="assets/js/jquery.slicknav.js"></script>
      <script src="assets/js/custom.min.js"></script>
   <script>(function(){var js = "window['__CF$cv$params']={r:'81e3199238b041f0',t:'MTY5ODY2MzA1My4yNTEwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/c359bc3d/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>


</body>

</html>