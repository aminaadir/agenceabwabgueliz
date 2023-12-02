<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">
<?php $this->load->view("headscript"); ?>

<body class="bg-contact">

<div class="lightbox" style="display:block;">
    <div class="lb-wrap">
        <div class="lb-content">
            <form method="post" action="<?= base_url()?>addclient" class="row">
                <h3>Créer votre compte client</h3>
                <div class="f-item half-width">
                    <label for="nom">Nom</label>
                    <input required placeholder="Nom" type="text" id="nom" name="nom"/>
                </div>
                <div class="f-item half-width">
                    <label for="prenom">Prénom</label>
                    <input required placeholder="Prénom" type="text" id="prenom" name="prenom"/>
                </div>
                <div class="f-item half-width">
                    <label for="tel">Téléphone</label>
                    <input required placeholder="Téléphone" type="text" id="tel" name="tel1"/>
                </div>

                <div class="f-item half-width">
                    <label for="pays">Pays</label>
                    <input required placeholder="Pays" type="text" id="pays" name="pays"/>
                </div>
                <div class="f-item half-width">
                    <label for="Ville">Ville</label>
                    <input required placeholder="Ville" type="text" id="ville" name="ville"/>
                </div>
                <div class="f-item half-width">
                    <label for="adresse">Adresse</label>
                    <input required placeholder="Adresse" type="text" id="adresse" name="adresse"/>
                </div>
                <div class="f-item full-width">
                    <label for="email">E-mail</label>
                    <input required placeholder="Email" type="email" id="email" name="email"/>
                </div>
                <div class="f-item full-width">
                    <label for="password">Mot de passe</label>
                    <input required placeholder="Mot de passe" type="password" id="password" name="pass"/>
                </div>
<!--                <div class="f-item checkbox full-width">-->
<!--                    <input type="checkbox" id="remember_me" name="checkbox"/>-->
<!--                    <label for="remember_me">Remember me next time</label>-->
<!--                </div>-->
                <div class="f-item full-width">
<!--                    <p><a href="#" title="Forgot password?">Forgot password?</a><br/>-->
<!--                        Dont have an account yet? <a href="register.html" title="Sign up">Sign up.</a></p>-->
                    <input type="submit" value="Se connecter" class="gradient-button"/>
                </div>
            </form>
        </div>
    </div>
</div>



<!--script-->
<?php $this->load->view("footerscript"); ?>
<!---//script-->
</body>

</html>