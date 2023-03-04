<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="View/style.css">
</head>

<body>
    <?php

    //connexion à la base de donnée
    include_once "connectdb.php";
    //on récupère le id dans le lien
    $id = $_GET['id'];
    //requête pour afficher les infos d'un etudiant
    $req = mysqli_query($con, "SELECT * FROM etudiant WHERE id = $id");
    $row = mysqli_fetch_assoc($req);


    //vérifier que le bouton ajouter a bien été cliqué
    if (isset($_POST['button'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        //verifier que tous les champs ont été remplis
        if (isset($nom) && isset($prenom)) {
            //requête de modification
            $req = mysqli_query($con, "UPDATE etudiant SET nom = '$nom' , prenom = '$prenom' WHERE id = $id");
            if ($req) { //si la requête a été effectuée avec succès , on fait une redirection
                header("location: index.php");
            } else { //si non
                $message = "Etudiant non modifié";
            }
        } else {
            //si non
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="View/images/back.webp"> Retour</a>
        <h2>Modifier l'etudiant : <?= $row['nom'] ?> </h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $row['nom'] ?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
            <!-- <label>Classe</label>
            <input type="text" name="classe" value="<?= $row['classe'] ?>"> -->
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>

</html>