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

    <!--main-->
    <main class="site-main page-spacing">
        <!-- PageBanner -->
        <div class="container-fluid no-padding pagebanner" style="background-image:url('<?= base_url()?>assets/frontend/images/illuminated-minaret-symbolizes-spirituality-famous-blue-mosque-generated-by-ai.jpg');">
            <div class="container">
                <h3>Hajj</h3>
            </div>
        </div>
        <!-- PageBanner /- -->

        <div class=" no-padding popular-destination2-section" style ="background-color: white;">
            <div class="section-padding"></div>
            <div class="container"><div class="section-header">
                    <h3>Nos offres pour Hajj</h3>
                </div>
                <div  style="padding: 0px;">
     
                   
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
