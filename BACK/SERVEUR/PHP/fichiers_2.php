<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
        <form method="post" enctype="multipart/form-data" action="fichiers_2.php">
            <input type="file" name="fichier">
            <input type="submit" value="Envoyer">
        </form>

            <?php
                var_dump($_FILES);

                // On met les types autorisés dans un tableau (ici pour une image)
                $aMimeTypes = array("img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff");

                // On extrait le type du fichier via l'extension FILE_INFO 
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
                finfo_close($finfo);

                if (in_array($mimetype, $aMimeTypes))
                {
                    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
                    déplacer et renommer le fichier */

                } 
                else 
                {
                // Le type n'est pas autorisé, donc ERREUR

                echo "Type de fichier non autorisé";    
                exit;
                }

                $tmp_file = $_FILES['fichier']['tmp_name'];
                $target_file = "img/" . $_FILES['fichier']['name'];
                move_uploaded_file($tmp_file, $target_file);
                
            ?> 
        </body>
    </html>