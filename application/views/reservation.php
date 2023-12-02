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
        <div class="container-fluid no-padding pagebanner"style="background-image:url('<?= base_url()?>assets/frontend/images/pagebanner-destinationdetails.jpg');">
            <div class="container">
                <h3>réservation</a></h3>
            </div>
        </div>
        <div class="container contactus-section">
            <div class="section-padding"></div>
            <div class="row">
                <div class="remplasage"> <h4>Entrez les renseignements suivants:</h4></div>
                <div class="reserve">
                    <form method="post" action="<?= base_url()?>reservation.html/<?= $service->id; ?>">
                        <div class="row">
                        <div class="f-item full-width" style="padding:1em;">
                                <fieldset>
                                <div class="row" style="display: none;">

                                    <div class="col-12 col-md-4 form-group clearfix">
                                        <label for="select" class=" form-control-label">Est un nouveau
                                            client?</label>
                                        <br>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" name="new_client" value="1" id="radioPrimary1"
                                                checked>
                                            <label for="radioPrimary1">Nouvau client
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" name="new_client" value="0" id="radioPrimary2">
                                            <label for="radioPrimary2">
                                                Exist client
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                        <h4 for=""><?= $service->titre; ?></h4>
                                        <input type="hidden" id="service_id" value="<?= $service->id; ?>" name="service_id"/>
                                        
                                    
                                    </div>
                                    <!--    <div class='row'>-->
                                    <!--    <div class='f-item half-width'>-->
                                    <!--    <?php $chambres = get_chambre_byserviceid($service->id);?>-->
                                    <!--    <label for='type_chambre'>Description des chambres </label>-->
                                    <!--    <select name="chambre_id" id="chambre_id" class="uniform-input">-->
                                    <!--            <option value="">--Séléctionnez--</option>-->
                                    <!--            <?php // foreach ($chambres as $ch) { ?>-->
                                    <!--                <option  value="<?php // $ch->id ?>"><?php // $ch->type_chambre ?></option>-->
                                    <!--            <?php //} ?>-->
                                    <!--    </select></div>-->
                                    <!--    <div class='f-item half-width'>-->
                                    <!--            <label for='nbr_adults'>nombre d'adultes </label>-->
                                    <!--            <input class="uniform-input"type='number'   id='nbr_adults' min='1' value='1' name='nbr_adults'/>-->
                                    <!--        </div>-->
                                    <!--        <div class='f-item half-width'>-->
                                    <!--            <label for='nbr_enfants'>nombre d'enfants </label>-->
                                    <!--            <input class="uniform-input"type='number'   id='nbr_enfants' min='0' value='0' name='nbr_enfants'/>-->
                                    <!--        </div>-->
                                    <!--        <div class='f-item half-width'>-->
                                    <!--            <label for='nbr_chambres'>nombre de chambres </label>-->
                                    <!--            <input class="uniform-input"type='number'   id='nbr_chambres' min='1' value='1' name='nbr_chambres'/>-->
                                    <!--        </div>-->
                                    <!--    <div class='f-item half-width'>-->
                                    <!--        <label for='date_debut_resa'>Date Début  </label>-->
                                    <!--        <input type='date'class='uniform-input'type='text' placeholder='01/01/2021'   id='date_debut_resa' name='date_debut_resa'/>-->
                                    <!--    </div>-->
                                    <!--    <div class='f-item half-width'>-->
                                    <!--        <label for='date_fin_resa'>Date Fin  </label>-->
                                    <!--        <input type='date'class='uniform-input'type='text' placeholder='01/01/2021'   id='date_fin_resa' name='date_fin_resa'/>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    </fieldset>
                                    <fieldset>

                                    <div class="row">
                                        <div class="f-item half-width">
                                            <label for="nom">Votre Nom </label>
                                            <input class='uniform-input'type="text"   id="nom" placeholder="votre nom" name="nom"/>
                                        </div>
                                        <div class="f-item half-width">
                                            <label for="prenom">Votre Prénom  </label>
                                            <input class='uniform-input'type="text"   id="prenom" placeholder="votre prénom" name="prenom"/>
                                        </div>
                                        <div class="f-item half-width">
                                            <label for="phone">Votre Téléphone  </label>
                                            <input class='uniform-input'type="text"   id="phone" placeholder="Votre Téléphone" name="tel1"/>
                                        </div>
                                        <!--<div class="f-item half-width">-->
                                        <!--    <label for="phone">Votre Téléphone 2</label>-->
                                        <!--    <input class='uniform-input'type="text" id="phone2" placeholder="Votre Téléphone 2" name="tel2"/>-->
                                        <!--</div>-->
                                        <!--<div class="f-item half-width">-->
                                        <!--    <label for="phone">Pays  </label>-->
                                        <!--    <input class='uniform-input'type="text" id="Pays" placeholder="Tap your country" name="pays"/>-->
                                        <!--</div>-->
                                        
                                        <!--<div class="f-item half-width">-->
                                        <!--    <label for="phone">Adresse  </label>-->
                                        <!--    <input class='uniform-input'type="text" id="adresse" placeholder="Type your address" name="adresse"/>-->
                                        <!--</div>-->
                                        <div class="f-item half-width">
                                            <label for="email">Date de Réservation  </label>
                                            <input class='uniform-input'type="date" id="email" name="date" placeholder="exemple@mail.com"/>
                                        </div>
                                        <div class="f-item half-width" style="width:100%">
                                            <label for="message">Message</label>
                                            <textarea class="uniform-input" id="message" placeholder="Type your message" name="message"></textarea>
                                        </div>
                                    </div>

                                    </fieldset>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-center">
                                    <input class="inputserve"type="submit" value="Valider" id="submit" title="Send" name="submit">
                                </div>
                            </div>
                            <div id="alert-msg" class="alert-msg"></div>
                        </div>
                    </form>
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


<script src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="<?= base_url()?>assets/frontend/js/infobox.js"></script>

<script type="text/javascript">
    function initialize() {
        var secheltLoc = new google.maps.LatLng(49.47216, -123.76307);

        var myMapOptions = {
            zoom: 15
            , center: secheltLoc
            , mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);


        var marker = new google.maps.Marker({
            map: theMap,
            draggable: true,
            position: new google.maps.LatLng(49.47216, -123.76307),
            visible: true
        });

        var boxText = document.createElement("div");
        boxText.innerHTML = "<strong>Ponctuel Voyage</strong><br>40000 Annakhil, Marrakech,<br>Maroc";

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


</body>

</html>