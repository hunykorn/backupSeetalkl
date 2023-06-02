<div class="utilisateurs-container">
    <table class="utilisateurs" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <?php
                foreach ($utilisateurs[0] as $key => $col) {
                    echo '<th>' . $key . '</th>';
                }
                ?>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($utilisateurs as $utilisateur) {
                echo '<tr>';
                $i = 0;
                foreach ($utilisateur as $col) {
                    $i++;
                    if ($i != 12) {
                        echo '<td>' . $col . '</td>';
                    } else {
            ?>
                        <td>
                            <form action="validation/<?= $utilisateur['ID_USER'] ?>" method="post">
                                <?php if ($col == 1) { ?>
                                    <input type="image" src="img/valid.svg">
                                <?php } else if ($col == 0) { ?>
                                    <input type="image" src="img/red_cross.svg">
                                <?php } ?>
                            </form>
                        </td>
                <?php

                    }
                }
                ?>
                <td>
                    <form action="modifier/<?= $utilisateur['ID_USER'] ?>" method="get">
                        <input type="image" src="img/pencil.svg" alt="submit">
                    </form>
                </td>
                <td>
                    <form action="supprimer_utilisateur" method="post" name="delete_user">
                        <input type="hidden" name="id_user" value="<?= $utilisateur['ID_USER'] ?>">
                        <input type="image" src="img/escape.svg" alt="submit">
                    </form>
                </td>
            <?php
                echo '<tr>';
            } ?>

        </tbody>
    </table>
</div>
<div class="ajouter-user"><a href="inscription" class="ajouter-user"><img src="img/plus.svg" alt="" class="ajouter-user" style="max-width: 100px" id="<?= $utilisateur['ID_USER'] ?>"></a></div>