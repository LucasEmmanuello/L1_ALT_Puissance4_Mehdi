<?php
$url = $_SERVER['REQUEST_URI'];

$e = "";
$score = "nav-link";
$jeu = "nav-link";
$index = "nav-link";
$contact = "nav-link";

if ($url == "/scores"){
    $e = "Scores";
    $score = "nav-link position";
}elseif ($url == "/"){
    $e = "Accueil";
    $index = "nav-link position";
}elseif ($url == "/memory"){
    $e = "Jeux";
    $jeu = "nav-link position";
}elseif ($url == "/contact"){
    $e = "Nous Contacter";
    $contact = "nav-link position";
}elseif ($url == "/login"){
    $e = "Se Connecter";
}elseif ($url == "/register"){
    $e = "S'inscrire";
}

?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/misenpage.css">
<link rel="stylesheet" href="../assets/css/normalize.css">
<link rel="stylesheet" href="../assets/css/accueil.css">
<link rel="stylesheet" href="../assets/css/login.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<title><?= $e ?></title>