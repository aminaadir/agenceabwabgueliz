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
                        <h1>Ajouter un partenaire</h1>
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
                                <strong>Ajouter un nouveau partenaire</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url()?>partenaire/add" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nom du partenaire <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="nom" required name="nom" placeholder="Tappez le nom..." class="form-control">
                                        </div>
                                    </div>
                                    <!--<div class="row form-group">-->
                                    <!--    <div class="col col-md-3">-->
                                    <!--        <label for="text-input" class=" form-control-label">Nom du responsable <span class="required">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-12 col-md-7">-->
                                    <!--        <input type="text" id="responsable" required name="responsable" placeholder="Tappez le nom du responsable..." class="form-control">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Téléphone N°1 <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="tel1" required name="tel1" placeholder="Exemple : 0524xxxxxx..." class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Téléphone N°2</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="tel2" name="tel2" placeholder="Exemple : 0661xxxxxx..." class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="email" id="email" name="email" placeholder="Exemple : hotel.nom@gmail.com" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ville </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="ville" name="ville" placeholder="Tappez la ville ici..." class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">L'adresse</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="adresse" name="adresse" placeholder="Tappez l'adresse ici..." class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Activé/Désactivé</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <select name="status" id="status" class="form-control">
                                                <option selected value="1" >Activé</option>
                                                <option value="0" >Désactivé</option>
                                            </select>
                                        </div>
                                    </div>


                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>partenaire" class="btn btn-danger btn-sm">
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



