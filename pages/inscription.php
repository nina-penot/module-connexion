<?php
session_start();
require "../api/library.php";
require_once "../api/theming.php";

//Traitement du formulaire

if (isset($_POST["submit"])) {
    //garde les infos dans session
    $_SESSION[$inscription] = save_in_Session($_POST[$login], $_POST[$prenom], $_POST[$nom], $_POST[$pass]);
    //Si utilisateur existe
    if (is_userExists($php_database, $_SESSION[$inscription])) {
        $userexists = "This user already exists!";
        $nom_val = "";
        $prenom_val = "";
        //Si seul le login est pris
    } else if (is_usernameTaken($php_database, $_SESSION[$inscription][$login])) {
        $usertaken = "This username: '" . $_SESSION[$inscription][$login] . "', is already taken. Try another.";
        $nom_val = $_POST[$nom];
        $prenom_val = $_POST[$prenom];
        //Si nouveau utilisateur
    } else {
        $nom_val = "";
        $prenom_val = "";
        $sql_insert = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('" . $_POST[$login] . "', '" . $_POST[$prenom] . "', '" . $_POST[$nom] . "', '" . $_POST[$pass] . "')";
        $my_database = $pdo->query($sql_insert);
        header("Location: ./connexion.php");
    }
} else {
    $nom_val = "";
    $prenom_val = "";
}

//INSERT INTO `utilisateurs` (`login`, `prenom`, `nom`, `password`) VALUES ('Dummy', 'Dumdum', 'Doo', 'blahblah');

?>

<!DOCTYPE html>
<html>

<!-- HEAD -->

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/mycss.css">
    <title>Inscription...</title>
</head>

<!-- BODY -->

<body class="<?= $color_back ?>">
    <?php include '../assets/components/header_forms.php' ?>
    <main class="body_main">

        <div class="form_main">
            <form class="form_block <?= $color_sec ?>" action="" method="post">
                <!-- titre -->
                <div class="form_title <?= $color_main ?>">S'inscrire</div>
                <!-- inputs -->

                <div class="form_elem">
                    <div>Login</div>
                    <input name="login" type="text" placeholder="Nom utilisateur..." required>
                </div>
                <!-- Names float -->
                <div class="form_names">
                    <div class="form_names_elem">
                        <div>Prénom</div>
                        <input name="prenom" type="text" placeholder="Votre prénom..." required value="<?= $prenom_val ?>">
                    </div>
                    <div class="form_names_elem">
                        <div>Nom</div>
                        <input name="nom" type="text" placeholder="Votre nom..." required value="<?= $nom_val ?>">
                    </div>
                </div>
                <!-- End float, input -->
                <div class="form_elem">
                    <div>Mot de passe</div>
                    <input name="pass" type="password" placeholder="Mot de passe..." required>
                </div>
                <input class="submit_btn" name="submit" type="submit" value="S'INSCRIRE">

            </form>
        </div>

        <?php
        if (isset($userexists)) {
            echo $userexists;
        } else if (isset($usertaken)) {
            echo $usertaken;
        }
        ?>

    </main>
</body>

</html>