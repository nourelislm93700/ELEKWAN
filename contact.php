<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "190878Ab+";
$base_de_donnees = "wanelec";

$idcon = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if ($idcon->connect_error) {
    die("La connexion à la base de données a échoué : " . $idcon->connect_error);
}

$nom_complet = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$sujet = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$nom_complet || !$email || !$sujet || !$message || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Veuillez remplir correctement tous les champs du formulaire.");
}

$requete = $idcon->prepare("INSERT INTO contacts (nom_complet, email, sujet, message) VALUES (?, ?, ?, ?)");
if (!$requete) {
    die("Erreur de préparation de la requête : " . $idcon->error);
}
$requete->bind_param("ssss", $nom_complet, $email, $sujet, $message);

if ($requete->execute()) {
    echo "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Confirmation de contact</title>
        <link rel='stylesheet' href='assets/css/confirmation.css'>

        
    </head>
    <body>
        <div class='confirmation-box'>
            <h1>Merci de nous avoir contactés ! , on revint vers vous dans les plus brefs délais !</h1>
            <p><strong>Nom complet :</strong> " . htmlspecialchars($nom_complet) . "</p>
            <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Sujet :</strong> " . htmlspecialchars($sujet) . "</p>
            <p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
            <a href='contact.html'>Retour au formulaire</a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "Erreur lors de l'exécution de la requête : " . $requete->error;
}

$requete->close();
$idcon->close();
?>
