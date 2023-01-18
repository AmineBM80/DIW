<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM `disc` JOIN `artist` ON disc.artist_id = artist.artist_id;");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO - Ajout</title>
</head>
<body>

    <h1>Saisie d'un nouvel artiste</h1>

    <a href="discs.php"><button>Retour à la liste des artistes</button></a>

    <br>
    <br>

    <form action ="script_disc_ajout.php" method="post" enctype="multipart/form-data">

        <label for="title_for_label">Title</label><br>
        <input type="text" name="title_for_label" id="title_for_label">
        <br><br>

        <label for="artist_for_label">Artist</label><br>
        <select name="artist_for_label" id="artist_for_label">
        <?php foreach ($tableau as $disc): ?>
            <option value="<?=$disc->artist_id?>"><?=$disc->artist_name?></option>
        <?php endforeach; ?>
        </select>
        <br><br>

        <label for="year_for_label">Year</label><br>
        <input type="text" name="year_for_label" id="year_for_label">
        <br><br>

        <label for="genre_for_label">Genre</label><br>
        <input type="text" name="genre_for_label" id="genre_for_label">
        <br><br>

        <label for="label_for_label">Label</label><br>
        <input type="text" name="label_for_label" id="label_for_label">
        <br><br>

        <label for="price_for_label">Price</label><br>
        <input type="text" name="price_for_label" id="price_for_label">
        <br><br>

        <label for="picture_for_label">Picture</label><br>
        <input type="file" name="picture_for_label" id="picture_for_label" value="Choisir une image">
        <br><br>

        <input type="submit" value="Ajouter">

    </form>
</body>
</html>