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
                $date_test = "2019-07-14";
                $good_format=strtotime ($date_test);
                echo date('W',$good_format);

                echo "<br> <br> <br>";

                $date_ajrd = new DateTime("2022-12-15");
                $date_fin_form =new DateTime("2023-02-03");

                $intvl = $date_ajrd -> diff($date_fin_form);

                echo $intvl->y . " année, " . $intvl->m." mois et ".$intvl->d." jours";
                echo "<br>";
                echo $intvl->days . " jours ";

                echo "<br> <br> <br>";

                function bissextile($annee) 
                {
                    if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) 
                    {
                        // Année bissextile
                        echo "l'année ".$annee. " est bissextile";
                    } 
                    else 
                    {
                        // Année NON bissextile
                        echo"l'année ".$annee. " n'est pas bissextile";
                    }
                }

                bissextile("2020");

                echo "<br> <br> <br>";

                function isValid($date, $format = 'Y-m-d')
                {
                    $dt = DateTime::createFromFormat($format, $date);
                    return $dt && $dt->format($format) === $date;
                }

                function val($x)
                {
                    if(isValid($x)== FALSE)
                    {
                        echo "date non valide";
                    }
                    else
                    {
                        echo "date valide";
                    }
                }

                val('2019-32-17');

                echo "<br> <br> <br>";

                date_default_timezone_set('Europe/Paris');
                $date_now = date('h:i');
                echo $date_now;

                echo "<br> <br> <br>";

                $date_m1 = date('d-m-y h:i:s', strtotime('+1month'));
                echo $date_m1;

                echo "<br> <br> <br>";

                $timestamp_1 = 1000200000;
                $format_1 = 'd-m-y h:i:s';

                echo date($format_1, $timestamp_1)."<br>";
                echo "Les attentats du 11 septembre 2001";

            ?>
        </body>
    </html>