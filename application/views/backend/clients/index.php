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
                        <h1>Gérer les clients</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <a href="<?= base_url() ?>client/add" class="btn btn-primary float-right"> <i class="fa fa-plus-circle"></i> Ajouter un
                            client</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title">Liste des clients</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom copmlet</th>
                                        <th>Contact</th>
                                        <th>Adresse</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count =1 ;

                                    foreach ($clients as $obj) {
                                    ?>
                                    <tr>
                                        <td><?= $count++; ?></td>
                                        <td>Nom: <?= $obj->nom; ?>
                                            <hr>
                                            Prénom: <?= $obj->prenom; ?></td>
                                        <td>
                                            Tél N°1: <?= $obj->tel1; ?>
                                            <hr>
                                           
                                            <hr>
                                         
                                        </td>
                                        <td>
                                           
                                            <hr>
                                            Date : <?= $obj->date; ?>
                                            <hr>
                                            Message : <?= $obj->message; ?>
                                        </td>
                                        <td>
                                            <?php if ($obj->status == 1){ ?>
                                                <span class="badge badge-success"><i class="fa fa-check-circle"></i> Actif</span>

                                            <?php }else{ ?>
                                                <span class="badge badge-danger"><i class="fa fa-minus-circle"></i> Non Actif</span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <div class="row">
                                                <a href="" class="btn btn-info col-12 btn-sm  mb-1"><i
                                                            class="fa fa-file-pdf"></i></a>
                                                <a href="<?= base_url()?>client/edit/<?= $obj->id;?>" class="btn btn-primary col-12 btn-sm mb-1"><i
                                                            class="fa fa-edit"></i></a>
                                                <a  href="javascript:void(0);"  onclick="#supprimer(<?= $obj->id;?>)" class="btn btn-danger col-12 btn-sm mb-1"><i
                                                            class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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
<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function supprimer(id){
        var r=confirm("Vous voulez vraiment supprimer ce client ?")
        if (r==true)
            window.location = url+"client/delete_client/"+id;

    }
</script>

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>
