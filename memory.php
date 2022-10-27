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
<?php require_once "assets/view/header.inc.php";?>

    <div class="tchat">
        <div class="div-tchat">
            <div class="header-tchat">
                <h3>Chat</3>
            </div>
            <div class="body-tchat">
                <div class="text-tchat-user">
                    <img src="../assets/images/user.png" alt="">
                    <div class>
                        <p class="info-tchat">Moi</p>
                        <p id="p1">Bsoir</p>
                        <p class="info-tchat">Aujourd'hui à 10h30</p>
                    </div>
                </div>
                <div class="text-tchat-response">
                        <img src="../assets/images/user.png" alt="">
                        <div>
                            <p class="info-tchat">Other</p>
                            <p id="p2">Wsh</p>
                            <p class="info-tchat">Aujourd'hui à 11h00</p>
                        </div>
                </div>
            </div>   
            <div class="footer-chat">
                <div class="input">
                    <input type="text" placeholder="Votre message">
                    <input class="footer-button" type="submit" value="Envoyer">
                </div>
            </div>
        </div>    
    </div>

    <?php
    require_once "assets/view/footer.inc.php";
    ?>
</body>
</html>