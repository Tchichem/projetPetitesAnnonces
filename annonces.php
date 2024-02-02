<?php

require_once("functions.php");
require_once 'header.php';
session_start();
try {
 $annonces=getAnnonces();
} catch (Exception $e) {
    echo $e->getMessage();
}

 ?>

<?php 
if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
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
<?php if (isset($_SESSION['is_login'])):?>
<div class='row'>
<div class='col'>
    <a href="annonces.php?p=annonce-form" role='button'>Ajouter annonce</a>
</div>
<?php else: ?>
</div>
<?php endif;?>

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
                    <?php if (isset($_SESSION['is_login'])):?><td><a href='annonces-form.php?id=<?= $annonce['id_annonce'] ?>' role='button'>   Modifier</a></br></td>
                    <td><a href='delete-annonces.php?id=<?= $annonce['id_annonce'] ?>' role='button'>   Supprimer</a></br></td><?php endif;?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once 'footer.php' ?>