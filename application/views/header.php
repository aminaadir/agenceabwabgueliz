<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--header-->

<!--- //loading animation -->
<header id="masthead" class="site-header header-primary">
            <!-- header html start -->
            <div class="top-header">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 d-none d-lg-block">
                        <div class="header-contact-info">
                           <ul>
                              <li>
                                 <a href="#"><i class="fas fa-phone-alt"></i> +01 (977) 2599 12</a>
                              </li>
                              <li>
                                 <a href="https://demo.bosathemes.com/cdn-cgi/l/email-protection#5930373f36190d2b382f3c35773a3634"><i class="fas fa-envelope"></i> <span class="__cf_email__" data-cfemail="781b171508191601381c1715191116561b1715">[email&#160;protected]</span></a>
                              </li>
                              <li>
                                 <i class="fas fa-map-marker-alt"></i> 3146 Koontz Lane, California
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                        <div class="header-social social-links">
                           <ul>
                              <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                        <div class="header-search-icon">
                           <button class="search-icon">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bottom-header">
               <div class="container d-flex justify-content-between align-items-center">
                  <div class="site-identity">
                     <h1 class="site-title">
                        <a href="index.html">
                           <img class="white-logo" src="assets/frontend/images/Screenshot_2023-10-26_114104-removebg-preview.png" alt="logo">
                           <img class="black-logo" src="assets/frontend/images/Screenshot_2023-10-26_114104-removebg-preview.png" alt="logo">
                        </a>
                     </h1>
                  </div>
                  <div class="main-navigation d-none d-lg-block">
                     
                     <nav id="navigation" class="navigation">
                        
                        <ul>
                           <li >
                              <a   <?php if($page_name == "Accueil"){ ?> class="active" <?php } ?>><a href="<?= base_url()?>/" class="nav-link" href="">Accueil</a>
                             
                           </li>
                           
                                 <li >
                                    <a class="dropdown-item"  <?php if($page_name == "Activités"){ ?> class="active" <?php } ?> href="<?= base_url()?>voyages-organises.html" href="#">Destination</a>
                                
                                 </li>
                                 <li >
                                    <a <?php if($page_name == "Deals Hotels"){ ?> class="active" <?php } ?> href="<?= base_url()?>allservices.html"  class="nav-link">Voyage organises</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" <?php if($page_name == "Deals Hotels"){ ?> class="active" <?php } ?> href="<?= base_url()?>hotels.html"  aria-labelledby="dropdownMenuLink"href="#">Réductions</a>
                                 </li>
                                 <li >
                                    <a <?php if($page_name == "about"){ ?> class="active" <?php } ?>><a href="<?= base_url()?>about.html" href="">A propos</a>
                                 </li>
                                 <li >
                                    <a <?php if($page_name == "Contact"){ ?> class="active" <?php } ?>><a href="<?= base_url()?>contact.html" href="">Contacts</a>
                                 </li>
                          
                        </ul>
                     </nav>
                  </div>
                  <!-- <div class="header-btn">
                     <a href="#" class="button-primary">BOOK NOW</a>
                  </div> -->
               </div>
            </div>
            <nav class="mobile-menu-container" style="margin-bottom: 0;">
            <div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                               
                            </div></nav>
         </header>
