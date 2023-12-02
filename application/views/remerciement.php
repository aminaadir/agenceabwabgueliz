<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
<?php $this->load->view("headscript"); ?>

<body onload="initialize()" class="bg-contact">

<!--header-->
<?php $this->load->view("header"); ?>
<!--//header-->

<!--main-->
<main class="main">
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/pagebanner-succe.jpg');">  
            <div class="container">
                <h3>succès</a></h3>
            </div>
        </div>
    <div class="wrap">
        <section>
            <div class="container  pad100">

                <div class="row mt-5 mb-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6"style="padding:2em;">
                        <div class="contact-page__form"style="padding: 1em;border: 1px solid black;border-radius: 2em;box-shadow: 0px 0px 24px #5c2409;">
                            <div class="title">
                                <h2 class="text-center">Merci</h2>
                            </div>
                            <div class="descriptions text-center">
                                <h2>Votre Réservation  est  enregistrée, nous vous contactons très bientôt.</h2>
                            </div>
                            <p style="padding-top:3em;"class="text-center"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> <a
                                        href="<?= base_url() ?>">Aller à la page d’accueil</a></p>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>

    </div>
</main>
<!--//main-->
<!--footer-->
<?php $this->load->view("footer"); ?>
<!---footer-->

<!--script-->
<?php $this->load->view("footerscript"); ?>
<!---//script-->


</body>

</html>