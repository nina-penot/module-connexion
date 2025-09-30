<?php
//Doit dire "Bonjour, admin!"
//Peut changer mot de passe
//Affiche le tableau de données
$username = "";
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
        <div>BIENVENUE, <?= $username; ?></div>
    </main>
    <?php include '../assets/components/footer.php' ?>
</body>