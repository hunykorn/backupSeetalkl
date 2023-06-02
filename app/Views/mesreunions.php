<div class="container-grid">
    <div class="list-reunions">
        <div class="inner">
            <h2>Mes Réunions</h2>
            <div class="scroll">
                <div>
                    <?php foreach ($reunions as $reunion) { ?>
                        <div class="reunion">
                            <div class="row">
                                <h3><?php echo ($reunion['NOM']); ?></h3>
                                <div class="horaire"><?php echo ("Le " . substr($reunion['DATE_REUNION'], 0, 10) . " à " . substr($reunion['DATE_REUNION'], 10)); ?></div>
                            </div>
                            <div class="row">
                                <div class="objet"><u>Objet:</u> <?php echo ($reunion['DESCRIPTION']); ?></div>
                            </div>
                            <?php foreach ($reunion['participants'] as $participant) { ?>
                                <div class="row">
                                    <div class="participants">
                                        <?php echo ('- ' . $participant['NOM'] . " " . $participant['PRENOM'] . ", ");
                                        try {
                                            echo (in_array($participant['ID_USER'], $reunions_present[$reunion['ID_REUNION']]) ? 'sera present' : 'sera absent');
                                        } catch (Exception $e) {
                                            echo ('sera absent');
                                        } ?></div>
                                </div>
                            <?php } ?>
                            <div class="row">
                            <?php
                            if (date("Y-m-d hh:mm:ss") > $reunion['DATE_REUNION']) {
                            ?>
                            <a href="/appel" class="link-button"> Rejoindre l'appel</a>
                            <?php } else {
                                ?>
                                La réunion n'a pas encore commencé
                                <?php
                            } ?>
                                <form action="" method="post" id="reunions">
                                    <input type="hidden" name="id_user" value="<?php echo (session('ID_USER')); ?>">
                                    <input type="hidden" name="id_reunion" value="<?php echo ($reunion['ID_REUNION']); ?>">
                                    <input class="submit-button-reunion" type="submit" name="presence" value="<?= in_array($reunion['ID_REUNION'], $present[session()->get('ID_USER')]) ? 'sera present' : 'sera absent' ?>">
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- <div class="creer-reunion">Créer une réunion</div> -->
    </div>
</div>