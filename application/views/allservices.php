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
        <div class="container-fluid no-padding pagebanner" style="background-image:url('<?= base_url()?>assets/frontend/images/illuminated-minaret-symbolizes-spirituality-famous-blue-mosque-generated-by-ai.jpg');">
            <!-- <div class="container">
                <h3>toutes les Forfiat Omra</h3>
            </div> -->
        </div>
        <!-- PageBanner /- -->

        <div class="destination-mainblock">
            <div class="section-padding"></div>
            <!-- <div class="container popular-destination flex justify-content-center"> -->
                <div class="section-header">
                    <h3>NOS MEILLEURES VOYAGE ORGANISES</h3>
                </div>
                <div class="popular-destination-block">
                <div class="package-inner" style="padding: 30px;">
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