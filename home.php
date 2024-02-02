
<div id="left">	
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
<div class="home">
		<?php if (!$logged):?>
		<a class="button" href="?p=signup">Créer un compte</a>
		<a class="button" href="?p=signup">Se connecter</a>
		<?php else:?>
		<a class="button" href="?p=deconnect">Se déconnecter</a>
		<?php endif;?>
	</div>
?>
</ul>
</div>
</fieldset>

