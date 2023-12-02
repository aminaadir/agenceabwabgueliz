<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    #capitol-callback {
      font-family: Arial;
      position: fixed;
      width: 72px;
      height: 72px;
      bottom: 70px;
      top: auto;
      right: auto;
      left: 40px;
      z-index: 2;
    }
    
    .cpt-circle,
    .cpt-circle-fill {
      position: absolute;
      border-radius: 100%;
      -webkit-transition: all 0.5s;
      transition: all 0.5s;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      opacity: 0;
      -webkit-animation-delay: 2s;
      animation-delay: 2s;
    }
    
    .cpt-circle {
      width: 250%;
      height: 250%;
      background-color: transparent;
      border: 2px solid #189d0e;
      -webkit-animation: cptCircle 2.2s infinite ease-in-out;
      animation: cptCircle 2.2s infinite ease-in-out;
      -webkit-transform-origin: 50% 50%;
      -ms-transform-origin: 50% 50%;
      transform-origin: 50% 50%;
      left: -71%;
      top: -75%;
    }
    
    .cpt-circle-fill {
      width: 155%;
      height: 155%;
      background-color: #189d0e;
      border: 2px solid transparent;
      -webkit-animation: cptCircleFill 2.3s infinite ease-in-out;
      animation: cptCircleFill 2.3s infinite ease-in-out;
      box-shadow: 0 0 2px 0 #189d0e !important;
      left: -23.5%;
      top: -27.5%;
    }
    
    .main-button {
      position: relative;
      right: 1px;
      top: 1px;
      float: right;
      width: 64px;
      height: 64px;
      background: center center no-repeat #189d0e;
      box-shadow: 0 3px 5px 1px rgba(0, 0, 0, 0.2);
      background-size: 30px;
      border-radius: 100%;
      cursor: pointer;
      font-size: 16px;
      color: #fff;
      text-align: center;
      line-height: 58px;
    }
    
    .main-button i {
      opacity: 0;
      visibility: hidden;
      -webkit-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
      transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
      -webkit-transform: perspective(400px) rotateY(-180deg) scale(0.4)
        translate3d(-50%, -50%, 0);
      transform: perspective(400px) rotateY(-180deg) scale(0.4)
        translate3d(-50%, -50%, 0);
      z-index: 1;
      width: 45%;
      height: 45%;
      font-size: 16px;
    }
    
    .main-button img {
      vertical-align: middle;
    }
    .main-text {
      position: absolute;
      background: #189d0e;
      width: 0px;
      left: 52px;
      line-height: 40px;
      margin-top: 12px;
      border-radius: 3px;
      color: #fff;
      overflow: hidden;
      white-space: nowrap;
      -webkit-transition: width 1s ease-in-out;
      -moz-transition: width 1s ease-in-out;
      -o-transition: width 1s ease-in-out;
      transition: width 1s ease-in-out;
      text-indent: 10px;
      text-align: left;
    }
    
    .main-text.active {
      width: 328px;
    }
    
</style>

