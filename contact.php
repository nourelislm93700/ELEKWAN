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
        <style>
            body {
                font-family: 'Century Gothic', Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #000;
                background-image: url('assets/img/paris_4.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                color: white;
            }
            .confirmation-box {
                background-color: #7B1E1E; /* rouge bordeaux */
                color: white;
                padding: 25px;
                border-radius: 15px;
                max-width: 600px;
                width: 90%;
                border: 1px solid white;
                text-align: center;
                box-shadow: 0 0 10px rgba(255, 102, 0, 0.5);
            }
            .confirmation-box h1 {
                font-size: 22px;
                margin-bottom: 20px;
                padding: 10px;
                border: 1px solid white;
                border-radius: 10px;
                display: inline-block;
            }
            .confirmation-box p {
                font-size: 17px;
                margin: 10px 0;
                text-align: left;
            }
            .confirmation-box a {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 25px;
                background-color: #ff6600;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
                transition: all 0.5s ease;
            }
            .confirmation-box a:hover {
                background-color: #cccccc;
                color: black;
            }
        </style>
    </head>
    <body>
        <div class='confirmation-box'>
            <h1>Merci de nous avoir contactés !</h1>
            <p><strong>Nom complet :</strong> " . htmlspecialchars($nom_complet) . "</p>
            <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Sujet :</strong> " . htmlspecialchars($sujet) . "</p>
            <p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
            <a href='contact.php'>Retour au formulaire</a>
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
