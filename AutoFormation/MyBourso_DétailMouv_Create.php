<?php
$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare('SELECT numcpt, libelle, date_creation, date_cloture, id_client FROM comptes WHERE numcpt = :nume');

$result = $PDOStat->fetchAll();

?>

<body>
    
    <h1> Fiche création mouvement </h1>
    <a href="MyBourso_Accueil"> acces a la liste des elements en base de données  </a>

        <form action="MyBourso_DétailMouv_Insertion.php" method="post">

            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

            </p>

            <p>
                <label for="theme">Theme :</label>
                <input type="text" id="theme" name="theme" required>

            </p>

            <p>
                <label for="date">Date :</label>
                <input type="text" id="date" name="date" required>

            </p>

            <p>
                <label for="prix">Prix :</label>
                <input type="number" step="0.01" id="prix" name="prix" required>

            </p>

            <p>
                <label for="num_cpt">N° Compte :</label>
                <label for="num_cpt"> <?= $_GET['numcpt'] ?> </label>
                
               

            </p>

            <p>
                <label for="id_client">N° Client :</label>
                <label for="id_client"> <?= $_GET['id'] ?> </label>

               

            </p>

            <p><input type="submit" value="Enregistrer"></p>

        </form>

</body>