<footer class="footer-main container-fluid no-padding">
        <div class="footer-widgetblock">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <!-- Widget About -->
                    
                     
                    
                    
                    
                    <aside class="col-md-6 col-sm-6 col-xs-6 ftr-widget about_widget">
                        <h3 class="widget-title">À propos de<span>notre </span></h3>
                        <p>Partiralamecque.com / Ariane Voyages est une agence Hajj et Omra agréée par le ministère saoudien du Hajj (numéro d’agrément 2386) Partez au Hajj, Omra et Omra Ramadan en découvrant nos forfaits pour l’année 2023 !</p>
                        <ul>
                            <li><a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://wa.me/+212693939311" title="linkedin"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                        </ul>
                    </aside>
                    <!-- Widget About /- -->

                    <!-- Widget Link -->
                    <aside class="col-md-2 col-sm-6 col-xs-6 ftr-widget link_widget">
                        <h3 class="widget-title">Liens<span> utiles </span></h3>
                        <a <?php if($page_name == "Deals Hotels"){ ?> class="active" <?php } ?> href="<?= base_url()?>allservices.html"   title="ventes">Voyage organises</a>
                        <a <?php if($page_name == "Deals Hotels"){ ?> class="active" <?php } ?> href="<?= base_url()?>hotels.html"  title="About Us">Activités au Maroc</a>
                        <a <?php if($page_name == "Deals Hotels"){ ?> class="active" <?php } ?> href="<?= base_url()?>voyages-organises.html"   title="ventes">Destination</a>
                        <a <?php if($page_name == "about"){ ?> class="active" <?php } ?>><a href="<?= base_url()?>about.html" title="location">A propos</a>
                        <a <?php if($page_name == "Contact"){ ?> class="active" <?php } ?>><a href="<?= base_url()?>contact.html"  title="loc.vacance">Contact</a>
                        <!--<a href="<?= base_url()?>allservices.html"  title="Popular Destination">toutes les destinations</a>-->
                        <!-- <a href="contactus.html" title="Contact Us">contactez-nous</a> -->
                    </aside>
                    
                    <aside class="col-md-4 col-sm-6 col-xs-6 ftr-widget openinghours_widget">
                         <a href="<?= base_url()?>/"><img src="<?= base_url()?>assets/frontend/images/Screenshot_2023-10-26_114104-removebg-preview.png" alt="logo" height="52"  style="width:100%; margin-top:40px" />
                    </aside>
                    <!-- Widget Link /- -->

                    <!-- Widget OpeningHours -->
                    <!--<aside class="col-md-4 col-sm-6 col-xs-6 ftr-widget openinghours_widget">-->
                    <!--    <h3 class="widget-title">Heures <span>d’ouverture </span></h3>-->
                    <!--    <p>Lundi<span>9 h à 18 h</span></p>-->
                    <!--    <p>Mardi<span>9 h à 18 h</span></p>-->
                    <!--    <p>Mercredi<span>9h00 à 18h00</span></p>-->
                    <!--    <p>Jeudi<span>9h00 à 18h00</span></p>-->
                    <!--    <p>Vendredi<span>9 h à 18 h</span></p>-->
                    <!--    <p>Samedi<span>9 h à 14 h</span></p>-->
                    <!--</aside>-->
                    <!-- Widget OpeningHours/- -->

                    <!-- Widget PopularDestination -->
                    <!--<aside class="col-md-3 col-sm-6 col-xs-6 ftr-widget populardestination_widget">-->
                    <!--    <h3 class="widget-title">Destination <span> populaire</span></h3>-->
                    <!--    <ul>-->
                    <!--        <li>-->
                    <!--            <a title="instagram" href="#"><img width="130" height="130" alt="destinaion1" src="<?= base_url()?>assets/frontend/images/ftr-populardestinaion1.jpg"></a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a title="instagram" href="#"><img width="130" height="130" alt="destinaion1" src="<?= base_url()?>assets/frontend/images/ftr-populardestinaion2.jpg"></a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a title="instagram" href="#"><img width="130" height="130" alt="destinaion1" src="<?= base_url()?>assets/frontend/images/ftr-populardestinaion3.jpg"></a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a title="instagram" href="#"><img width="130" height="130" alt="destinaion1" src="<?= base_url()?>assets/frontend/images/ftr-populardestinaion4.jpg"></a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</aside>-->
                    <!-- Widget PopularDestination /- -->
                  
                </div>
            </div>
            <!-- Container /- -->
        </div>
        <!-- Footer WidgetBlock /- -->
        
        <div id="capitol-callback">
            <div class="cpt-circle"></div>
            <div class="cpt-circle-fill"></div>
            <a href="https://wa.me/+212693939311" id="WhatsAppBtnDesktop" target="" class="main-button"
                lang="fr">
                <img src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-whatsapp-mobile-software-icon-png-image_6315991.png" width="50%">

            </a>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <span style="color:#fff; display: flex;
    justify-content: center;">2023 All right reserved. Copyright by<a href="https://icf.ma/" style="color:#d43f3a;"> ICF.</a></span>
                <!--<div class="row">-->
                <!--    <div class="col-md-12">-->
                <!--        <span>2023 All right reserved. Copyright by<a href="https://icf.ma/" style="color:red;"> ICF.</a></span>-->
                <!--    </div>-->
         
                <!--</div>-->
            </div>
        </div>
        <!-- Footer Bottom /- -->
    </footer>