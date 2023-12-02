<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("backend/headscript"); ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php $this->load->view("backend/side-bare"); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modifier le client</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <strong>Modifier les informations du client</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url()?>client/edit/<?= $client->id ?>" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nom du client <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="nom" value="<?= $client->nom ?>" required name="nom" placeholder="Tappez le nom..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Prénom du client <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="prenom" value="<?= $client->prenom ?>" required name="prenom" placeholder="Tappez le prenom du client..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Téléphone N°1 <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="tel1" value="<?= $client->tel1 ?>" required name="tel1" placeholder="Exemple : 0524xxxxxx..." class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Date</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="date" id="date"  value="<?= $client->date ?>" name="date"  class="form-control">
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Message</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <textarea class="form-control" id="message" name="message" value="<?= $client->message ?>"></textarea>
                                        </div>
                                    </div>

                                    <!--<div class="row form-group">-->
                                    <!--    <div class="col col-md-3">-->
                                    <!--        <label for="text-input" class=" form-control-label">Ville <span class="required">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-12 col-md-7">-->
                                    <!--        <input type="text" id="ville"  value="<?= $client->ville ?>" name="ville" placeholder="Tappez la ville ici..." class="form-control">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="row form-group">-->
                                    <!--    <div class="col col-md-3">-->
                                    <!--        <label for="text-input" class=" form-control-label">L'adresse<span class="required">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-12 col-md-7">-->
                                    <!--        <input type="text" id="adresse"  value="<?= $client->adresse ?>" name="adresse" placeholder="Tappez l'adresse ici..." class="form-control">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="row form-group">-->
                                    <!--    <div class="col col-md-3">-->
                                    <!--        <label for="text-input" class=" form-control-label">Email <span class="required">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-12 col-md-7">-->
                                    <!--        <input type="email" id="email"  value="<?= $client->email ?>" name="email" placeholder="Exemple : hotel.nom@gmail.com" class="form-control">-->
                                    <!--    </div>-->
                                    <!--</div>-->


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Activé/Désactivé</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <select name="status" id="status" class="form-control">
                                                <option value="1" <?php if ($client->status==1) echo "selected"; ?> >Activé</option>
                                                <option value="0" <?php if ($client->status==0) echo "selected"; ?> >Désactivé</option>
                                            </select>
                                        </div>
                                    </div>


                                    <!--<div class="row form-group">-->
                                    <!--    <div class="col col-md-3">-->
                                    <!--        <label for="text-input" class=" form-control-label">Mot de passe <span class="required">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-12 col-md-7">-->
                                    <!--        <input type="password" readonly  value="<?= $client->password ?>" placeholder="Tappez le mot de passe ici..." class="form-control">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="row form-group">-->
                                    <!--    <div class="col col-md-3">-->
                                    <!--        <label for="text-input" class=" form-control-label">Nouveau Mot de passe</label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-12 col-md-7">-->
                                    <!--        <input type="password" id="password" name="password" placeholder="Tappez le nouveau mot de passe ici..." class="form-control">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>client" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Annuler
                                        </a>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
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



