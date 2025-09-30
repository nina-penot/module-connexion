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
        <div class="header_title">HEADER</div>
        <div class="header_log_block">
            <button class="log_btn"><?= $inscription ?></button>
            <button class="log_btn"><?= $connexion ?></button>
        </div>
    </div>
    <nav class="navbar_main">
        <div class="navbar_elem">nav1</div>
        <div class="navbar_elem">nav2</div>
    </nav>
</header>