<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('INSERT INTO comptes VALUES (:libelle, :date_creation, :date_cloture)');


$PDOStat->bindValue(':libelle', $_POST['libelle'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':date_creation', $_POST['date_creation'], PDO::PARAM_STR); // ? ? ? ? ?
$PDOStat->bindValue(':date_cloture', $_POST['date_cloture'], PDO::PARAM_STR); // ? ? ? ? ?

var_dump($PDOStat);

$PDOStat->debugDumpParams();

$executeIsOk = $PDOStat->execute();

if($executeIsOk)
{
    $message = 'Le compte pour MyBourso a bien été ajouter';
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
    <h1>Ajout compte </h1>
        
        <p><?= $message ?></p>

</body>
