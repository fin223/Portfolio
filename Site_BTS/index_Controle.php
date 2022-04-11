
<?php
include 'functions.php';
?>

<?=template_header('Activation capteur')?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <title>AnyChart PHP template</title>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-vml.min.js"></script>
    <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" />
    <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/fonts/css/anychart.min.css"/>
    <link rel="stylesheet" href="static/css/style_projet.css">
	<link rel="stylesheet" href="image_2.gif">
</head>
<br>

<p> Sur se site vous pouvez lancer une boucle pour activer le flux des courbes avec les capteurs ou uniquement la base de donnnée </p>
</div>
<br>
<fieldset>
<legend><strong> Lecture paramètre dans BDD MySql </strong></legend>
<p Lecture paramètres dans BDD MySql> 
	<?php
	
		// Define MySQL connection data
		$MYSQL['host'] = "localhost"; 
		$MYSQL['user'] = "Lucas";
		$MYSQL['password'] = "Maig-3399";
		$MYSQL['database'] = "serre_horticole";
	
		// Connect to MySQL database
		$mysqli = mysqli_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password'],$MYSQL['database']);
	
		// Make SQL request
		$sql1 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'TEMP'";
		$sql2 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'HUMID'";
		$sql3 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'FREQ'";
		$sql4 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'SIMUL'";
		$sql5 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'SIMUL_TEMP'";
		$sql6 = "SELECT Valeur_Parametres FROM `parametres` where Type_Parametres = 'SIMUL_HUMID'";
		

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

		// Affichage paramètre lus si programme en mode simulation 
		if ($Val_MODE_SIMU_Lue=="O")
		{
			echo 'Lecture table Paramètre : ' . '<br><br>' ;
			echo '- Valeur température Lue dans table Paramètre : ' . $Val_TEMP_Lue . '<br>' ;
			echo '- Valeur taux humidité Lue dans table Paramètre : ' . $Val_HUMID_Lue . '<br>' ;
			echo '- Valeur Fréquence boucle Lue dans table Paramètre : ' . $Val_FREQ_Lue . '<br>' ;
			echo '- Valeur Mode Simulation Lue dans table Paramètre : ' . $Val_MODE_SIMU_Lue . '<br>' ;
			echo '- Valeur Mode Simulation Lue dans table Paramètre : ' . $Val_SIMUL_TEMP_Lue . '<br>' ;
			echo '- Valeur Mode Simulation Lue dans table Paramètre : ' . $Val_SIMUL_HUMID_Lue . '<br>' ;
		}

		$nbr_boucles = 1;
	?>
</p Lecture paramètre dans BDD MySql>
</fieldset>
<br>

<fieldset>
<legend><strong> Saisie des paramètres pour la régulation </strong></legend>
<body Saisie Variables>

    <div id="resultat">&nbsp;</div>
	
	<form method="post" action="#">

		<p> Mode simu (O/N) </p> <input name="Simulation" type="text" value=<?php echo $Val_MODE_SIMU_Lue; ?> minlength="1" maxlength="1" pattern="[ON]"> 
		<br><br>
		<p> Tempo Boucle en secondes </p> <input name="Frequence_Boucle" type="number" value=<?php echo $Val_FREQ_Lue; ?> min="0" max="600">
		<br><br>
		<p> Valeur Temp Souhaitée (18 à 30) </p> <input name="Temp" type="number" value=<?php echo $Val_TEMP_Lue; ?> min="18" max="30">
		<br><br>
		<p> Valeur Taux Humid Souhaité (40 à 60) </p> <input name="Humid" type="number" value=<?php echo $Val_HUMID_Lue; ?> min="40" max="60">
		<br><br>
		<p> Nombre de boucles </p> <input name="Boucle" type="number" value= <?php echo $nbr_boucles; ?>  min="1" max="500">
		<br><br>
		<input type="submit" name="submit" id="submit" value="Envoyer boucle Programme" tabindex="300">
		<br><br>
	</fieldset>
	<br>
	</form>

</body Saisie Variables>

<fieldset>
<legend><strong> Affichage variables saisies </strong></legend>
<p Affichage variables saisies> 
	<?php

		$Fréquence_Saisie = 0; // Correction affichage msg erreur si variable pas déclarée
		
		$Simu_Saisie=$_POST["Simulation"];
		if($Simu_Saisie == '' )
		{
			echo "ARRET Programme à " . date('h:i:s') . ' - Saisir les paramètres puis appuyer sur "Envoyer boucle programme"' . ' <br>';
			exit;
		}

		$Frequence_Saisie=$_POST["Frequence_Boucle"];
		echo 'Frequence envoyée : ' . $Frequence_Saisie . '<br>';

		$Temperature_Saisie=$_POST["Temp"];
		echo 'valeur température envoyée : ' . $Temperature_Saisie . '<br>';
		
		$TauxHumid_Saisie=$_POST["Humid"];
		echo 'valeur humidité envoyée : ' . $TauxHumid_Saisie . '<br>';
		
		$nbr_boucles_saisie=$_POST["Boucle"];
		echo 'valeur nombre de boucles envoyée : ' . $nbr_boucles_saisie . '<br>';
	?> 
