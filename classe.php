<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Classes</title>
    <link rel="stylesheet" href="View/style.css">
</head>

<body>
    <div class="container">
        <a href="insert.php" class="Btn_add"> <img src="View/images/plus.png"> Ajouter Etudiant</a>
        <a href="insertclasse.php" class="Btn_add"> <img src="View/images/plus.png">Ajouter une Classe</a>

        <table>
            <tr id="items">
                <th>Classe</th>
                <th>Nombre d'etudiant</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            //inclure la page de connexion
            include_once "connectdb.php";
            //requête pour afficher la liste des etudiants
            $req = mysqli_query($con, "SELECT * FROM classe");
            if (mysqli_num_rows($req) == 0) {
                //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                echo "Il n'y a pas encore de classe ajouter !";
            } else {
                //si non , affichons la liste de tous les etudiants
                while ($row = mysqli_fetch_assoc($req)) {
            ?>
                    <tr>
                        <td><?= $row['nom'] ?></td>
                        <td></td>


                        <!--Nous alons mettre l'id de chaque etudiants dans ce lien -->
                        <td><a href="update.php?id=<?= $row['id'] ?>"><img src="View/images/pen.png"></a></td>
                        <td><a href="delete.php?id=<?= $row['id'] ?>"><img src="View/images/trash.webp"></a></td>
                    </tr>
            <?php
                }
            }
            ?>


        </table>




    </div>
</body>

</html>