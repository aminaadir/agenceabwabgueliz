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
                        <h1>Liste des emails (s'abonner en mailing)</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header ">
                                <div class="col-md-8">
                                    <strong class="card-title">Liste des emails</strong>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Email</th>
                                            <!--                                                <th>Action</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count=1;
                                        foreach($emails as $obj){   ?>
                                            <tr>
                                                <td><?=  $count++; ?></td>
                                                <td><?=  $obj->email; ?></td>
                                                <!--                                                    <td style="width :20%">-->
                                                <!--                                                        <a  href="" ><p class="btn btn-primary" title="Détails"> <i class="fa fa-eye"></i> Afficher les détails</p></a>-->
                                                <!--                                                        <a href="javascript:void(0);"  ><p class="btn btn-success" title="Accépté"> <i class="fa fa-check"></i> </p></a>-->
                                                <!--                                                        <a href="javascript:void(0);"  ><p class="btn btn-danger" title="Annullé"> <i class="fas fa-minus"></i> </p></a>-->
                                                <!--                                                    </td>-->
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
