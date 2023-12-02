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
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/illuminated-minaret-symbolizes-spirituality-famous-blue-mosque-generated-by-ai.jpg');">
            <!-- <div class="container">
                <h3>DESTINATION AU TOP</h3>
            </div> -->
        </div>
        <!-- PageBanner /- -->

        <div class=" no-padding popular-destination2-section" style="
        background-color: white;">
            <div class="section-padding"></div>
            <div class="container">
                <div class="section-header">
                    <h3 >nos meilleures destinations</h3>
                </div>
                <div  style="padding: 0px;">
       <!-- <center><b><h3  style="color: #115d28;font-size: 35px;
    font-weight: 700;
    line-height: 36px;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    margin: 0 0 20px;">Omra RAMADAN 2024</h3></b></center>  -->
                    <!-- <center><p><b>Profitez-vous Omra Ramadan</b></p></center> -->
                    <br>
      <!-- <div class="container">              -->
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
                    
                  </div>
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