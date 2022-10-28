<?php
require "assets/includes/database.php";
require "assets/includes/getIp.php";
?><!DOCTYPE html>
<html lang="fr">
<head>
    <?php require "assets/view/head.inc.php" ?>
    <link rel="stylesheet" href="/assets/css/scores.css">
</head>

<body class="body">
    <?php
    require "assets/view/header.inc.php";
    ?>
    <div class="scorassemble">
        <div class="multibutton">
            <a class="chgmtT" href="scores.php">Begginer</a>
            <a class="chgmtM" href="scores.php">Easy</a>
            <a class="chgmtM" href="scores.php">Medium</a>
            <a class="chgmtB" href="scores.php">Hard</a>
        </div>

    <div class="scoretab">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3">Tableau des Scores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Position</td>
                    <td>Pseudo</td>
                    <td>Temps</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    <div class="scorassembleuser">
    <div class="scoretab">
        <table class = "tableuser">
            <tr>
                <td>GetPositionUser</td>
                <td>
                <?php
                $getpseudo = $dbh->prepare('SELECT Pseudo FROM user WHERE user.id = "'.$_COOKIE['user_id'].'"');
                $getpseudo->execute();
                $pseudo = $getpseudo->fetch();
                echo $pseudo[0];
                ?>
                </td>
                <td>GetBetterTimeUser</td>
            </tr>
        </table>
    </div>
    </div>

    <?php
    require "assets/view/footer.inc.php";
    ?>
</body>
</html>