<?php
require_once "../api/library.php";
//Formulaire de changement d'infos

foreach ($php_database as $users) {
    if (strtolower($users[$login]) == strtolower($_SESSION["user"])) {
        $usr_login = $users[$login];
        $usr_prenom = $users[$prenom];
        $usr_nom = $users[$nom];
        $usr_pass = $users[$pass];
    }
}

if (isset($_POST["submit"])) {
    // echo "received submit", "<br>";
    if (isset($_POST["login"])) {
        if (!is_usernameTaken($php_database, $_POST["login"])) {
            echo "not taken, old=", $usr_login, " new=", $_POST["login"];
            $login_update = "UPDATE utilisateurs SET login='" . $_POST["login"] . "' WHERE login='" . $usr_login . "'";
            $my_database = $pdo->query($login_update);
            $_SESSION["user"] = $_POST["login"];
            $usr_login = $_POST["login"];
        } else {
            echo "username taken!";
        }
    }
    if (isset($_POST["prenom"]) and $_POST["prenom"] != "") {
        $prenom_update = "UPDATE utilisateurs SET prenom='" . $_POST["prenom"] . "' WHERE login='" . $usr_login . "'";
        $my_database = $pdo->query($prenom_update);
        $usr_prenom = $_POST["prenom"];
    }
    if (isset($_POST["nom"]) and $_POST["nom"] != "") {
        $nom_update = "UPDATE utilisateurs SET nom='" . $_POST["nom"] . "' WHERE login='" . $usr_login . "'";
        $my_database = $pdo->query($nom_update);
        $usr_nom = $_POST["nom"];
    }
    if (isset($_POST["pass"]) and $_POST["pass"] != "") {
        $pass_update = "UPDATE utilisateurs SET utilisateurs.password='" . $_POST["pass"] . "' WHERE login='" . $usr_login . "'";
        $my_database = $pdo->query($pass_update);
        $usr_pass = $_POST["pass"];
    }
    header("Location: ./profil.php");
}

//UPDATE utilisateurs SET `password`= 'banana' WHERE login='tigor'

?>

<div class="profil">
    <div class="profil_infos">
        <div class="profil_titres">Vos informations</div>
        <table>
            <tr>
                <td>Votre prénom :</td>
                <td><?= $usr_prenom ?></td>
            </tr>
            <tr>
                <td>Votre nom :</td>
                <td><?= $usr_nom ?></td>
            </tr>
        </table>
    </div>

    <?php if ($_SESSION["user"] == "admin"): ?>

        <form class="form_change_main" method="post">
            <div>Changez vos informations</div>
            <div>EN TANT QU'ADMIN, VOUS NE POUVEZ PAS CHANGER VOTER NOM.</div>
            <div>Mot de passe</div>
            <input type="password" name="pass">
            <input name="submit" type="submit" value="VALIDER">
        </form>

    <?php else: ?>

        <form class="form_change_main" method="post">
            <div class="profil_titres">Changez vos informations</div>
            <div>Changer de nom d'utilisateur</div>
            <input type="text" name="login" value="<?= $usr_login ?>">
            <div class="form_change_floatnp">
                <div>
                    <div>Changer de prénom</div>
                    <input type="text" name="prenom" value="<?= $usr_prenom ?>">
                </div>
                <div>
                    <div>Changer de nom</div>
                    <input type="text" name="nom" value="<?= $usr_nom ?>">
                </div>
            </div>
            <div>Changer de mot de passe</div>
            <input type="password" name="pass" placeholder="Nouveau mot de passe...">
            <input name="submit" type="submit" value="VALIDER">
        </form>

    <?php endif ?>
</div>