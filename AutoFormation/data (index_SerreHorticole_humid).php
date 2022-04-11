<?php


	// Define MySQL connection data
	/* 
	$MYSQL['host'] = "localhost"; 
	$MYSQL['user'] = "admin";
	$MYSQL['password'] = "snir2";
	$MYSQL['database'] = "serre_horticole";
	*/

	$MYSQL['host'] = "localhost";  
	$MYSQL['user'] = 'Lucas';
	$MYSQL['password'] = 'Maig-3399';
	$MYSQL['database']= 'serre_horticole';

	// Connect to MySQL database
	$mysqli = mysqli_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password'],$MYSQL['database']);

	// Make SQL request
	$result = $mysqli->query("SELECT DateCreation_Evenements, Valeur_Evenements FROM evenements 
	WHERE Type_Evenements = 'HUMID' or Type_Evenements = 'HUMID_S' 
	ORDER BY DateCreation_Evenements ASC");

	// Loop through the result and populate an array
	$courbes = Array();
	while ($courbes[] = $result->fetch_assoc()){}
	array_pop($courbes);

	// Return the result and close MySQL connection
    $mysqli->close();
    header('Content-type: application/json');

	echo json_encode($courbes);
?>