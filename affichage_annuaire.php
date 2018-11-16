<?php
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=repertoire;charset=utf8', 'root', '');
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM annuaire');
    $req_nbr_homme = $bdd->query('SELECT COUNT(sexe) FROM annuaire WHERE sexe="m"');
    $nbr_homme =  $req_nbr_homme->fetch();
    $req_nbr_femme = $bdd->query('SELECT COUNT(sexe) FROM annuaire WHERE sexe="f"');
    $nbr_femme =  $req_nbr_femme->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Repertoire</title>
</head>
<body>
    
    <div class="container">
        <h1 class="text-center">Affichage annuaire</h1>
        <div class="row">
            <div class="col-md-12 text-center">
                Il y a <?= $nbr_homme[0]; ?> hommes et <?= $nbr_femme[0]; ?> femmes.
            </div>
            
            <?php
                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch()){
                    if($donnees['sexe'] == 'm'){
                        $sexe='Homme';
                    }else{
                        $sexe='Femme';
                    }
                    ?>
            <div class="col-md-6">
                    <?php
                    echo "Nom : $donnees[nom]<br>
                        Prénom : $donnees[prenom]<br>
                        Numéro de téléphone : $donnees[telephone]<br>
                        Profession : $donnees[profession]<br>
                        Adresse : $donnees[adresse]<br>
                        Code postal : $donnees[codepostal] - 
                        Ville : $donnees[ville]<br>
                        Date de naissance : $donnees[date_de_naissance]<br>
                        Sexe : $sexe<br>
                        Description : $donnees[description]<br><br>
                        salut Nico alors pas la peine de chercher on mettera ça !!!!!!!!";
                    ?>
            </div>
            <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            
        </div>
    </div>
    
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>