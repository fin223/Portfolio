<?php

$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare('UPDATE clients SET nom=:nom, prenom=:prenom, login=:login, motpasse=:motpasse, email=:email WHERE id_client=:id_client LIMIT 1');

$PDOStat->bindValue(':id_client', $_POST['id_client'], PDO::PARAM_INT); // ok

$PDOStat->bindValue(':nom', $_POST['noms'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':prenom', $_POST['prenoms'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':login', $_POST['logins'], PDO::PARAM_STR); // ? ? ? ? ?
$PDOStat->bindValue(':motpasse', $_POST['motpasses'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':email', $_POST['emails'], PDO::PARAM_STR); // ok

var_dump($PDOStat);

$PDOStat->debugDumpParams();

$executeIsOk = $PDOStat->execute();

if($executeIsOk)
{
    $message = 'Le mouvement a été mis à jour';
}
else
{
    $message = 'Echec de la mise à jour :c';
}
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width-device-width, user-scalable=no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie-edge">
    <title> Modifier : resultat </title>
</head>
<body>

<h1> Utilisateur mis a jour</h1>
<a href="MyBourso_ListeUser.php"> revenir a la page liste des mouvements  </a> </br>

    <form action="MyBourso_DétailUser_Create.php" method="post">
    <div class="card">

    <p><?= $message ?></p>

    
</body>
