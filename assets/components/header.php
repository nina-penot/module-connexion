<?php

$inscri_off = "S'INSCRIRE";
$inscri_on = "PROFIL";

$log_off = "SE CONNECTER";
$log_on = "SE DECONNECTER";

$logged = false;

if ($logged == true) {
    $inscription = $inscri_on;
    $connexion = $log_on;
} else {
    $inscription = $inscri_off;
    $connexion = $log_off;
}

?>

<header>
    <div class="header_main">
        <a href="./index.php" class="header_title">HEADER</a>
        <div class="header_log_block">
            <a href="./inscription.php" class="header_log_btn"><?= $inscription ?></a>
            <a href="./connexion.php" class="header_log_btn"><?= $connexion ?></a>
        </div>
    </div>
    <nav class="navbar_main">
        <div class="navbar_elem">nav1</div>
        <div class="navbar_elem">nav2</div>
    </nav>
</header>