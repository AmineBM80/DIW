<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc INNER JOIN artist
    ON disc.artist_id = artist.artist_id");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid"> 
        <div class="row p-3">
            <h1 class="col-10">Liste des disques (15)</h1>
            <a href="discs_new.php" class="btn btn-primary col-2">Ajouter</a>
        </div>
            <table>    
                <?php foreach ($tableau as $disc): ?>
                <tr>
                    <td><img src="doc/img/<?= $disc->disc_picture ?>" width="200px"/></td>
                    <td><h5><?= $disc->disc_title ?></h5></td>
                    <td><h6><?= $disc->artist_name ?></h6></td>
                    <td><h6>Label :<?=$disc->disc_label ?></h6></td>
                    <td><h6>Year :<?=$disc->disc_year ?></h6></td>
                    <td><h6>Genre :<?=$disc->disc_genre ?></h6></td>
                    <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
                    <td><a href="disc_detail.php?id=<?= $disc->disc_id ?>">Détail</a></td>
                </tr>
                <?php endforeach; ?>

            </table>
</div>
</body>
</html>