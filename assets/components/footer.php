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

<footer class="footer_main">
    <div class="footer_grid">
        <div class="footer_grid_cell">
            <div>Menu1</div>
            <div>Option</div>
        </div>
        <div class="footer_grid_cell">
            <div>Menu2</div>
            <div>Option</div>
        </div>
        <div class="footer_grid_cell">
            <div>CONTACT</div>
            <button>✉️</button>
            <button class="log_btn"><?= $inscription ?></button>
            <button class="log_btn"><?= $connexion ?></button>
        </div>
    </div>
</footer>