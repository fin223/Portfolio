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
    </br>
    <div class="text-center">
    <h2 class="p-2"> Détail mouvements du compte sélectionné </h2>
    </div>
<?php

echo '<div class="content">';
    echo '<div class="col-8 offset-2">';
        echo '<table class="data-table">
                <tr class="data-body">';  //initialize table tag
            echo '<div class="card">';
                echo '<form class="d-flex">
                  <div class="card">
                    
                    <td> <input class="form-control me-2" type="date" name="Date_1" placeholder= "date" data-label="Date1"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="date" name="Date_2" placeholder= "date" data-label="Date2"> </input> </td>
                    
                    <td> <input class="form-control me-2" type="search" name="Nom_1" placeholder= "Je recherche dans mes opérations" aria-label="Search" > </input> </td>

                    <td> <input class="form-control me-2" type="number" name="Prix" placeholder= "Je recherche des gain supérieur a"> </input> </td>

                    <td> <input class="form-control me-2" type="number" name="numcpt" placeholder= "Je recherche un numero de compte"> </input> </td>

                    <td> <button class="btn btn-outline-dark" type="submit"> Rechercher </button> </td>
                  </div>
                </form>';
            echo '</div>';    
        echo '</table>';
    echo '</div>';
echo '</div>';

$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare("SELECT * FROM `mouvements`;");

$executeIsOk = $PDOStat->execute();

$PDO = new PDO('mysql:host=localhost;dbname=mini_projet', 'Lucas', 'Maig-3399');

$PDOStat = $PDO->prepare('SELECT * FROM comptes WHERE numcpt = :nume');

$result = $PDOStat->fetchAll();

$all_property1 = array();

/* init déclaration variables */
$recherche_6 = ""; $recherche_7 =""; $recherche_8 =""; $recherche_9 =""; $recherche_10 ="";
$Sql7 = ""; $Sql8 = ""; $Sql9 = ""; $Sql10 = "";
          
/* Préparation ordre SQL */
$Sql6 = "SELECT M.id, M.date, M.nom, M.theme, format(M.prix,2) as prix, ' €', M.numcpt, M.id_client, U.dbg
FROM mini_projet.mouvements M, mini_projet.utilisateurs U
WHERE 1=1
and U.id_client = M.id_client
";

if(isset($_GET['Nom_1']) AND !empty($_GET['Nom_1']) )
{
    $recherche_6 = htmlspecialchars($_GET['Nom_1']); 
    $Sql7 = " and nom like '%" .  $recherche_6 . "%'";
  } else { $Sql7 = "";}

if(isset($_GET['Date_1']) AND !empty($_GET['Date_1'])
AND isset($_GET['Date_2']) AND !empty($_GET['Date_2']) )
{
    $recherche_7 = htmlspecialchars($_GET['Date_1']);
    $recherche_8 = htmlspecialchars($_GET['Date_2']);
    $Sql8 = " and date between '" . $recherche_2 . "' and '" . $recherche_3 . "'";
  
} else { $Sql3 = ""; }

if(isset($_GET['Prix']) AND !empty($_GET['Prix']) )
{
    $recherche_9 = htmlspecialchars($_GET['Prix']);
    $Sql9 = " and prix >= '" . $recherche_9 . "'";
} else { $Sql9 = ""; }

if(isset($_GET['numcpts']) AND !empty($_GET['numcpts']) )
{
    $recherche_10 = htmlspecialchars($_GET['numcpts']);
    $Sql10 = " and numcpt = '" . $recherche_10 . "'";
} else { $Sql10 = ""; }


$sql98 = "ORDER BY date ASC";



/* Préparation ordre SQL */
$Sql_select = ' ' . $Sql6 . ' ' . $Sql7 . ' ' . $Sql8 . ' ' . $Sql9 . ' ' . $Sql10 . ' ' . $sql98;

echo '<div class="col-8 offset-2">';
echo ' Affichage Ordre Sql pour Debug : ' . $Sql_select ; 
echo '</div>';


/* Exécution ordre SQL */

$result = $PDO->query($Sql_select);
?>

<?php

require 'MyBourso_DétailMouv_somme_total.php';

?>



<div class="col-8 offset-2">

  <?php // Si dbg not null alors affichage de l'ordre SQL
    if(!empty($_GET['dbg']))
    {
      echo ' Affichage Ordre Sql pour Debug : ' . '</br>';
      var_dump($Sql_select);
    }
  ?>

  <section>
    <form action="MyBourso_DétailMouv_Create.php?id=<?= $_GET['id_clients'] ?>&numcpt=<?= $_GET['numcpts'] ?>" method="post">
    </br>
    
    <?php foreach($result as $article): ?>
        

      <article>
          
          <h8>

          <table border="1" width="100%">
          <tr>  

          <td style="width:10%">
          <span class="tabulation"></span>

            <a href="MyBourso_DétailMouv.php?id=<?= $article['id'] ?>"> <?= $article["nom"] ?> </a>

          </td>
          

            <?=
            
             '<td style="width:5%">' . str_pad(strip_tags($article["theme"]),20," ") . '</td>'
            . '<td style="width:5%">' . str_pad($article["prix"],20," ") . '€' . '</td>'
            . '<td style="width:5%">' . str_pad($article["numcpt"],20," ") . '</td>'
            . '<td style="width:5%">' . str_pad($article["id_client"],20," ") . '</td>'
            
            ?> 

          </tr>
          </table>
            
          </h8> 
          
      </article>


    <?php endforeach; ?>
    </br>
    
    <p>

      <input type="submit" value="Creation d'un mouvement">

    </p>
    </form>
  </section>

</div>

</html>
