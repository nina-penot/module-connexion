<?php
//code
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

<body>
    <?php include '../assets/components/header_forms.php' ?>
    <main class="body_main">

        <div class="form_main">
            <form class="form_block" action="" method="post">
                <!-- titre -->
                <div class="form_title">S'inscrire</div>
                <!-- inputs -->

                <div class="form_elem">
                    <div>Login</div>
                    <input name="login" type="text" placeholder="Nom utilisateur...">
                </div>
                <!-- Names float -->
                <div class="form_names">
                    <div class="form_names_elem">
                        <div>Prénom</div>
                        <input name="prenom" type="text" placeholder="Votre prénom...">
                    </div>
                    <div class="form_names_elem">
                        <div>Nom</div>
                        <input name="nom" type="text" placeholder="Votre nom...">
                    </div>
                </div>
                <!-- End float, input -->
                <div class="form_elem">
                    <div>Mot de passe</div>
                    <input name="pass" type="password" placeholder="Mot de passe...">
                </div>
                <input class="submit_btn" name="submit" type="submit" value="S'INSCRIRE">

            </form>
        </div>

    </main>
</body>

</html>