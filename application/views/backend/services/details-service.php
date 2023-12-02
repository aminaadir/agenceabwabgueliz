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
                        <h1><?= get_name_categorie_by_id($service->categorie_id) ?>
                            : <?= get_name_souscategorie_by_id($service->sous_categorie_id) ?> <i
                                    class="fa fa-angle-double-right"></i> Détails du service</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-info card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                           href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                           aria-selected="true"> <i class="fa fa-list-alt"></i> Détails du service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                           href="#custom-tabs-one-profile" role="tab"
                                           aria-controls="custom-tabs-one-profile" aria-selected="false"> <i
                                                    class="fa fa-images"></i> Images</a>
                                    </li>
                                   
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                               href="#custom-tabs-one-messages" role="tab"
                                               aria-controls="custom-tabs-one-messages" aria-selected="false"> <i
                                                        class="fa fa-bed"></i> Chambres</a>
                                        </li>
                                    
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel"
                                         aria-labelledby="custom-tabs-one-home-tab">
                                        <table class="table table-bordered">

                                            <tbody>
                                            <tr>
                                                <td>Partenaire</td>
                                                <td>
                                                    <?= ucfirst(get_name_of_partenaire_id($service->partenaire_id)); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Titre</td>
                                                <td>
                                                    <?= $service->titre; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Type de service</td>
                                                <td>
                                                    <?= get_name_categorie_by_id($service->categorie_id) ?>
                                                    : <?= get_name_souscategorie_by_id($service->sous_categorie_id) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Prix Initial  en DH</td>
                                                <td>
                                                    <?php if ($service->prix_initial > 0) {
                                                        echo $service->prix_initial;
                                                    } else {
                                                        echo "---";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Percentage  %</td>
                                                <td>
                                                    <?php if ($service->percent > 0) {
                                                        echo $service->percent;
                                                    } else {
                                                        echo "---";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Prix Final en DH</td>
                                                <td>
                                                    <?php if ($service->prix > 0) {
                                                        echo $service->prix;
                                                    } else {
                                                        echo "---";
                                                    } ?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Reduction</td>
                                                <td>
                                                    <?php if ($service->prix > 0) {
                                                        echo '0';
                                                    } else {
                                                        echo "---";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nouveau Prix</td>
                                                <td>
                                                    <?php if ($service->prix > 0) {
                                                        echo '0';
                                                    } else {
                                                        echo "---";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Petite Description</td>
                                                <td>
                                                    <?= $service->petit_desc ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Grande Description</td>
                                                <td>
                                                    <?= $service->grand_desc ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Conditions générale de l'offre/pre-payement</td>
                                                <td>
                                                    <?= $service->conditions ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lieu</td>
                                                <td>
                                                    <?= $service->lieu ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lieu d'arrivee</td>
                                                <td>
                                                    <?= $service->lieu2 ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>disponibilite</td>
                                                <td>
                                                    <?= $service->disponibilite	 ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>status De Forfait</td>
                                                <td>
                                                    <?= $service->statusDeForfait	 ?>
                                                </td>
                                            </tr>
                                            <tr  style="display:none;">
                                                <td>Maps Latitude</td>
                                                <td>
                                                    <?= $service->maps_x ?>
                                                </td>
                                            </tr>
                                            <tr  style="display:none;">
                                                <td>Maps Longitude</td>
                                                <td>
                                                    <?= $service->maps_y ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Statut</td>
                                                <td>
                                                    <?php if ($service->status == 1) { ?>
                                                        <span class="badge badge-success"><i
                                                                    class="fa fa-check-circle"></i> Activé</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger"><i
                                                                    class="fa fa-minus-circle"></i>Désactivé</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                         aria-labelledby="custom-tabs-one-profile-tab">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8"><h2>Galerie d'images</h2></div>
                                                <div class="col-md-4">
                                                    <a href="<?= base_url(); ?>service/addimage/<?= $service->id; ?>"
                                                       class="btn btn-primary float-right"> <i
                                                                class="fa fa-plus-circle"></i> Ajouter une
                                                        image</a>
                                                </div>
                                            </div>
                                            <div class="card">

                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <div class="row form-group">
                                                            <?php foreach ($service_images as $obj) { ?>
                                                                <div class="col-md-3 mb-3">
                                                                    <input type="hidden" name="prev_img1" id="prev_img1"
                                                                           value="<?php if ($obj->image_url != "") echo $obj->image_url; ?>"/>
                                                                    <a href="<?php if ($obj->image_url != "") echo base_url() . '/assets/backend/services/' . $obj->image_url; else echo "#"; ?>"
                                                                       target="_blank">
                                                                        <img
                                                                                src="<?php if ($obj->image_url != "") echo base_url() . '/assets/backend/services/' . $obj->image_url; else echo base_url() . "assets/backend/dist/img/cat-sous-cat.jpg"; ?>"
                                                                                id="image_<?= $obj->id ?>" alt=""
                                                                                width="100%" height="220"></a>
                                                                    <?php if ($obj->image_url != "") { ?>
                                                                        <a href="<?= base_url() ?>service/deleteimg/<?= $obj->id; ?>/<?= $service->id; ?>"
                                                                           style="top: 0;right: 7px;position: absolute; z-index: 999999999;"
                                                                           onclick="javascript: return confirm('vous êtes sûr de vouloir supprimer cette image');"
                                                                           class="btn btn-danger btn-xs"><i
                                                                                    class="fa fa-trash"></i> Effacer
                                                                        </a>
                                                                    <?php } ?>
                                                                    <form action="<?= base_url() ?>service/editimage/<?= $obj->id; ?>"
                                                                          enctype="multipart/form-data" method="post"
                                                                          class="form-horizontal">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                       name="img_<?= $obj->id; ?>"
                                                                                       onchange="readURL1(this,<?= $obj->id; ?>);"
                                                                                       class="custom-file-input"
                                                                                       id="exampleInputFile">
                                                                                <label class="custom-file-label"
                                                                                       for="exampleInputFile">Choisissez
                                                                                    une image</label>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden"
                                                                               name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                               value="<?= $this->security->get_csrf_hash(); ?>"/>

                                                                        <div class="card-footer">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary btn-sm">
                                                                                <i class="fa fa-save"></i> Mise à jour
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>


                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    
                                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                             aria-labelledby="custom-tabs-one-messages-tab">
                                            <section class="content">
                                                <div class="container-fluid">

                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <h2>Ajouter une chambre</h2>
                                                            <form action="<?= base_url() ?>service/addchambre"
                                                                  method="post" class="form-horizontal">
                                                                <div class="row">
                                                                    <input type="hidden" name="service_id"
                                                                           value="<?= $service->id; ?>">
                                                                    <div class="form-group col col-md-12">
                                                                        <label for="text-input"
                                                                               class=" form-control-label">Type de
                                                                            chambre <span
                                                                                    class="required">*</span></label>
                                                                        <select name="type_chambre" id="type_chambre"
                                                                                class="form-control">
                                                                            <!--                                                                    <option value="">--Séléctionnez--</option>-->
                                                                            <option value="Chambre single">Chambre
                                                                                single
                                                                            </option>
                                                                            <option value="Chambre double">Chambre
                                                                                double
                                                                            </option>
                                                                            <option value="Chambre triple">Chambre
                                                                                triple
                                                                            </option>
                                                                            <option value="Famille">Famille</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col col-md-12">
                                                                        <label for="text-input"
                                                                               class=" form-control-label">Prix Initial en Dh
                                                                            <span
                                                                                    class="required">*</span> (à partir
                                                                            de)</label>
                                                                        <input type="number" autocomplete="off" min="1"
                                                                               onkeyup="calculprix()"
                                                                               id="prixini"
                                                                               name="initial_prix"
                                                                               placeholder="Tappez le prix initial du chambre..."
                                                                               class="form-control">
                                                                        <span id="prix_notif"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col col-md-12">
                                                                        <label for="text-input"
                                                                               class=" form-control-label">Percentage  %</label>
                                                                        <input type="number" autocomplete="off"  
                                                                               placeholder="Tappez le Percentage du chambre..."
                                                                               class="form-control"
                                                                               onkeyup="calculprix(this.value)" 
                                                                               onchange="calculprix()" 
                                                                               value="0" min="0" min="100" 
                                                                               id="percent" required 
                                                                               name="percent">
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
                                                                                                        console.log(prixini);
                                                                                                        totalinput.val(total);
                                                                                                        
                                                                                                    }
                                                                                                </script>
                                                                <div class="row">
                                                                    <div class="form-group col col-md-12">
                                                                        <label for="text-input"
                                                                               class=" form-control-label">Prix Final en Dh
                                                                            <span
                                                                                    class="required">*</span> (à partir
                                                                            de)</label>
                                                                        <input type="number" autocomplete="off" min="1"
                                                                               id="prix" required name="prix"
                                                                               placeholder="Tappez le prix du chambre..."
                                                                               class="form-control">
                                                                        <span id="prix_notif"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <label for="text-input"
                                                                               class=" form-control-label">Description<span
                                                                                    class="required">*</span></label>
                                                                        <textarea class="summernote" style="width: 100%"
                                                                                  id="description" name="description">
                                                                        Tappez la description details du chambre ici....
                                                                    </textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <label for="disponibility"
                                                                               class=" form-control-label">Disponibilité
                                                                            <span
                                                                                    class="required">*</span></label>
                                                                        <select name="disponibility" required
                                                                                id="disponibility"
                                                                                class="form-control">
                                                                            <option selected value="1">Disponible
                                                                            </option>
                                                                            <option value="0">Non disponible</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden"
                                                                       name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                       value="<?= $this->security->get_csrf_hash(); ?>"/>

                                                                <div class="card-footer text-center">
                                                                    <button type="submit"
                                                                            class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-dot-circle-o"></i> Enregistrer
                                                                    </button>
<!--                                                                    <a href="--><?//= base_url() ?><!--partenaire"-->
<!--                                                                       class="btn btn-danger btn-sm">-->
<!--                                                                        <i class="fa fa-ban"></i> Annuler-->
<!--                                                                    </a>-->
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h2>liste des chambres</h2>
                                                            <?php if (isset($chambres) && count($chambres) > 0) {

                                                                foreach ($chambres as $chambre) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card <?php if ($chambre->disponibility == 1) { ?> card-success <?php } else { ?>  card-danger <?php } ?> collapsed-card">
                                                                                <div class="card-header">
                                                                                    <h1 class="card-title"><i
                                                                                                class="fa fa-bed"></i> <?= $chambre->type_chambre ?> <i class="fa fa-angle-double-right"></i>
                                                                                        <span class="a-partir-prix"> a partir de : </span>
                                                                                        <b><?= $chambre->prix; ?> Dhs</b> Dhs/nuit
                                                                                    </h1>

                                                                                    <div class="card-tools">
                                                                                        <button type="button"
                                                                                                class="btn btn-tool"
                                                                                                data-card-widget="collapse"
                                                                                                title="Collapse">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body"
                                                                                     style="display: none;">
                                                                                    <form action="<?= base_url() ?>service/editchambre/<?= $chambre->id; ?>"
                                                                                          method="post"
                                                                                          class="form-horizontal">
                                                                                        <div class="row">
                                                                                            <input type="hidden"
                                                                                                   name="service_id"
                                                                                                   value="<?= $service->id; ?>">
                                                                                            <div class="form-group col col-md-12">
                                                                                                <label for="text-input"
                                                                                                       class=" form-control-label">Type de chambre <span
                                                                                                            class="required">*</span></label>
                                                                                                <select name="type_chambre"
                                                                                                        id="type_chambre"
                                                                                                        class="form-control">
                                                                                                    <!--                                                                    <option value="">--Séléctionnez--</option>-->
                                                                                                    <option <?php if ($chambre->type_chambre == "Chambre single") echo 'selected' ?> value="Chambre single">
                                                                                                        Chambre
                                                                                                        single
                                                                                                    </option>
                                                                                                    <option <?php if ($chambre->type_chambre == "Chambre double") echo 'selected' ?> value="Chambre double">
                                                                                                        Chambre
                                                                                                        double
                                                                                                    </option>
                                                                                                    <option <?php if ($chambre->type_chambre == "Chambre triple") echo 'selected' ?> value="Chambre triple">
                                                                                                        Chambre
                                                                                                        triple
                                                                                                    </option>
                                                                                                    <option <?php if ($chambre->type_chambre == "Famille") echo 'selected' ?> value="Famille">
                                                                                                        Famille
                                                                                                    </option>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div class="row">
                                                                                            <div class="form-group col col-md-12">
                                                                                                <label for="text-input"
                                                                                                       class=" form-control-label">Prix Initial en Dh
                                                                                                    <span
                                                                                                            class="required">*</span> (à partir
                                                                                                    de)</label>
                                                                                                <input type="number" autocomplete="off" min="1"
                                                                                                       onkeyup="calculprix1()"
                                                                                                       id="prixini1"
                                                                                                       name="initial_prix"
                                                                                                        value="<?= $chambre->prix_initial; ?>"
                                                                                                       placeholder="Tappez le prix initial du chambre..."
                                                                                                       class="form-control">
                                                                                                <span id="prix_notif"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="form-group col col-md-12">
                                                                                                <label for="text-input"
                                                                                                       class=" form-control-label">Percentage  %</label>
                                                                                                <input type="number" autocomplete="off"  
                                                                                                       placeholder="Tappez le Percentage du chambre..."
                                                                                                       class="form-control"
                                                                                                       onkeyup="calculprix1()" 
                                                                                                       onchange="calculprix1()" 
                                                                                                       min="0" min="100" 
                                                                                                       value="<?= $chambre->percent; ?>"
                                                                                                       id="percent1" required 
                                                                                                       name="percent">
                                                                                                <span id="prix_notif"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                         <div class="row">
                                                                                            <div class="form-group col col-md-12">
                                                                                                <label for="text-input"
                                                                                                       class=" form-control-label">Prix Final en Dh
                                                                                                    <span
                                                                                                            class="required">*</span> (à partir
                                                                                                    de)</label>
                                                                                                <input type="number" autocomplete="off" min="1"
                                                                                                       id="prix1" readonly="true" required name="prix"
                                                                                                       placeholder="Tappez le prix du chambre..."
                                                                                                       value="<?= $chambre->prix; ?>"
                                                                                                       class="form-control">
                                                                                                <span id="prix_notif"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="form-group">
                                                                                                <label for="text-input"
                                                                                                       class=" form-control-label">Description<span
                                                                                                            class="required">*</span></label>
                                                                                                <textarea
                                                                                                        class="summernote"
                                                                                                        style="width: 100%"
                                                                                                        id="description"
                                                                                                        name="description"><?= $chambre->description; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                         <script>
                                                                                                    function stopstop1(valuee){
                                                                                                        if(valuee > 100){
                                                                                                            $('#percent1').val(100);
                                                                                                        }
                                                                                                    }
                                                                                                    function calculprix1(){
                                                                                                        if($('#percent1').val() > 100){
                                                                                                            $('#percent1').val(100);
                                                                                                        }
                                                                                                        let prixini = $('#prixini1').val();
                                                                                                        let percent = $('#percent1').val();
                                                                                                        let totalinput = $('#prix1');
                                                                                                        var total=0;
                                                                                                        total = (prixini * percent) / 100;
                                                                                                        total = parseFloat(prixini) + parseFloat(total);
                                                                                                        console.log(total);
                                                                                                        totalinput.val(total);
                                                                                                        
                                                                                                    }
                                                                                        </script>
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12">
                                                                                                <label for="disponibility"
                                                                                                       class=" form-control-label">Disponibilité
                                                                                                    <span
                                                                                                            class="required">*</span></label>
                                                                                                <select name="disponibility"
                                                                                                        required
                                                                                                        id="disponibility"
                                                                                                        class="form-control">
                                                                                                    <option <?php if ($chambre->disponibility == 1) echo 'selected' ?>
                                                                                                            value="1">
                                                                                                        Disponible
                                                                                                    </option>
                                                                                                    <option <?php if ($chambre->disponibility == 0) echo 'selected' ?>
                                                                                                            value="0">
                                                                                                        Non disponible
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <input type="hidden"
                                                                                               name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                                               value="<?= $this->security->get_csrf_hash(); ?>"/>

                                                                                        <div class="card-footer text-center">
                                                                                            <button type="submit"
                                                                                                    class="btn btn-primary btn-sm">
                                                                                                <i class="fa fa-dot-circle-o"></i>
                                                                                                Enregistrer
                                                                                            </button>
<!--                                                                                            <a href="--><?//= base_url() ?><!--partenaire"-->
<!--                                                                                               class="btn btn-danger btn-sm">-->
<!--                                                                                                <i class="fa fa-ban"></i>-->
<!--                                                                                                Annuler-->
<!--                                                                                            </a>-->
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p class="alert alert-default-secondary"> La
                                                                            liste des chambres vide ! Veuillez ajouter
                                                                            une chambre !</p>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                 
                                </div>
                            </div>
                            <!-- /.card -->
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
        "width": '100%',
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

    function readURL1(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_' + id).attr('src', e.target.result)
                    .width(100 + "%")
                    .height(220);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>



