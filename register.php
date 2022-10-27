<?php
    require 'assets/includes/database.php';
    require 'assets/includes/getIp.php';


    if (isset($_COOKIE['user_id'])) {
        $login = $dbh->prepare('SELECT ip FROM user WHERE id = :id');
        $login->execute(['id' => $_COOKIE['user_id']]);
        $login = $login->fetch();
        if(isset($login['ip']) && $login['ip'] == getIp()){
            header("Location: memory");
            die();
        }else{
            setcookie('user_id', 'none', time() - 1);
        }
    }

    if (isset($_GET['verif']) && isset($_GET['email'])){
        $verif = $dbh->prepare('SELECT * FROM mail_verif WHERE chaine = :chaine');
        $verif->execute(['chaine' => $_GET['verif']]);
        $verif = $verif->fetch();
        $chaine = htmlspecialchars($verif['chaine']);
        $user_id = htmlspecialchars($verif['user_id']);
        $verif_email = $dbh->prepare('SELECT id FROM user WHERE email = :email');
        $verif_email->execute(['email' => $_GET['email']]);
        $verif_email = $verif_email->fetch();
        if (isset($verif_email['id']) && !empty($verif_email['id'])) {
            $email_validate = $dbh->prepare('UPDATE user SET mail_verif = "Yes" WHERE user.id = :id;');
            $email_validate->execute(['id' => $verif_email['id']]);
        }
    }


    if (isset($_POST["email"]) && isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["password_repeat"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = $_POST["password"];
        $password_repeat = $_POST["password_repeat"];
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($pseudo) >= 4) {
                if($_POST["password"] == $_POST["password_repeat"]){
                    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/ ';
                    if (preg_match($pattern, $password)) {
                    $test = $dbh->prepare('SELECT * FROM user WHERE email = :email');
                    $test->execute(['email' => $email]);
                    $test = $test->fetch();
                    
                    if (empty($test)){
                        $options = [
                            'cost' => 12,
                        ];
                        $passwordhash = password_hash($password, PASSWORD_BCRYPT, $options);
                        $insert = $dbh->prepare('INSERT INTO user(email, pseudo, mdp) VALUES (:email, :pseudo, :mdp)');
                        $insert->execute(["email" => $email, "pseudo" => $pseudo, "mdp" => $passwordhash]);
                        $chaine = genererChaineAleatoire(45);
                        $recup_id = $dbh->prepare('SELECT id FROM user WHERE email = :email');
                        $recup_id->execute(['email' => $email]);
                        $recup_id = $recup_id->fetch();
                        $recup_id = $recup_id['id'];
                        $inset_verif = $dbh->prepare('INSERT INTO mail_verif(id_user, chaine) VALUES (:id_user, :chaine)');
                        $inset_verif->execute(['id_user' => $recup_id, 'chaine' => $chaine]);
                        mail(
                            $email,
                            'test',
                            urlencode('http://localhost:8888/register?email=' . $email . '&verif=' . $chaine)
                        );
                    }else{
                        echo "votre compte existe déjà";
                    }
                    }else{
                        echo "Votre mot de passe doit contenir au moins 8 caractès dont au moins1 lettre minuscule, 1 lettre majuscule, 1 chiffre et 1 caractère spécial (!@#$%^&*-)";
                    }
                }else{
                    echo "les mots de passe ne correspondent pas";
                }
            }else {
                echo "Le pseudo doit contenir minimum 4 caractères";
            }
        }else {
            echo "L'adresse mail n'est pas au format valide";
        }
    }
?>
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
                    <li><input type="email" name="email" id="email" class="input-general input-email" placeholder="Email" style="margin-top: 0;" required></li>
                    <li><input type="text" name="pseudo" id="pseudo" class="input-general input-pseudo" placeholder="Pseudo" required></li>
                    <li><input type="password" name="password" id="password" class="input-general input-password" placeholder="Mot de Passe" style="margin-bottom: 0;" required></li>
                    <li><input type="password" name="password_repeat" id="password_repeat" class="input-general input-password" placeholder="Répeter le Mot de Passe" required></li>
                    <li id="redirect">Vous avez déjà un compte cliquez <a href="/login" style="color: #EC9024;">ICI</a></li>                    <li class="submit-li"><input type="submit" value="S'inscrire" class="submit-input"></li>
            </ul>
        </form>
    </div>

    <?php
    require_once "assets/view/footer.inc.php";
    ?>
</body>
</html>