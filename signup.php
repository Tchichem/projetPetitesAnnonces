<?php include 'header.php'; ?>

<form action="signup.php" method="post">
    <label for="login">Identifiant : </label>
    <input name="login" id="login" type="text">
</br>
    <label for="login">Email : </label>
    <input name="email" id="email" type="email">
</br>
    <label for="mdp">Mot de passe : </label>
    <input name="mdp" id="mdp" type="password">

    <button type="submit">OK</button>
</form>


<?php include 'footer.php';