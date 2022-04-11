<?php

$ObjetPDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $ObjetPDO->prepare('SELECT * FROM clients WHERE id_client = :id_client');

$PDOStat->bindValue(':id_client', $_GET['id_client'], PDO::PARAM_INT);

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

<h1> modifier un utilisateur </h1>
<a href="MyBourso_ListeUser.php"> revenir a la page liste des utilisateurs  </a>


<form action="MyBourso_DétailUser_Update.php" method="post">

    <input type="hidden" name="id_client" value="<?= $article ['id_client']; ?>">
    <aside>
            <p>
                <label for="id_client">N° Clients :</label>
                <?= $article ['id_client']; ?>

            </p>

            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="noms" required value="<?= $article ['nom']; ?>">

            </p>

            <p>
            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenoms" required value="<?= $article ['prenom']; ?>">

            </p>

            <p>
                <label for="login">Login :</label>
                <input type="text" id="login" name="logins" required value="<?= $article ['login']; ?>">

            </p>

            <p>
                <label for="motpasse">Mot de passe :</label>
                <input type="text" id="motpasse" name="motpasses" required value="<?= $article ['motpasse']; ?>">

            </p>

            <p>
                <label for="email">Email :</label>
                <input type="text" id="email" name="emails" required value="<?= $article ['email']; ?>">

            </p>

            <p>
                <label for="date_cloture">Date cloture :</label>
                <?= $article ['date_cloture']; ?>

            </p>


            <p><input type="submit" value="mise a jour"></p>

    </aside>
    
</form>

</body>