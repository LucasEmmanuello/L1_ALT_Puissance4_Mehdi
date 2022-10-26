<?php



?>
<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
    <?php require "assets/view/head.inc.php" ?>
</head>
<body>
    <?php
    require_once "assets/view/header.inc.php";
    ?>
    <div class="change-form form-login">
        <div class="change-password">
        <form method="post">
            <ul>
                <li><input type="password" name="old-password" id="old-password" class="input-general input-password" placeholder="Ancien mot de passe"></li>
                    <li><input type="password" name="new-password" id="new-password" class="input-general input-password" placeholder="Nouveau Mot de Passe"></li>
                    <li><input type="password" name="repeat-new-password" id="repeat-new-password" class="input-general input-password" placeholder="Répeter le Nouveau Mot de Passe"></li>
                    <li class="submit-li"><input type="submit" value="Changer le Mot de Passe" class="submit-input"></li>
            </ul>
        </form>
        </div>
        <div class="change-email">
        <form method="post">
            <ul>
                <li><input type="email" name="new-email" id="new-email" class="input-general input-email" placeholder="Nouvel Email"></li></li>
                    <li class="submit-li"><input type="submit" value="Changer l'email" class="submit-input"></li>
            </ul>
        </form>
        </div>
    </div>
</body>
</html>
