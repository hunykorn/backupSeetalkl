<link rel="stylesheet" href="css/group.css">
<script defer src="./js/creer_reunion.js"></script>

<div class="container">
    <div id="container">
        <div class="reunion">
            <h2 class="title-font">Créez votre réunion</h2>
            <form action="#" method="POST">
                <div class="information">
                    <div class="input_group">
                        <label for="group_name" class="title-font">NOM DU GROUPE : </label>
                        <input type="text" name="group_name">
                    </div>
                    <div class="input_group" style="margin-top: 1rem;">
                        <label for="group_password" class="title-font">MOT DE PASSE : </label>
                        <input type="password" name="group_password">
                    </div>
                    <div class="input_group" style="margin-top: 1rem;">
                        <label for="description" class="title-font">OBJET : </label>
                        <textarea style="max-width: 1000px; min-width: 0px; width: 75%; resize: none; padding: 8px; font-size: 1.3em" name="description"></textarea>
                    </div>
                    <div class="input_group" style="margin-top: 1rem;">
                        <label for="group_date" class="title-font">DATE : </label>
                        <input type="date" name="group_date">
                    </div>
                    <div class="input_group" style="margin-top: 1rem;">
                        <label for="group_time" class="title-font">HEURE : </label>
                        <input type="time" name="group_time">
                    </div>
                    <div class="people-list">
                        <h3 class="title-font">LISTE DES PERSONNES : </h3>
                        <div id="members-list"></div>
                    </div>
                    <input type="hidden" name="json-members-list" id="json-members-list" value="">
                </div>
                <div class="ajouter">
                    <div class="add_member">
                        <h3>AJOUTEZ DES MEMBRES</h3>
                        <?php
                        if (isset($utilisateurs)) {
                            foreach ($utilisateurs as $row) {
                        ?>
                                <div class="member" id="<?= $row['ID_USER'] ?>" value="<?= $row['PSEUDO'] ?>"><?= $row['NOM'] ?> <?= $row['PRENOM'] ?><div class="plus">+</div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <input id="submit-create-reunion" type="submit" class="submit submit-button" value="Créer le groupe">
                </div>
            </form>
            <a href="/index.html">← Retour</a>
        </div>
    </div>
</div>


</html>