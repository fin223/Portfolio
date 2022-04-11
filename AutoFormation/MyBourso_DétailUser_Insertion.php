<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('INSERT INTO clients VALUES ( :nom, :prenom, :login, :motpasse, :email, :id_client, :date_cloture)');


$PDOStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':login', $_POST['login'], PDO::PARAM_STR); // ? ? ? ? ?
$PDOStat->bindValue(':motpasse', $_POST['motpasse'], PDO::PARAM_INT); // ? ? ? ? ?
$PDOStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':id_client', $_POST['id_client'], PDO::PARAM_INT); // ok
$PDOStat->bindValue(':date_cloture', $_POST['date_cloture'], PDO::PARAM_NULL); // ok

var_dump($PDOStat);

$PDOStat->debugDumpParams();

$executeIsOk = $PDOStat->execute();

if($executeIsOk)
{
    $message = 'L utilisateur a été ajouté dans la liste';
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
