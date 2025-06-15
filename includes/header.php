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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body >
  <header class="modern-header">
        <!-- Barre supérieure -->
        <div class="top-bar">
            <div class="top-bar-left">
                <span class="choix-ex">⚡ Faites le choix de l’excellence avec ELEKWAN !</span>
            </div>
            <div class="top-bar-right">
                <nav class="top-nav">
            
                    <a href="faq.html">FAQ</a>
                </nav>
                <div class="social-icons">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>

                </div>
            </div>
        </div>

        <!-- Section principale du header -->
        <div class="main-header">
            <!-- Logo section -->
            <div class="logo-section">
                <div class="logo-container">
                    <i class="fas fa-bolt logo-icon"></i>
                    <div class="logo-text">
                        <span class="company-name">ELEKWAN</span>
                    </div>
                </div>
            </div>

            <!-- Informations de contact -->
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <strong>Paris, France</strong>
                        <span>Île de France</span>
                    </div>
                </div>

                <div class="contact-divider"></div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <strong>Contactez-nous</strong>
                        <span>elekwan.support@exemple.fr</span>
                    </div>
                </div>
            </div>

            <!-- Bouton rendez-vous -->
            <div class="appointment-section">
                <button class="appointment-btn">Rendez-vous</button>
            </div>
        </div>

        <!-- Navigation principale -->
        <nav class="main-navigation">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">
                            ACCUEIL
                            <i class="fas fa-plus nav-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PAGES
                            <i class="fas fa-plus nav-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="services.html" class="nav-link">
                            SERVICES
                            <i class="fas fa-plus nav-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PROJETS
                            <i class="fas fa-plus nav-icon"></i>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">CONTACT</a>
                    </li>
                </ul>
                
                <div class="nav-right">
                    <div class="search-wrapper">
    <button class="search-btn" id="toggleSearch">
        <i class="fas fa-search"></i>
    </button>
    <input type="text" class="search-input" id="searchInput" placeholder="Rechercher..." aria-label="Rechercher">
</div>

                    <div class="emergency-call">
                        <div class="emergency-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="emergency-details">
                            <span class="emergency-label">APPELEZ NOUS </span>
                            <span class="emergency-number">1800-456-7890</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>