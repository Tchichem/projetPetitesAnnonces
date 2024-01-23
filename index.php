<?php include 'header.php';
session_start();
error_reporting(E_ALL);
?>

<fieldset>
<div id="left">	
	<ul>
	<li><a href="index.php">Accueil</a></li>
	<li><a href="javascript:history.go(-1)">Retour</a></li>
</ul>
<h2>Catégories</h2>
<ul>
<li><a> Véhicule </a></li>
<li><a> Immobilier </a></li>
<li><a> Emploi </a></li>
<li><a> Rencontre </a></li>
<li><a> Mode </a></li>
<li><a> Objets </a></li>
<li><a> Animaux </a></li>

<li><a href='annonces.php' role='button'>Toutes les annonces</a></li>
</ul>
</div>
<div id="right">
<ul>
<?php 
if (isset($_SESSION["user"])){ ?>
	<li><a href='login.php' role='button'> Panneau d'administration </a></li>
	<li><a> Modifier annonces </a></li>
	<li><a> Créer annonce </a></li>
    <li><form method="post">
    <input type="submit" name="deconnect" value="Déconnexion" />
</form>
</ul>
<?php if (isset($_POST["deconnect"])){
    session_destroy();
    header('Location: index.php');
}
echo "</br>"; ?>
    <?php } elseif (empty($_SESSION["user"])){ ?>
		<h1>Connexion</h1>
<form action="index.php" method="post">
    <label for="login">Identifiant : </label>
    <input name="login" id="login" type="text">
</br>
    <label for="mdp">Mot de passe : </label>
    <input name="mdp" id="mdp" type="password">

    <button type="submit">OK</button>
</form>
	<a href="signup.php">Créer un compte </a></br>
	<a href="forgot.php"> J'ai oublié mes identifiants </a>
<?php } 
if (isset($_POST["login"])){
	if ($_POST["login"]=="admin" && $_POST["mdp"]=="admin"){
	$_SESSION["user"]=$_POST["login"];
	} else {
	   if ($_POST["login"]!="admin" && $_POST["mdp"]!="admin"){
	   echo "</br>Identifiant et/ou mot de passe incorrect</br>";
   } 
}
} 
?>
</ul>
</div>
</fieldset>

<?php include 'footer.php';