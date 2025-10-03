<?php
require_once "../api/theming.php";

if (session_status() === PHP_SESSION_NONE) session_start();
$inscri_off = "S'INSCRIRE";
$inscri_on = "PROFIL";

$log_off = "SE CONNECTER";
$log_on = "SE DECONNECTER";

if (isset($_SESSION["loggedin"])) {
    $inscription = $inscri_on;
    $connexion = $log_on;
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user"] == "admin") {
            $inscri_link = "./admin.php";
        } else {
            $inscri_link = "./profil.php";
        }
    }
    $log_link = "./index.php";
    if (isset($_GET["btn_bottom"])) {
        session_destroy();
        $inscription = $inscri_off;
        $connexion = $log_off;
        $inscri_link = "./inscription.php";
        $log_link = "./connexion.php";
    }
} else {
    $inscription = $inscri_off;
    $connexion = $log_off;
    $inscri_link = "./inscription.php";
    $log_link = "./connexion.php";
}

?>

<footer class="footer_main <?= $color_main ?>">
    <div class="footer_grid">
        <div class="footer_grid_cell <?= $color_sec ?>">
            <div>Menu1</div>
            <div>Option</div>
        </div>
        <div class="footer_grid_cell <?= $color_sec ?>">
            <div>Menu2</div>
            <div>Option</div>
        </div>
        <div class="footer_log_block <?= $color_sec ?>">
            <div>CONTACT</div>
            <button class="<?= $color_main ?>">✉️</button>
            <form class="footer_log_form" action="<?= $inscri_link ?>" method="get">
                <button class="footer_log_btn <?= $color3, " ", $hoverable ?>" name="btn_top"><?= $inscription ?></button>
            </form>

            <form class="footer_log_form" action="<?= $log_link ?>" method="get">
                <button class="footer_log_btn <?= $color3, " ", $hoverable ?>" name="btn_bottom"><?= $connexion ?></button>
            </form>
        </div>
    </div>
</footer>