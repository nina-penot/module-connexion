<?php

session_start();
//Doit dire "Bonjour, username!"
//Peut changer le mot de passe, nom, prenom, username
if (isset($_SESSION["user"])) {
    $username = $_SESSION["user"];
} else {
    $username = "Vous n'êtes pas connécté correctement, veuillez vous connecter.";
    header("Location: ./index.php");
}

?>

<!DOCTYPE html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/mycss.css">
    <title>Bienvenue sur SITE</title>
</head>

<body>
    <?php include '../assets/components/header.php' ?>
    <main class="body_main">
        <div>BIENVENUE, <?= $username; ?> !</div>
        <?php include '../assets/components/info_change.php' ?>
    </main>
    <?php include '../assets/components/footer.php' ?>
</body>