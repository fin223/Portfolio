

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



<body>
    
    <h1> Fiche création compte </h1>
    <a href="MyBourso_ListeComptes.php"> revenir a la page liste des comptes  </a>

        <form action="MyBourso_DétailComptes_Insertion.php" method="post">

        

            <p>
                <label for="libelle">Libelle :</label>
                <input type="text" id="libelle" name="libelle" required>

            </p>

            <p>
                <label for="date_creation">Date_creation :</label>
                <input type="text" id="date_creation" name="date_creation" required>

            </p>

            <p>
                <label for="date_cloture">Date_cloture :</label>
                <input type="text" id="date_cloture" name="date_cloture">

            </p>

            <p>
                <label for="id_client">N° Clients :</label>
                <label for="id_client"> <?= $_GET['id'] ?></label>
                

                

            </p>

            </p>

            <p><input type="submit" value="Enregistrer"></p>

        </form>

</body>

