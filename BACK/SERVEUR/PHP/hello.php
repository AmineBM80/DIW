<?php
    // Fichier 'hello.php'

    include("fonctions_2.php"); 
    $message = "Hello world !";
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inclusion de fichiers PHP</title>
        <link rel="stylesheet" href="css/style.css">        
    </head>
    <body>
        <?php 
            $message= "Welcome to AFPA !"; 
            writeMessage($message); 
        ?>
        <br>
        <?php 
            writeMessage("Bonjour tout le monde !"); 
        ?>
    <script src="js/scripts.js"></script>
    </body>
</html>
