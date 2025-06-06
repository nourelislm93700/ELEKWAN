<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Nour ELHADJ-M">
  <meta name="keywords" content="travaux électriques, rénovation électrique, électricien professionnel, électricien particulier, normes électriques, dépannage électrique, domotique, installation électrique, mise aux normes, électricité bâtiment">
  <meta name="description" content="ELEKWAN est spécialiste des travaux électriques, de la rénovation et du dépannage.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="icon" href="assets/img/logo.png" type="image/png">
  <link rel="stylesheet" href="assets/css/contact.css">
</head>

<body style="background-color: #100e0e; color: #ff6600;">
  <header>
    <div id="head_items">
      <h1 id="title">ELEKWAN</h1>
      <div id="colo">
        <div id="colo_1" onclick="switchToOrange();"></div>
        <div id="colo_2" onclick="switchToBleu();"></div>
      </div>
    </div>

    <nav>
      <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>
