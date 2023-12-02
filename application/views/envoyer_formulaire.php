<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["contact-name"];
    $email = $_POST["contact-email"];
    $message = $_POST["contact-phone"];
    $message = $_POST["contact-message"];
    
    
    $destinataire = "aminaadir12@gmail.com"; // Remplacez par votre adresse e-mail
    
    $sujet = "Nouveau message de contact de $nom";
    $message_email = "Nom : $nom\nE-mail : $email\nMessage :\n$message";
    
    // Envoyer l'e-mail
    mail($destinataire, $sujet, $message_email);
    
    // Rediriger ou afficher un message de confirmation
    header("Location: confirmation.html");
}
?>
