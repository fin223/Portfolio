<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('INSERT INTO mouvements VALUES (NULL, :nom, :theme, :date, :prix)');

$PDOStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':theme', $_POST['theme'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':date', $_POST['date'], PDO::PARAM_STR); // ? ? ? ? ?
$PDOStat->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR); // ? ? ? ? ?

var_dump($PDOStat);

$PDOStat->debugDumpParams();

$executeIsOk = $PDOStat->execute();

if($executeIsOk)
{
    $message = 'Le mouvement a été ajouté dans la liste';
}
else
{
    $message = 'Echec de l insertion';
}

?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width-device-width, user-scalable=no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie-edge">
    <title> Tuto test </title>
</head>
<body>
    <h1>Ajout mouvement </h1>
        
        <p><?= $message ?></p>

</body>
