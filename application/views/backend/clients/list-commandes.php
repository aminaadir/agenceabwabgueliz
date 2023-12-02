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
                        <h1>Gérer les réservations</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header ">
                                <div class="col-md-8">
                                    <strong class="card-title">Liste des commandes pour le client : <?= $client->nom?> <?= $client->prenom?></strong>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>N° de commande</th>
                                                <th>Client</th>
                                                <th>Date de commande</th>
                                                <th>Validation</th>
                                                <th>Remarque</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($commandes as $obj){   ?>
                                                <tr>
                                                    <td>#<?=  $obj->id_commande; ?></td>
                                                    <td><?php $clt = get_infos_client_by_id($obj->clt_id);echo $clt->nom.' '.$clt->prenom; ?></td>
                                                    <td><?=  $obj->date_demande; ?></td>
                                                    <td>
                                                        <?php
                                                            if($obj->validation ==-2) echo "<span class='bg-info p-5'>Nouvelle</span>";
                                                            elseif($obj->validation ==0) echo "<span class='bg-warning p-5'>En cours</span>";
                                                            elseif ($obj->validation ==1) echo "<span class='bg-success p-5'>Acceptée</span>";
                                                            else echo "<span class='bg-danger p-5'>Annulée</span>";
                                                        ?>
                                                    </td>
                                                    <td><?=isset($obj->remarque) && $obj->remarque !="" ? $obj->remarque : "Aucune remarque"; ?></td>
                                                    <td style="width :20%">
                                                        <a  href="<?= base_url()?>commande/details/<?= $obj->id_commande;?>" ><p class="btn btn-primary" title="Détails"> <i class="fa fa-eye"></i> Afficher les détails</p></a>
<!--                                                        <a href="javascript:void(0);"  ><p class="btn btn-success" title="Accépté"> <i class="fa fa-check"></i> </p></a>-->
<!--                                                        <a href="javascript:void(0);"  ><p class="btn btn-danger" title="Annullé"> <i class="fas fa-minus"></i> </p></a>-->
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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
