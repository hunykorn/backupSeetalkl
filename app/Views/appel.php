<?php
if (!isset($_SESSION['name'])) {
    loginForm();
} else {
?>
    <div class="videocall">
        <div class="webRTC">
            <img src="img/cc.png" />
        </div>
        <div class="cadre_groupe">
            <div class="titre_message">
                <h4>Vous êtes <?php echo $_SESSION['name']; ?></h4>
            </div>
            <div class="chatbox">
                <?php //Afficher le contenue de chat log
                if (file_exists("log.html") && filesize("log.html") > 0) {

                    $contents = file_get_contents("log.html");
                    echo $contents;
                }
                ?>

                <!-- <div class="chat-line_message">
                    <p class="user_pseudo">Utilisateur.pseudo</p>
                    <p class="user_message">14:05: Contenu de table Message</p>
                </div>
                <div class="chat-line_message">
                    <p class="user_pseudo">Utilisateur.pseudo</p>
                    <p class="user_message">14:05: Contenu de table Message</p>
                </div>
                <div class="chat-line_message">
                    <p class="user_pseudo">Utilisateur.pseudo</p>
                    <p class="user_message">14:05: Contenu de table Message</p>
                </div>
                <div class="chat-line_message">
                    <p class="user_pseudo">Utilisateur.pseudo</p>
                    <p class="user_message">14:05: Contenu de table Message</p>
                </div> -->

            </div>
            <div class="message">
                <form name="message" action="">
                    <input class="ecrire_message" type="text" name="ecrire_message" placeholder="Envoyer un message">
                    <input class="soumettre_message" type="submit" name="soumettre_message" value="Send" />
                </form>
            </div>

            <video id="recieve-video" width="70%" height="600px"></video>
            <video id="send-video" src="30%" height="200px"></video>
            <button id="start-video">Démarrer video</button>
        <?php
    }
        ?>

    <?php


    if (isset($_POST['enter'])) {
        if ($_POST['pass'] != "getpassréunion") {
            $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
            //$_GET['id_user']; where iduser = id_user de connection
        } else {
            echo '<span class="error">Il vous faut saisir un mot de passe</span>';
        }
        
    }

    function loginForm()
    {//Identifier la personne connecté
     //Le connecter à la réunion avec le mot de passe X
        echo '
    <div id="identificationchat">
      <p>Saisir le mot de passe de la réunion:</p>
      <form action="identification" method="post">
        <label for="name">Mot de Passe:</label>
        <input type="text" name="pass" id="pass" />
        <input type="submit" name="enter" id="enter" value="Enter" />
      </form>
    </div>
    ';
    }
    ?>