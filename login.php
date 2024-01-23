<?php include 'header.php'; ?>


<?php
session_start();
if ($_POST["login"]=="admin" && $_POST["mdp"]=="admin"){
    $_SESSION["user"]=$_POST["login"];
    header('Location: index.php');
} 
if ($_POST["login"]!="admin" && $_POST["mdp"]!="admin"){
    echo "Identifiant et/ou mot de passe incorrect</br>";
} 
include 'footer.php';