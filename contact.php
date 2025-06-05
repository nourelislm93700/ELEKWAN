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
  <meta name="description" content="WANELEC est spécialiste des travaux électriques, de la rénovation et du dépannage.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="icon" href="assets/img/logo.png" type="image/png">
  <link rel="stylesheet" href="assets/css/contact.css">
</head>

<body style="background-color: #100e0e; color: #ff6600;">
  <header>
    <div id="head_items">
      <h1 id="title">WANELEC</h1>
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

  <div class="contact-form">
    <h2>Contactez-nous</h2>
    <form action="contact_post.php" method="post">
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
      <div class="form-group">
        <label for="name">Nom complet :</label>
        <input type="text" id="name" name="name" placeholder="Votre nom" required>
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse email" required>
      </div>
      <div class="form-group">
        <label for="subject">Sujet :</label>
        <input type="text" id="subject" name="subject" placeholder="Sujet de votre message" required>
      </div>
      <div class="form-group">
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="5" placeholder="Votre message..." required></textarea>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms"><a href="rgpd.html">J'accepte les conditions générales</a></label>
      </div>
      <div class="form-group">
        <button style="margin-bottom: 10px;" type="submit">Envoyer</button>
        <br>
        <button type="reset">Annuler</button>
      </div>
    </form>
  </div>

  <footer>
    <p><a href="rgpd.html">&copy; 2025 - Tous droits réservés - WANELEC</a></p>
  </footer>

  <script src="assets/js/contact.js"></script>
</body>
</html>
