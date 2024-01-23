<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
<title>Site d'annonce</title>
</head>
<div class="top">
<h1>Mes petites annonces</h1>
<form action="search.php" method="post">
Recherche par mots clés:
<input type="text" name="recherche" />
<br />
<input type="radio" name="mode" value="tous_les_mots">Tous les mots
<input type="radio" name="mode" value="un_mot" checked="checked">Au moins un mot
<input type="submit" value="Rechercher" name="rechercher" />
</form>
</div>


<body><fieldset>
    