</p Affichage variables saisies>
</fieldset>
<br>
<legend><strong> Affichage paramètres mis à jour dans BDD </strong></legend>
<p Enregistrement des paramètres saisis> 
	<?php

	// Maj paramètre saisie Valeur Mode simu
	if($Simu_Saisie == 'O' )
	{
		$Simu_Saisie_update = 1; // mode simulé
	}
	else
	{
		$Simu_Saisie_update = 0; // mode non simulé
	}
	$sql_update_param = "UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = '$Simu_Saisie_update' WHERE Type_Parametres = 'SIMUL';" ;
	if (!$mysqli->query($sql_update_param))
	{
		echo "Échec lors de la mise à jour dans la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
		echo $sql_update_param . '<br>' ;
	}
	else
	{
		echo date('h:i:s') . " - Mise à jour dans la table Ok - Valeur Mode Simulation : " . $Simu_Saisie_update . '<br>';		
	}	

	// Maj paramètre saisie Tempo Boucle
	$sql_update_param = "UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = '$Frequence_Saisie' WHERE Type_Parametres = 'FREQ';" ;
	if (!$mysqli->query($sql_update_param))
	{
		echo "Échec lors de la mise à jour dans la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
		echo $sql_update_param . '<br>' ;
	}
	else
	{
		echo date('h:i:s') . " - Mise à jour dans la table Ok - Valeur Fréquence : " . $Frequence_Saisie . '<br>';		
	}	

	// Maj paramètre saisie Valeur Température
	$sql_update_param = "UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = '$Temperature_Saisie' WHERE Type_Parametres = 'TEMP';" ;
	if (!$mysqli->query($sql_update_param))
	{
		echo "Échec lors de la mise à jour dans la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
		echo $sql_update_param . '<br>' ;
	}
	else
	{
		echo date('h:i:s') . " - Mise à jour dans la table Ok - Valeur Température : " . $Temperature_Saisie . '<br>';		
	}	

	// Maj paramètre saisie Valeur Taux Humidité
	$sql_update_param = "UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = '$TauxHumid_Saisie' WHERE Type_Parametres = 'HUMID';" ;

	if (!$mysqli->query($sql_update_param))
	{
		echo "Échec lors de la mise à jour dans la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
		echo $sql_update_param . '<br>' ;
	}
	else
	{
		echo date('h:i:s') . " - Mise à jour dans la table Ok - Valeur Taux Humidité : " . $TauxHumid_Saisie . '<br>';		
	}	
?> 

