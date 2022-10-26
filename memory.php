<?php
    require 'assets/includes/database.php';
    require 'assets/includes/getIp.php';

    if (isset($_COOKIE['user_id'])) {
        $login = $dbh->prepare('SELECT ip FROM user WHERE id = :id');
        $login->execute(['id' => $_COOKIE['user_id']]);
        $login = $login->fetch();
        if(!isset($login['ip']) OR $login['ip'] != getIp()){
            setcookie('user_id', 'none', time() - 1);
            header("Location: login");
        }else{
        }
    }else{
        header("Location: login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require "assets/view/head.inc.php" ?>
</head>

<body class="body">
<?php
    require_once "assets/view/header.inc.php";
    ?>

    <?php
    require_once "assets/view/footer.inc.php";
    ?>
</body>
</html>