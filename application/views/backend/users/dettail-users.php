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
                        <h1>View Profile</h1>
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
                                <strong>Modifier</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url()?>client/modifieadmin" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nom <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="nom" required name="nom" value="<?= $user->nom;?>" class="form-control">
                                            <input type="hidden" id="id"  name="idadmin" value="<?= $user->id;?>" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Téléphone <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="tel1" required name="telephone" value="<?= $user->telephone;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">L'adresse<span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" id="adresse" name="adresse" value="<?= $user->adresse;?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email <span class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="email" id="email" name="email" value="<?= $user->admin_email;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mot de passe <span class="required">*</span></label>
                                        </div>

                                        <div class="col-12 col-md-7">
                                            <input type="password" id="password"  value="<?= $user->admin_pass ?>"name="password"class="form-control">
                                        </div>

                                    </div>

                                


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



