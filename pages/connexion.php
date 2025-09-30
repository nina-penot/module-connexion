<?php
//code
?>

<!DOCTYPE html>
<html>

<!-- HEAD -->

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/mycss.css">
    <title>Connexion...</title>
</head>

<!-- BODY -->

<body>
    <?php include '../assets/components/header_forms.php' ?>
    <main class="body_main">
        <form class="form_block" action="" method="post">
            <div class="form_title">Se connecter</div>
            <div>Login</div>
            <input name="login" type="text" placeholder="Nom utilisateur...">
            <div>Mot de passe</div>
            <input name="pass" type="text" placeholder="Mot de passe...">
            <input name="submit" type="submit" value="SE CONNECTER">
        </form>
    </main>
</body>

</html>