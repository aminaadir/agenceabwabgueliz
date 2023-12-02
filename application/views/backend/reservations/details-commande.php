<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("backend/headscript"); ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php $this->load->view("backend/side-bare"); ?>
    <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Détails du réservation</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                                <div class="col-md-12 mb-sm-30">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <div class="col-md-8">
                                                <strong class="card-title">APERÇU DE LA COMMANDE</strong>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <div id="form-print" class="admission-form-wrapper">
                                                <div class="cart-item-table complete-order-table commun-table mb-30">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>Détails des services</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $total =0;
                                                            foreach ($services_reservation as $obj){
                                                                $service = get_serviceByid($obj->service_id);
                                                                $chambre = get_chambreByid($obj->chambre_id);
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="product-title">
                                                                            <a target="_blank" href="<?= base_url()."details/".$service->id;?>"><?= $service->titre;?></a>
                                                                            <div class="product-info-stock-sku m-0">
                                                                                <div>
                                                                                    <label>Type: </label>
                                                                                    <span class="info-deta price"><?= get_name_categorie_by_id($service->categorie_id);?> <i class="fa fa-angle-double-right"></i> <?= get_name_souscategorie_by_id($service->sous_categorie_id);?> </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-info-stock-sku m-0">
                                                                               <?php if($service->categorie_id == 1){
                                                                                   echo '<div>
                                                                                   <label>Prix: </label>
                                                                                   <span class="info-deta price">'.number_format($chambre->prix,2,","," ");'Dh </span>
                                                                               </div>';
                                                                               }else{echo '<div>
                                                                                <label>Prix: </label>
                                                                                <span class="info-deta price">'.number_format($service->prix,2,","," ");'Dh  </span>
                                                                            </div>';
                                                                               }
                                                                               ?>
                                                                            </div>
                                                                            <div class="product-info-stock-sku m-0">
                                                                                <div>
                                                                                    <label>Nombre d'Adults: </label>
                                                                                    <span class="info-deta"><?= $obj->nbr_adults;?></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-info-stock-sku m-0">
                                                                                <div>
                                                                                    <label>Nombre d'enfants: </label>
                                                                                    <span class="info-deta"><?= $obj->nbr_enfants;?></span>
                                                                                    <?php $total += $obj->soustotal;?>
                                                                                </div>
                                                                            </div>
                                                                            <?php if ($service->categorie_id == 1){ 
                                                                            
                                                                            echo'<div class="product-info-stock-sku m-0">
                                                                                <div>
                                                                                    <label>Nombre de chambres: </label>
                                                                                    <span class="info-deta">'. $obj->nbr_chambres.'</span> 
                                                                                    <span class="info-deta">'.$chambre->type_chambre.'</span> 

                                                                                </div>
                                                                            </div>';
                                                                             } ?>
                                                                            <div class="product-info-stock-sku m-0">
                                                                                <div><?php if($service->categorie_id == 1){
                                                                                    $your_date = strtotime($reservation->date_debut_resa);
                                                                                    $now_date = strtotime($reservation->date_fin_resa);
                                                                                    $datediff = $now_date - $your_date;
                                                                
                                                                                    $nbr_jours = round($datediff / (60 * 60 * 24));
                                                                                    $test = ($chambre->prix * $obj->nbr_chambres);
                                                                                    $test = ($test * $nbr_jours) * $obj->nbr_adults ;
                                                                                   echo '<div>
                                                                                   <label>Prix sous-total: </label>
                                                                                   <span class="info-deta price">'.$test;'Dh </span>
                                                                               </div>';
                                                                               }else{echo '<div>
                                                                                <label>Prix sous-total:</label>
                                                                                <span class="info-deta price">'.number_format($obj->soustotal,2,',',' ');'Dh </span>
                                                                            </div>';
                                                                               }
                                                                               ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="complete-order-detail commun-table mb-30">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                            <tr>
                                                                <td><b>Date début de réservation : </b></td>
                                                                <td><?= date_format(date_create($reservation->date_debut_resa),"d/m/Y H:i:s");?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Date fin de réservation : </b></td>
                                                                <td><?= date_format(date_create($reservation->date_fin_resa),"d/m/Y H:i:s");?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nombre de jours</td>
                                                                <td>
                                                                    <?php
                                                                        $datetime1 = new DateTime($reservation->date_debut_resa);

                                                                        $datetime2 = new DateTime($reservation->date_fin_resa);

                                                                        $difference = $datetime1->diff($datetime2);

                                                                        $date ="";
                                                                        if ($difference->y !="") $date .= $difference->y.' an ';
                                                                        if ($difference->m !="") $date .= $difference->m.' mois ';
                                                                        if ($difference->d !="") $date .= $difference->d.' jour(s) ';
//                                                                        echo 'Difference: '.$difference->y.' an, '
//                                                                        .$difference->m.' mois, '
//                                                                        .$difference->d.' jours';
                                                                        echo $date;

//                                                                        print_r($difference);
                                                                ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>N ° de commande :</b></td>
                                                                <td>#<?= 'resa_'.sprintf("%08d", $reservation->id);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Total :</b></td>
                                                                <td><div class="price-box"> <span class="price"><?php if($service->categorie_id == 1){
                                                                                   echo $test; 
                                                                               }else{ 
                                                                                   echo number_format($obj->soustotal,2,',',' ');
                                                                               }
                                                                               ?></div></td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="cart-total-table address-box commun-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>Informations du client</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><ul>
                                                                        <li class="inner-heading"> <b><?= $client->nom; ?> <?= $client->prenom; ?></b> </li>
                                                                        <li>
                                                                            <p> <?= $client->tel1; ?> <?php if ($client->tel2 !="") echo ' / '.$client->tel2; ?></p>
                                                                        </li>
                                                                        <li>
                                                                            <p> <?= $client->adresse; ?></p>
                                                                        </li>

                                                                        <li>
                                                                            <p> <?= $client->ville; ?>, <?= $client->pays; ?></p>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">

<!--                                                    <div class="print-btn text-center">-->
<!--                                                        <button onclick="printDiv('form-print')" class="btn btn-color" type="button">Imprimer</button>-->
<!--                                                    </div>-->

                                                    <div class="form-group col-sm-4">
                                                <form action="<?= base_url()?>reservation/editcommand/<?= $reservation->id;?>" method="post">
                                                <input style="display:none;" value="<?= $client->id;?>"name="clientid">
                                                <input style="display:none;" value="<?= $admin->nom;?>"name="adminnome">
                                                            <label class="col-md-4">Validation</label>
                                                            <hr>
                                                        <div class="row">


<!--                                                            <div class="col-md-3">-->
<!--                                                                <input type="radio" class="form-control" id=validation1" --><?php //if($reservation->validation == -2) echo "checked";?><!-- name="validation" value="-2">-->
<!--                                                                <label class="form-check-label" for="validation1">Nouvelle</label>-->
<!--                                                            </div>-->

                                                            <div class="col-md-3">
                                                                <input type="radio" class="form-control" id="validation2" <?php if($reservation->validation == 1) echo "checked";?> name="validation" value="1">
                                                                <label class="form-check-label" for="validation1">Accepter</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="radio" class="form-control" id="validation3" <?php if($reservation->validation == -1) echo "checked";?> name="validation" value="-1">
                                                                <label class="form-check-label" for="showing">Annuler</label>
                                                            </div>

                                                         </div>


                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="remarque" class="col-md-4">Remarque</label>
                                                        <hr>
                                                        <textarea class="form-control"  name="remarque" placeholder="Ecrit une remarque içi..."><?=$reservation->remarque;?></textarea>

                                                    </div>
                                                    <div class="form-group col-sm-2">
                                                        <a href="<?=base_url()?>reservation" class=" btn btn-danger col-md-12"> Annuler </a>
                                                        <hr>
                                                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Enregistrer" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2"></div>
                            </div>
            </div><!-- .animated -->
        </section><!-- .content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
   <strong>Copyright &copy; 2023 <a href="#">Agence Immobilier Abwab Gueliz</a>.</strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php $this->load->view("backend/footerscript"); ?>

</body>
</html>