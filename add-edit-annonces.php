<?php

require_once 'functions.php';

if (!empty($_POST)) {
    // Récupération des champs du formulaire
    $titre = $_POST['titre'] ?? '';
    $prix = filter_input(INPUT_POST, 'prix_vente', FILTER_SANITIZE_NUMBER_INT);

    // Création de l'objet BDD
    $db = connect();

    // Si un abo a un ID, il est déjà enregistré en BDD, donc on le met à jour, sinon on le crée.
    if (empty($_POST['id_annonce'])) {
        // L'abonnement n'est pas dans la BDD, on le crée
        try {
            // Préparation de la requête d'insertion
            $createAnnonceStmt = $db->prepare('INSERT INTO annonces (titre, prix_vente) VALUES (:titre, :prix_vente)');
            // Exécution de la requête
            $createAnnonceStmt->execute(['titre'=>$titre, 'prix_vente'=>$prix_vente]);
            // Vérification qu'une ligne a bien été impactée avec rowCount(). Si oui, on estime que la requête a bien été passée, sinon, elle a sûrement échoué.
            if ($createAnnonceStmt->rowCount()) {
                // Une ligne a été insérée => message de succès
                $type = 'success';
                $message = 'Annonce ajoutée';
            } else {
                // Aucune ligne n'a été insérée => message d'erreur
                $type = 'error';
                $message = 'Annonce non ajoutée';
            }
        } catch (Exception $e) {
            // Une exception a été lancée, récupération du message de l'exception
            $type = 'error';
            $message = 'Exception message: ' . $e->getMessage();
        }
    } else {
         // L'abonnement existe en BDD, on le met à jour
        // Récupération de l'ID de l'abo
        $id = filter_input(INPUT_POST, 'id_annonce', FILTER_SANITIZE_NUMBER_INT);

        try {
            // Préparation de la requête de mis à jour
            $updateAnnonceStmt = $db->prepare('UPDATE annonces SET titre=:titre, prix_vente=:prix_vente WHERE id_annonce=:id_annonce');
            // Exécution de la requête
           $updateAnnonceStmt->execute(['titre'=>$titre, 'prix_vente'=>$prix_vente, 'id_annonce'=>$id_annonce]);
            // Vérification qu'une ligne a bien été impactée avec rowCount(). Si oui, on estime que la requête a bien été passée, sinon, elle a sûrement échoué.
            if ($updateAnnonceStmt->rowCount()) {
                // Une ligne a été mise à jour => message de succès
                $type = 'success';
                $message = 'Annonce mise à jour';
            } else {
                // Aucune ligne n'a été mise à jour => message d'erreur
                $type = 'error';
                $message = 'Annonce non mise à jour';
            }
        } catch (Exception $e) {
            // Une exception a été lancée, récupération du message de l'exception
            $type = 'error';
            $message = 'Annonce non mise à jour: ' . $e->getMessage();
        }
    }
    // Fermeture des connexions à la BDD
    $createAnnonceStmt = null;
    $updateAnnonceStmt = null;
    $db = null;

    // Redirection vers la page principale des abos en passant le message et son type en variables GET
    header('location:' . 'annonces.php?type=' . $type . '&message=' . $message);
}