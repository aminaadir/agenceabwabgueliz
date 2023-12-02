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
                        <h1>Gérer les étulisateurs</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
            <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <a href="<?= base_url() ?>client/addadmin" class="btn btn-primary float-right"> <i class="fa fa-plus-circle"></i> Ajouter un
                            Admin</a>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="row">
                    <?php foreach ($admins as $obj) {?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Administrateur 
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?= $obj->nom; ?></b></h2>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:  <?= $obj->adresse; ?> </li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : <?= $obj->telephone; ?></li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span> E-mail : <?= $obj->admin_email; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url()?>assets/backend/dist/img/avatar3.png" alt="user-avatar" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="<?= base_url()?>client/usersdettails/<?= $obj->id?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                        <?php if($obj -> role != 1)
                                        { ?>
                                        <a href="<?= base_url()?>client/deleteuser/<?= $obj->id?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Delete
                                        </a><?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.card-body -->
<!--                <div class="card-footer">-->
<!--                    <nav aria-label="Contacts Page Navigation">-->
<!--                        <ul class="pagination justify-content-center m-0">-->
<!--                            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">4</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">5</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">6</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">7</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">8</a></li>-->
<!--                        </ul>-->
<!--                    </nav>-->
<!--                </div>-->
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
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
<!-- Page specific script -->
</body>
</html>
