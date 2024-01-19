<?php include 'header.php';
session_start();
error_reporting(E_ALL);
?><div id="top"> 
<ul>
	<li><a href="index.php">Accueil</a></li>
	<li><a href="javascript:history.go(-1)">Retour</a></li>
</ul>
<h1>Mes petites annonces</h1>
</div>
<div id="bar">
<!-- formulaire de recherche par mot clé -->
<form action="search.php" method="post">
Recherche par mots clés:
<input type="text" name="recherche" />
<br />
<input type="radio" name="mode" value="tous_les_mots">Tous les mots
<input type="radio" name="mode" value="un_mot" checked="checked">Au moins un mot
<input type="submit" value="Rechercher" name="rechercher" />
</form>
</div>
<div id="main">
<div id="column_left">
<h2>Catégories</h2>
<ul>
<li><a> Véhicule </a></li>
<li><a> Immobilier </a></li>
<li><a> Emploi </a></li>
<li><a> Rencontre </a></li>
<li><a> Mode </a></li>
<li><a> Objets </a></li>
<li><a> Animaux </a></li>

<li><a class='btn btn-primary btn-lg' href='annonces.php' role='button'>Toutes les annonces</a></li>
</ul>
</div>
<div id="column_right">
<ul>
<?php if (isset($_SESSION["user"])){ ?>
	<li><a class='btn btn-primary btn-lg' href='login.php' role='button'> Panneau d'administration </a></li>
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
	<li><a class='btn btn-primary btn-lg' href='login.php' role='button'> Je m'identifie </a></li>
	<li><a> Je crée un compte </a> (nécessaire pour déposer une annonce)</li>
	<li><a> J'ai oublié mes identifiants </a></li>
<?php } ?>

</ul>
</div>
<!-- on fait remonter les deux colonnes -->
<div class="spacer"></div>
<!-- fermeture de #main -->
</div>
<!-- fermeture de #container -->
</div>
<div id="footer">
<a href="condition.php"> Conditions d'utilisation</a> | <a href="propos.php"> A propos de ce site</a> | <a href= "mailto:contact@example.com"> Nous contacter</a>
</div>
<?php include 'footer.php';
