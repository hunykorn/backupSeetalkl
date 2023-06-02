<!DOCTYPE html>
<html lang="en">
<?php $session = session(); ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeeTalk</title>
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./js/header.js"></script>
</head>

<body>
    <header>
        <div class="mobile">
            <a href="/" class="logo"><img src="./img/txcom.png" alt=""></a>
            <img class="menu-button" src="./img/menu-icon-60.svg">
        </div>
        <div class="menu">
            <a href="/" class="nav-link">Accueil</a>
            <?php
            if ($session->get('GRADE') == 100) {
            ?>
                <a href="/gestion_utilisateurs" class="nav-link">Gestion utilisateurs</a>
            <?php } ?>
            <!-- <a href="/add_contact">Ajouter un contact</a> -->
            <a href="/mesreunions">Réunions</a>
            <a href="/fiche_user">Mon compte</a>
            <a href="/creer_reunion">Créer une réunion</a>
            <a href="/appel">Appel</a>
            <?php
            if ($session->get('GRADE') == 100) {
            ?>
                <a href="/inscription">Créer un compte</a>
            <?php
            } else if($session->get('GRADE') == 0) {
            ?>
                <a href="/inscription">Inscription</a>
            <?php
            }
            ?>
            <?php if (!$session->get('ID_USER')) { ?>
                <a href="/login" class="nav-link">Connexion</a>
            <?php } else { ?>
                <a href="/logout" class="nav-link">Déconnexion</a>
            <?php } ?>
        </div>
    </header>
    <div class="container">