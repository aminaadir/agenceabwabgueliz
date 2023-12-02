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
            <form method="post" action="<?= base_url()?>loginclient" class="row">
                <h3>Access pour compte client</h3>
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