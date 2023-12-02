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
                        <h1>Ajouter une reservation</h1>
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
                                <strong>Ajouter une nouvelle reservation</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url() ?>reservation/add" method="post" class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Nom du partenaire <span
                                                        class="required">*</span></label>
                                            <select name="partenaire_id" id="partenaire_id" class="form-control">
                                                <option value="">--Séléctionnez--</option>
                                                <?php foreach ($partenaires as $partenaire) { ?>
                                                    <option value="<?= $partenaire->id ?>"><?= $partenaire->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Catégorie du service
                                                <span class="required">*</span></label>
                                            <select name="categorie_id" id="categorie_id"
                                                    onchange="get_souscat_by_cat(this.value)" class="form-control">
                                                <option value="">--Séléctionnez--</option>
                                                <?php foreach ($categories as $categorie) { ?>
                                                    <option value="<?= $categorie->id ?>"><?= $categorie->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Type de service <span
                                                        class="required">*</span></label>
                                            <select name="sous_categorie_id" id="sous_categorie_id"
                                                    class="form-control" onchange="get_services_by_souscat(this.value)">
                                                <option value="">--Séléctionnez--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="form-group col col-md-8">
                                            <label for="text-input" class=" form-control-label">Titre du service<span
                                                        class="required">*</span></label>
                                            <select name="service_id" id="service_id"
                                                    class="form-control" onchange="get_chambres_by_service(this.value)">
                                                <option value="">--Séléctionnez--</option>

                                            </select>

                                        </div>
                                        <div class="form-group col col-md-4" id="price">
                                            <label for="text-input" class=" form-control-label">Nombre de
                                                chambre</label>
                                            <input type="number" autocomplete="off" min="1" id="nbr_chambres"
                                                   name="nbr_chambres" value="1"
                                                   placeholder="Tappez le nombre de chambres..." class="form-control">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-8" id="price">
                                            <label for="" class=" form-control-label">Nom de chambre</label>
                                            <select name="chambre_id" id="chambre_id"
                                                    class="form-control" onchange="get_infos_chambre(this.value)">
                                                <option value="">--Séléctionnez--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Date de début du
                                                réservation<span
                                                        class="required">*</span></label>
                                            <input type="datetime-local" id="date_debut_resa" required
                                                   name="date_debut_resa"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Date de fin du
                                                réservation<span
                                                        class="required">*</span></label>
                                            <input type="datetime-local" id="date_fin_resa" required
                                                   name="date_fin_resa"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group col col-md-2">
                                            <label for="text-input" class=" form-control-label"> Nombre d'Adults<span
                                                        class="required">*</span></label>
                                            <input type="number" value="1" min="1" max="10" placeholder="1"
                                                   id="nbr_adults" required name="nbr_adults"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col col-md-2">
                                            <label for="text-input" class=" form-control-label"> Nombre d'enfants<span
                                                        class="required">*</span></label>
                                            <input type="number" value="0" min="0" max="10" placeholder="1"
                                                   id="nbr_enfants" required name="nbr_enfants"
                                                   class="form-control">
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-12 col-md-4 form-group clearfix">
                                            <label for="select" class=" form-control-label">Est un nouveau
                                                client?</label>
                                            <br>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" onchange="isnewclient('nw')" name="new_client" value="1" id="radioPrimary1"
                                                       >
                                                <label for="radioPrimary1">Nouvau client
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" onchange="isnewclient('ex')" name="new_client" value="0" id="radioPrimary2"checked>
                                                <label for="radioPrimary2">
                                                    Exist client
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8  form-group" id="cli">
                                            <label for="select" class=" form-control-label">Clients <span
                                                        class="required">*</span></label>
                                            <select name="client_id" id="client_id" onchange="get_infos_client(this.value)" class="form-control">
                                                <option value="">---séléctionnez---</option>
                                                <?php foreach ($clients as $client) { ?>
                                                    <option value="<?= $client->id; ?>"><?= $client->nom ?> <?= $client->prenom ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label"> Nom<span
                                                        class="required">*</span></label>
                                            <input type="text" autocomplete="off" placeholder="tappez le nom du client"
                                                   required name="nom" id="nom"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label"> Prénom<span
                                                        class="required">*</span></label>
                                            <input type="text" id="prenom" autocomplete="off"
                                                   placeholder="tappez le prenom du client" required name="prenom"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label"> Téléphone 1<span
                                                        class="required">*</span></label>
                                            <input type="text" id="tel1" autocomplete="off"
                                                   placeholder="tappez le téléphone du client" required name="tel1"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label"> Téléphone 2<span
                                                        class="required">*</span></label>
                                            <input type="text" id="tel2" autocomplete="off"
                                                   placeholder="tappez le 2ème téléphone du client"  name="tel2"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label"> Pays<span
                                                        class="required">*</span></label>
                                            <input type="text" id="pays" autocomplete="off" placeholder="tappez le nom du pays"
                                                   required name="pays"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label"> Ville<span
                                                        class="required">*</span></label>
                                            <input type="text" autocomplete="off" placeholder="tappez la ville" required
                                                   name="ville" id="ville"
                                                   class="form-control">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-6">
                                            <label for="text-input" class=" form-control-label">Addresse<span
                                                        class="required">*</span></label>
                                            <input type="text" autocomplete="off" id="adresse"
                                                   placeholder="tappez l'adrsse du client" required name="adresse"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group col col-md-6">
                                            <label for="text-input" class=" form-control-label"> Email<span
                                                        class="required">*</span></label>
                                            <input type="email" autocomplete="off" placeholder="tappez l'email" required
                                                   name="email" id="email"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                           value="<?= $this->security->get_csrf_hash(); ?>"/>

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-save"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>reservation" class="btn btn-danger btn-sm">
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


    function get_souscat_by_cat(cat_id) {
        if (cat_id == 1) {
            $(document).ready(function () {
                $('#price').css('display', 'block');
            });
        } else {
            $(document).ready(function () {
                $('#price').css('display', 'none');
            });
        }

        $.ajax({

            type: "POST",

            url: "<?php echo site_url('souscategorie/get_souscat_by_cat'); ?>",

            data: {cat_id: cat_id},

            async: false,

            success: function (response) {

                if (response) {

                    $('#sous_categorie_id').html(response);
                }

            }

        });


    }

    function get_services_by_souscat(sous_cat_id) {
        //alert(sous_cat_id);
        $.ajax({

            type: "POST",

            url: "<?php echo site_url('service/get_services_by_souscat'); ?>",

            data: {sous_cat_id: sous_cat_id},

            async: false,

            success: function (response) {

                if (response) {
                    $('#service_id').html(response);
                }

            }

        });


    }

    function get_chambres_by_service(service_id) {
        //alert(service_id);
        $.ajax({

            type: "POST",

            url: "<?php echo site_url('service/get_chambres_by_service'); ?>",

            data: {service_id: service_id},

            async: false,

            success: function (response) {

                if (response) {
                    // alert(response);
                    $('#chambre_id').html(response);
                }

            }

        });
    }

    function get_infos_client(client_id) {
        // alert(client_id);
        $.ajax({

            type: "POST",

            url: "<?php echo site_url('service/get_client_by_id'); ?>",

            data: {client_id: client_id},
            dataType: 'json',
            async: false,

            success: function (response) {

                if (response) {
                    // alert(response);
                    $('#nom').val(response.nom);
                    $('#prenom').val(response.prenom);
                    $('#tel1').val(response.tel1);
                    $('#tel2').val(response.tel2);
                    $('#email').val(response.email);
                    $('#pays').val(response.pays);
                    $('#ville').val(response.ville);
                    $('#adresse').val(response.adresse);
                }

            }

        });
    }

    function isnewclient(val) { 

            let divclient = document.getElementById("cli"); 
            
            $('#client_id option[value=""]').attr('selected','selected');
            $('#nom').val("");
            $('#prenom').val("");
            $('#tel1').val("");
            $('#tel2').val("");
            $('#email').val("");
            $('#pays').val("");
            $('#ville').val("");
            $('#adresse').val("");
            
            if(val == "nw"){
                divclient.style.display = 'none';
            }else{
                divclient.style.display = 'block';
            }
            
    }
 

</script>
</body>
</html>



