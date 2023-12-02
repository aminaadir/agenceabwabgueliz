<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
<?php $this->load->view("headscript"); ?>

<body  data-offset="200" data-spy="scroll" data-target=".ow-navigation">

<!--header-->
<?php $this->load->view("header"); ?>
<!--//header-->
<style>
    .book-now {
  margin: 30px auto;
  text-align: center;
}
a .btn1 {
  margin: 20px;
}
.custom-btn {
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 1 */
.btn1 {
  background: #115d28;
  border: none;
}
.btn1:hover {
   background: #fff;
   color:#115d28;
}

        /* Style pour le menu de défilement */
        #menu-defilement {
            position:relative;
            
            left: 10px;
            transform: translateY(-50%);
            /* background-color: #f0f0f0; */
            padding: 10px;
        }

        #menu-defilement ul {
            list-style: none;
            padding: 0px;
            display: flex;
    justify-content: space-evenly;
    gap: 100px
        }

        #menu-defilement li {
            margin: 5px 0;
            cursor: pointer;
            /* color: blue; */
            /* text-decoration: underline; */
            color: gray;
    font-size: larger;
    font-weight: 500;
        }
        #menu-defilement li a{
            color: gray;
        }
        


  
</style>

<!--main-->
<main class="site-main page-spacing">
        <!-- PageBanner -->
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/illuminated-minaret-symbolizes-spirituality-famous-blue-mosque-generated-by-ai.jpg');">
            <!-- <div class="container">
                
                <h3><a style="color:white;"title="<?= $service->titre ?>"><?= $service->titre ?></a></h3>
                
            </div> -->
        </div>


        <!-- Popular Destination 2 -->
        <div class="container-fluid no-padding destination-details-section">
            <div class="section-padding"></div>
            <div style="padding-left: 50px;padding-right:50px;">
                <div class="row">
                <div class="col-md-8">

               
            <header>

    </header>
            <?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_offre_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
                    <div id="section1">
                    <h3><b><a style="color:black;"title="<?= $service->titre ?>"><?= $service->titre ?></a></b></h3> 
                    <p style="    font-family: sans-serif;
    font-size: medium;
    text-align: justify;"><?= $service->grand_desc ?></p>

                </div> 
                   <?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_offre_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
                    
                    <h3><b>HOTEL MAKKA: &nbsp;<a role="button" style="color:#115d28;"title="<?= $service->titre_hotel ?>"><?= $service->titre_hotel ?></a>– Face Haram</b></h3> 
                    <p style="    font-family: sans-serif;
    font-size: medium;
    text-align: justify;"><?= $service->desc_hotel ?></p>
         <div   class="gallery container-fluid" style="padding:2em; ">
                    <ul id="image-gallery" class="cS-hidden">
                        
                        <li class="justify-content-center" style="display: flex;justify-content: center;"data-thumb="<?= base_url()?>assets/backend/services/<?= $service->image_hotel_makka	?>">
                            <img style="text-align: center;align-items: center;align-content: center;" src="<?= base_url()?>assets/backend/services/<?= $service->image_hotel_makka	?>" alt="<?= $service->titre; ?>"/>
                        </li>
                      

                        </ul></div>
            <!-- <div id="section2">
                <div><h3> <i class="fa-solid fa-list " style="color: #000000;"></i>  Programme</h3></div>
                <p><?= $service->Programme ?></p>
            </div> -->
            <?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_min_priceofchambres_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
                     <h3><b>HOTEL MEDINA: &nbsp;<a role="button" style="color:#115d28;"title="<?= $service->titre_hotel_Medina ?>"><?= $service->titre_hotel_Medina?></a>– Face Haram</b></h3> 
                    <p style="    font-family: sans-serif;
    font-size: medium;
    text-align: justify;"><?= $service->desc_hotel ?></p>
         <div   class="gallery container-fluid" style="padding:2em; ">
                    <ul id="image-gallery" class="cS-hidden">
                       
                        <li class="justify-content-center" style="display: flex;justify-content: center;"data-thumb="<?= base_url()?>assets/backend/services/<?= $service->image_hotel_medina ?>">
                            <img style="text-align: center;align-items: center;align-content: center;" src="<?= base_url()?>assets/backend/services/<?= $service->image_hotel_medina ?>" alt="<?= $service->titre; ?>"/>
                        </li>
                        

                        </ul></div>
            <!-- <div id="section2">
                <div><h3> <i class="fa-solid fa-list " style="color: #000000;"></i>  Programme</h3></div>
                <p><?= $service->Programme ?></p>
            </div> -->
            <?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_min_priceofchambres_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
           

                </div>
               <div class="col-md-4 col-sm-12 card shadow-lg mb-5 bg-body rounded d-none  d-lg-block" style="background-color: beige;    height: 100%; top: 20px; border-radius: 5%; padding-right: 20px; padding-left: 20px;">
  <div class="fixed-form" style="color: black;">
    <form method="post" action="<?= base_url() ?>reservation.html/<?= $service->id; ?>">
      <div class="row">
        <div class="f-item full-width" style="padding: 1em;">
          <fieldset>
            <div class="row" style="display: none;">
              <div class="col-12 col-md-4 form-group clearfix">
                <label for="select" class="form-control-label">Est un nouveau client?</label>
                <br>
                <div class="icheck-primary d-inline">
                  <input type="radio" name="new_client" value="1" id="radioPrimary1" checked>
                  <label for="radioPrimary1">Nouveau client</label>
                </div>
                <div class="icheck-primary d-inline">
                  <input type="radio" name="new_client" value="0" id="radioPrimary2">
                  <label for="radioPrimary2">Exist client</label>
                </div>
              </div>
            </div>
            <h4 for=""><?= $service->titre; ?></h4>
            <input type="hidden" id="service_id" value="<?= $service->id; ?>" name="service_id" />
          </fieldset>
          <fieldset>
            <div class="row">
              <div class="f-item half-width">
                <label for="nom">Votre Nom </label>
                <input class='uniform-input' type="text" id="nom" placeholder="votre nom" name="nom" />
              </div>
              <div class="f-item half-width">
                <label for="prenom">Votre Prénom </label>
                <input class='uniform-input' type="text" id="prenom" placeholder="votre prénom" name="prenom" />
              </div>
              <div class="f-item half-width">
                <label for="phone">Votre Téléphone </label>
                <input class='uniform-input' type="text" id="phone" placeholder="Votre Téléphone" name="tel1" />
              </div>
              <div class="f-item half-width">
                <label for="email">Date de Réservation </label>
                <input class='uniform-input' type="date" id="email" name="date" placeholder="exemple@mail.com" />
              </div>
              <div class="f-item half-width" style="width: 100%">
                <label for="message">Message</label>
                <textarea style="height: 100px;" class="uniform-input" id="message" placeholder="Type your message" name="message"></textarea>
              </div>
            </div>
          </fieldset>
          <div class="col-md-12" style="display: flex;    flex-direction: column;">
            <div class="book-now" style="margin: -5px;">
              <input class="custom-btn btn1 fixed-button1" type="submit" value="Réserver" id="submit" title="Send" name="submit">
            </div>
            <div class="book-now">
              <a class="custom-btn btn1 fixed-button1" style="width: 223px" href="https://wa.me/+212689519190/?text=<?= urlencode('Reservation Info' . PHP_EOL . 'Nom de: ' . $service->titre . PHP_EOL . 'Address: lieu de départ ' . $service->lieu . ' et lieu d\'arrivée ' . $service->lieu2 . PHP_EOL . 'Prix: ' . $service->prix . ' MAD' . PHP_EOL . 'Lien: ' . base_url() . 'details/' . str_replace(array(" ", "*"), "-", $service->titre) . '-' . $service->id . '.html') ?>" title="WhatsApp Reservation">
                Réserver par WhatsApp
              </a>
            </div>
          </div>
          <div id="alert-msg" class="alert-msg"></div>
        </div>
      </div>
    </form>
  </div>
