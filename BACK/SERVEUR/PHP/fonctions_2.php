<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inclusion de fichiers PHP</title>
        <link rel="stylesheet" href="css/style.css">        
    </head>
    <body>
        <?php
            function writeMessage($text) {
            $html = "<h1>".$text."</h1>";
            echo $html;
            }  
        ?>
    </body>
</html>
