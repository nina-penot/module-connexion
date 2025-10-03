<?php
session_start();
require "../api/theming.php";
require "../api/library.php";

//Doit dire "Bonjour, admin!"
//Peut changer mot de passe
//Affiche le tableau de données
$username = "";
// print_r($_SESSION);
?>

<!DOCTYPE html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/mycss.css">
    <title>Bienvenue sur SITE</title>
</head>

<body class="<?= $color_back ?>">
    <?php include '../assets/components/header.php' ?>
    <main class="body_main <?= $color3 ?>">
        <div>BIENVENUE, <?= $username; ?></div>
        <!-- doit afficher le tableau de données ici -->
        <table>
            <tbody></tbody>
            <tr>
                <th>Login</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Password</th>
            </tr>

            <?php
            foreach ($php_database as $user) {
                echo "<tr>";
                echo "<td>" . $user[$login] . "</td>";
                echo "<td>" . $user[$prenom] . "</td>";
                echo "<td>" . $user[$nom] . "</td>";
                echo "<td>" . $user[$pass] . "</td>";
                echo "</tr>";
            }
            ?>

        </table>
        <?php include '../assets/components/info_change.php' ?>
    </main>
    <?php include '../assets/components/footer.php' ?>
</body>