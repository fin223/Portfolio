
<!DOCTYPE html>

<html>
    <head>
    
        <meta charset="utf-8">
        <link href="Site_Boursorama_Banque.scss" media="screen" rel="stylesheet" type="text/css">
    </head>
<?php
require 'header_2.php';
?>

<body>

<div class="text-center">
    <h2 class="p-1"> Liste des comptes de <?= $data['pseudo']; ?> </h2>
    </br>
    <h4 class="p-2"> <?= $data['id_client']; ?> </h4>
    </br>
</div>

<?php
require 'MyBourso_DétailComptes_somme_total.php ';
?>
<?php
require 'header_3.php';
?>
<?php
require 'MyBourso_ListeComptes.php';
?>

</body>

<?php
require 'footer_2.php';
?>
</html>