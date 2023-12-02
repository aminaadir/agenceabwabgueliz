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
                        <h1>Ajouter des images du service</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title">Ajouter Image du service</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-12">
                                    <form action="<?= base_url() ?>service/addimage/<?= $service_id; ?>"  enctype="multipart/form-data" method="post" class="form-horizontal" >
                                    <div class="row form-group">
                                        <input type="hidden" value="<?= $service_id; ?>" name="service_id">
                                        <div class="col-md-6 mb-3">
                                            <img src="<?= base_url()."assets/backend/dist/img/cat-sous-cat.jpg";  ?>" id="image1" alt="" width="100%" height="350">

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="img1" onchange="readURL1(this);" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choisissez une image</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                           value="<?= $this->security->get_csrf_hash(); ?>"/>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>service/details/<?= $service_id; ?>" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Annuler
                                        </a>
                                    </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

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
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image1').attr('src', e.target.result)
                    .width(100+"%")
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>



