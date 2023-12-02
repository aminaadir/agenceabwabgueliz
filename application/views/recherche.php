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
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/illuminated-minaret-symbolizes-spirituality-famous-blue-mosque-generated-by-ai.jpg');">
            <div class="container">
                <h3>Recherche</h3>
            </div>
        </div>
        <!-- PageBanner /- -->

        <div class="destination-mainblock">
            <div class="section-padding"></div>
            <div class="container popular-destination flex justify-content-center">
                <div class="section-header">
                    <h3>Nos offers Omra && Hajj</h3>
                </div>
                <?php if (empty($activities)) { ?>
                    <div class="row">
                        <div class="col-12">
                            <h1>Aucune offres.</h1>
                        </div>
                    </div>
                <?php } else { ?>
                <div class="popular-destination-block">
                    <div class="row">
					<?php foreach ($activities as $activity){
                        $first_image = get_one_image_byServiceId($activity->id);
                        ?>
                        <div class="col-md-4 col-sm-6 col-12">
                                    <div class="card" style="width: 100%;">
                                        <img style="height: 280px;" src="<?= base_url() ?>assets/backend/services/<?= $first_image ?>" alt="<?= $activity->titre; ?>" class="img-fluid rounded-start" alt="..." />
                                        <div class="card-body">
                                        <div class="status-div">
                                         <?php
    if ($activity->statusDeForfait == "1") {
        // S'il y a des places disponibles
        echo '<span style="color:white;" class="status-available">Places disponibles</span>';
    } else {
        // Si le forfait est complet
        echo '<span style="color:white;" class="status-full">Complet</span>';
    }
    ?>
  
</div>
                                            <h5 style="font-size: large;" class="card-title" title="<?= $activity->titre; ?>"><b><?= $activity->titre; ?></b></h5>
                                            <div class="card-body" style="font-size: medium; font-family: Poppins, sans-serif;">
                                                <table class="table table-responsive" style="border-bottom: white;">
                                                    <tbody style="font-family: sans-serif;">
                                                        <tr>
                                                            <th style="color: #727272; font-size: medium;"><i style="color: black;" class="fa-regular fa-calendar fa-lg"></i>&nbsp;&nbsp;Disponibilité: <?php echo $disponibilite = $activity->disponibilite; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="color: #727272; font-size: medium;"> <i style="color: black;" class="fa-solid fa-plane-departure fa-lg"></i>&nbsp;&nbsp;<?php echo $lieu = $activity->lieu; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="color: #727272; font-size: medium;"> <i style="color: black;" class="fa-solid fa-plane-arrival fa-lg"></i>&nbsp;&nbsp;<?php echo $lieu2 = $activity->lieu2; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: large; font-weight: bolder; color: #115d28; display: flex; flex-direction: row-reverse; border-top: none;"> <?php echo $prix = $activity->prix; ?>DH</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                           
                                         <a class="btn btn-primary" href="<?= base_url() ?>details/<?= str_replace(array(" ", "*"), "-", $activity->titre) . '-' . $activity->id ?>.html" title="more">VOIR LES DÉTAILS</a>
                             

                                        </div>
                                    </div>
                                </div>
					<?php } ?>
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

<script type="text/javascript" src="<?= base_url()?>assets/frontend/js/search.js"></script>

</body>

</html>