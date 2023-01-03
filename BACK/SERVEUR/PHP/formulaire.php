<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="script.php" method="post"> 
                Nom : <input type="text" name="nom" size="20" maxlength="40" /> <br /> 
                Prenom : <input type="text" name="prenom" size="20" maxlength=40 /> 
                <input type="submit" value="ENVOYER" /> 
            </form>
            
            <br><br><br>

            <form action ="check.php" method="post"> 
                Tu utilises internet plutôt le :<br /> 
                <input type="checkbox" name="Fjour[]" value="Lundi" />Lundi<br />
                <input type="checkbox" name="Fjour[]" value="Mardi" />Mardi<br />
                <input type="checkbox" name="Fjour[]" value="Mercredi" />Mercredi<br />
                <input type="checkbox" name="Fjour[]" value="Jeudi" />Jeudi<br />
                <input type="checkbox" name="Fjour[]" value="Vendredi" />Vendredi<br />
                <input type="submit" name="Envoyer" value="ENVOYER" /> 
            </form>
            <br>
            <?php
                echo "bonjour " . $_REQUEST['prenom'] . " " . $_REQUEST['nom'] . "<br>";
                echo "Tu surfes sur le web en semaine plutôt le : "; 

                // Lecture du tableau 
                foreach ($_REQUEST["Fjour"] as $jour)      
                { 
                    echo " $jour - "; 
                } 
            ?>
        </body>
    </html>