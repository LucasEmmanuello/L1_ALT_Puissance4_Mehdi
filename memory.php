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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/misenpage.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Jeu</title>
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