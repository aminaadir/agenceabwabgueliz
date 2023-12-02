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
             
                <!-- Booking Form /- -->
                <div id="photoslider2-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                           <img src="<?= base_url()?>assets/frontend/images/slider-5.jpg" alt="photoslider-1"  style="width:100% ;opacity: 0.99;filter: brightness(0.80);height:650px" />
                       
                         
                           <div class="container photoslider2-content">
                           <div class="row">
    <div class="container" style="margin: 0px; padding: 0px;">
        <div class="best-destination-block">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="card-wrapper container-sm d-flex justify-content-around">
                            <?php foreach ($activities as $activity) {
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
                            <?php  }// Fin de la boucle foreach ?>
                        </div>
                    </div>

                </div>
                <!-- <button class="carousel-control-prev" style="display: flex; justify-content: flex-start; flex-direction: row;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="display: flex; justify-content: flex-end; flex-direction: row;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> -->
            </div>
        </div>
    </div>
</div>