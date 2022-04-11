<?php
include 'functions.php';
?>

<?=template_header('activation capteur')?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<!-- -->
	<!--eviter le 404 à la requete de chargement de la favicon de onglet-->
	<link rel="shortcut icon" href="assets/favicon.ico">
</head>


<p Lecture paramètre TEMP dans MySql> 
	<?php
	
		// Define MySQL connection data
		$MYSQL['host'] = "localhost"; 
		$MYSQL['user'] = "Lucas";
		$MYSQL['password'] = "Maig-3399";
		$MYSQL['database'] = "serre_horticole";
	
		// Connect to MySQL database
		$mysqli = mysqli_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password'],$MYSQL['database']);
	
		// Make SQL request
		$sql1 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'TEMP'	";
		$sql2 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'HUMID' ";
		$sql3 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'FREQ' ";
		$sql4 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'SIMUL' ";
		$sql5 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'SIMUL_TEMP' ";
		$sql6 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'SIMUL_HUMID' ";
		$sql_insert_temp = "INSERT INTO evenements (DateCreation_evenements, Type_evenements, Valeur_evenements) VALUES (CURRENT_TIMESTAMP (),'TEMP', 20)	";

		// Exécution requète de lecture Valeur température souhaitée
		$result = $mysqli->query($sql1);
		$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur)
		$Val_TEMP_Lue = $row[0];

		// Exécution requète de lecture Valeur Taux d'humidité souhaité
		$result = $mysqli->query($sql2);
		$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
		$Val_HUMID_Lue = $row[0];

		// Exécution requète de lecture Fréquence de la boucle (si 0 alors fin programme)
		$result = $mysqli->query($sql3);
		$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
		$Val_FREQ_Lue = $row[0];

		// Exécution requète de lecture Mode Simultaion (0=Non 1=Oui Simulation)
		$result = $mysqli->query($sql4);
		$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
		if ( $row[0] == 0 ) $Val_MODE_SIMU_Lue="N"; 
		else $Val_MODE_SIMU_Lue="O";
		
		// Exécution requète de lecture Valeur température SIMULée (en l'absences de capteur)
		$result = $mysqli->query($sql5);
		$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
		$Val_SIMUL_TEMP_Lue = $row[0];

		// Exécution requète de lecture Valeur taux d'humidité SIMUlé (en l'absences de capteur)
		$result = $mysqli->query($sql6);
		$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
		$Val_SIMUL_HUMID_Lue = $row[0];

		// Return the result and close MySQL connection
		// $mysqli->close();

		if ($Val_MODE_SIMU_Lue=="O")
		{
			echo 'Valeur température Lue dans table Paramètre : ' . $Val_TEMP_Lue . '<br>' ;
			echo 'Valeur taux humidité Lue dans table Paramètre : ' . $Val_HUMID_Lue . '<br>' ;
			echo 'Valeur Fréquence boucle Lue dans table Paramètre : ' . $Val_FREQ_Lue . '<br>' ;
			echo 'Valeur Mode Simulation Lu dans table Paramètre : ' . $Val_MODE_SIMU_Lue . '<br>' ;
			echo 'Valeur Mode Simulation Lu dans table Paramètre : ' . $Val_SIMUL_TEMP_Lue . '<br>' ;
			echo 'Valeur Mode Simulation Lu dans table Paramètre : ' . $Val_SIMUL_HUMID_Lue . '<br>' ;
		}
		// $Fréquence_Saisie="";
	?>
</p Lecture paramètre TEMP dans MySql>


<body Saisie Variables>

    <div id="resultat">&nbsp;</div>

	<form method="post" action="#">
	<br>
	<fieldset>
	<legend><strong> Paramètres a réguler </strong></legend>
		<br>
		<p> Mode simu (O/N) </p> <input name="Simulation" type="text" value=<?php echo $Val_MODE_SIMU_Lue; ?> minlength="1" maxlength="1" pattern="[ON]"> 
		<br><br>
		<p> Tempo Boucle en secondes </p> <input name="Frequence_Boucle" type="number" value=<?php echo $Val_FREQ_Lue; ?> min="0" max="600">
		<br><br>
		<p> Valeur Temp Souhaitée (18 à 30) </p> <input name="Temp" type="number" value=<?php echo $Val_TEMP_Lue; ?> min="18" max="30">
		<br><br>
		<p> Valeur Taux Humid Souhaité (40 à 60) </p> <input name="Humid" type="number" value=<?php echo $Val_HUMID_Lue; ?> min="40" max="60">
		<br><br>
		<input type="submit" name="submit" id="submit" value="Envoyer boucle Programme" tabindex="300">
		<br><br>
	</fieldset>

	</form>

</body Saisie Variables>
</html>

<p Affichage variables saisies> 
	<?php
		$Fréquence_Saisie=""; // Correction affichage msg erreur si variable pas déclarée

		$Simu_Saisie=$_POST["Simulation"];
		echo 'Passage en mode simulation envoyé : ' . $Simu_Saisie . '<br>' ;

		$Frequence_Saisie=$_POST["Frequence_Boucle"];
		echo 'Frequence envoyée : ' . $Frequence_Saisie . '<br>' ;

		$Temperature_Saisie=$_POST["Temp"];
		echo 'valeur température envoyée : ' . $Temperature_Saisie . '<br>' ;

		$TauxHumid_Saisie=$_POST["Humid"];
		echo 'valeur humidité envoyée : ' . $TauxHumid_Saisie . '<br>' ;	

	?> 
