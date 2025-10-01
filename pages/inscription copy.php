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

    </main>
</body>

</html>

<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=moduleconnexion", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$sql = "SELECT * from utilisateurs";
$my_database = $pdo->query($sql);

//const vars
$login = "login";
$nom = "nom";
$prenom = "prenom";
$pass = "pass";
$inscription = "inscription";

function getDatabase($database)
{
    global $login, $prenom, $nom, $pass;

    $table_test = [];

    while ($row = $database->fetch(PDO::FETCH_ASSOC)) {
        $table_test[] = [
            $login => $row['login'],
            $prenom => $row['prenom'],
            $nom => $row['nom'],
            $pass => $row['password']
        ];
    }

    return $table_test;
}

function save_in_Session($user_login, $user_prenom, $user_nom, $user_pass)
{
    global $login, $prenom, $nom, $pass, $inscription;
    $_SESSION[$inscription] = [
        $login => $user_login,
        $prenom => $user_prenom,
        $nom => $user_nom,
        $pass => $user_pass
    ];
}

function is_userExists($database, $session)
{
    global $login, $prenom, $nom;

    foreach ($database as $user) {
        if (
            strtolower($user[$login]) == strtolower($session[$login])
            and strtolower($user[$prenom]) == strtolower($session[$prenom])
            and strtolower($user[$nom]) == strtolower($session[$nom])
        ) {
            return true;
        }
    }
    return false;
}

function is_usernameTaken($database, $username)
{
    global $login;

    foreach ($database as $user) {
        if (strtolower($user[$login]) == strtolower($username)) {
            return true;
        }
    }
    return false;
}

//tableau de la base en php

$php_database = getDatabase($my_database);

//Traitement du formulaire
session_start();

if (isset($_POST["submit"])) {
    //garde les infos dans session
    save_in_Session($_POST[$login], $_POST[$prenom], $_POST[$nom], $_POST[$pass]);
    //Si utilisateur existe
    if (is_userExists($php_database, $_SESSION[$inscription])) {
        echo "This user already exists!";
        $nom_val = "";
        $prenom_val = "";
        //Si seul le login est pris
    } else if (is_usernameTaken($php_database, $_SESSION[$inscription][$login])) {
        echo "This username: '", $_SESSION[$inscription][$login], "', is already taken. Try another.";
        $nom_val = $_POST[$nom];
        $prenom_val = $_POST[$prenom];
        //Si nouveau utilisateur
    } else {
        echo "Success!";
        $nom_val = "";
        $prenom_val = "";
        // $sql_insert = "INSERT INTO `utilisateurs` (`login`, `prenom`, `nom`, `password`) VALUES (" . $_SESSION[$login] . "," . $_SESSION[$prenom] . "," . $_SESSION[$nom] . "," . $_SESSION[$pass] . ";";
        // $my_database = $pdo->query($sql_insert);
        // header("Location: ./connexion.php");
    }
} else {
    $nom_val = "";
    $prenom_val = "";
}

//INSERT INTO `utilisateurs` (`login`, `prenom`, `nom`, `password`) VALUES ('Dummy', 'Dumdum', 'Doo', 'blahblah');

?>