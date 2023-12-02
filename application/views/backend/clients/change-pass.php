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
                        <h1>Changer le mot de passe</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <strong>Changer le mot de passe</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url()?>client/changepasswordadmin/<?= $admin->id;?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nom complet</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="edit_nom"name="admin_nom"value="<?= $admin->nom;?>" name="nom" placeholder="Tappez le nom..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="email" readonly value="<?= $admin->admin_email;?>" name="admin_email"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ancien mot de passe</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="admin_passancien" required="required" placeholder="Tappez un ancien mot de passe..." class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nouveau mot de passe</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="nv"type="text" name="admin_pass" required="required" placeholder="Tappez un nouveau mot de passe..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Confirmé mot de passe</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="nvv"type="text" name="admin_pass_verifier" required="required" placeholder="Tappez un nouveau mot de passe..." class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>backend" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Annuler
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">Ponctuel Voyages</a>.</strong>
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
