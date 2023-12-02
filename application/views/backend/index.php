<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("backend/headscript"); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php $this->load->view("backend/side-bare"); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Tableau de bord</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!--                        <ol class="breadcrumb float-sm-right">-->
                        <!--                            <li class="breadcrumb-item"><a href="#"> Tableau de bord</a></li>-->
                        <!--                            <li class="breadcrumb-item active">Administration</li>-->
                        <!--                        </ol>-->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_partenaires ?></h3>

                            <p>Total partenaires</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark text-cyan fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>partenaire" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-danger"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_hotels ?></h3>

                            <p>Total Hôtels</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building text-red  fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_riads ?></h3>

                            <p>Total Riads</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building text-navy  fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_maisons ?></h3>

                            <p>Total Maisons d'hôtes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building text-orange  fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_activites ?></h3>

                            <p>Total d'activités</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-boxes text-info  fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_tours ?></h3>

                            <p>Total des tours</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sitemap text-olive  fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_circuits ?></h3>

                            <p>Total des circuits</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-cash-register text-navy fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_villas ?></h3>
                            <p>Total des villas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-alt text-gray-dark  fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>service" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-pink"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_clients ?><sup style="font-size: 20px"></sup></h3>

                            <p>Clients</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users text-info fa-1x"></i>
                        </div>
                        <a href="<?= base_url()?>client" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-info"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_reservation ?><sup style="font-size: 20px"></sup></h3>

                            <p>Total reservations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-alt text-olive"></i>
                        </div>
                        <a href="<?= base_url()?>reservation" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-olive"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_reservation_valide ?></h3>

                            <p>Réservations acceptés</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-check text-success"></i>
                        </div>
                        <a href="<?= base_url()?>reservation" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-success"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_reservation_invalide ?></h3>

                            <p>Réservations annulés</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-times text-danger"></i>
                        </div>
                        <a href="<?= base_url()?>reservation" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-danger"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_emails ?></h3>

                            <p>Email (NewsLettre)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope text-navy"></i>
                        </div>
                        <a href="<?= base_url()?>client/mailing" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-navy"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_offres ?></h3>

                            <p>Offres</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bullhorn text-gray-dark"></i>
                        </div>
                        <a href="<?= base_url()?>offre" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-gray-dark"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <?php if($admin->role== 1){?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= $nbr_admins ?></h3>

                            <p>Etulisateurs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie text-gray"></i>
                        </div>
                        <a href="<?= base_url()?>client/users" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-gray"></i></a>
                    </div>
                </div>
                <?php };?>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Avis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <a href="" class="small-box-footer">Voir plus <i
                                class="fas fa-arrow-circle-right text-gray"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="#">Agence Immobilier Abwabgueliz</a>.</strong>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url()?>assets/backend/dist/js/pages/dashboard.js"></script>
</body>
</html>
