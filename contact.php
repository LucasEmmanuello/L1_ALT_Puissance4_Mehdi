<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require "assets/view/head.inc.php" ?>
</head>
<body>
    <?php
    require_once "assets/view/header.inc.php";
    ?>
    
    <div class="form-login">
        <form method="post">
            <ul>
                    <li><input type="email" name="" id="" class="input-general input-email" placeholder="Email" style="margin-top: 0;"></li>
                    <li><input type="text" name="" id="" class="input-general input-objet" placeholder="Objet"></li>
                    <li><textarea name="message" id="" cols="30" rows="10" placeholder="Message" class="input-general input-msg" style="margin-bottom: 25px;"></textarea></li>
                    <li class="submit-li"><input type="submit" value="Envoyer" class="submit-input"></li>
            </ul>
        </form>
    </div>

    <?php
    require_once "assets/view/footer.inc.php";
    ?>
</body>
</html>