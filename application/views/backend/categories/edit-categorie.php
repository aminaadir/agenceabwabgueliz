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
                        <h1>Modifier La catégorie</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Modifier une categorie</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?= base_url()?>categorie/edit/<?= $categorie->id; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class=" col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nom du categorie</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" id="nom" value="<?= $categorie->nom ?>" name="nom" placeholder="Tappez le titre..." class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label for="select" class=" form-control-label">Activé/Désactivé</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="1" <?php if ($categorie->status==1) echo "selected"; ?> >Activé</option>
                                                        <option value="0" <?php if ($categorie->status==0) echo "selected"; ?> >Désactivé</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />

                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Enregistrer
                                                </button>
                                                <a href="<?= base_url() ?>categorie" class="btn btn-danger btn-sm">
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
<strong>Copyright &copy; 2023 <a href="#">Agence Immobilier Abwab Gueliz</a>.</strong>        All rights reserved.
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

