<?php
// require_once "../api/theming.php";

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

<header class="header_main <?= $color_main ?>">

    <div class="header_float">
        <a href="./index.php" class="header_title <?= $color_sec ?>">HEADER</a>
        <div class="header_log_block <?= $color_sec ?>">
            <form class="header_log_form" action="<?= $inscri_link ?>" method="get">
                <button class="header_log_btn <?= $color3, " ", $hoverable ?>" name="btn_top"><?= $inscription ?></button>
            </form>

            <form class="header_log_form" action="<?= $log_link ?>" method="get">
                <button class="header_log_btn <?= $color3, " ", $hoverable ?>" name="btn_bottom"><?= $connexion ?></button>
            </form>
            <form class="select_theme" method="get">
                <button type="submit" name="theme_submit">Changer de thème</button>
                <select name="theme">
                    <option value="mizu">Mizutsune</option>
                    <option value="almudron">Almudron</option>
                </select>
            </form>
        </div>
    </div>

    <nav class="navbar_main">
        <div class="navbar_elem <?= $color_sec, " ", $hoverable ?>">nav1</div>
        <div class="navbar_elem <?= $color_sec, " ", $hoverable ?>">nav2</div>
    </nav>

</header>