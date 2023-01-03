
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inclusion de fichiers PHP</title>
        <link rel="stylesheet" href="css/style.css">        
    </head>
    <body>
    <?php
        function ConnexionBase() {

            try 
            {
                $connexion = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'ymwgpns');
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connexion;

            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage() . "<br>";
                echo "N° : " . $e->getCode();
                die("Fin du script");
            }
        }
    ?>
    </body>
</html>
