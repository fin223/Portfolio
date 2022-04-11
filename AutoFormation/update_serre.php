<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body> 
        <?php
            $servname = "localhost"; $dbname = "serre_horticole"; $user = "Lucas"; $pass = "Maig-3399";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $req1 = $dbco->prepare("UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = 25 WHERE Type_Parametres = 'TEMP';");
                $req1->bindParam(':TEMP', $age, PDO::PARAM_INT);
                $req1->execute();

				$req2 = $dbco->prepare("UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = 45 WHERE Type_Parametres = 'HUMID';");
                $req2->bindParam(':HUMID', $age, PDO::PARAM_INT);
                $req2->execute();

				$req3 = $dbco->prepare("UPDATE parametres SET Maj_Parametres = CURRENT_TIMESTAMP (), Valeur_Parametres = 4 WHERE Type_Parametres = 'FREQ';");
                $req3->bindParam(':FREQ', $age, PDO::PARAM_INT);
                $req3->execute();

            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>