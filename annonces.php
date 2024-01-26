<?php

require_once("functions.php");
try {
 $annonces=getAnnonces();
} catch (Exception $e) {
    echo $e->getMessage();
} ?>

<?php require_once 'header.php' ?>

<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
    <h1>Annonces</h1>
</div>
<center>
<div class='row'>
    <div class='col'>
        <a href='annonces-form.php' role='button'>Ajouter annonce</a>
    </div>
</div>
</br></br>
<div class='row'>
    <table class='tb'>
        <thead>
            <tr>
                <th scope='col'>N° Annonce</th>
                <th scope='col'>Titre</th>
                <th scope='col'>Prix</th>
                <th scope='col'>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annonces as $annonce) : ?>
                <tr>
                    <td><?= $annonce['id_annonce'] ?></td>
                    <td><?= $annonce['titre'] ?></td>
                    <td><?= $annonce['prix_vente'] ?></td>
                    <td><?= $annonce['description'] ?></td>
                    <td><a href='annonce.php?id=<?= $annonce['id_annonce'] ?>' role='button'>   Consulter</a></br></td>
                    <td><a href='annonces-form.php?id=<?= $annonce['id_annonce'] ?>' role='button'>   Modifier</a></br></td>
                    <td><a href='delete-annonces.php?id=<?= $annonce['id_annonce'] ?>' role='button'>   Supprimer</a></br></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once 'footer.php' ?>