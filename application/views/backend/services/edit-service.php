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
                        <h1>Modifier le service</h1>
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
                                <strong>Modifier le service</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="<?= base_url() ?>service/edit/<?= $service->id ?>" method="post" class="form-horizontal"enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Nom du partenaire <span
                                                        class="required">*</span></label>
                                            <select name="partenaire_id" id="partenaire_id" class="form-control">
                                                <option value="">--Séléctionnez--</option>
                                                <?php foreach ($partenaires as $partenaire) { ?>
                                                    <option value="<?= $partenaire->id ?>" <?php if ($service->partenaire_id == $partenaire->id){ ?> selected <?php } ?> ><?= $partenaire->nom ?></option>
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
                                                    <option value="<?= $categorie->id ?>" <?php if ($service->categorie_id == $categorie->id){ ?> selected <?php } ?> ><?= $categorie->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Type de service <span
                                                        class="required">*</span></label>
                                            <select name="sous_categorie_id" id="sous_categorie_id"
                                                    class="form-control">
                                                <option value="<?= $service->sous_categorie_id ?>"><?= get_name_souscategorie_by_id($service->sous_categorie_id) ?></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Prix en Dh <span
                                                        class="required">*</span></label>
                                            <input type="number" value="<?= $service->prix_initial ?>" onkeyup="calculprix()" autocomplete="off" min="1" id="prixini"
                                                   <?php if ($service->prix > 0){ ?>required <?php }else{ ?> readonly <?php } ?> name="initial_prix"
                                                   placeholder="Tappez le prix du service..." class="form-control">
                                            <span id="prix_notif"><?php if ($service->prix > 0){ ?> <?php }else{ ?> <b>NB:</b> le prix doit être sur les chambres <?php } ?></span>
                                        </div>
                                        <div class="form-group col col-md-4" id="pluss_news1">
                                            <label for="text-input" class=" form-control-label">% <span
                                                        class="required">*</span></label>
                                            <input type="number"  value="<?= $service->percent ?>" autocomplete="off" onkeyup="calculprix(this.value)" onchange="calculprix()" value="0" min="0" min="100" id="percent" required name="percent"
                                                   placeholder="Tappez le pourcentage du service..." class="form-control">
                                            <span id="prix_notif"></span>
                                        </div>
                                        <div class="form-group col col-md-4" id="pluss_news2">
                                            <label for="text-input" class=" form-control-label">Prix Final: </label>
                                            <input type="number"  value="<?= $service->prix ?>" autocomplete="off" readonly="true" id="prix" required name="prix"
                                                   placeholder="Total" class="form-control">
                                            <span id="prix_notif"></span>
                                        </div> 
                                    </div>
                                    <script>
                                        function stopstop(valuee){
                                            if(valuee > 100){
                                                $('#percent').val(100);
                                            }
                                        }
                                        function calculprix(){
                                            if($('#percent').val() > 100){
                                                $('#percent').val(100);
                                            }
                                            let prixini = $('#prixini').val();
                                            let percent = $('#percent').val();
                                            let totalinput = $('#prix');
                                            var total=0;
                                            total = (prixini * percent) / 100;
                                            total = parseFloat(prixini) + parseFloat(total);
                                            console.log(total);
                                            totalinput.val(total);
                                            
                                        }
                                    </script>
                                    <div class="row ">
                                        <!-- <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Petite description
                                                (<strong id="nbr">80</strong> Caractères)<span
                                                        class="required">*</span></label>
                                            <textarea rows="2" id="petit_desc" required name="petit_desc"
                                                      placeholder="Tappez une petite description du service..."
                                                      class="form-control"> <?= $service->petit_desc ?></textarea>
                                        </div> -->
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Lieu<span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" id="lieu" required name="lieu"
                                                   value="<?= $service->lieu ?>" placeholder="Tappez le lieu du service..." class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Lieu d'arrivee<span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" id="lieu2" required name="lieu2"
                                            value="<?= $service->lieu2 ?>"  placeholder="Tappez le lieu d'arrivee..." class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Disponibilité<span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" id="disponibilite" required name="disponibilite"
                                            value="<?= $service->disponibilite ?>"  placeholder="(Format : AAAA-MM-JJ / AAAA-MM-JJ)" class="form-control">
                                        </div>
                                        <!-- <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Nombre des Nuits<span
                                                        class="required">*</span></label>
                                            <input type="number"  autocomplete="off" id="Nuits" required name="Nuits"
                                                   placeholder="Tappez nombre des Nuits..." class="form-control">
                                        </div> -->
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Status de Forfait </label>
                                            <select name="statusDeForfait" id="statusDeForfait" class="form-control">
                                            <option value="">-----select----</option>
                                                 <option value="1">Places Disponible</option>
                                                <option value="2">Complet</option>
                                               
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Titre <span
                                                        class="required">*</span></label>
                                            <input type="text"  value="<?= $service->titre ?>" autocomplete="off" id="titre" required name="titre"
                                                   placeholder="Tappez le titre du service..." class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Nom_hotel <span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" id="titre_hotel" required name="titre_hotel"
                                            value="<?= $service->titre_hotel ?>"   placeholder="Tappez le nom de hotel..." class="form-control">
                                        </div>
                                       
                                        <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Nom_hotel à Medina <span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" id="titre_hotel_Medina" required name="titre_hotel_Medina"
                                            value="<?= $service->titre_hotel_Medina ?>"  placeholder="Tappez le nom de hotel à medina..." class="form-control">
                                        </div>
                                        
                                        <!-- <div class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">description_hotel <span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" id="desc_hotel" required name="desc_hotel"
                                                   placeholder="Tappez le description ..." class="form-control">
                                        </div> -->
                                       
                                        <div  style="display:none;"class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Maps Latitude <span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" value="<?= $service->maps_x ?>"  id="maps_x" required name="maps_x"
                                                   placeholder="Exemple : 34.323233" class="form-control">
                                        </div>
                                        <div  style="display:none;"class="form-group col col-md-4">
                                            <label for="text-input" class=" form-control-label">Maps Longitude <span
                                                        class="required">*</span></label>
                                            <input type="text"  autocomplete="off" value="<?= $service->maps_y ?>"  id="maps_y" required name="maps_y"
                                                   placeholder="Exemple : -84.323233" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-12">
                                            <label for="text-input" class=" form-control-label">Programme<span
                                                        class="required">*</span></label>
                                            <textarea class="summernote" id="Programme" name="Programme">
                                                Tappez le Programme  de Forfait ici....
                                                <?= $service->Programme ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-12">
                                            <label for="text-input" class=" form-control-label">Grand description<span
                                                        class="required">*</span></label>
                                            <textarea class="summernote" id="grand_desc" name="grand_desc"><?= $service->grand_desc ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-12">
                                            <label for="text-input" class=" form-control-label">Documents Fournir<span
                                                        class="required">*</span></label>
                                            <textarea class="summernote" id="doc_fournir" name="doc_fournir">
                                                Tappez le documents fournir ....
                                                <?= $service->doc_fournir ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-12">
                                            <label for="text-input" class=" form-control-label">Conditions générale de
                                                l'offre/pre-payement<span class="required">*</span></label>
                                            <textarea class="summernote" id="conditions" name="conditions"><?= $service->conditions ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-md-6">
                                        <div class="row form-group" style="padding: 20px;">
                                            
                                        <img src="<?= base_url()."assets/backend/dist/img/cat-sous-cat.jpg";  ?>" id="image1" alt="" width="100%" height="350">

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    
                                                    <input type="file" name="image_hotel_makka" onchange="readURL1(this);" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">images Hotel Makka</label>
                                                </div>
                                            </div>

                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col col-md-6">
                                   <div class="row form-group" style="padding: 20px;">
                                      
                                            <img src="<?= base_url()."assets/backend/dist/img/cat-sous-cat.jpg";  ?>" id="image2" alt="" width="100%" height="350">

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image_hotel_medina" onchange="readURL2(this);" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">images Hotel Medina</label>
                                                </div>
                                            </div>
                                        

                                    </div>
                                           </div>
                                    </div>
                                    

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Activé/Désactivé <span
                                                        class="required">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <select name="status" required id="status" class="form-control">
                                                <option <?php if($service->status == 1) echo "selected"; ?> value="1">Activé</option>
                                                <option <?php if($service->status == 0) echo "selected"; ?> value="0">Désactivé</option>
                                            </select>
                                        </div>
                                    </div>


                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                           value="<?= $this->security->get_csrf_hash(); ?>"/>

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Enregistrer
                                        </button>
                                        <a href="<?= base_url() ?>service" class="btn btn-danger btn-sm">
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
                $('#prix').prop('readonly', true);
                $('#prix').prop('required', false);
                $('#prix_notif').html("<b>NB:</b> le prix doit être sur les chambres");
            });
            $('#pluss_news1').css('display', 'none');
            $('#pluss_news2').css('display', 'none'); 
        } else {
            $(document).ready(function () {
                $('#prix_notif').html("");
                $('#prix').prop('readonly', false);
                $('#prix').prop('required', true);
                $('#pluss_news1').css('display', 'block');
                $('#pluss_news2').css('display', 'block'); 
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


    $('#petit_desc').keyup(function(e) {
        var tval = $('#petit_desc').val(),
            tlength = tval.length,
            set = 80,
            remain = parseInt(set - tlength);
        $('#nbr').text(remain);
        if (remain <= 0) {
            var valeur= tval.substring(0, tlength - 1);
            $('#petit_desc').val(valeur);
            return false;
        }
        // if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        //     $('#petit_desc').val((tval).substring(0, tlength - 1));
        //     return false;
        // }
    })
   
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
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image2').attr('src', e.target.result)
                    .width(100+"%")
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


</script>

</body>
</html>