</p Affichage variables saisies>

<p Boucle_Regulation>
	<?php 
	$BouclePgm = $Fréquence_Saisie; // initialisation Fréquence de boucle ou sortie programme
	$Indice = 0; // indice interne pour forcer les variations de température en mode simulation

	while (true)
	{ 
		$Indice = $Indice+1; // Indice utile pour déclencher automatiquement la fin du programme

		/////////////////////////////////////////////
		// Traitement Régulation de la température 
		/////////////////////////////////////////////
		if ($Val_MODE_SIMU_Lue == "O")
		{
			// Exécution requète de lecture Valeur température SIMULée (en l'absences de capteur)
			$result = $mysqli->query($sql5);
			$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
			$Valeur_Temperature = $row[0];
			$typ_event = 'TEMP_S';
		}
		else
		{
			// Insérer ici la commande pour récupérer la valeur de la température sur le capteur DHT11
			$Valeur_Temperature = 19; // Remplacer 19 par la valeur reçue du capteur DHT11
			$typ_event = 'TEMP';
		}
		
		echo date('h:i:s') .' - Mode Simu : ' . $Val_MODE_SIMU_Lue . ' - Valeur température simulée lue dans table Paramètre : ' . $Valeur_Temperature . '<br>' ;

		// Tests si température est supérieure à celle souhaitée (déclarée dans la table paramètre)
		if ($Valeur_Temperature > $Val_TEMP_Lue)
		{
			// On régule en activant le ventilateur (insérer ici gpio write 7 1 )
		}
		else
		{
			// on régule pas en désactivant le ventilateur (insérer ici gpio write 7 0 )
		}
		// Création d'un évèvenement dans la table Evenements
		$sql_insert_temp = "INSERT INTO evenements (DateCreation_evenements, Type_evenements, Valeur_evenements) VALUES (CURRENT_TIMESTAMP (), '$typ_event', $Valeur_Temperature)	";
		if (!$mysqli->query($sql_insert_temp))
		{
			echo "Échec lors l'insertion dan la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
			echo $sql_insert_temp . '<br>' ;
		}
		else
		{
			echo date('h:i:s') . " - Insertion dan la table Ok - " . $typ_event . " - Valeur " . $Valeur_Temperature . '<br>';		
		}

		/////////////////////////////////////////////
		// Traitement Régulation de la température 
		/////////////////////////////////////////////
		if ($Val_MODE_SIMU_Lue == "O")
		{
			// Exécution requète de lecture Valeur taux d'humidité SIMULée (en l'absences de capteur)
			$result = $mysqli->query($sql6);
			$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
			$Valeur_TauxHumid = $row[0];
			$typ_event = 'HUMID_S';
		}
		else
		{
			// Insérer ici la commande pour récupérer la valeur du taux d'humidité du capteur DHT22
			$Valeur_Temperature = 51; // Remplacer 30 par la valeur reçue par le capteur DHT11
			$typ_event = 'HUMID';
		}
		
		echo date('h:i:s') .' - Mode Simu : ' . $Val_MODE_SIMU_Lue . ' - Valeur taux humidité simulé lue dans table Paramètre : ' . $Valeur_TauxHumid . '<br>' ;

		// Tests si température est supérieure à celle souhaitée (déclarée dans la table paramètre)
		if ($Valeur_TauxHumid > $Val_HUMID_Lue)
		{
			// On régule en activant la pompe à eau (insérer ici gpio write 11 1 )
		}
		else
		{
			// on régule pas en désactivant la pompe à eau (insérer ici gpio write 11 0 )
		}
		// Création d'un évèvenement dans la table Evenements
		$sql_insert_humid = "INSERT INTO evenements (DateCreation_evenements, Type_evenements, Valeur_evenements) VALUES (CURRENT_TIMESTAMP (), '$typ_event', $Valeur_TauxHumid)	";
		if (!$mysqli->query($sql_insert_humid))
		{
			echo "Échec lors l'insertion dan la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
			echo $sql_insert_humid . '<br>' ;
		}
		else
		{
			echo date('h:i:s') . " - Insertion dan la table Ok - " . $typ_event . " - Valeur " . $Valeur_TauxHumid . '<br>';		
		}

		// Fin programme si Fréquence boucle = 0 ou si indice Supérieur à 10
		if ( $Frequence_Saisie == 0 || $Indice > 19 ) 
		{ 
			echo "Sortie Programme à " . date('h:i:s') . ' - Indice :' . $Indice . '<br />' ; 
			$mysqli->close();
			// Ajouter ici arret du ventilateur en lançant la commande : gpio write 7 0
			// Ajouter ici arret de la pompe à eau en lançant la commande : gpio write 11 0
			exit; // Arret programme
		}
		else
		{ 
			sleep($Frequence_Saisie);
			echo 'Attente : ' . $Frequence_Saisie . ' secondes - date : ' . date('h:i:s') . ' - Indice :' . $Indice . '<br><br>'; // affichage de $BouclePgm
		}

	} 

	?> 

</p Boucle_Regulation>