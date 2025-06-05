<?php
session_start();

// Vérifier le token CSRF
if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Requête invalide : échec de la vérification CSRF.");
}

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "190878Ab+";
$base_de_donnees = "wanelec";

$idcon = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if ($idcon->connect_error) {
    die("Connexion échouée : " . $idcon->connect_error);
}

$nom_complet = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$sujet = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$nom_complet || !$email || !$sujet || !$message || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Veuillez remplir correctement tous les champs.");
}

$requete = $idcon->prepare("INSERT INTO contacts (nom_complet, email, sujet, message) VALUES (?, ?, ?, ?)");
if (!$requete) {
    die("Erreur SQL : " . $idcon->error);
}
$requete->bind_param("ssss", $nom_complet, $email, $sujet, $message);

if ($requete->execute()) {
    echo "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Message envoyé</title>
        <link rel='stylesheet' href='assets/css/confirmation.css'>
    </head>
    <body>
        <div class='confirmation-box'>
            <h1>Merci de nous avoir contactés !</h1>
            <p style='color:black;'><strong>Nom :</strong> " . htmlspecialchars($nom_complet) . "</p>
            <p style='color:black;'><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
            <p style='color:black;'><strong>Sujet :</strong> " . htmlspecialchars($sujet) . "</p>
            <p style='color:black;'><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
            <a href='contact.php'>Retour au formulaire</a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "Erreur : " . $requete->error;
}

$requete->close();
$idcon->close();
unset($_SESSION['csrf_token']); // Invalider le token après usage
?>
