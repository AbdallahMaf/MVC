<?php
//connexion a la base de données
include_once "connectdb.php";
//récupération de l'id dans le lien
$id = $_GET['id'];
//requête de suppression
$req = mysqli_query($con, "DELETE FROM etudinat WHERE id = $id");
//redirection vers la page index.php
header("Location:index.php");
