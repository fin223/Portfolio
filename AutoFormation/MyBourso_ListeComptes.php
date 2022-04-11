<html>
    <head>
        <meta charset="utf-8">
        <link href="Site_Boursorama_Banque.scss" media="screen" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
          
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
              margin-left: 50px;
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
echo '<div class="content">';
    echo '<div class="col-8 offset-2">';
        echo '<table class="data-table">
                <tr class="data-body">';  //initialize table tag
            echo '<div class="card">';
                echo '<form class="d-flex">
                  <div class="card">
                    <!--
                    <td> <input class="form-control me-2" type="date" name="Date_1" placeholder= "date_creation" data-label="Date1"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="date" name="Date_2" placeholder= "date_creation" data-label="Date2"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="date" name="Date_3" placeholder= "date_cloture" data-label="Date1"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="date" name="Date_4" placeholder= "date_cloture" data-label="Date2"> </input> </td>
                    -->
                    <td> <input class="form-control me-2" type="search" name="Nom_1" placeholder= "Je recherche dans mes opérations" aria-label="Search" > </input> </td>

                    <td>' . '<input class="form-control me-2" type="search" name="id" placeholder= " id_client" value=' . $_GET['id'] . ' > </input> </td> 

                    <td> <button class="btn btn-outline-dark" type="submit"> Rechercher </button> </td>
                  </div>
                </form>';
            echo '</div>'; 
        echo '</table>';
    echo '</div>';
echo '</div>';
echo '</br>';
?>

<?php
$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare("SELECT * FROM `comptes` ORDER BY date_creation DESC");

$executeIsOk = $PDOStat->execute();

$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare('SELECT * FROM clients WHERE id_client = :id_client');

$result = $PDOStat->fetchAll();

$all_property1 = array();

/* init déclaration variables */
$recherche = ""; $recherche_2 =""; $recherche_3 =""; $recherche_4 =""; $recherche_5 =""; $recherche_6 =""; $recherche_7 ="";
$Sql2 = ""; $Sql3 = ""; $Sql4 = ""; $Sql5 = ""; $Sql6 = "";

        
/* Préparation ordre SQL */
$Sql1 = "SELECT C.numcpt,C.libelle, C.date_creation, C.date_cloture, U.dbg, U.id_client, round(sum(M.prix), 2)
from mini_projet.comptes C, mini_projet.mouvements M, mini_projet.utilisateurs U
where 1=1
and C.id_client = M.id_client 
and C.numcpt = M.numcpt
and C.id_client = U.id_client ";


if(isset($_GET['Nom_1']) AND !empty($_GET['Nom_1']) )
{
    $recherche = htmlspecialchars($_GET['Nom_1']); 
    $Sql2 = " and libelle like '%" .  $recherche . "%'";
  } else { $Sql2 = "";}


if(isset($_GET['Date_1']) AND !empty($_GET['Date_1'])
AND isset($_GET['Date_2']) AND !empty($_GET['Date_2']) )
{
    $recherche_2 = htmlspecialchars($_GET['Date_1']);  
    $recherche_3 = htmlspecialchars($_GET['Date_2']);
    $Sql3 = " and date_creation between '" . $recherche_2 . "' and '" . $recherche_3 . "'";
  
} else { $Sql3 = ""; }

if(isset($_GET['Date_3']) AND !empty($_GET['Date_3'])
AND isset($_GET['Date_4']) AND !empty($_GET['Date_4']) )
{
    $recherche_4 = htmlspecialchars($_GET['Date_3']);  
    $recherche_5 = htmlspecialchars($_GET['Date_4']);
    $Sql4 = " and date_cloture between '" . $recherche_4 . "' and '" . $recherche_5 . "'";
  
} else { $Sql4 = ""; }

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $recherche_6 = htmlspecialchars($_GET['id']);
    $Sql5 = " and U.id_client = " . $recherche_6 . " ";
} else { $Sql5 = ""; }





$Sql99 = " Group by C.id_client, C.numcpt ";

$Sql100 = " ORDER BY date_creation ASC; </br>";

/* Préparation ordre SQL */
$Sql_select = ' ' . $Sql1 . ' ' . $Sql2 . ' ' . $Sql3 . ' ' . $Sql4 . ' ' . $Sql5 . ' ' . $Sql6 . ' ' . $Sql99 . ' ' . $Sql100;

echo '</br>';

echo '<div class="col-8 offset-2">';

?>


<?php


echo '</div>';

/* Exécution ordre SQL */

$result = $PDO->query($Sql_select);


?>

<div class="col-8 offset-2">


  <section>
  <form action="MyBourso_DétailComptes_Create.php?id=<?= $_GET['id'] ?>" method="post">
  </br>
    <?php foreach($result as $article): ?>
      
      <?php // Si dbg not null alors affichage de l'ordre SQL
          if(!empty($article['dbg']))
          {
            echo ' Affichage Ordre Sql pour Debug : ';
            var_dump($Sql_select);
            
          }
      ?>

      <?php // printf(" %s %s  %s  %s %g € </br> ", strip_tags($article["id"]), strip_tags($article["date"]), strip_tags($article["theme"]),strip_tags($article["nom"]), strip_tags($article["prix"]) ) ; 
      ?>

        <article>
        
          <h8>
          
          <table border="1" width="100%">
          <tr>

          <td style="width:10%">
          
            <a href="MyBourso_ListeMouv.php?numcpts=<?= $article['numcpt'] ?>&id_clients=<?= $article['id_client'] ?>&dbg=<?= $article['dbg'] ?>"> <?= $article["libelle"] ?> </a>
          
          </td>

            <?=
          
            '<td style="width:10%">' . str_pad(strip_tags($article["date_creation"]),20," ") . '</td>'
           . '<td style="width:10%">' . str_pad($article["date_cloture"],20," ") . '</td>'
           . '<td style="width:5%">' . str_pad($article["id_client"],20," ") . '</td>'
           . '<td style="width:5%">' . str_pad($article["round(sum(M.prix), 2)"],20," ") . '</td>'
          
            ?> 

            <td style="width:5%">
            <a href="MyBourso_DétailComptes.php?numcpt=<?= $article['numcpt'] ?>&id_clients=<?= $article['id_client'] ?>&dbg=<?= $article['dbg'] ?> "> Modifier </a>
            </td>

            <td style="width:5%">
            <a href="MyBourso_DétailComptes_Delete.php?numcpt=<?= $article['numcpt'] ?> "> Supprimer </a> 
            </td>
            
          </tr>
           
          </table>
            

          </h8> 
          
      </article>
      

    <?php endforeach; ?>
    </br>
    
    <p>
    <input type="submit" value="Creation d'un compte">
    </p>

  </form>

</section>
  

</div>

</html>
