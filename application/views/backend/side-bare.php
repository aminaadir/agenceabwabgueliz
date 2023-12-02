<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

</nav>

<div class="main-header">

    <div class="row" id="success" <?php if($this->session->flashdata('msg_success') !="") echo "style='display:block'";else echo "style='display:none'"; ?>>
        <div class="col-md-12 bg-success text-center p-2">
            <?= $this->session->flashdata('msg_success');?>
        </div>
    </div>

    <div class="row" id="error" <?php if($this->session->flashdata('msg_error') !="") echo "style='display:block'";else echo "style='display:none'"; ?> >
        <div class="col-md-12 bg-danger text-center p-2">
            <?= $this->session->flashdata('msg_error');?>
        </div>
    </div>

</div>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#4a274fc7">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" target="_blank" class="brand-link d-block">
        <img src="<?= base_url() ?>assets/frontend/images/logo.png" alt="Ponctuel Voyages"
             class="  elevation-3"
             style="opacity: .8; width: 66%">
        <span class="brand-text font-weight-light " style="visibility:hidden">AbwabGuilez</span>
    </a>
    <?php

        $val=array();
        $val = explode("/",$pages); 

    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image" style="filter: invert(1);">
            </div>
            <div class="info">
                <a class="d-block"> Bienvenue <?= $admin->nom?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url()?>backend" class="nav-link <?php if($val[0] == 'dashboard') echo 'active' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tableau de bord
                        </p>
                    </a>
                </li>

                <li class="nav-item  <?php if ($val[0] == "admin") echo  'menu-is-opening menu-open'; ?>">
                    <a href="#" class="nav-link  <?php  if($val[1]=="partenaires")  echo "active";?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Partenaires
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url()?>partenaire" class="nav-link <?php  if($val[1]=="partenaires")  echo "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste partenaires</p>
                            </a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="data2.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Reservations partenaires</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </li>
                <li class="nav-item  <?php if ($val[0] == "services") echo  'menu-is-opening menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($val[0] == "services") echo  'active'; ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Services
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url()?>service" class="nav-link  <?php if ($val[1] == "liste") echo  'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste services</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url()?>offre" class="nav-link  <?php if ($val[1] == "offres") echo  'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste d'offres</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url()?>souscategorie" class="nav-link <?php if ($val[1] == "types") echo  'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste Types services</p>
                            </a>
                        </li>

<!--                        <li class="nav-item">-->
<!--                            <a href="--><?//= base_url()?><!--categorie" class="nav-link --><?php //if ($val[1] == "categories") echo  'active'; ?><!--">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Liste categories</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url()?>client" class="nav-link <?php if($val[0]=="clients")  echo "active";?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Liste clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url()?>reservation" class="nav-link  <?php if($val[0]=="reservations")  echo "active";?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Réservations</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url()?>client/mailing" class="nav-link <?php if($val[0]=="mailing")  echo "active";?>">
                        <i class="nav-icon fas fa-envelope-open"></i>
                        <p>Emails</p>
                    </a>
                </li>
                <?php if($admin->role== 1){?>
                <li class="nav-item">
                    <a href="<?= base_url()?>client/users" class="nav-link  <?php if($val[0]=="users")  echo "active";?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Utilisateurs </p>
                    </a>
                </li>
               <?php };?>
                <li class="nav-item">
                    <a href="<?= base_url()?>client/changepasswordadmin/<?= $admin->id?>" class="nav-link <?php if($val[0]=="userspass")  echo "active";?>">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Changer le mot de passe</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>backend/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Déconnecté</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
