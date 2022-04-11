<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('SELECT * FROM comptes WHERE numcpt = :nume');

$PDOStat->bindValue(':nume', $_GET['numcpt'], PDO::PARAM_INT);

var_dump($PDOStat);

$PDOStat->debugDumpParams();

$executeIsOk = $PDOStat->execute();

$article = $PDOStat->fetch();

?>


<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width-device-width, user-scalable=no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie-edge">
    <title> Modification </title>
</head>
<body>

<h1> modifier un compte </h1>
<a href="MyBourso_ListeComptes.php"> revenir a la page liste des comptes  </a>


<form action="MyBourso_DétailComptes_Update.php" method="post">

    <input type="hidden" name="numContact" value="<?= $article ['numcpt']; ?>">
    <aside>
            <p>
                <label for="numcpt">N° Comptes :</label>
                <?= $article ['numcpt']; ?>

            </p>

            <p>
                <label for="libelle">Libelle :</label>
                <input type="text" id="libelle" name="libelles" required value="<?= $article ['libelle']; ?>">

            </p>

            <p>
                <label for="date_creation">Date_creation :</label>
                <input type="text" id="date_creation" name="date_creations" required value="<?= $article ['date_creation']; ?>">

            </p>

            <p>
                <label for="date_cloture">Date_cloture :</label>
                <input type="text" id="date_cloture" name="date_clotures" value="<?= $article ['date_cloture']; ?>">

            </p>

            <p>
                <label for="id_client">N° Clients :</label>
                <?= $article ['id_client']; ?>

            </p>

            <p><input type="submit" value="mise a jour"></p>

    </aside>
    
</form>

</body>