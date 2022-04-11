<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('UPDATE comptes SET  libelle=:libelle, date_creation=:date_creation, date_cloture=:date_cloture WHERE numcpt=:nume LIMIT 1');

$PDOStat->bindValue(':nume', $_POST['numContact'], PDO::PARAM_INT); // ok

$PDOStat->bindValue(':libelle', $_POST['libelles'], PDO::PARAM_STR); // ok
$PDOStat->bindValue(':date_creation', $_POST['date_creations'], PDO::PARAM_STR); // ? ? ? ? ?
//$PDOStat->bindValue(':date_cloture', $_POST['date_clotures'], PDO::PARAM_STR ); // PDO::PARAM_STR = permet de mettre une valeur string en parametre mais pas vide; PDO::PARAM_NULL : lui permet de renvoyer une valeur NULL quel que sois le resultat

if(!empty($_POST['date_clotures']))
{
    $PDOStat->bindValue(':date_cloture', $_POST['date_clotures'], PDO::PARAM_STR ); // PDO::PARAM_STR = permet de mettre une valeur string en parametre mais pas vide; PDO::PARAM_NULL : lui permet de renvoyer une valeur NULL quel que sois le resultat
}
else // Date cloture forcée à nulle
{
    $PDOStat->bindValue(':date_cloture', $_POST['date_clotures'], PDO::PARAM_NULL ); // PDO::PARAM_NULL = permet de mettre une valeur Nulle en parametre mais pas vide; PDO::PARAM_NULL : lui permet de renvoyer une valeur NULL quel que sois le resultat
}


var_dump($PDOStat);
var_dump($_POST['date_clotures']);

$PDOStat->debugDumpParams();

$executeIsOk = $PDOStat->execute();

if($executeIsOk)
{
    $message = 'Les modifications appliqués à ce compte ont été prisent en compte';
}
else
{
    $message = 'Echec de la mise à jour :c';
}

/*
echo '<div class="col-8 offset-2">';
echo ' Affichage Ordre Sql pour Debug : ' .  '</br>' ; 
echo '</div>';
*/

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

<h1> Compte mis a jour </h1>

    <a href="MyBourso_accueil.php"> revenir a la page liste des comptes </a> </br>

    <p><?= $message ?></p>

</body>
