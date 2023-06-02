<link rel="stylesheet" href="css/user.css">
<div id="container">
    <div class="img-add">
        <div style="overflow: hidden" class="circle"><img style="max-width: 100%; min-height: 100%;" src="<?= isset($user_data['IMG']) ? $user_data['IMG'] : "img/cc.png" ?>" alt=""></div>
        <h3 class="title-font addImage"><a href="add_user_img">+ <?= !empty($user_data['IMG']) ? "modifier" : "Ajouter" ?></a></h3>
    </div>
    <div class="information">
        <div class="flex-pres">
            <h3 class="title-font">NOM : </h3>
            <p class="title-font"><?= isset($user_data['NOM']) ? $user_data['NOM'] : "" ?></p>
        </div>
        <div class="flex-pres">
            <h3 class="title-font">PRÉNOM : </h3>
            <p class="title-font"><?= isset($user_data['PRENOM']) ? $user_data['PRENOM'] : "" ?></p>
        </div>
        <div class="flex-pres">
            <h3 class="title-font">MAIL : </h3>
            <p class="title-font"><?= isset($user_data['EMAIL']) ? $user_data['EMAIL'] : "" ?></p>
        </div>
        <div class="flex-pres">
            <h3 class="title-font">SOCIÉTÉ : </h3>
            <p class="title-font"><?= isset($user_data['SOCIETE']) ? $user_data['SOCIETE'] : "" ?></p>
        </div>
        <div class="unflex-pres">
            <h3 class="title-font">DESCRIPTION : </h3>
            <p class="title-font"><?= isset($user_data['BIO']) ? $user_data['BIO'] : "Bonjour je m'apelle Pedro, Pedro le rigolo. Ici pour vous faire rigoler. Pourquoi est-ce difficile de quitter une copine japonaise ? car il faut larguer 2 bombes avant qu'elle comprenne." ?></p>
        </div>
        <div class="img-add" style="width: fit-content">
            <h3 class="title-font" onclick="location.href='<?= base_url('/modifier/single/' . $session->get('ID_USER')) ?>'">modifier les informations</h3>
        </div>
    </div>
</div>

<script src="./js/index.js" type="text/javascript"></script>