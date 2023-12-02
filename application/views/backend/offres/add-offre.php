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
                        <h1>Ajouter une offre</h1>
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
                                <strong>Ajouter une nouvelle offre</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url() ?>offre/addoffre" method="post" class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Nom du partenaire <span
                                                        class="required">*</span></label>
                                            <select name="partenaire_id" id="partenaire_id" onchange="get_services_by_partenaire(this.value)"  class="form-control">
                                                <option value="">--Séléctionnez--</option>
                                                <?php foreach ($partenaires as $partenaire) { ?>
                                                    <option value="<?= $partenaire->id ?>"><?= $partenaire->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Service <span
                                                        class="required">*</span></label>
                                            <select name="service_id" id="service_id" onchange="get_chambres_by_service(this.value)"
                                                    class="form-control">
                                                <option value="">--Séléctionnez--</option>

                                            </select>
                                        </div>

                                        <!--<div class="form-group col col-md-4">-->
                                        <!--    <label for="text-input" class=" form-control-label">Chambre </label>-->
                                        <!--    <select name="chambre_id" id="chambre_id"-->
                                        <!--            class="form-control">-->
                                        <!--        <option value="">--Séléctionnez--</option>-->

                                        <!--    </select>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="row ">
                                        <div class="form-group col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nouv. Prix/Dh <span
                                                        class="required">*</span></label>
                                            <input type="number"  autocomplete="off" min="1" id="new_prix" required name="new_prix"
                                                   placeholder="Tappez le prix du offre..." class="form-control">
                                        </div>
                                        <!--<div class="form-group col col-md-3">-->
                                        <!--    <label for="text-input" class=" form-control-label">Date de debut <span-->
                                        <!--                class="required">*</span></label>-->
                                        <!--    <input type="datetime-local"  autocomplete="off" id="date_debut" required name="date_debut"-->
                                        <!--            class="form-control">-->
                                        <!--</div>-->
                                        <!--<div class="form-group col col-md-3">-->
                                        <!--    <label for="text-input" class=" form-control-label">Date de fin <span-->
                                        <!--                class="required">*</span></label>-->
                                        <!--    <input type="datetime-local"  autocomplete="off" id="date_fin" required name="date_fin"-->
                                        <!--           class="form-control">-->
                                        <!--</div>-->
                                        <div class="form-group col col-md-3">
                                            <label for="text-input" class=" form-control-label">Pourcentage/% <span
                                                        class="required">*</span></label>
                                            <input type="number"  autocomplete="off" min="1" id="pourcentage" required name="pourcentage"
                                                   placeholder="Exemple : 20" class="form-control">
                                        </div>
                                    </div>

                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                           value="<?= $this->security->get_csrf_hash(); ?>"/>

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>offre" class="btn btn-danger btn-sm">
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
<script>
    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            // ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen']],
            ['help', ['help']]
        ]
    });


    function get_services_by_partenaire(partenaire_id) {

        if (partenaire_id == 1) {
            $(document).ready(function () {
                $('#chambre_id').prop('readonly', true);
                $('#chambre_id').prop('required', false);
                // $('#prix_notif').html("<b>NB:</b> le prix doit être sur les chambres");
            });
        } else {
            $(document).ready(function () {
                // $('#prix_notif').html("");
                $('#chambre_id').prop('readonly', false);
                $('#chambre_id').prop('required', true);
            });
        }

        $.ajax({

            type: "POST",

            url: "<?php echo site_url('service/get_services_by_partenaire'); ?>",

            data: { partenaire_id : partenaire_id},

            async: false,

            success: function (response) {

                if (
                    response) {

                    $('#service_id').html(response);
                }

            }

        });


    }

    function get_chambres_by_service(service_id) {
        // alert(service_id);
        // $('#chambre_id').prop('readonly', true);
        // if (service_id == 1) {
        //     $(document).ready(function () {
        //         $('#chambre_id').prop('readonly', true);
        //         $('#chambre_id').prop('required', false);
        //         // $('#prix_notif').html("<b>NB:</b> le prix doit être sur les chambres");
        //     });
        // } else {
        //     $(document).ready(function () {
        //         // $('#prix_notif').html("");
        //         $('#chambre_id').prop('readonly', false);
        //         $('#chambre_id').prop('required', true);
        //     });
        // }

        $.ajax({

            type: "POST",

            url: "<?php echo site_url('service/get_chambres_by_service'); ?>",

            data: { service_id : service_id},

            async: false,

            success: function (response) {

                if (response) {

                    $('#chambre_id').html(response);
                }

            }

        });


    }


</script>
</body>
</html>



