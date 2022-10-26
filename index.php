<?php
    require 'assets/includes/database.php';
    require 'assets/includes/getIp.php';

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
    <?php require "assets/view/head.inc.php" ?>
</head>

<body class="body">
    <?php
    require_once "assets/view/header.inc.php";
    ?>

    <section>
        <div class="blocimage">
            <a href="https://la-console-retrogaming.fr/?gclid=EAIaIQobChMIhsz8vJnJ-gIVMJBoCR2Z4AbOEAAYASAAEgI6JvD_BwE">
                <img src="../assets/images/Retrogaming.png" alt="Retrogaming" title="Retrogaming" /> 
            </a>
            <a href="https://www.billetreduc.com/a-paris/theatre-r68/">
                <img src="../assets/images/Theatre.png" alt="Théatre" title="Théatre" /> 
            </a>
            <a href="https://www.winamax.fr/jouer-au-poker">
                <img src="../assets/images/Poker.png" alt="Poker" title="Poker" /> 
            </a>
        </div>

        <div class="blocoment">
            <div class="coment">
                <div class="chpnmbr">
                    01
                </div>
                <div class="txt">
                    <h3>Retrogaming</h3>
                    <p>Les souvenirs de vieux jeux sont stimulant et assez puissant pour induire un état de nostalgie parmi ceux qui jouaient auparavant à de tels jeux. Cliquer sur l'image " Retrogaming " et découvrez une boutique qui vends une console possèdant 50000 jeux retro pour vous faire remonter dans le temps et vous plongez dans la nostalgie !
                    </p>
                    </div>
            </div>

            <div class="coment">
                <div class="chpnmbr">
                    02
                </div>
                <div class="txt">
                    <h3>Théatre</h3>
                    <p>Le théâtre est à la fois l'art de la représentation d'un drame ou d'une comédie, un genre littéraire particulier, et l'édifice dans lequel se déroulent les spectacles de théâtre. Si vous êtes un grand fan de cela, cliquer sur l'image " Théatre " si dessus et découvrez les pièces de théatre qui se déroulent en ce moment !
                    </p>
                </div>
            </div>

            <div class="coment">
                <div class="chpnmbr">
                    03                  
                </div>
                <div class="txt">
                    <h3>Poker</h3>
                    <p>Le poker, ce jeu de société passionant qui nécessite de la stratégie et qui vous procurent de l'adrénaline lors des paris risqué. Si vous souhaitez montrer votre talent, cliquer sur l'image " Poker " si dessus pour jouer sur winamax et peut être remporter de gros gains !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="stat">
        <div>
            <img id="waw" src="https://www.tomshardware.fr/content/uploads/sites/3/2020/03/watchdogs.jpg" alt="waw">
        </div>

        <div class="statbloc">
            <div>
                <div class="blocstat">
                    <h2 class=""><?= $countgame ?></h2> <p class="">Parties jouées</p>
                </div>
                <div class="blocstat">
                    <h2 class="">
                        <?php 
                            $tableScore = explode(':', $besttime); 
                            
                            if($tableScore[0] > 0) {echo $tableScore[0] . "h " . $tableScore[1] . "m ";}
                            elseif ($tableScore[1]>0){
                                echo $tableScore[1] . "m ";
                            }
                            echo $tableScore[2] . "sec"
                            
                            
                        ?>
                    </h2> <p class="">Best Time</p>
                </div>
            </div>
            <div>
                <div class="blocstat"></div>
                <div class="blocstat">
                    <h2 class=""><?= $countplayer ?></h2> <p class="">Joueurs Inscrits</p>
                </div>
            </div>
        </div>
    </section>

    <section>

        <div class="top3">
            <h2> Top 3 </h2>
            <p>Soyez le plus rapide sur la difficulté maximale pour apparaître ici !</p>
        </div>

    </section>

    <?php
    require_once "assets/view/footer.inc.php";
    ?>
</body>
</html>
