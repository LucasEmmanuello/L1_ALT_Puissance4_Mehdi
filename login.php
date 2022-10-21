<?php
    require 'assets/includes/database.php';
    require 'assets/includes/getIp.php';

    if (isset($_COOKIE['user_id'])) {
        $login = $dbh->prepare('SELECT ip FROM user WHERE id = :id');
        $login->execute(['id' => $_COOKIE['user_id']]);
        $login = $login->fetch();
        if(isset($login['ip']) && $login['ip'] == getIp()){
            header("Location: memory");
        }else{
            setcookie('user_id', 'none', time() - 1);
        }
    }

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = $_POST['password'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $login = $dbh->prepare('SELECT id, mdp FROM user WHERE email = :email');
            $login->execute(['email' => $email]);
            $login = $login->fetch();
            $lpassword = $login["mdp"];
            if (isset($lpassword) && !empty($lpassword)) {
                if (password_verify($password, $lpassword)) {
                    setcookie('user_id', $login['id'], time() + 48 * 3600);
                    $insertip = $dbh->prepare('UPDATE user SET ip = :ip WHERE user.email = :email');
                    $insertip->execute(['ip' => getIp(), 'email' => $email]);
                    header("Refresh:0");
                }else{
                    echo "mdp incorrect";
                }
            }else{
                echo "aucun compte n'existe aevc cette adresse mail";
            }
        }else {
            echo "format d'adresse mail invalide";
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/misenpage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <?php
    require_once "assets/view/header.inc.php";
    ?>
    
    <div class="form-login"Ò>
        <form method="post">
            <ul>
                <li><input type="email" name="email" id="email" class="input-general input-email" placeholder="Email"></li>
                    <li><input type="password" name="password" id="password" class="input-general input-password" placeholder="Mot de Passe"></li>
                    <li class="submit-li"><input type="submit" value="Connexion" class="submit-input"></li>
            </ul>
        </form>
    </div>

    <?php
    require_once "assets/view/footer.inc.php";
    ?>
</body>
</html>