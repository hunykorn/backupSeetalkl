<?php

// if ($users0 != null) {
//     foreach ($users0 as $elem) {
//         echo $elem . "<br>";
//     }
// } else {
//     echo "Pas d'utilisateur en attente de validation";
// }
?>

<div class="validation-container">
    <table class="validation">
        <thead>
            <tr>
                <?php foreach ($users0[0] as $key => $val) {
                    echo "<th>" . $key . "</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users0 as $user) {
                echo '<tr>';
                foreach ($user as $u) {
                    echo '<td>' . $u . '</td>';
                }
            } ?>
        </tbody>
    </table>
</div>