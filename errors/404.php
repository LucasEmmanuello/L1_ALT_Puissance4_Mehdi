<?php
    require '../assets/includes/database.php';
    require '../assets/includes/getIp.php';

    if (isset($_COOKIE['user_id'])) {
        $login = $dbh->prepare('SELECT ip FROM user WHERE id = :id');
        $login->execute(['id' => $_COOKIE['user_id']]);
        $login = $login->fetch();
        if(!isset($login['ip']) OR $login['ip'] != getIp()){
            setcookie('user_id', 'none', time() - 1);
            header("Refresh: 0");
        }else{
            $besttime = $dbh->prepare('SELECT MIN(score) FROM scores WHERE id_player = :id_player');
            $besttime->execute(['id_player' => $_COOKIE['user_id']]);
            $besttime = $besttime->fetch();
            if(isset($besttime['MIN(score)']) && !empty($besttime['MIN(score)'])){
                $besttime = $besttime['MIN(score)'];
            }else{
                $besttime = 0;
            }

            $countgame = $dbh->prepare('SELECT COUNT(id) FROM `scores` WHERE id_player = :id_player');
            $countgame->execute(['id_player' => $_COOKIE['user_id']]);
            $countgame = $countgame->fetch()['COUNT(id)'];

            $countplayer = $dbh->prepare('SELECT COUNT(id) FROM `user`');
            $countplayer->execute();
            $countplayer = $countplayer->fetch()['COUNT(id)'];
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require "../assets/view/head.inc.php" ?>
</head>

<body class="body">
    <?php
    require_once "../assets/view/header.inc.php";
    ?>


    <?php
    require_once "../assets/view/footer.inc.php";
    ?>
</body>
</html>
