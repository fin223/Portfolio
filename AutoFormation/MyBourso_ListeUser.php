<html>
    <head>
        <meta charset="utf-8">
        <link href="Site_Boursorama_Banque.scss" media="screen" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <style>
          <head>
    
            p
            {
                text-align: left;
            }
            h5
            {
                text-align: left;
            }
            div
            {
                text-align: left;
            }
            .tabulation 
            {
              display: inline-block;
              margin-left: 40px;
            }
            .CadrageDroite 
            {
              display: inline-block;
              margin-left: 40px;
              text-align: right;
            }            
            
        </style>

        
    </head>





<?php
$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare("SELECT * FROM `clients`;");

$executeIsOk = $PDOStat->execute();

$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare('SELECT * FROM clients WHERE id_client = :client');

$result = $PDOStat->fetchAll();

$all_property1 = array();

/* init déclaration variables */
$recherche_11 = ""; $recherche_12 =""; $recherche_13 =""; $recherche_14 =""; $recherche_15 ="";
$Sql12 = ""; $Sql13 = ""; $Sql14 = ""; $Sql15 = "";
          
/* Préparation ordre SQL */
$Sql11 = "SELECT nom, prenom, login, motpasse, email, id_client, date_cloture  FROM clients WHERE 1=1 ";
/*
if(isset($_GET['Nom_1']) AND !empty($_GET['Nom_1']) )
{
    $recherche_11 = htmlspecialchars($_GET['Nom_1']); 
    $Sql12 = " and nom like '%" .  $recherche_11 . "%'";
  } else { $Sql12 = "";}

if(isset($_GET['Date_1']) AND !empty($_GET['Date_1'])
AND isset($_GET['Date_2']) AND !empty($_GET['Date_2']) )
{
    $recherche_12 = htmlspecialchars($_GET['Date_1']);  
    $recherche_13 = htmlspecialchars($_GET['Date_2']);
    $Sql13 = " and date between '" . $recherche_12 . "' and '" . $recherche_13 . "'";
  
} else { $Sql13 = ""; }
*/
if(isset($_GET['id']) AND !empty($_GET['id']) )
{
    $recherche_14 = htmlspecialchars($_GET['id']);
    $Sql14 = " and id_client >= '" . $recherche_14 . "'";
} else { $Sql14 = ""; }
/*
if(isset($_GET['numcpts']) AND !empty($_GET['numcpts']) )
{
    $recherche_15 = htmlspecialchars($_GET['numcpts']);
    $Sql15 = " and numcpt = '" . $recherche_15 . "'";
} else { $Sql15 = ""; }
*/

$sql97 = "ORDER BY login ASC";

/* Préparation ordre SQL */
$Sql_select = ' ' . $Sql11 . ' ' . $Sql12 . ' ' . $Sql13 . ' ' . $Sql14 . ' ' . $Sql15 . ' ' . $sql97;

echo "</br>" . "<div class='text-center'>";
echo "<h2 class='p-1'>" . "Liste des utilisateurs" . "</h2>";
echo "</div>" . "</br>";

require 'MyBourso_NbrUser.php';
?>

<?php

echo '<div class="content">';
    echo '<div class="col-8 offset-2">';
        echo '<table class="data-table">
                <tr class="data-body">';  //initialize table tag
            echo '<div class="card">';
                echo '<form class="d-flex">
                  <div class="card">
                    <!--
                    <td> <input class="form-control me-2" type="date" name="Date_1" placeholder= "date" data-label="Date1"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="date" name="Date_2" placeholder= "date" data-label="Date2"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="search" name="Nom_1" placeholder= "Je recherche dans mes opérations" aria-label="Search" > </input> </td>
                    -->
                    <td> <input class="form-control me-2" type="number" name="id" placeholder= "Recherche utilisateur"> </input> </td>

                    <td> <button class="btn btn-outline-dark" type="submit"> Rechercher </button> </td>
                  </div>
                </form>';
            echo '</div>';    
        echo '</table>';
    echo '</div>';
echo '</div>';

echo '<div class="col-8 offset-2">';
echo ' Affichage Ordre Sql pour Debug : ' . $Sql_select . '</br>' . '</br>'; 
echo '</div>';

?>

<?php

/* Exécution ordre SQL */

$result = $PDO->query($Sql_select);


?>

<div class="col-8 offset-2">
<div class="card">
  <section>
    <form action="MyBourso_DétailUser_Create.php" method="post">
    <?php foreach($result as $article): ?>

      <?php 
      ?>
        
        <article>
          
          <h8>
            
            <a href="MyBourso_DétailLogin_index.php">  
            <?=
              '<span class="tabulation">' . '</span>' .  str_pad(strip_tags($article["id_client"]),20," ") . "</a>" 
            . '<span class="tabulation">' . '</span>' .  str_pad(strip_tags($article["nom"]),20," ")
            . '<span class="tabulation">' . '</span>' .  str_pad(strip_tags($article["prenom"]),20," ")
            . '<span class="tabulation">' . '</span>' . str_pad(strip_tags($article["login"]),40," ")
            . '<span class="tabulation">' . '</span>' .  str_pad(strip_tags($article["motpasse"]),20," ")
            . '<span class="tabulation">' . '</span>' .  str_pad(strip_tags($article["email"]),20," ")
            . '<span class="tabulation">' . '</span>' .  str_pad(strip_tags($article["date_cloture"]),20," ")
            
            ?> 
            
            <span class="tabulation">
            </span>
            <a href="MyBourso_DétailUser.php?id_client=<?= $article['id_client'] ?> "> Modifier </a>

            <span class="tabulation">
            </span>
            <a href="MyBourso_DétailUser_Delete.php?id_client=<?= $article['id_client'] ?> "> Supprimer </a>

          </h8> 
          
      </article>


    <?php endforeach; ?>
    </div>
    </br>
    <p>
      <input type="submit" value="Creation d'un utilisateur">
    </p>
    </form>
  </section>
  








</div>

</html>
