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
            // Lecture du fichier et stockage de son contenu dans un tableau
            $lines = file('doc/ce_fichier.txt');

            // Début de la liste de liens
            echo '<ul>';

            // Parcours du tableau contenant les lignes du fichier
            foreach ($lines as $line) 
            {
            // Extraction de l'URL et du titre du lien à partir de la ligne
            $line = trim($line);
            $parts = explode(' ', $line);
            $url = $parts[0];
            $title = $parts[1];

            // Construction du lien hypertexte
            echo '<li><a href="' . $url . '">' . $title . '</a></li>';
            }

            // Fin de la liste de liens
            echo '</ul>';

            ?> 
        </body>
    </html>