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

                function lien ($link, $titre) 
                {
                    echo "<a href=". $link . ">". $titre. "</a>";
                    
                }

                lien("https://www.reddit.com/", "Reddit Hug");

                echo "<br><br><br><br>";

                $tab = array(4, 3, 8, 2);
                $resultat = array_sum($tab);
                echo $resultat;

                echo "<br><br><br><br>";

                function complex_password($password)
                {
                    $len = strlen($password);
                    if($len < 8)
                    {
                        echo "Mot de passe trop court";
                    }
                    else
                    {
                        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $password)) 
                        {
                            echo "Mot de passe conforme";
                        }
                        else 
                        {
                            echo "Mot de passe non conforme";
                        }   
                    }
                }
                complex_password("TopSecret42");
            ?>
        </body>
    </html>