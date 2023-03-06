<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="View/style.css">
</head>

<body>
    <?php
    //vérifier que le bouton ajouter a bien été cliqué
    if (isset($_POST['button'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        //verifier que tous les champs ont été remplis
        if (isset($nom) && isset($prenom)) {
            //connexion à la base de donnée
            include_once "connectdb.php";
            //requête d'ajout
            $req = mysqli_query($con, "INSERT INTO etudiant VALUES(NULL, '$nom', '$prenom')");
            if ($req) { //si la requête a été effectuée avec succès , on fait une redirection
                header("location: index.php");
            } else { //si non
                $message = "Etudiant non ajouté";
            }
        } else {
            //si non
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="View/images/back.webp"> Retour</a>
        <h2>Ajouter un Etudiant</h2>
        <p class="erreur_message">
            <?php
            // si la variable message existe , affichons son contenu
            if (isset($message)) {
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Classe</label>
            <input type="text" name="classse" disabled>
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>