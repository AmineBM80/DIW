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
        // EXO 1
        // -----
        // for ($a = 1; $a < 151; $a=$a+2)
        // {
        //     echo "$a<br>";
        // }
        ///////////////////////////////////////////////////
        ///////////////////////////////////////////////////
        // EXO 2
        // -----
        // for ($b = 1 ; $b<501; $b++)
        // {
        //     echo "$b Je dois faire des sauvegardes régulières de mes fichiers <br>";
        // }
        ///////////////////////////////////////////////////
        ///////////////////////////////////////////////////
        // EXO 3
        // $c = 0;
        // $d = 0;
        // $e = 0;
        // for ($i = 0; $i<13; $i++)
        // {
        //     echo"<table>";
        //     echo"<th> $i </th>";
        //     while ($i<13)
        //     {
        //         $e = $c * $d;
        //         echo"<tr> $e </tr>";
        //     }
        //     echo"</table>";

        // }
        ///////////////
        // TEST 2
        // for ($i=0; $i < 13; $i++)
        // {
        //     echo"<table>";
        //     echo"<th> $i </th>";
        //     for ($j=0; $j < 13; $j++)
        //     {
        //         $r = $i*$j;
        //         echo "<tr> $r </tr>";
        //     }
        //     echo "</table>";
        // }
        //////////////
        // TEST 3
        // function tableMultiplication($nombre)
        // {
        //     Echo "<table><thead><tr><th> Table de multiplication de '.$nombre '</th></tr></thead></table>";
     
        //     for ($i = 1; $i < 13; $i++)
        //     {
        //         echo $i*$nombre . " ";
        //     }
        // }
     
        // for ($i = 1; $i < 13; $i++)
        // {
        //     tableMultiplication($i);
        // }
        ///////////////
        // TEST 4
        function table($nbr, $nbr2)
        {
            $table = '<table border="1">';
            for ($a=0; $a <= $nbr; $a++) 
            {
                $table .= '<tr>';
                for ($b=0; $b <= $nbr2 ; $b++) 
                {
                    $table .= '<td>'.$a*$b.'</td>';
                }
                $table .= '</tr>';
            }
            $table .= '</table>';
            return $table;
        }
        
        echo table(12, 12);


    ?>
</body>
</html>