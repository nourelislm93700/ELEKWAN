<?php
session_start();

// Vérification CSRF
if (
    !isset($_POST['csrf_token'], $_SESSION['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
) {
    http_response_code(403);
    exit("Requête invalide : échec de la vérification CSRF.");
}

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "190878Ab+";
$base_de_donnees = "wanelec";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if ($conn->connect_error) {
    http_response_code(500);
    exit("Erreur de connexion : " . $conn->connect_error);
}

// Récupération et validation des données
$nom = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$sujet = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (
    empty($nom) || empty($email) || empty($sujet) || empty($message) ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    http_response_code(400);
    exit("Tous les champs sont requis avec un email valide.");
}

// Insertion dans la base de données
$stmt = $conn->prepare("INSERT INTO contacts (nom_complet, email, sujet, message) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    exit("Erreur SQL : " . $conn->error);
}
$stmt->bind_param("ssss", $nom, $email, $sujet, $message);
$stmt->execute();

// Nettoyage
$stmt->close();
$conn->close();
unset($_SESSION['csrf_token']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirmation d’envoi</title>
  <link rel="stylesheet" href="assets/css/confirmation.css" />
</head>
<body>
  <div class="confirmation-box">
    <h1>Votre message a été envoyé avec succès !</h1>
    <p><strong>Nom :</strong> <?= htmlspecialchars($nom) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Sujet :</strong> <?= htmlspecialchars($sujet) ?></p>
    <p><strong>Message :</strong><br><?= nl2br(htmlspecialchars($message)) ?></p>
    <a href="contact.php">Retour au formulaire</a>
  </div>
</body>
</html>
