<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xml:lang="fr">
<body>

<?php

$host = "localhost"; 
$user = "Lucas";
$password = "Maig-3399";
$database = "mini_projet";

$im = imagecreatetruecolor(55, 30);
$black = imagecolorallocate($im, 0, 0, 0);

$mysqli = mysqli_connect($host,$user,$password,$database);
$mysqli2 = mysqli_connect($host,$user,$password,$database);

$all_property1 = array(); 
$all_property2 = array();
$all_property3 = array();

$prix_valeur = mysqli_query($mysqli,"SELECT prix FROM mouvements;");


$valeur_total = mysqli_query($mysqli,"SELECT round(sum(M.prix), 2) AS `Solde au 2035-04-11`
from mini_projet.comptes C, mini_projet.mouvements M
where 1=1
and C.id_client = M.id_client
and C.numcpt = M.numcpt 
and C.id_client =" . $_GET['id_clients'] . ";");



$valeur_total2 = mysqli_query($mysqli,"SELECT UTC_DATE()");
$couleur_prix = mysqli_query($mysqli,"SELECT nom, theme, date, prix, CASE WHEN prix = 0 THEN  'Prix ordinaire' WHEN prix > 0 THEN 'Prix supérieur à la normale' ELSE 'Prix inférieur à la normale' END AS prix_condition FROM `mouvements`;");


echo '<div style="text-align:center">';

echo '<tr class="data-heading">';
echo '<div class="col-8 offset-2">';


while ($property3 = mysqli_fetch_field($valeur_total2)) {

    echo '<td>' . '<div class="BodyLayout-sidebar Sidebar">' . '<aside class="SmallBox sticky">' . '</td>';  //get field name for header
    array_Push($all_property3, $property3->name);  //save those to array

}


while ($row2 = mysqli_fetch_array($valeur_total2)) {
    echo "<tr>";
    foreach ($all_property3 as $item2) {

        echo '<td>' . '<font color="Gainsboro">' . $row2[$item2] . '</font>' . '</td>'; //get items using property value

    }
    echo '</tr>';

}

while ($property2 = mysqli_fetch_field($valeur_total)) {

     //get field name for header
    array_Push($all_property2, $property2->name);  //save those to array

}


while ($row2 = mysqli_fetch_array($valeur_total)) {
    echo "<tr>";
    foreach ($all_property2 as $item2) {

        echo '<td>'  . '<h3>' . '<font color="green">' . $row2[$item2] . '€' . '</font>' . '<h3>' . '</aside>' . '</div>' . '</td>' . '</br>'; //get items using property value

    }
    echo '</tr>';

}




echo '</div>';
echo '</tr>';
echo '</div>';
?>
</body>