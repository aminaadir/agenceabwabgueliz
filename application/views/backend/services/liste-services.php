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
                        <h1>Gérer les services</h1>
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
                        <a href="<?= base_url();?>service/add" class="btn btn-primary float-right"> <i class="fa fa-plus-circle"></i> Ajouter une
                            service</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title">Liste des services</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Partenaire</th>
                                        <th>Type de service</th>
                                        <th>Nom de service</th>
                                        <th>Prix/Dh</th>
                                        <th>Reduction</th>
                                        <th>Nouveau Prix</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count = 1;
                                        foreach ($services as $service){
                                            $offre = get_min_offre_byServiceId($service->id);
                                    ?>

                                    <tr>

                                        <td><?= $count++; ?></td>
                                        <td><?= ucfirst(get_name_of_partenaire_id($service->partenaire_id)); ?></td>
                                        <td><?= get_name_categorie_by_id($service->categorie_id) ?> : <?= get_name_souscategorie_by_id($service->sous_categorie_id) ?></td>
                                        <td><?= $service->titre ?></td>
                                        <td><?php if ($service->prix > 0){ echo $service->prix; }else{ echo "---"; } ?> </td>
                                        <td><?php if ($offre !=null ){ echo $offre->pourcentage.' %'; }else{ echo "---"; } ?> </td>
                                        <td><?php if ($offre !=null ){ echo $offre->new_prix.' Dh';}else{ echo "---"; } ?> </td>
                                        <td>
                                            <?php if ($service->status == 1) { ?>
                                                <span class="badge badge-success"><i class="fa fa-check-circle"></i> Activé</span>
                                            <?php }else{ ?>
                                                <span class="badge badge-danger"><i class="fa fa-minus-circle"></i>Désactivé</span>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="<?= base_url();?>service/details/<?= $service->id; ?>" class="btn btn-info btn-sm mb-1 col-sm-12"><i
                                                                class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="col-md-12">
                                                    <a href="<?= base_url();?>service/edit/<?= $service->id; ?>" class="btn btn-primary btn-sm mb-1 col-sm-12"><i
                                                                class="fa fa-edit"></i></a>
                                                </div>

                                                <div class="col-md-12">
                                                   <a href="javascript:void(0);"  onclick="supprimer(<?= $service->id;?>)" class="btn btn-danger btn-sm col-sm-12"><i
                                                                class="fa fa-trash"></i></a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>

<!--                                    <tr>-->
<!--                                        -->
<!--                                        <td>1</td>-->
<!--                                        <td>Marrakech red city</td>-->
<!--                                        <td>Activité : Demi-journée</td>-->
<!--                                        <td>Excursion pour 2 jours et nuit a Agafay</td>-->
<!--                                        <td>750 Dhs</td>-->
<!--                                        <td>20 %</td>-->
<!--                                        <td>550 Dhs</td>-->
<!--                                        <td><span class="badge badge-success"><i class="fa fa-check-circle"></i> Activé</span>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <div class="row">-->
<!--                                                <a href="" class="btn btn-info btn-sm mb-1 col-sm-12"><i-->
<!--                                                            class="fa fa-eye"></i></a>-->
<!--                                                <a href="" class="btn btn-primary btn-sm mb-1 col-sm-12"><i-->
<!--                                                            class="fa fa-edit"></i></a>-->
<!--                                                <a href="" class="btn btn-danger btn-sm col-sm-12"><i-->
<!--                                                            class="fa fa-trash"></i></a>-->
<!--                                            </div>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>2</td>-->
<!--                                        <td>Hotel Redouane</td>-->
<!--                                        <td>Hébérgement : Hotel</td>-->
<!--                                        <td>Chambre double très propore et climatsé</td>-->
<!--                                        <td>450 Dhs</td>-->
<!--                                        <td>30 %</td>-->
<!--                                        <td>350 Dhs</td>-->
<!--                                        <td><span class="badge badge-success"><i class="fa fa-check-circle"></i> Activé</span>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <div class="row">-->
<!--                                                <a href="" class="btn btn-info btn-sm mb-1 col-sm-12"><i-->
<!--                                                            class="fa fa-eye"></i></a>-->
<!--                                                <a href="" class="btn btn-primary btn-sm mb-1 col-sm-12"><i-->
<!--                                                            class="fa fa-edit"></i></a>-->
<!--                                                <a href="" class="btn btn-danger btn-sm col-sm-12"><i-->
<!--                                                            class="fa fa-trash"></i></a>-->
<!--                                            </div>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3</td>-->
<!--                                        <td>Marrakech red city</td>-->
<!--                                        <td>Activité : Journée Complete</td>-->
<!--                                        <td>Excursion pour pour une journée à Essaouira</td>-->
<!--                                        <td>350 Dhs</td>-->
<!--                                        <td>25 %</td>-->
<!--                                        <td>250 Dhs</td>-->
<!--                                        <td><span class="badge badge-success"><i class="fa fa-check-circle"></i> Activé</span>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <div class="row">-->
<!--                                                <a href="" class="btn btn-info btn-sm mb-1 col-sm-12"><i-->
<!--                                                            class="fa fa-eye"></i></a>-->
<!--                                                <a href="" class="btn btn-primary btn-sm mb-1 col-sm-12"><i-->
<!--                                                            class="fa fa-edit"></i></a>-->
<!--                                                <a href="" class="btn btn-danger btn-sm col-sm-12"><i-->
<!--                                                            class="fa fa-trash"></i></a>-->
<!--                                            </div>-->
<!--                                        </td>-->
<!--                                    </tr>-->


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
        var r=confirm("Vous voulez vraiment supprimer cette service ?")
        if (r==true)
            window.location = url+"service/delete_service/"+id;
        else
            window.location = url+"service/index";
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
