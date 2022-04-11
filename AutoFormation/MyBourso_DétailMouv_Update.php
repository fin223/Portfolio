<?php

$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare('UPDATE mouvements SET nom=:nom, theme=:theme, date=:date, prix=:prix WHERE id=:num LIMIT 1');

$PDOStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_INT); // ok

$PDOStat->bindValue(':nom', $_POST['noms'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':theme', $_POST['themes'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':date', $_POST['dates'], PDO::PARAM_STR); // ? ? ? ? ?
$PDOStat->bindValue(':prix', $_POST['prix']); // problem it's here

var_dump($PDOStat);

var_dump($_POST['prix']);

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

<h1> Mouvement mis a jour</h1>


    <form action="MyBourso_DétailComptes_Create.php" method="post">
    <div class="card">

    <p><?= $message ?></p>

    
</body>
