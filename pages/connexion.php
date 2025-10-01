<?php
require "../api/library.php";

//Traitement du formulaire

//Check si user existe, puis si mdp correct
if (isset($_POST["submit"])) {
    if (is_usernameTaken($php_database, $_POST[$login])) {
        $this_pass = getPass($php_database, $_POST[$login]);
        if (is_passCorrect($_POST[$pass], $this_pass)) {
            easyCookie("loggedin", true);
            if ($_POST[$login] == "admin") {
                header("Location: ./admin.php");
            } else {
                header("Location: ./profil.php");
            }
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>

<!-- HEAD -->

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/mycss.css">
    <title>Connexion...</title>
</head>

<!-- BODY -->

<body>
    <?php include '../assets/components/header_forms.php' ?>
    <main class="body_main">
        <div class="form_main">
            <form class="form_block" action="" method="post">
                <div class="form_title">Se connecter</div>
                <div class="form_elem">
                    <div>Login</div>
                    <input name="login" type="text" placeholder="Nom utilisateur...">
                </div>
                <div class="form_elem">
                    <div>Mot de passe</div>
                    <input name="pass" type="password" placeholder="Mot de passe...">
                </div>
                <input class="submit_btn" name="submit" type="submit" value="SE CONNECTER">
            </form>
        </div>
    </main>
</body>

</html>

<?php
if (isset($error)) {
    echo $error;
}
?>