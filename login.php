<h1>Connexion</h1>
<form action="index.php" method="post">
    <label for="login">Identifiant : </label>
    <input name="login" id="login" type="text">
</br>
    <label for="mdp">Mot de passe : </label>
    <input name="mdp" id="mdp" type="password">

    <button type="submit">OK</button>
</form>

<?php
session_start();
if ($_POST["login"]=="admin" && $_POST["mdp"]=="admin"){
    $_SESSION["user"]=$_POST["login"];
    header('Location: index.php');
} 
if ($_POST["login"]!="admin" && $_POST["mdp"]!="admin"){
    echo "Identifiant et/ou mot de passe incorrect</br>";
} 