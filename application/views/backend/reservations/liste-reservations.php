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
                        <h1>Gérer les réservations</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <a href="<?= base_url() ?>reservation/add"  class="btn btn-primary float-right"> <i class="fa fa-plus-circle"></i> Ajouter une
                            nouvelle reservation</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title">Liste des reservations</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Client</th>
<!--                                        <th>Partenaire</th>-->
                                        <th>Commande</th>
                                        <th>Date debut résa</th>
                                        <th>Date fin résa</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                        <?php if($admin->id == 1){
                                            echo"<th>Qui Valider</th>";
                                        }
                                        ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count =1 ;

                                    foreach ($reservations as $obj) {
                                    ?>
                                    <tr>
                                        <td><?= $count++; ?></td>
                                        <td><a href="#<?= base_url(); ?>client/details"><?= get_client_byid($obj->client_id)->nom; ?> <?= get_client_byid($obj->client_id)->prenom; ?></a></td>
<!--                                        <td><a href="--><?//= base_url(); ?><!--partenaire">--><?php //$service =;  get_name_of_partenaire_id($obj->partenaire_id); ?><!--</a></td>-->
                                        <td><a href="<?= base_url()?>reservation/commande/<?= $obj->id; ?>">resa_<?= sprintf("%08d", $obj->id); ?></a></td>
                                        <td><?= date_format(date_create($obj->date_debut_resa),"d/m/Y H:i:s") ?> </td>
                                        <td><?= date_format(date_create($obj->date_fin_resa),"d/m/Y H:i:s") ?> </td>
                                        <td>
                                            <?php if ($obj->validation == 1){ ?>
                                            <span class="badge badge-success"><i class="fa fa-check-circle"></i> Accepter</span>
                                            <?php }else if ($obj->validation == 0){ ?>
                                                <span class="badge badge-warning"><i class="fa fa-info-circle"></i> En attend</span>
                                            <?php }else{ ?>
                                                <span class="badge badge-danger"><i class="fas fa-minus-circle"></i> Annuler</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a href="<?= base_url()?>reservation/commande/<?= $obj->id; ?>" class="btn btn-info col-md-12 mb-1 btn-sm"><i
                                                            class="fa fa-eye"></i></a>
<!--                                                <a href="" class="btn btn-primary col-md-12 mb-1 btn-sm"><i-->
<!--                                                            class="fa fa-edit"></i></a>-->
<!--                                                <a href="" class="btn btn-danger col-md-12 mb-1 btn-sm"><i-->
<!--                                                            class="fa fa-trash"></i></a>-->
                                            </div>
                                        </td>
                                        <?php if($admin->id == 1){ ?>
                                            <?php if($obj->adminvalidated == null){ ?>
                                             <td> pas encore</td>
                                            <?php }else { ?>
                                                <td><?= $obj->adminvalidated; ?></td>
                                            <?php } ?>
                                        <?php }?>
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
    var url = "<?php echo base_url();?>";

    function supprimer(id) {
        var r = confirm("Vous voulez vraiment supprimer cette réservation ?")
        if (r == true) window.location = url + "reservation/delete_reservation/" + id;
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
