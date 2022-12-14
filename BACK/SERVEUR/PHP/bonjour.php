<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <?php 
                echo "Bonjour le monde<br>";
                echo 'Bonjour le monde ';
                $bonjour = "Bonjour le monde "; 
                echo "<br><b>$bonjour</b>";
                echo "<br>Affichage d'un guillemet double : \" <br>";
                echo "Bonjour le monde,\n comment allez-vous ?<br><br><br>";

                $euro=6.55957;
                printf("%.2f FF<br />",$euro);
                $money1 = 68.75;
                $money2 = 54.35;
                $money = $money1 + $money2;
                // echo $money affichera "123.1";
                echo "affichage sans printf : " . $money . "<br />";
                $monformat = sprintf("%01.2f", $money);
    
                // echo $monformat affichera "123.10"
                echo "affichage avec printf : " . $monformat . "<br />";
    
                $year="2002";
                $month="4";
                $day="5";
                $varDate = sprintf("%04d-%02d-%02d", $year, $month, $day) ;
    
                // echo $varDate affichera "2002-04-05"
                echo "affichage avec sprintf : " . $varDate;

                $myVar = "KO";

                if ($myVar != "OK") 
                {
                    error_log("Ouh là pas bien");
                    // Message enregistré dans le fichier 'C:/<repertoire_logs>/php_error.log' 
                }

                echo "Fichier : " . __FILE__ . ", ligne : " . __LINE__ ;
                
                $message = __FILE__." l.".__LINE__." : Ouh là pas bien ";
                error_log($message); 

            ?> 
        </body>
    </html>