<fieldset>
<legend><strong> Boucle de regulation envoyée </strong></legend>
<p Boucle_Regulation>
	<?php 
	$BouclePgm = $Fréquence_Saisie; // initialisation Fréquence de boucle ou sortie programme
	$Indice = 0; // indice interne pour forcer les variations de température en mode simulation
	// void passthru ( float $tempC)
	// string system ( float $tempC)

	while (true)
	{ 
		// Indice utile pour déclencher automatiquement la fin du programme
		$Indice = $Indice+1;
		/////////////////////////////////////////////
		// Traitement Régulation de la température 
		/////////////////////////////////////////////
		if ($Simu_Saisie == "O")
		{
			// Exécution requète de lecture Valeur température SIMULée (en l'absences de capteur)
			$result = $mysqli->query($sql5);
			$row = $result->fetch_row(); // Résultat de la requète stocké dans tabeau Row (1 seul résultat qui est égale à la valeur) 
			$Valeur_Temperature = $row[0];
			$typ_event = 'TEMP_S';
			echo date('h:i:s') .' - Mode Simu : ' . $Simu_Saisie . ' - Valeur température simulée lue dans table Paramètre : ' . $Valeur_Temperature . '<br>' ;
		}
		else
		{
			// Récupération de la valeur de la température sur le capteur DHT11 ==> tests à finaliser
			/* 
			ioctl(file, I2C_SLAVE, 0x48);
			char config[3] = {0};
			config[0] = 0x01;
			config[1] = 0xC2;
			config[2] = 0x83;	
			recv(tempC); 
			*/
			
			// Conversion valeur lue en degrés celsius ==> tests à finaliser
			/*
			$raw_adc = ($data[0] * 256 + $data[1]);
			
			if ($raw_adc > 32767)
			{
				$raw_adc -= 65535;
			}
			$tempC = $raw_adc * 4.096/32767.0;
			$voltage1 = $raw_adc / 1000;
			printf("valeur temperature : %d \n", $raw_adc);
			*/

			// Préparation de l'insertion dans la base
			$Valeur_Temperature = 19 ; // Replacer 19 par varibale $tempC quand tests ok
			$typ_event = 'TEMP';
			echo date('h:i:s') .' - Mode Capteur : ' . $Simu_Saisie . ' - Valeur température simulée lue dans table Paramètre : ' . $Valeur_Temperature . '<br>' ;
		}
		
		// Tests si température est supérieure à celle souhaitée (déclarée dans la table paramètre)
		if ($Valeur_Temperature > $Val_TEMP_Lue)
		{
			// On régule en activant le ventilateur (insérer ici gpio write 7 1 )
			$output=null;
			$retval=null;
			exec('gpio write 7 1', $output, $retval);
			echo date('h:i:s') .' - Activation Ventilateur : gpio write 7 1 - Statut : ' . $retval . '<br>' ;
		}
		else
		{		
			// on ne régule pas en désactivant le ventilateur (insérer ici gpio write 7 0 )
			$output=null;
			$retval=null;
			exec('gpio write 7 0', $output, $retval);
			echo date('h:i:s') .' - Désactivation Ventilateur : gpio write 7 0 - Statut : ' . $retval . '<br>' ;
		}

		// Création d'un évèvenement dans la table Evenements
		$sql_insert_temp = "INSERT INTO evenements (DateCreation_evenements, Type_evenements, Valeur_evenements) VALUES (CURRENT_TIMESTAMP (), '$typ_event', $Valeur_Temperature)	";
		if (!$mysqli->query($sql_insert_temp))
		{
			echo "Échec lors l'insertion dans la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
			echo $sql_insert_temp . '<br>' ;
		}
		else
		{
			echo date('h:i:s') . " - Insertion dans la table Ok - " . $typ_event . " - Valeur " . $Valeur_Temperature . '<br>';		
		}

		/////////////////////////////////////////////
		// Traitement Régulation du taux d'humidité 
		/////////////////////////////////////////////
		if ($Simu_Saisie == "O")
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
			$Valeur_TauxHumid = 51; // Remplacer 30 par la valeur reçue par le capteur DHT11
			$typ_event = 'HUMID';
		}
		
		echo date('h:i:s') .' - Mode Simu : ' . $Simu_Saisie . ' - Valeur taux humidité simulé lue dans table Paramètre : ' . $Valeur_TauxHumid . '<br>' ;

		// Tests si température est supérieure à celle souhaitée (déclarée dans la table paramètre)
		if ($Valeur_TauxHumid > $Val_HUMID_Lue)
		{
			/*int $raw_adc = ($data[0] * 256 + $data[1]);
			if ($raw_adc > 32767)
			{
				$raw_adc -= 65535;
			}
			$tempC = $raw_adc * 4.096/32767.0;
			$voltage1 = $raw_adc / 1000;
			printf("valeur temperature : %d \n", $raw_adc)*/
			// On régule en activant la pompe à eau (insérer ici gpio write 11 1 )
			echo date('h:i:s') .' - Activation Pompe à eau : gpio write 11 1 '  . '<br>' ;
			
		}
		else
		{
			// on régule pas en désactivant la pompe à eau (insérer ici gpio write 11 0 )
			echo date('h:i:s') .' - Désactivation Pompe à eau : gpio write 11 0 '  . '<br>' ;
		}

		// Création d'un évèvenement dans la table Evenements
		$sql_insert_humid = "INSERT INTO evenements (DateCreation_evenements, Type_evenements, Valeur_evenements) VALUES (CURRENT_TIMESTAMP (), '$typ_event', $Valeur_TauxHumid)";
		if (!$mysqli->query($sql_insert_humid))
		{
			echo "Échec lors l'insertion dans la table : (" . $mysqli->errno . ") " . $mysqli->error . '<br>';	
			echo $sql_insert_humid . '<br>';
		}
		else
		{
			echo date('h:i:s') . " - Insertion dans la table Ok - " . $typ_event . " - Valeur " . $Valeur_TauxHumid . '<br>';		
		}

		// Fin programme si Fréquence boucle = 0 ou si indice Supérieur à 19
		if ( $Frequence_Saisie == 0 || $Indice > $nbr_boucles_saisie ) 
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
			exit;
		}

	}

	?>

</p Boucle_Regulation>
</fieldset>
<br>
<?=template_footer()?>
</html>
