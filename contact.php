<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/misenpage.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="description" content="Une description">
    <title>Nous contacter</title>
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