</div>

 
           </div>
        </div>

        <!-- 555 -->
        <div class="container">
<div class="row">
<div class="col-md-12">
<div id="section2">
                <div><h3> <i class="fa-solid fa-list " style="color: #000000;"></i>  Programme</h3></div>
                <p><?= $service->Programme ?></p>
            </div>
<div id="section3">
                <h3><i class="fa-solid fa-list " style="color: #000000;"></i>  Trafis</h3>
                <div class="card border-light mb-3" style="max-width:100%;">
                <div class="row">
                
                <div class="col-md-4" style="padding-right: 20px;">
                <div class="card shadow-lg mb-5 bg-body rounded" >
  <div class="card-body" >
 
    <h5 class="card-title" style="font-size: larger;
    text-align: center;"><i class="fa-solid fa-bed fa-xl" style="color: #090a0c;"></i>   x 1 : Chambre single</h5>
    <hr style="
    border-top: 2px solid;
">
    <h4 class="card-text" style="font-weight: 400;
    text-align: center;">PRIX PAR PERSONNE</h4>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <br>
    <?php foreach ($chambres as $chambre){
       if ($chambre->type_chambre=="Chambre single") {
       
        ?>
    <h4 style="font-weight: bold;
    text-align: center;color:#115d28;text-decoration: underline;"><?= $chambre->prix ?></h4><?php } }?>
  </div>    
</div>
</div>

<div class="col-md-4" style="padding-right: 20px;">
<div class="card shadow-lg mb-5 bg-body rounded" >
  <div class="card-body">
    <h5 class="card-title" style="font-size: larger;
    text-align: center;"><i class="fa-solid fa-bed fa-xl" style="color: #090a0c;"></i>   x 2 : Chambre Double</h5>
    <hr style="
    border-top: 2px solid;
">
    <p class="card-text" style="font-weight: 400;
    text-align: center;">PRIX PAR PERSONNE</p>
   <br>
   <?php foreach ($chambres as $chambre){
       if ($chambre->type_chambre=="Chambre double") {
       
        ?>
    <h4 style="font-weight: bold;
    text-align: center;color:#115d28;text-decoration: underline;"><?= $chambre->prix ?></h4><?php } }?>
    <!-- <div style=""></div> -->
                        </div>
</div>
</div>
<div class="col-md-4" style="padding-right: 20px;">
<div class="card shadow-lg mb-5 bg-body rounded" >
  <div class="card-body">
    <h5 class="card-title" style="font-size: larger;
    text-align: center;"><i class="fa-solid fa-bed fa-xl" style="color: #090a0c;"></i>   x 3 : Chambre triple</h5>
    <hr style="
    border-top: 2px solid;
">
    <p class="card-text" style="font-weight: 400;
    text-align: center;">PRIX PAR PERSONNE</p>
   <br>
   <?php foreach ($chambres as $chambre){
       if ($chambre->type_chambre=="Chambre triple") {
       
        ?>
    <h4 style="font-weight: bold;
    text-align: center;color:#115d28;text-decoration: underline;"><?= $chambre->prix ?></h4><?php } }?>
                       </div>
</div>
</div>
                </div>
</div>
           
           
            <!-- <?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_offre_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
                    
                    <h3><b>HOTEL: &nbsp;<a role="button" style="color:#115d28;"title="<?= $service->titre_hotel ?>"><?= $service->titre_hotel ?></a>– Face Haram</b></h3> 
                    <p style="    font-family: sans-serif;
    font-size: medium;
    text-align: justify;"><?= $service->desc_hotel ?></p>
         <div   class="gallery container-fluid" style="padding:2em; ">
                    <ul id="image-gallery" class="cS-hidden">
                        <?php foreach ($service_images as $image){?>
                        <li class="justify-content-center" style="display: flex;justify-content: center;"data-thumb="<?= base_url()?>assets/backend/services/<?= $image->image_url?>">
                            <img style="text-align: center;align-items: center;align-content: center;" src="<?= base_url()?>assets/backend/services/<?= $image->image_url?>" alt="<?= $service->titre; ?>"/>
                        </li>
                        <?php } ?>

                    </ul>
                </div>     -->
</div>
<div id="section4">
<h3>Documents à fournir</h3>
  
           
<?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_offre_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
                    <p style="    font-family: sans-serif;
    font-size: medium;
    text-align: justify;"><?= $service->doc_fournir ?></p>
</div>
</div>
</div>
<div class="container">
<div class="row">
<?php
                    if($service->categorie_id !=1){
                    
                        $offre =  get_min_priceofchambres_byServiceId($service->id);

                    }else{
                        $offre =  get_min_offre_byServiceId($service->id);
                        $chambres_min_prix = get_min_priceofchambres_byServiceId($service->id);
                    }
                    ?>
           

               
               <div class="col-md-12 col-sm-12 card shadow-lg mb-5 bg-body rounded d-lg-none d-md-block  " style="background-color: beige;    height: 100%; top: 20px; border-radius: 5%; padding-right: 20px; padding-left: 20px;">
  <div class="fixed-form" style="color: black;">
    <form method="post" action="<?= base_url() ?>reservation.html/<?= $service->id; ?>">
      <div class="row">
        <div class="f-item full-width" style="padding: 1em;">
          <fieldset>
            <div class="row" style="display: none;">
              <div class="col-12 col-md-4 form-group clearfix">
                <label for="select" class="form-control-label">Est un nouveau client?</label>
                <br>
                <div class="icheck-primary d-inline">
                  <input type="radio" name="new_client" value="1" id="radioPrimary1" checked>
                  <label for="radioPrimary1">Nouveau client</label>
                </div>
                <div class="icheck-primary d-inline">
                  <input type="radio" name="new_client" value="0" id="radioPrimary2">
                  <label for="radioPrimary2">Exist client</label>
                </div>
              </div>
            </div>
            <h4 for=""><?= $service->titre; ?></h4>
            <input type="hidden" id="service_id" value="<?= $service->id; ?>" name="service_id" />
          </fieldset>
          <fieldset>
            <div class="row">
              <div class="f-item half-width">
                <label for="nom">Votre Nom </label>
                <input class='uniform-input' type="text" id="nom" placeholder="votre nom" name="nom" />
              </div>
              <div class="f-item half-width">
                <label for="prenom">Votre Prénom </label>
                <input class='uniform-input' type="text" id="prenom" placeholder="votre prénom" name="prenom" />
              </div>
              <div class="f-item half-width">
                <label for="phone">Votre Téléphone </label>
                <input class='uniform-input' type="text" id="phone" placeholder="Votre Téléphone" name="tel1" />
              </div>
              <div class="f-item half-width">
                <label for="email">Date de Réservation </label>
                <input class='uniform-input' type="date" id="email" name="date" placeholder="exemple@mail.com" />
              </div>
              <div class="f-item half-width" style="width: 100%">
                <label for="message">Message</label>
                <textarea style="height: 100px;" class="uniform-input" id="message" placeholder="Type your message" name="message"></textarea>
              </div>
            </div>
          </fieldset>
          <div class="col-md-12" style="display: flex;    flex-direction: column;">
            <div class="book-now" style="margin: -5px;">
              <input class="custom-btn btn1 fixed-button1" type="submit" value="Réserver" id="submit" title="Send" name="submit">
            </div>
            <div class="book-now">
              <a class="custom-btn btn1 fixed-button1" style="width: 223px" href="https://wa.me/+212689519190/?text=<?= urlencode('Reservation Info' . PHP_EOL . 'Nom de: ' . $service->titre . PHP_EOL . 'Address: lieu de départ ' . $service->lieu . ' et lieu d\'arrivée ' . $service->lieu2 . PHP_EOL . 'Prix: ' . $service->prix . ' MAD' . PHP_EOL . 'Lien: ' . base_url() . 'details/' . str_replace(array(" ", "*"), "-", $service->titre) . '-' . $service->id . '.html') ?>" title="WhatsApp Reservation">
                Réserver par WhatsApp
              </a>
            </div>
          </div>
          <div id="alert-msg" class="alert-msg"></div>
        </div>
      </div>
    </form>
  </div>
</div>
</div></div>
        </div>
        </div>
        </div>
        <!-- Popular Destination 2 /- -->

        <!-- HotelBook Section -->
        <div class="d-none d-lg-block">
        <div class="container hotelbook-section ">
            <div class="section-padding"></div>
              <div class="container ">
            <div id="section3" class="section-header">
                <h3>Réserver votre service</h3> 
                
            </div>
            <div>
            <?php foreach ($hotels_smilaires as $item) {
                            $offre = get_min_offre_byServiceId($item->id);
                            $chambres_min_prix = get_min_priceofchambres_byServiceId($item->id);
                            $first_image = get_one_image_byServiceId($item->id);
                            ?>
            <div class="bookhotel-block " style="width:30%;padding:0px 2em;float:left;display:block;">
                <div class="row" >
                    <div class="col-12 bookhotelbox" >
                        <img href="<?= base_url()?>details/<?= str_replace(array(" ","*"),"-",$item->titre ).'-'.$item->id ?>.html"src="<?= base_url()?>assets/backend/services/<?= $first_image ?>" alt="<?= $item->titre; ?>" width="370" style="height:250px" />
                        <div class="bookhotel-content" style="height: 192px;background:#115d28;">
                    <div class="row" style="height: 70px;">
                        <div class="col-md-12"> <h3 style="color:white;font-size:14px;display: contents;"><?= $item->titre; ?></h3></div><br></div> 
                        
                        <div class="row">
                        <div class="col-md-12"> <a style="    border-radius: 10px;" href="<?= base_url()?>details/<?= str_replace(array(" ","*"),"-",$item->titre ).'-'.$item->id ?>.html" title="Book Now">Voir les Détails</a>
                       </div></div>  
                            </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="section-padding"></div>
        </div></div></div></div>
        <!-- HotelBook Section /- -->
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
<script type="text/javascript" src="<?= base_url()?>assets/frontend/<?= base_url()?>assets/frontend/js/lightslider.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/frontend/<?= base_url()?>assets/frontend/js/lightgallery-all.min.js"></script>
<script type="text/javascript">
    function initialize() {
        var secheltLoc = new google.maps.LatLng(31.634545, -8.1479382);

        var myMapOptions = {
            zoom: 15
            , center: secheltLoc
            , mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);


        var marker = new google.maps.Marker({
            map: theMap,
            draggable: true,
            position: new google.maps.LatLng(31.634545, -8.1479382),
            visible: true
        });



        var boxText = document.createElement("div");
        boxText.innerHTML = "<strong>Ponctuel Voyages</strong>40000 Guéliz Marrakech,Maroc www.ponctulelvoyages.com";


        var myOptions = {
            content: boxText
            , disableAutoPan: false
            , maxWidth: 0
            , pixelOffset: new google.maps.Size(-140, 0)
            , zIndex: null
            , closeBoxURL: ""
            , infoBoxClearance: new google.maps.Size(1, 1)
            , isHidden: false
            , pane: "floatPane"
            , enableEventPropagation: false
        };

        google.maps.event.addListener(marker, "click", function (e) {
            ib.open(theMap, this);
        });

        var ib = new InfoBox(myOptions);
        ib.open(theMap, marker);
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 6,
            slideMargin: 0,
            speed: 500,
            auto: true,
            loop: true,
            onSliderLoad: function () {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });

        $('#gallery1,#gallery2,#gallery3,#gallery4').lightGallery({
            download: false
        });
    });
</script>

</body>

</html>