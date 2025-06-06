<?php
// Inclusion du header
include 'includes/header.php';
?>
  <video autoplay muted loop id="background-video">
  <source src="assets/img/vid_1.mp4" type="video/mp4">
  Ton navigateur ne supporte pas la vidéo HTML5.
</video>

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

<?php
// Inclusion du footer
include 'includes/footer.php';
?>
