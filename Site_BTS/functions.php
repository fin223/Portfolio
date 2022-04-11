<?php
function pdo_connect_mysql() {
   /* $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'admin';
    $DATABASE_PASS = 'snir2';
	$DATABASE_NAME = 'serre_horticole'*/

	$DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'Lucas';
    $DATABASE_PASS = 'maig-3399';
	$DATABASE_NAME = 'serre_horticole';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . 'charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style_projet.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Site_Web_Serre_Horticole</h1>
			<a href="index_serre.php"><i class="fas fa-home"></i>Maison</a>
            <a href="index_SerreHorticole.php"><i class="fas fa-chart-line"></i>Courbes</a>
			<a href="index_Controle.php"target="_blank"><i class="fas fa-home"></i>Activation capteur</a>
		</div> 

    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<link href="style_projet.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<style>
	img {
		display: block;
		margin-left: auto;
		margin-right: auto;
	  }
	  </style>
	</head>

	<body>
		<div>
			<img src="image_2.gif" alt="Photo" width="500" height="333">
		</div>
    </body>
</html>
EOT;
}
?>
