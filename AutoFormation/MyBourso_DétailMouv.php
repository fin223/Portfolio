<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('SELECT * FROM mouvements WHERE id = :num');

$PDOStat->bindValue(':num', $_GET['id'], PDO::PARAM_INT);

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
    <title> Modifier </title>
</head>
<body>

<h1> modifier un mouvement </h1>

<form action="MyBourso_DétailMouv_Update.php" method="post">
 <a href="MyBourso_Accueil.php">  réaccéder a l'ensemble des comptes </a>

    <input type="hidden" name="numContact" value="<?= $article ['id']; ?>">
    <aside>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="noms" required value="<?= $article ['nom']; ?>">

            </p>

            <p>
                <label for="theme">Theme :</label>
                <input type="text" id="theme" name="themes" required value="<?= $article ['theme']; ?>">

            </p>

            <p>
                <label for="date">Date :</label>
                <input type="text" id="date" name="dates" required value="<?= $article ['date']; ?>">

            </p>

            <p>
                <label for="prix">Prix :</label>
                <input type="text" id="prix" name="prix" required value="<?= round($article ['prix'], 2); ?>">€

            </p>

            <p>
                <label for="num_cpt">N° Compte :</label> 
                <?= $article ['numcpt']; ?>

            </p>

            <p>
                <label for="id_client">N° Client :</label>
                <?= $article ['id_client']; ?>

            </p>

            <p><input type="submit" value="mise a jour"></p>
            

    </aside>
</form>




    <form action="MyBourso_DétailMouv_Delete.php" method="get">

    <input type="hidden" name="numContact" value="<?= $article ['id']; ?>">
    <aside>
            <p>
                
                <input type="hidden" id="nom"  name="noms" value="<?= $article ['nom']; ?>">

            </p>

            <p>
                
                <input type="hidden" id="theme" name="themes" value="<?= $article ['theme']; ?>">

            </p>

            <p>
                
                <input type="hidden" id="date" name="dates" value="<?= $article ['date']; ?>">

            </p>

            <p>
                
                <input type="hidden" id="prix" name="couts" value="<?= $article ['prix']; ?>">

            </p>

            <p>
                
                <input type="hidden" id="numcpt" name="numcpts" value="<?= $article ['numcpt']; ?>">

            </p>

            <p>
                
                <input type="hidden" id="id_client" name="id_clients" value="<?= $article ['id_client']; ?>">

            </p>

            <p><input type="submit" value="Supprimer"></p>
            </br>

    </aside>
    
    

    </form>


</body>

