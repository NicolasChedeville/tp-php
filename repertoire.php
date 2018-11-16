<?php
if($_POST){
    foreach($_POST as $key => $value){
        echo "$key : $value<br>";
    }
    if($_POST['sexe'] == 'Homme'){
        $sexe='m';
    }else{
        $sexe='f';
    }
    $bdd = new PDO('mysql:host=localhost;dbname=repertoire;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO annuaire(nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES(:nom, :prenom, :telephone, :profession, :ville, :codepostal, :adresse, :date_de_naissance, :sexe, :description)');
    $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $req->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
    $req->bindValue(':profession', $_POST['profession'], PDO::PARAM_STR);
    $req->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
    $req->bindValue(':codepostal', $_POST['codePostal'], PDO::PARAM_INT);
    $req->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $req->bindValue(':date_de_naissance', $_POST['datedenaissance'], PDO::PARAM_STR);
    $req->bindValue(':sexe', $sexe, PDO::PARAM_STR);
    $req->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $req->execute();

    // $req->execute(array(
    //     'nom' => $_POST['nom'],
    //     'prenom' => $_POST['prenom'],
    //     'telephone' => $_POST['telephone'],
    //     'profession' => $_POST['profession'],
    //     'ville' => $_POST['ville'],
    //     'codepostal' => $_POST['codePostal'],
    //     'adresse' => $_POST['adresse'],
    //     'date_de_naissane' => $_POST['datedenaissance'],
    //     'sexe' => $_POST['sexe'],
    //     'description' => $_POST['description']
    //     ));
}
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
        <h1 class="text-center">Connexion</h1>
        
        <form method="POST" action="" class="col-md-6 offset-md-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="Nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="Nom" placeholder="Votre nom">
                </div>
                <div class="form-group col-md-6">
                <label for="Prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="Prenom" placeholder="Votre prénom">
                </div>
                <div class="form-group col-md-12">
                <label for="Profession">Prfession</label>
                <input type="text" name="profession" class="form-control" id="Profession" placeholder="Votre profession">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="Address">Address</label>
                    <input type="text" name="adresse" class="form-control" id="Address" placeholder="Votre adresse">
                </div>
                <div class="form-group col-md-6">
                    <label for="CodePostal">Code postal</label>
                    <input type="text" name="codePostal" class="form-control" id="CodePostal" placeholder="Code Postal">
                </div>
                <div class="form-group col-md-6">
                    <label for="Ville">Ville</label>
                    <input type="text" name="ville" class="form-control" id="Ville">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="DateDeNaissance">Date de naissance</label>
                <input type="date" name="datedenaissance" class="form-control" id="DateDeNaissance">
                </div>
                <div class="form-group col-md-6">
                <label for="Telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="Telephone">
                </div>
                <div class="form-group col-md-4">
                <label for="Sexe">Sexe</label>
                <select id="inputState" name="sexe" class="form-control">
                    <option selected>Homme</option>
                    <option>Femme</option>
                </select>
                </div>
                <div class="form-group col-md-12">
                <label for="Description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="col-md-3 btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
    
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>