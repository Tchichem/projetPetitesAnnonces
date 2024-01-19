<?php

// Import des fonctions
require_once 'functions.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un annonce. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'annonce avec l'id spécifié. 
if (isset($_GET['id_annonce'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id_annonce', FILTER_SANITIZE_NUMBER_INT);

    // Charger les informations de l'annonce depuis la BDD pour remplir le formulaire
    try {
        // Se connecter à la BDD avec la fonction connect() définie dans functions.php
        $db = connect();

        // Préparer $annonceQuery pour récupérer les informations de l'annonce
        $annonceQuery = $db->prepare('SELECT * FROM annonces WHERE id_annonce= :id_annonce');
        // Exécuter la requête
        $annonceQuery->execute(['id_annonce' => $id]);
        // Récupérer les données et les assigner à $annonce
        $annonce = $annonceQuery->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Afficher le message s'il y a une exception
        echo $e->getMessage();
    }

    // Fermer la connection à la BDD
    $annonceQuery=null;
    $db=null;
}

// Récupérer les annonces 
$annonces = getAnnonces();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Annonce Form</h1>
</div>
<div class='row'>
    <form method='post' action='add-edit-annonces.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $annonce['id_annonce'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='firstName'>Titre</label>
            <input type='text' name='titre' class='form-control' id='titre' placeholder='Enter titre' required autofocus value='<?= isset($annonce['titre']) ? htmlentities($annonce['titre']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='prix'>Prix</label>
            <input type='number' name='prix' class='form-control' id='prix' placeholder='Enter prix' required value='<?= isset($annonce['prix']) ? htmlentities($annonce['prix'])  : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once 'footer.php' ?>