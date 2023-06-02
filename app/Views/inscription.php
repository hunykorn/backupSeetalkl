    <form action="<?php if (isset($single)) {
                        echo ("/modifier/single/" . $session->get('ID_USER'));
                    } ?>" method="post" id="connexion" class=" inscription" enctype="multipart/form-data">
        <h2 class="title"><?= isset($titre) ? $titre : "inscription" ?></h2>
        <div class="col-form">
            <div class="col">
                <div class="label-input">
                    <label for="pseudo">Pseudo:</label>
                    <input type="text" name="pseudo" value="<?= isset($user_data) ? $user_data['PSEUDO'] : "" ?>">
                    <?php if(isset($_COOKIE["erreur"])){echo "<span style='color:red'>".$_COOKIE["erreur"]."</span>";} ?>
                </div>
                <div class="label-input">
                    <label for="email">E-Mail:</label>
                    <input type="mail" name="email"  value="<?= isset($user_data) ? $user_data['EMAIL'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" name="mdp" class="pwd" value="<?= isset($user_data) ? $user_data['PASSWORD'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="verif-mdp">Vérification Mot de passe:</label>
                    <input type="password" name="verif-mdp" class="pwd" value="<?= isset($user_data) ? $user_data['PASSWORD'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="img">Photo de profil:</label>
                    <input type="file" name="img" value="<?= isset($user_data) ? $user_data['IMG'] : "" ?>">
                </div>
                <div id="showPassword">
                    <label for="showPassword">Show Password</label>
                    <input type="checkbox" onclick="showPassword()">
                </div>

            </div>
            <div class="col">
                <div class="label-input">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" value="<?= isset($user_data) ? $user_data['NOM'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="prenom">Prenom:</label>
                    <input type="text" name="prenom" value="<?= isset($user_data) ? $user_data['PRENOM'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="societe">Société:</label>
                    <input type="text" name="societe" value="<?= isset($user_data) ? $user_data['SOCIETE'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="telephone">Téléphone:</label>
                    <input type="tel" name="telephone" value="<?= isset($user_data) ? $user_data['TELEPHONE'] : "" ?>">
                </div>
                <div class="label-input">
                    <label for="bio">Description:</label>
                    <textarea name="bio" resize=style="font-size: 1.3em" style="resize: none;"><?= isset($user_data) ? $user_data['BIO'] : "" ?></textarea>
                </div>
                <?php if ($session->get('GRADE') == 100) { ?>
                    <div class="label-input" id="select">
                        <label for="grade">Grade:</label>
                        <select name="grade">
                            <option value="">--choisir une option--</option>
                            <option value="0" <?= isset($user_data) ? ($user_data['GRADE'] == 0 ? "selected" : "") : "" ?>>Visiteur</option>
                            <option value="1" <?= isset($user_data) ? ($user_data['GRADE'] == 1 ? "selected" : "") : "" ?>>Utilisateur</option>
                            <option value="10" <?= isset($user_data) ? ($user_data['GRADE'] == 10 ? "selected" : "") : "" ?>>Gestionnaire</option>
                            <option value="100" <?= isset($user_data) ? ($user_data['GRADE'] == 100 ? "selected" : "") : "" ?>>Administrateur</option>
                        </select>
                    </div>
                <?php }  ?>
                    
                <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
            </div>
        </div>
        <input class="submit-button" type="submit" value="Valider">
    </form>

    <script>
        function showPassword() {
            const x = document.getElementsByClassName("pwd");
            for (let elem of x) {
                if (elem.type === "password") {
                    elem.type = "text";
                } else {
                    elem.type = "password";
                }
            }
        }
    </script>