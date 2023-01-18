<?php
    // Récupération du Nom :
    if (isset($_POST['title_for_label']) && $_POST['title_for_label'] != "") {
        $title = $_POST['title_for_label'];
    }
    else {
        $title = Null;
    }

    $artist = (isset($_POST['artist_for_label']) && $_POST['artist_for_label'] != "") ? $_POST['artist_for_label'] : Null;
    $year = (isset($_POST['year_for_label']) && $_POST['year_for_label'] != "") ? $_POST['year_for_label'] : Null;
    $genre = (isset($_POST['genre_for_label']) && $_POST['genre_for_label'] != "") ? $_POST['genre_for_label'] : Null;
    $label = (isset($_POST['label_for_label']) && $_POST['label_for_label'] != "") ? $_POST['label_for_label'] : Null;
    $price = (isset($_POST['price_for_label']) && $_POST['price_for_label'] != "") ? $_POST['price_for_label'] : Null;
    $img = (isset($_POST['picture_for_label']) && $_POST['picture_for_label'] != "") ? $_POST['picture_for_label'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($title == Null || $artist == Null || $year == Null || $genre == Null || $label == Null || $price == Null) {
        header("Location: discs_new.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();


    try {
        // Construction de la requête INSERT sans injection SQL :
        $requete = $db->prepare("INSERT INTO disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price, disc_picture) 
                                            VALUES (:title, :artist, :year, :genre, :label, :price, :img);");

        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_INT);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        $requete->bindValue(":img", $img, PDO::PARAM_STR);

        // Lancement de la requête :
        $requete->execute();

        // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
        $requete->closeCursor();
    }

    // Gestion des erreurs
    catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_ajout.php)");
    }

    // Si OK: redirection vers la page artists.php
    header("Location: discs.php");

    // Fermeture du script
    exit;
?>