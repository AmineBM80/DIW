<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <form action="/BACK/SERVEUR/PHP/monscript.php">
                <div class="form-group">
                    <fieldset>
                        <legend class="h2"> Vos Coordonnées</legend>
                        <label for="nom">Votre Nom*:</label>
                        <input class="form-control" class="form-control" type="text" name="nom" id="nom"><br>
                        <label for="prenom">Votre prénom*:</label><input class="form-control" type="text" name="prenom" id="prenom"><br>
                        <br>
                        <label for="sexe">Sexe* :</label>
                        <input type="radio" name="sexe[]" value="Féminin" id="sexe"> Féminin
                        <input type="radio" name="sexe[]" value="Masculin" > Masculin 
                        <br>
                        <br>
                        <label for="date">Date de naissance* :</label><input class="form-control" type="date" name="ddn" id="date"><br>
                        <label for="cp">Code postal* :</label><input class="form-control" type="text" name="cp" id="cp"><br>
                        <label for="adresse">Adresse :</label><input class="form-control" type="text" name="adresse" id="adresse"><br>
                        <label for="ville">Ville :</label><input class="form-control" type="text" name="ville" id="ville"><br>
                        <label for="email_2"> Email* :</label><input class="form-control" type="text" placeholder="dave.loper@afpa.fr" name="email_2" id="email_2" ><br>

                    </fieldset>
                
                    <br>
                
                    
                    <fieldset>
                
                        <legend class="h2">Votre demande </legend>
                
                        <label for="sujet">Sujet* :</label>
                        <select id="sujet">
                        <option value="veuillez séléctionner un sujet" selected>Veuillez séléctionner un sujet</option>
                        <option value="commandes">Mes Commandes
                        
                        <option value="autres">Autres</option>
                        </select>    
                        <br>
                        <label for="votre_question">Votre question* :</label>
                        <textarea class="form-control" name="votre_question" id="votre_question" cols="30" rows="3"></textarea>
                
                    </fieldset>
                    
                    <br>
                
                    <input type="Checkbox" name="CGU" value="CGU"> * J'accepte le traitement informatique de ce formulaire
                
                    <br>
                    <br>
                    
                    <button class="btn btn-dark" type="submit">Envoyer</button>
                    <button class="btn btn-dark" type="reset">Annuler</button>
                </div>
            </form>

            <?php
                echo "bonjour " . $_REQUEST['prenom'] . " " . $_REQUEST['nom'] . "<br>";
                echo "Votre email est ". $_REQUEST['email_2']."<br>";

                echo "Tu es de sexe ";
                foreach ($_REQUEST["sexe"] as $sexe)      
                {
                    echo " $sexe - "; 
                }

                echo "Ta date de naissance est :" . $_REQUEST["ddn"]."<br>";
                echo "Tu habites au ". $_REQUEST["adresse"]. " ". $_REQUEST["cp"]." ".$_REQUEST["ville"]."<br>";

            ?>
        </body>
    </html>