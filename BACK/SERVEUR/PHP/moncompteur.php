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
                   // On ouvre le fichier moncompteur.txt
                $fichier = fopen("doc/moncompteur.txt","r+");

                // on lit la première ligne du fichier, le résultat est stocké dans la variable $visiteurs
                $visiteurs = fgets($fichier);

                // on ajoute 1 au nombre de visiteurs
                $visiteurs++;

                // on se positionne au début du fichier
                fseek($fichier,0);

                // on écrit le nouveau nombre dans le fichier
                fputs($fichier,$visiteurs);

                // on referme le fichier moncompteur.txt
                fclose($fichier);

                // on indique sur la page le nombre de visiteurs
                echo "$visiteurs personnes sont passées par ici";
            ?> 
        </body>
    </html>