<?php
session_start();
if (isset($_GET["theme"])) {
    $_SESSION["theme"] = $_GET["theme"];
}
require_once "../api/theming.php";

?>

<!DOCTYPE html>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/mycss.css">
    <title>Bienvenue sur SITE</title>
</head>

<body class="<?= $color_back ?>">
    <?php include '../assets/components/header.php' ?>
    <main class="body_main <?= $color3 ?>">
        <div>BONJOUR</div>
        <p>Bienvenue sur mon site.</p>
    </main>
    <?php include '../assets/components/footer.php' ?>
</body>

</html>