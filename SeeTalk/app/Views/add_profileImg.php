<form action="insert_user_img" method="post" enctype="multipart/form-data">
    <input type="file" name="img" value="<?= isset($user_data) ? $user_data['IMG'] : "" ?>">
    <input type="hidden" name="name" value=<?php echo $_SESSION['PSEUDO'] ?>>
    <input type="submit" value="Ajouter image">
</form>